<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = $this->getIndexData();
        return view("pages.contact.contact-index", $data);
    }

    private function getIndexData()
    {
        $banner = Banner::where('type', 'contact')->first();
        $contacts = Contact::where('visibility', true)->whereIn('title', ['Cellphone', 'Email', 'Location', 'Facebook', 'Instagram', 'Youtube'])->pluck('description', 'title')->toArray();
        return [
            'banner' => $banner,
            'contact' => $contacts,
        ];
    }
}
