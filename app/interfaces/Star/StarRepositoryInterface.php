<?php

namespace App\Interfaces\Star;


interface StarRepositoryInterface
{
    // get All stars
    public function index();

    // store stars
    public function store($request);

    // Update stars
    public function update($request);

    // destroy stars
    public function destroy($request);
}
