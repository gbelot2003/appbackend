<?php

namespace App\Listeners;

use Carbon\Carbon;
use OwenIt\Auditing\Models\Audit;

class UserEventSuscriber
{
    /**
     * Handle user login events.
     */
    public function handleUserLogin($event) {
        $data = [
            'user_type'  => 'App/User',
            'user_id'    => auth()->user()->id,
            'event'      => "Logged In",
            'auditable'  => 'App\User',
            'old_values' => auth()->user()->id,
            'new_values' => auth()->user()->id,
            'url'        => request()->fullUrl(),
            'ip_address' => request()->getClientIp(),
            'user_agent' => request()->userAgent(),
            'tags'       => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        //create audit trail data
        Audit::create($data);
    }

    /**
     * Handle user logout events.
     */
    public function handleUserLogout() {

        $data = [
            'auditable_id' => auth()->user()->id,
            'auditable_type' => "Logged Out",
            'event'      => "Logged Out",
            'url'        => request()->fullUrl(),
            'ip_address' => request()->getClientIp(),
            'user_agent' => request()->userAgent(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id'    => auth()->user()->id,
        ];

        //create audit trail data
        Audit::create($data);

    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\UserAuthEvent',
            'App\Listeners\UserEventSubscriber@handleUserLogin'
        );

        $events->listen(
            'App\Events\UserLogOuEvent',
            'App\Listeners\UserEventSubscriber@handleUserLogout'
        );
    }
}
