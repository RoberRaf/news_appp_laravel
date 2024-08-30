@extends('layouts.app')


@section('title')
    Edit Post
@endsection

@section('content')
    <style>
        form {
            margin: 40px auto;
            width: 50%;
        }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('posts.update',$post)}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" value="{{old('title')?? $post['title']}}" type="text" class="form-control" id="title"
                   aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control"
                      id="description">{{old('description')?? $post['description']}}</textarea>
        </div>
{{--        <fieldset>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="disabledSelect" class="form-label">Creator Name</label>--}}
{{--                <select id="disabledSelect" name="user_id" class="form-select">--}}
{{--                    <option disabled selected>--select name--</option>--}}
{{--                    @foreach($creators as $creator)--}}
{{--                        <option @if((old('creator_id') ?? $post->creator->id) == $creator->id ) selected--}}
{{--                                @endif--}}
{{--                                 value="{{$creator->id}}">--}}
{{--                            {{$creator->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
            <div class="mb-3">
                <label for="image" class="form-label">Image </label>
                <input id="image" type="file" name="image">
            </div>
{{--        </fieldset>--}}

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
