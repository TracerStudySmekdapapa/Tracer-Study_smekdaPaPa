<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $title = 'Pesan';
        $title_page = 'Pesan';
        $tidakAlumni = User::tidakAlumni()->limit(3)->get();
        $pesan = Contact::whereIn('status', ['0', 'tolak'])->get();
        $testimoni = Contact::where('status', 'terima')->get();
        return view('admin.pesan', compact('title', 'pesan', 'title_page', 'tidakAlumni', 'testimoni'));
    }

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


    public function tolakPesan($id)
    {
        $pesan = Contact::findOrFail($id);
        $pesan->update([
            'status' => 'tolak'
        ]);

        return redirect()->back()->with(['message' => 'Pesan Ditolak']);
    }

    public function terimaPesan($id)
    {
        $pesan = Contact::findOrFail($id);
        $pesan->update([
            'status' => 'terima'
        ]);

        return redirect()->back()->with(['message' => 'Pesan Diterima']);
    }

    public static function testimonial()
    {
        $data = Contact::where('status', 'terima')->get();
        return $data;
    }
}
