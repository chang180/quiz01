<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    //
    public function index()
    {
        // $all = Image::all();
        $all=Image::simplePaginate(3);
        // dd($all);
        $cols=['校園映像圖片','顯示','刪除','操作',];
        $rows=[];

        foreach($all as $a){
            $tmp=[
                [
                    'tag'=>'img',
                    'src'=> $a->img,
                    'style'=>'width:100px;height:68px',
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'btn_color'=>'btn-success',
                    'action'=>'show',
                    'id'=>$a->id,
                    'text'=>($a->sh==1)?'顯示':'隱藏',
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'btn_color'=>'btn-danger',
                    'action'=>'delete',
                    'id'=>$a->id,
                    'text'=>'刪除',
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'btn_color'=>'btn-info',
                    'action'=>'edit',
                    'id'=>$a->id,
                    'text'=>'編輯',
                ],
            ];

            $rows[]=$tmp;
        }

        // dd($rows);

        $this->view['header']='校園映像圖片管理';
        $this->view['module']='Image';
        $this->view['cols']=$cols;
        $this->view['rows']=$rows;
        $this->view['all']=$all;
        return view('backend.module', $this->view);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $view = [
            'action' => '/admin/image',
            'modal_header' => '新增校園映像圖片',
            'modal_body' => [
                [
                    'label' => '校園映像圖片',
                    'tag' => 'input',
                    'type' => 'file',
                    'name' => 'img',
                ],
            ],
        ];
        return view('modals.base_modal', $view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $image = new Image;
            $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

            $image->img = $request->file('img')->getClientOriginalName();
            $image->save();
        }

        return redirect('/admin/image');
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
        $image = Image::find($id);
        $view = [
            'action' => '/admin/image/' . $id,
            'method' => 'patch',
            'modal_header' => '編輯校園映像圖片',
            'modal_body' => [
                [
                    'label' => '目前圖片',
                    'tag' => 'img',
                    'src' => $image->img,
                    'style' => 'width:100x;height:68px',
                ],
                [
                    'label' => '更換校園映像圖片',
                    'tag' => 'input',
                    'type' => 'file',
                    'name' => 'img',
                ],
            ],
        ];
        return view('modals.base_modal', $view);
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
        $image = Image::find($id);

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());
            $image->img = $request->file('img')->getClientOriginalName();
        }

        $image->save();

        return redirect('/admin/image');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 後端僅做資料處理，完成後的畫面由前端自行處理
        Image::destroy($id);
    }

    /**
     * 改變資料的顯示狀態
     *
     */
    public function display($id)
    {
        $image = Image::find($id);
        $image->sh=($image->sh+1)%2;
        $image->save();
    }

}
