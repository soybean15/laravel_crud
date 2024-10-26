<?php

namespace App\Helpers;


class IdGenerator{





    public static function generateId($prefix, $length)
    {
        $prefix = trim($prefix);

        if (!empty($prefix)) {
            $prefix = $prefix . '-';
        } else {
            $prefix = '';
        }

        
        $timestamp = now()->format('YmdHis');


        $randomPart = str_pad(mt_rand(1, 9999), $length - strlen($timestamp), '0', STR_PAD_LEFT);

        return $prefix . substr($timestamp, 0, $length - strlen($randomPart)) . $randomPart;
    }


}
