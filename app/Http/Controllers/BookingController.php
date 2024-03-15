<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Mail\InquiryEmail;
use App\Models\Banner;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\faq;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        $data = $this->getIndexData();
        return view("pages.book.book-index", $data);
    }
    
    private function getIndexData()
    {
        $book = Booking::where('status', 'accept');
        $checkin = $book->pluck('checkin')->toArray();
        $banner = Banner::where('type', 'book')->first();
        $faq = faq::all();
        $contacts = Contact::where('visibility', true)->whereIn('title', ['Cellphone', 'Email', 'Location', 'Facebook', 'Instagram', 'Youtube'])->pluck('description', 'title')->toArray();

        return [
            'book' => $book,
            'checkin' => $checkin,
            'banner' => $banner,
            'faq' => $faq,
            'contact' => $contacts,
        ];
    }

    public function sendBookMail(Request $request)
    {
        $attributes = $this->validate($request, [
            'name' => 'nullable|string',
            'email' => 'nullable|email:filter',
            'cellphone' => 'nullable|string',
            'checkin' => 'nullable',
            'checkout' => 'nullable',
            'message' => 'nullable|string',
        ]);
        
        $recipient = User::all();

        Mail::to(env('MAIL_TO'))->send(new BookingMail($attributes));

        Booking::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'cellphone' => $attributes['cellphone'],
            'checkin' => $attributes['checkin'],
            'checkout' => $attributes['checkout'],
            'message' => $attributes['message'],
        ]);

        Notification::make()
            ->icon('heroicon-o-envelope')
            ->iconColor('success')
            ->title('New Inquiry Notification from ' . $attributes['email'])
            ->body('Please check your email or go to the Inquiry page')
            ->sendToDatabase($recipient);

        $data = $this->getIndexData();
        $data['success'] = true;

        return view('pages.contact.contact-index', $data);
    }
}
