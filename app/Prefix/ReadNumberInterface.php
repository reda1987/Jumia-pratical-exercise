<?php

namespace App\Prefix;



interface ReadNumberInterface
{
    
    public function __construct($phoneNumber);
    
    public function code();
    
    public function phone();
    
    public function country();
    
    public function state();

}


