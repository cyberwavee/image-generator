<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

class IndexController
{
    public function index()
    {
        return view('index');
    }
}