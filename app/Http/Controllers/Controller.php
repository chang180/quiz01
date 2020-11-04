<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Title;
use App\Models\Total;
use App\Models\Bottom;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $view = [];

    public function __construct()
    {
        $this->view['title'] = Title::where("sh", 1)->first();
        
        //進站總人數
        if(!session()->has('visitor')){
            $total=Total::first();
            $total->total++;
            $total->save();
            $this->view['total']=$total->total;
            // session(['visitor'=>$total->total]);
            session()->put('visitor',$total->total);
        }else{
            $this->view['total'] = Total::first()->total;

         }
        $this->view['bottom'] = Bottom::first()->bottom;

        
    }
}
