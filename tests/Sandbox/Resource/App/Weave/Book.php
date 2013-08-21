<?php

namespace Sandbox\Resource\App\Weave;

use BEAR\Resource\AbstractObject;
use BEAR\Resource\ResourceInterface;
use BEAR\Resource\Annotation\Log;

class Book extends AbstractObject
{

    /**
     * @param \BEAR\Resource\ResourceInterface $resource
     */
    public function __construct(ResourceInterface $resource = null)
    {
        if (is_null($resource)) {
            $resource = $GLOBALS['RESOURCE'];
        }
    }

    /**
     * @param id
     *
     * @return array
     *
     * @Log
     */
    public function onGet($id)
    {
        return "book id[{$id}]";
    }
}