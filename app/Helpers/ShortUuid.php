<?php

namespace App\Helpers;

class ShortUuid{
    function generateShortUuid()  {
        $uuid = \Ramsey\Uuid\Uuid::uuid4();
        $shortUuid = substr($uuid->toString(), 0 , 8);
        return $shortUuid;
    }
}
