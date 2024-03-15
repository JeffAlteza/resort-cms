<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Feedback;
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
        $banner = Banner::where('type', 'home')->first();
        $aboutUs = AboutUs::where('type', 'about us')->first();
        $features = Feature::where('visibility', true)->limit(3)->get();
        $gallery = Gallery::where('visibility', true)->inRandomOrder()->limit(6)->get();
        $feedback = Feedback::limit(3)->get();
        $contacts = Contact::where('visibility', true)->whereIn('title', ['Cellphone', 'Email', 'Location', 'Facebook', 'Instagram', 'Youtube'])->pluck('description', 'title')->toArray();
        // dd($banner);
        return [
            'banner' => $banner,
            'featureDatas' => $features,
            'aboutUs' => $aboutUs,
            'contact' => $contacts,
            'galleryPhotos' => $gallery,
            'feedbacks' => $feedback
        ];
    }
}
