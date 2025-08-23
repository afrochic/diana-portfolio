<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'message' => 'required|string|max:2000',
        ]);

        $entry = [
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
            'created_at' => now()->toDateTimeString(),
        ];

        $existing = [];
        if (Storage::exists('contacts.json')) {
            $existing = json_decode(Storage::get('contacts.json'), true) ?: [];
        }
        $existing[] = $entry;
        Storage::put('contacts.json', json_encode($existing, JSON_PRETTY_PRINT));

        return back()->with('status', 'Thanks! Your message was received.');
    }
}
