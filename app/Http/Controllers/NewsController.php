<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    //
    public function index()
    {
        $all=News::all();
        return view('backend.module', ['header' => '最新消息管理','module'=>'News','rows'=>$all]);
    }

}
