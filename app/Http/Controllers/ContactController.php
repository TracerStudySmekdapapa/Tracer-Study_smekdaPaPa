<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        $title = 'Contact';
        return view('pages.contact', compact('title'));
    }

    public function store(ContactRequest $request)
    {
        /* Start Validasi */
        $validatedData = $request->validated();
        /* End Validasi */

        if ($validatedData) {
            Contact::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'subjek' => $request->subjek,
                'pesan' => $request->pesan
            ]);

            return redirect()->back();
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }
}
