<?php

use Ramsey\Uuid\Uuid;

if (! function_exists('uuid')) {
    /**
     * Create a new Universally Unique IDentifier
     */
    function uuid()
    {
        return Uuid::uuid4();
    }
}