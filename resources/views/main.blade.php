@extends('home')

@section('center')
    <mvims :mvims="mvims"></mvims>
    <news :news="news" route="index"></news>
@endsection
