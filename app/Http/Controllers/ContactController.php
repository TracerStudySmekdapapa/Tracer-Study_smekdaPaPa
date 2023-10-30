<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\User;
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

            return redirect()->back()->with('message', 'Pesan telah dikirim');
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput($request->all());
        }
    }

    public function index()
    {
        $title = 'Pesan';
        $title_page = 'Pesan';
        $tidakAlumni = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Alumni', 'Admin']);
        })
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->orderBy('users.name', 'ASC')
            ->limit(3)->get();
        $data = Contact::get();
        return view('admin.pesan', compact('title', 'data', 'title_page', 'tidakAlumni'));
    }
}
