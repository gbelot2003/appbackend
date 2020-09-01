<?php
/**
 * Created by PhpStorm.
 * User: gerardo
 * Date: 08-30-20
 * Time: 12:37 PM
 */

namespace Acme\Helpers;


class AvatarCreator
{
    public function createAvatar($name)
    {

        $slug = Str::slug($name, '-');

        $avatar = Avatar::create($name)->save("$slug.png");

        return $avatar;
    }
}