<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
// 主選單及次選單表已設定關聯，因此次選單可以不在這裏引用
use App\Models\SubMenu;
use App\Models\Image;
use App\Models\Ad;
use App\Models\Mvim;
use App\Models\News;
use Auth;
// use App\Models\Total;

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
        $this->sideBar();

       
        


        $mvims = Mvim::where("sh", 1)->get();
        $news = News::where("sh", 1)->get()->filter(function ($val, $idx) {
            if ($idx > 4) {
                $this->view['more'] = '/news';
            } else {
                return $val;
            }
        });


        // dd($news,$this->view);

        $this->view['mvims'] = $mvims;
        $this->view['news'] = $news;

        return view('main', $this->view);
    }

    protected function sideBar()
    {
        $ads = implode("　　", AD::where("sh", 1)->get()->pluck('text')->all());
        $menus = Menu::where('sh', 1)->get();
        $images = Image::where('sh', 1)->get();



        foreach ($menus as $key => $menu) {
            // $subs = Submenu::where("menu_id", $menu->id)->get();
            // 資料表已設定關聯函式，可使用語法如下：
            $subs = $menu->subs;
            // dd($subs);
            $menu->subs = $subs;
            // dd($menu);
            $menus[$key] = $menu;
            $menu->show=false;
        }

        if (Auth::user()) {
            $this->view['user'] = Auth::user();
        }



        $this->view['ads'] = $ads;
        $this->view['menus'] = $menus;
        $this->view['images'] = $images;
    }
}
