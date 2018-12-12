<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 11/23/18
 * Time: 12:49 PM
 */

namespace App\Services;


class FileService
{
    /**
     * @param $request
     * @return string
     */
    public function getFileName($request) : string
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(storage_path() . '/uploads/', $fileName);
        }
        return $fileName;
    }
}