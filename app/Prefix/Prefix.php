<?php

namespace App\Prefix;

use libphonenumber\prefixmapper\PrefixFileReader;
use App\Prefix\ReadNumber;


class Prefix
{    
    public static function getValue($phoneNumber,$type){  
        $ReadNumber = new ReadNumber($phoneNumber);        
        return $ReadNumber->$type();        
    }       

}
