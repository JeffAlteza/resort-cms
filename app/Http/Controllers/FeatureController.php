<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Contact;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $data = $this->getIndexData();
        return view("pages.feature.feature-index", $data);
    }

    private function getIndexData()
    {
        $banner = Banner::where('type', 'feature')->first();
        $features = Feature::where('visibility', true)->get();
        $contacts = Contact::where('visibility', true)->whereIn('title', ['Cellphone', 'Email', 'Location', 'Facebook', 'Instagram', 'Youtube'])->pluck('description', 'title')->toArray();
        // dd($banner);
        return [
            'banner' => $banner,
            'featureDatas' => $features,
            'contact' => $contacts,
        ];
    }
}
