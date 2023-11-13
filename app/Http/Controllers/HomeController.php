<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = $this->getIndexData();
        return view("pages.home.home-index", $data);
    }

    private function getIndexData()
    {

        $home = Home::where('type', 'banner')->first();

        return [
            'homeData' => $home,
        ];
    }
}
