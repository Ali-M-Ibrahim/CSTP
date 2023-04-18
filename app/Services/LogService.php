<?php

namespace App\Services;

class LogService
{

    public function log($content){
        logger($content);
    }

    public function debug($content){
        error_log($content);
    }

}
