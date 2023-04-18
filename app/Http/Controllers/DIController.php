<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LogService;

class DIController extends Controller
{

    private $mylogservice;

    public function __construct(LogService $myservice){
        $this->middleware('checkStatus');
        $this->mylogservice=$myservice;
    }

    public function index(LogService $myservice){
        $myservice->log('Writing in log file from DI Controller');
        $myservice->debug('Writing in log file from DI Controller');
        return "ok";
    }

    public function index2(){
        $this->mylogservice->log("writing in log file from DI controller using constructor");
        $this->mylogservice->debug("writing in log file from DI controller using constructor");

        return "ok";
    }

}
