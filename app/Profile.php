<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Profile extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'avatar', 'alias', 'about', 'field_facebook', 'field_instagram',
        'field_twitter', 'field_linkedin', 'share_profile', 'share_name', 'share_about',
        'share_email', 'share_phone'
    ];

    protected $cast = [
        'share_profile' => 'boolean',
        'share_name' => 'boolean',
        'share_about' => 'boolean',
        'share_email' => 'boolean',
        'share_phone' => 'boolean'
    ];

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
        return "/storage/app/{$this->avatar}";
    }
}
