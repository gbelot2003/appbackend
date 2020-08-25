<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'avatar'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return string
     * @internal param $value
     */
    public function avatarPath()
    {
        return "storage/app/public/profiles/{$this->avatar}";
    }
}
