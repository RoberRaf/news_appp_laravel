@extends('layouts.main_layout')

@section('title')
    Show Post
@endsection
@section('content')
<style>
    #post{
        margin: 40px auto;
    }
</style>

    <div id="post">
        <h6>Post Info</h6>
        <hr>
        <p><strong>Title:</strong> {{$post['title']}} </p>
         <strong>Description:-</strong>
        <p>{{$post['description']}}</p>
    </div>
@endsection