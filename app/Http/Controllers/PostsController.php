<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

use App\Http\Requests;
use App\Http\Requests\PostEditRequest;
use App\Http\Requests\PostCreateRequest;

use App\Http\Controllers\Controller;
use App\Contracts\PostServiceInterface;


class PostsController extends Controller
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @param  Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('auth' , ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostServiceInterface $postService)
    {
        return view('posts.index', ['posts' => $postService->getAllPosts()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create');
        
    }

    /**
     * Store a newly created resource in storage.
     * POST /posts/store
     *
     * @param CompanyRequest             $request
     * @param PostServiceInterface $postServic
     *
     * @return Response
     */
    public function store( PostCreateRequest $request, PostServiceInterface $postServic )
    {
        if($postServic->createPost($request->all())){
            return redirect('/posts')->with('success','Post has ben successfully created');
        } else {
            return redirect('/posts')->withErrors('This Post is already exist!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , PostServiceInterface $postService)
    {
        if (null != $post = $postService->getPostByID( $id )) {
           return view('posts.show', ['post' => $post]);
        }

        return redirect('posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id , PostServiceInterface $postService )
    {
        
        if (null != $post = $postService->getPostByID( $id )) {
            return view('posts.edit', [ 'post' => $post ]);
        } else {
            return redirect('/post');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id , PostEditRequest $request, PostServiceInterface $postService)
    {

        $postService->updatePost( $id , $request->all() );
        return redirect('posts')->with('success','Post has ben successfully upated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , PostServiceInterface $postService)
    {
        if (null != $post = $postService->getPostByID( $id )) {
            $postService->deletePost($id);
            return redirect('posts')->with('success','Post has ben successfully deleted');
        } else {
            return redirect('/post');
        }
    }

    public function active($id , $active , PostServiceInterface $postService)
    {
        if (null != $post = $postService->getPostByID( $id )) {
            $postService->changeActivePost($id , $active );
            return redirect('posts')->with('success','Post Active has ben successfully deleted');
        } else {
            return redirect('/post');
        }
    }
}
