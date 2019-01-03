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
     * @param $slug
     * @return mixed
     */
    public function getFileName($request, $slug);

    /**
     * @param $request
     * @param array $data
     * @return mixed
     */
    public function updateImages($request, array $data);
}