<?php

namespace App\Prefix;
    
use App\Prefix\DefaultMetadataLoader;

class  loadMetadataFromFile
{
    
    private $data;

    public function __construct($metadataFileName)    
    {
        if (!is_readable($metadataFileName)) {
            throw new \Exception('missing metadata: ' . $metadataFileName);
        }
        $metadataLoader = new DefaultMetadataLoader();
        $this->data = $metadataLoader->loadMetadata($metadataFileName);        
    }

    public function getData()
    {
        return $this->data;
    }
    
    public function getByIndex($index){
        return (object) $this->data[$index];
    }
    
}

