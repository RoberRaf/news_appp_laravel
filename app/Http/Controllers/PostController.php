<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Creator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $qry = request()->query();
        $msg = isset($qry['msg']) ? $qry['msg'] : null;

        $posts = Post::paginate(3);
        return view('home', compact('posts', 'msg'));// 'pageNum' => $pageNum]);
    }

    public function create()
    {

//        if(Auth::user()->can('create', Post::class)){
//            dd('here');
//        }
//        Gate::authorize('create', Post::class);


        return view('posts.create');
    }


    public function store(PostStoreRequest $request)
    {
        $formData = $request->all();
        $formData['user_id'] = auth()->id();
        $request['user_id'] = auth()->id();

//        Gate::authorize('create', Post::class);
        $request->validate([
            'user_id' => [
                Rule::prohibitedIf(function () {
                    $reqs = Auth::user()->posts;
                    return count($reqs) >= 3;
                })
            ],
        ],
            [
                'user_id.prohibited' => 'Cannot create more than 3 posts',
            ],
        );

//        $formData['slug'] = str_replace(' ', '-', $formData['title']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $savedImgNameWithExt = $image->store('/', "posts_images");
            $formData['image'] = $savedImgNameWithExt;
        }
        $post = Post::create($formData);
        return redirect()->route('posts.show', compact('post'));
    }


    public function show(Post $post)
    {
        return view('posts.show', compact("post"));
    }


    public function edit(Post $post)
    {
        if (!Gate::allows('create', Auth::user())) {
            abort(403, 'Only the creator of the post can edit it');
        }
        return view('posts.edit', compact("post"));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {

        $formData = $request->all();
//        $formData['slug'] = str_replace(' ', '-', $formData['title']);
        if ($request->hasFile('image')) {
            $request->validate([
                "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'image.image' => 'Image must be an image',
                'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg',
                'image.max' => 'Image must be less than 2MB',
            ]);
            Storage::disk('posts_images')->delete($post->image);
            $image = $request->file('image');
            $savedImgNameWithExt = $image->store('/', "posts_images");
            $formData['image'] = $savedImgNameWithExt;
        } else {
            $formData['image'] = $post->image;
        }
        $post->update($formData);
        return to_route("posts.show", compact("post"));
    }


    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        Storage::disk('posts_images')->delete($post->image);
        $msg = "Post Deleted Successfully";
        return to_route("posts.index", compact('msg'));
    }

    public function restore()
    {
        $posts = Post::onlyTrashed()->where('id', '>', 0)->restore();
//        foreach ($posts as $post) {
//            $post->restore();
//
//        }

        return to_route('posts.index');
    }
}
