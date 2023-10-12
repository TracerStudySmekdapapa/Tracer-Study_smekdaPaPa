<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait HasImage
{
    public function uploadImage($request, $path)
    {
        // $image = null;
        $pp = User::where('id_user', Auth::user()->id_user)->first();

        if ($request->file('profil_picture')) {
            Storage::delete('public/foto/' . $pp->profil_picture);            

            $image = $request->file('profil_picture');
            $image->storeAs($path, $image->hashName());

            $request->user()->profil_picture = $request->file('profil_picture')->hashName();

        }

        return $image;
    }
}