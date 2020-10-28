<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
// 主選單及次選單表已設定關聯，因此次選單可以不在這裏引用
// use App\Models\SubMenu;
use App\Models\Image;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menus = Menu::where('sh', 1)->get();
        $images=Image::where('sh',1)->get();


        foreach ($menus as $key => $menu) {
            // $subs = Submenu::where("menu_id", $menu->id)->get();
            // 資料表已設定關聯函式，可使用語法如下：
            $subs=$menu->subs;
            // dd($subs);
            $menu->subs = $subs;
            // dd($menu);
            $menus[$key] = $menu;
        }
        $this->view['menus'] = $menus;
        $this->view['images']=$images;
        return view('main', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
