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
    public function index();

    public function store();

    public function show();

    public function update();

    public function delete();
}