<?php

namespace App\Filters;

class CustomerFilters extends QueryFilter
{    
    public function state()
    {
        return $this->builder->orderBy('id','desc');
    }

    public function countryCode($code)
    {        
        return $this->builder->whereRaw('REPLACE(REPLACE(phone,SUBSTR(phone, INSTR(phone, ")") + 0),""),"(","") = "'.$code.'"');
    }

    


}
