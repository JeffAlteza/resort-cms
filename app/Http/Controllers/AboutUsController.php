<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Contact;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $data = $this->getIndexData();
        return view("pages.about-us.about-us-index", $data);
    }

    private function getIndexData()
    {
        $banner = Banner::where('type', 'about us')->first();
        $aboutUs = AboutUs::where('type', 'about us')->first();
        $timelines = AboutUs::where('type', 'timeline')->orderBy('date', 'desc')->get();
        $contacts = Contact::where('visibility', true)->whereIn('title', ['Cellphone', 'Email', 'Location', 'Facebook', 'Instagram', 'Youtube'])->pluck('description', 'title')->toArray();
        // dd($banner);
        return [
            'banner' => $banner,
            'aboutUs' => $aboutUs,
            'timelines' => $timelines,
            'contact' => $contacts,
        ];
    }
}
