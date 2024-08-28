<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Post;

class RawPostController extends Controller
{


    function index()
    {

        $posts = Post::paginate(3);

//       $pageNum =   ceil(Post::all()->count()/3);
//
//        $posts = Post::all()->forPage($page, 3);
        return view('index', ['posts' => $posts,]);// 'pageNum' => $pageNum]);
    }

    function create()
    {
        return view('posts.create');
    }

    function submitNewPost()
    {
        $validated_data = request()->validate([
            "title" => "required",
            "description" => "required",
            "posted_by" => "required",
        ]);
        # if form is not valid  --> redirect to the html page

        $request_data = request()->all(); # get request parameter
        $post = new Post();
        $post->title = $request_data['title'];
        $post->description = $request_data['description'];
        $post->posted_by = $request_data['posted_by'];

        $post->save();
        return to_route("posts.show", $post->id);
    }

    function editPost($id)
    {

        $validated_data = request()->validate([
            "title" => "required",
            "description" => "required",
            "posted_by" => "required",
        ]);
        # if form is not valid  --> redirect to the html page

        $request_data = request()->all(); # get request parameter
        $post = Post::findOrFail($id);
        $post->title = $request_data['title'];
        $post->description = $request_data['description'];
        $post->posted_by = $request_data['posted_by'];
        $post->save();
        return to_route("posts.show", $post->id);
    }

    function delete($id)
    {
        $post = Post::findOrFail($id);
        $post -> delete();
        return to_route("posts.index",["msg"=>"Post Deleted Successfully"]);
    }

    function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', ['post' => $post]);
    }

    function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }
}
