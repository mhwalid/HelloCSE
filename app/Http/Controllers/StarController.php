<?php

namespace App\Http\Controllers;

use App\Interfaces\Star\StarRepositoryInterface;
use Illuminate\Http\Request;

class StarController extends Controller
{
    private $Stars;

    public function __construct(StarRepositoryInterface $Stars)
    {
        $this->Stars = $Stars;
    }

    public function index()
    {
        return  $this->Stars->index();
    }

    public function store(Request $request)
    {
        return $this->Stars->store($request);
    }


    public function update(Request $request)
    {
        return $this->Stars->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Stars->destroy($request);
    }
}
