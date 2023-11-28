<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Gallery;
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
        $home = Home::where('type', 'banner')->where('visibility', true)->first();
        $aboutUs = Home::where('type', 'about us')->where('visibility', true)->first();
        $features = Home::where('type', 'feature')->where('visibility', true)->limit(3)->get();
        $gallery = Gallery::where('visibility', true)->inRandomOrder()->limit(6)->get();
        $contacts = Contact::where('visibility', true)->whereIn('title', ['Cellphone', 'Email', 'Location', 'Facebook', 'Instagram', 'Youtube'])->pluck('description', 'title')->toArray();
        // dd($gallery);
        return [
            'homeData' => $home,
            'featureDatas' => $features,
            'aboutUs' => $aboutUs,
            'contact' => $contacts,
            'galleryPhotos' => $gallery
        ];
    }
}
