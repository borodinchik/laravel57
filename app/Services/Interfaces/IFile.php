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
     * Return one file name
     * @param $request
     */
    public function getFileName($request);
}