<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Home;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $data = $this->getIndexData();
        return view("pages.gallery.gallery-index", $data);
    }

    private function getIndexData()
    {
        $gallery = Gallery::where('visibility', true)->get();
        $home = Home::where('type', 'gallery banner')->first();
        $contacts = Contact::where('visibility', true)->whereIn('title', ['Cellphone', 'Email', 'Location', 'Facebook', 'Instagram', 'Youtube'])->pluck('description', 'title')->toArray();

        return [
            'contact' => $contacts,
            'galleryPhotos' => $gallery,
            'home' => $home
        ];
    }
}
