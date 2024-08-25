@extends('layouts.main_layout')

@section('title')
    Home
@endsection
@section('content')
    <style>
        table {
            margin: 40px auto;

        }
    </style>
    @if (isset($msg))
        <div class="alert alert-success">
            <ul>
                <li>{{ $msg }}</li>
            </ul>
        </div>
    @endif

    <!-- Button trigger modal -->

    <!-- Modal -->



    <table class="table">
        <thead>
        <tr>
            <th style="text-align: center" colspan="5"><a class="btn btn-success m-4" href="{{route('posts.create')}}"
                                                          role="button">Create</a></th>
        </tr>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['posted_by']}}</td>
                <td>{{$post['created_at']->toFormattedDateString()}}</td>
                <td><a class="btn btn-info" href="{{route('posts.show',['id'=>$post['id']])}}" role="button">View</a>
                    <a class="btn btn-primary" href="{{route('posts.edit',['id'=>$post['id']])}}" role="button">Edit</a>
                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAlert"
                       role="button">Delete</a></td>
            </tr>

            <div class="modal fade" id="deleteAlert" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are You Shure you want to delete this post?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a type="button" class="btn btn-danger"
                               href="{{route("posts.delete",['id'=> $post['id'] ])}}">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        </tbody>
    </table>
    {{--    <div class="container">--}}
    {{--        @foreach ($posts as $user)--}}
    {{--            {{ $user->name }}--}}
    {{--        @endforeach--}}
    {{--    </div>--}}

    {{$posts->links()}}

    {{--    @for($i = 0; $i < $pageNum; $i++)--}}
    {{--        <a class="btn btn-danger" href="{{route("posts.index",['page'=>$i+1])}}" role="button">{{$i+1}}</a></td>--}}
    {{--    @endfor--}}
@endsection
