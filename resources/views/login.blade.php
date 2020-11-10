@extends('home')

@section('center')
    @if (!empty(session('error')))
        <div class="alert alert-danger w-50 mx-auto">{{ session('error') }}</div>
    @endif
    <form action="/login" method="post">
        @csrf
        <p class="text-center my-3">帳號：<input class="border-bottom" type="text" name="acc"> </p>
        <p class="text-center my-3">密碼：<input class="bosubmit-bottom" type="password" name="pw"> </p>
        <p class="text-center my-3"><input class="btn btn-primary" type="submit" value="登入">
            <input class="btn btn-warning" type="reset" value="重置">
        </p>
    </form>
@endsection
