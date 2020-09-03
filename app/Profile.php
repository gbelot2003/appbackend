<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;
use OwenIt\Auditing\Contracts\Auditable;

class Profile extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'avatar', 'alias', 'about', 'field_facebook', 'field_instagram',
        'field_twitter', 'field_linkedin', 'share_profile', 'share_name', 'share_about',
        'share_email', 'share_phone', 'country_id', 'city_id'
    ];

    protected $cast = [
        'share_profile' => 'boolean',
        'share_name'    => 'boolean',
        'share_about'   => 'boolean',
        'share_email'   => 'boolean',
        'share_phone'   => 'boolean'
    ];

    /**
     * 
     */
    public function setShareProfileAttribute($value)
    {
        $this->attributes['share_profile'] = boolval($value);
    }

    /**
     * 
     */
    public function setShareNameAttribute($value)
    {
        $this->attributes['share_name'] = boolval($value);
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
