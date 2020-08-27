<?php
/**
 * Created by PhpStorm.
 * User: gerardo
 * Date: 08-25-20
 * Time: 09:18 AM
 */

namespace Acme\Helpers;


use Illuminate\Http\Request;

class StoreFilesHelper
{
    private $request;

    /**
     * ImageUploadHelper constructor.
     * @param Request $request
     */
    function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $folders
     * @param string $key
     * @return string
     * @internal param Request $request
     */
    public function storeAvatarIn($folders = 'images', $key = 'image')
    {
        // Obtenemos el nombre del archivo y guardamos
        $name = $this->request->file("$key")->store($folders);

        return $name;
    }
}