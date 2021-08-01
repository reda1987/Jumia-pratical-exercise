<?php

namespace App\Prefix;

class DefaultMetadataLoader implements MetadataLoaderInterface
{
    public function loadMetadata($metadataFileName)
    {
        return include $metadataFileName;
    }
}