<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 12/5/18
 * Time: 12:16 PM
 */

namespace App\Services\Interfaces;


interface ICrud
{
    public function getCollection();

    public function saveNewObj($request);

    public function getObjById(int $id);

    public function updateObj(int $id);

    public function deleteObj(int $int);
}