@extends('layouts.app')


@section('title')
    Create New Post
@endsection

@section('content')
    <style>
        form {
            margin: 40px auto;
            width: 50%;
        }
    </style>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" value="{{old('title')}}" name="title" class="form-control" id="title"
                   aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <textarea class="form-control" name="description"
                      id="exampleInputPassword1">{{old('description')}}</textarea>
        </div>
{{--        <fieldset>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="disabledSelect" class="form-label">Creator Name</label>--}}
{{--                <select id="disabledSelect" name="creator_id" class="form-select">--}}
{{--                    <option disabled selected>--select name--</option>--}}
{{--                    @foreach($creators as $creator)--}}
{{--                        <option @if(old('creator_id') == $creator->id ) selected--}}
{{--                                @endif value="{{$creator->id}}">{{$creator->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </fieldset>--}}
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input id="image" type="file" name="image" value="">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
