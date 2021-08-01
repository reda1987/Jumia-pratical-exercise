<?php

namespace App\Prefix;

use App\Prefix\loadMetadataFromFile;

class ReadNumber implements ReadNumberInterface
{
    // phone formating (212) 6007989253
    const pattern = '/[(*)]/m';
    const MAPPING_DATA_DIRECTORY = __DIR__ .'\Map.php';
    private $phoneNumber;    
    

    public function __construct($phoneNumber)    
    {
        $this->phoneNumber = $phoneNumber;        
    }    

    public function __call($method, $args)
    {
        if(function_exists($method))
        {
                return call_user_func_array(array($this), $args);
        }
    }


    public function code()
    {
        $code = strstr($this->phoneNumber, ' ',true);
        return preg_replace('/[(*)]/m','',$code);        
    }

    public function phone()
    {
        return ltrim(strstr($this->phoneNumber,' ',false),' ');        
    }

    public function country()
    {
        $loadData   = new loadMetadataFromFile(self::MAPPING_DATA_DIRECTORY);
        $data       = $loadData->getByIndex($this->code());
        return $data->name;
    }

    public function state()
    {
        $loadData   = new loadMetadataFromFile(self::MAPPING_DATA_DIRECTORY);
        $data       = $loadData->getByIndex($this->code());   
        $regex      = $data->regex;
        return (preg_replace($regex, '', $this->phoneNumber)) ? 'NOK': 'OK';
    }            
   
}
