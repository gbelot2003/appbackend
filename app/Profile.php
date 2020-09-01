<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'avatar', 'alias', 'about', 'field_facebook', 'field_instagram',
                            'field_twitter', 'field_linkedin'];

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
        return "/storage/app/profiles/{$this->avatar}";
    }
}
