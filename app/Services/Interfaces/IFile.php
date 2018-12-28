<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 12/12/18
 * Time: 6:24 PM
 */

namespace App\Services\Interfaces;


interface IFile
{
    /**
     * @param $request
     * @return mixed
     */
    public function getFileName($request);

    public function updateImages(array $data);
}