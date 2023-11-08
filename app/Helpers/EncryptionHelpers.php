<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;

class EncryptionHelpers
{
    public static function encrypt($data)
    {
        $encryptedData = Crypt::encryptString($data);
        $encryptedBase64 = base64_encode($encryptedData);

        return $encryptedBase64;
    }

    public static function decrypt($encryptedBase64)
    {
        $encryptedData = base64_decode($encryptedBase64);
        $decryptedData = Crypt::decryptString($encryptedData);

        return $decryptedData;
    }
}
