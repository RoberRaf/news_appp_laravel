@extends('layouts.main_layout')

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
    <form method="post" action="{{route('posts.edit',['id'=>$post['id']])}}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" value="{{old('title')?? $post['title']}}" type="text" class="form-control" id="title"
                   aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description">{{old('description')?? $post['description']}}</textarea>
        </div>
        <fieldset>

            <div class="mb-3">
                <label for="disabledSelect" class="form-label">Creator Name</label>
                <select id="disabledSelect" class="form-select" name="posted_by">
                    <option @if(old('posted_by') ?? $post['posted_by'] == 'Ahmed' ) selected @endif value="Ahmed">Ahmed</option>
                    <option @if(old('posted_by') ?? $post['posted_by'] == 'Omar' ) selected @endif  value="Omar">Omar</option>
                </select>
            </div>

        </fieldset>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
