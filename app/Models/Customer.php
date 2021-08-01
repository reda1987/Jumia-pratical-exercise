<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Prefix\Prefix;
use App\Filters\QueryFilter;

class Customer extends Model
{
    use HasFactory;
        
    protected $table = 'customer';
    protected $appends = ['Country','State','CountryCode','PhoneNum'];


    public  function getCountryAttribute(){
    
        return Prefix::getValue($this->phone,'country');
    }

    public  function getStateAttribute(){
    
        return Prefix::getValue($this->phone,'state');
    }

    public  function getCountryCodeAttribute(){
    
        return Prefix::getValue($this->phone,'code');
    }

    public  function getPhoneNumAttribute(){
    
        return Prefix::getValue($this->phone,'phone');
    }

    public function scopeFilter($query, QueryFilter $filters){
        return $filters->apply($query);
    }     
}
