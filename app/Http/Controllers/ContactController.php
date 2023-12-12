<?php

namespace App\Http\Controllers;

use App\Mail\InquiryEmail;
use App\Mail\InquiryMail;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Inquiry;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendInquiryMail(Request $request)
    {
        $attributes = $this->validate($request, [
            'email' => 'nullable|email:filter',
            'cellphone' => 'nullable|string',
            'subject' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        // dd($attributes);
        Mail::to('jeffreyalteza03@gmail.com')->send(new InquiryEmail($attributes));

        Inquiry::create([
            'email' => $attributes['email'],
            'cellphone' => $attributes['cellphone'],
            'subject' => $attributes['subject'],
            'message' => $attributes['message'],
        ]);

        $recipient = User::all();

        Notification::make()
            ->icon('heroicon-o-document-text')
            ->iconColor('success')
            ->title('New Inquiry Notification')
            ->body('Please check your email or go to the Inquiry page')
            ->sendToDatabase($recipient);

        return 'Success';
    }
}
