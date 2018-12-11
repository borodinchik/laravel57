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

    public function saveNewObj($data);

    public function getObjById(int $id);

    public function updateObj($data);

    public function deleteObj(int $id);
}