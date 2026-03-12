<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\faq;
use App\Models\Feature;
use App\Models\Feedback;
use App\Models\Gallery;
use Illuminate\Http\JsonResponse;

class ChatbotContentController extends Controller
{
    public function faqs(): JsonResponse
    {
        $faqs = faq::all(['id', 'question', 'answer']);

        return response()->json(['data' => $faqs]);
    }

    public function features(): JsonResponse
    {
        $features = Feature::where('visibility', true)
            ->get(['id', 'title', 'description', 'image'])
            ->map(fn ($f) => [
                'id' => $f->id,
                'title' => $f->title,
                'description' => $f->description,
                'image_url' => $f->image ? asset('storage/' . $f->image) : null,
            ]);

        return response()->json(['data' => $features]);
    }

    public function gallery(): JsonResponse
    {
        $gallery = Gallery::where('visibility', true)
            ->get(['id', 'title', 'description', 'image'])
            ->map(fn ($g) => [
                'id' => $g->id,
                'title' => $g->title,
                'description' => $g->description,
                'image_url' => $g->image ? asset('storage/' . $g->image) : null,
            ]);

        return response()->json(['data' => $gallery]);
    }

    public function aboutUs(): JsonResponse
    {
        $aboutUs = AboutUs::all(['id', 'title', 'description', 'image', 'type', 'date'])
            ->map(fn ($a) => [
                'id' => $a->id,
                'title' => $a->title,
                'description' => $a->description,
                'type' => $a->type,
                'date' => $a->date,
                'image_url' => $a->image ? asset('storage/' . $a->image) : null,
            ]);

        return response()->json(['data' => $aboutUs]);
    }

    public function contacts(): JsonResponse
    {
        $contacts = Contact::where('visibility', true)
            ->get(['id', 'title', 'description', 'type']);

        return response()->json(['data' => $contacts]);
    }

    public function feedback(): JsonResponse
    {
        $feedback = Feedback::all(['id', 'name', 'address', 'occupation', 'feedback', 'image'])
            ->map(fn ($f) => [
                'id' => $f->id,
                'name' => $f->name,
                'address' => $f->address,
                'occupation' => $f->occupation,
                'feedback' => $f->feedback,
                'image_url' => $f->image ? asset('storage/' . $f->image) : null,
            ]);

        return response()->json(['data' => $feedback]);
    }

    public function resortInfo(): JsonResponse
    {
        $faqs = faq::all(['question', 'answer']);
        $contacts = Contact::where('visibility', true)->get(['title', 'description', 'type']);
        $aboutUs = AboutUs::all(['title', 'description', 'type', 'date']);

        return response()->json([
            'data' => [
                'faqs' => $faqs,
                'contacts' => $contacts,
                'about_us' => $aboutUs,
            ],
        ]);
    }
}
