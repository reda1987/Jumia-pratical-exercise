<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{    
    
    protected $request;

    protected $builder;

     /**
      * QueryFilter Constructor.
      *
      * @param $request
      */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        
        foreach ($this->filters() as $name => $value) {
            if(method_exists($this,$name)){
                call_user_func_array([$this,$name],array_filter([$value]));
            }
        }

        return  $this->builder;
    }

    // $filter->apply($builder) 
    protected function filters()
    {
        return $this->request->all(); 
    }

}
