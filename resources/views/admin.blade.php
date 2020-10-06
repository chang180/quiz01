@extends("layouts.layout")

@section("main")
<div class="menu col-3">
    <div class="border-bottom my-2 p-1 text-center">後台管理</div>
    <div class="list-group list-group-item list-group-item-action"><a class="d=block" href="admin/title">標題圖片管理</a></div>
    <div class="list-group list-group-item list-group-item-action"><a class="d=block" href="admin/ad">動態文字廣告管理</a></div>
    <div class="list-group list-group-item list-group-item-action"><a class="d=block" href="admin/mvim">校園映像圖片管理</a></div>
    <div class="list-group list-group-item list-group-item-action"><a class="d=block" href="admin/image">動畫圖片管理</a></div>
    <div class="list-group list-group-item list-group-item-action"><a class="d=block" href="admin/title">進站人數管理</a></div>
    <div class="list-group list-group-item list-group-item-action"><a class="d=block" href="admin/title">頁尾版權管理</a></div>
    <div class="list-group list-group-item list-group-item-action"><a class="d=block" href="admin/title">最新消息管懂</a></div>
    <div class="list-group list-group-item list-group-item-action"><a class="d=block" href="admin/title">管理者管理</a></div>
    <div class="list-group list-group-item list-group-item-action"><a class="d=block" href="admin/title">選單管理</a></div>
    <div class="border text-center my-2">訪客人數：</div>
</div>
<div class="main col-9">主內容區</div>
@endsection

@section("script")
{{-- 用來寫js的內容 --}}
@endsection