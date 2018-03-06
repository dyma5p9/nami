<?php

namespace App\Http\Controllers;

use App\LikeUserPost;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->data = array();
    }

    /**
     * Show the application index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->data['posts'] = Post::with('user', 'likes', 'dislikes')->get();

        if ($this->data['posts']->isEmpty()) {
            abort(404);
        }

        return view('home', $this->data);
    }

    /**
     * Show the application custum post.
     *
     * @param string
     *
     * @return \Illuminate\Http\Response
     */
    public function post($slug=null)
    {

        $this->data['posts'] = Post::with('user', 'likes', 'dislikes')->where('slug', $slug)->get();

        if ($this->data['posts']->isEmpty()) {
            abort(404);
        }

        //dd($this->data['posts']);

        return view('post', $this->data);
    }

    /**
     * Show the application like/unlike by user post.
     *
     * @param post
     * @param state
     *
     * @return \Illuminate\Http\Response
     */
    public function like() {

        $response = 'Error';
        $like = 'zero';
        $dislike = 'zero';

        $post = Input::get('post');
        $state = (Input::get('state') == 'up') ? 1 : 0;

        if(!empty($post)){

            $data = [
                'like' => $state,
            ];

            $likes = LikeUserPost::where('post_id', $post)->where('user_id', Auth::user()->id)->first();

            if(count($likes) > 0){

                if($likes->like == $state){

                    LikeUserPost::where('id', $likes->id)->limit(1)->delete();

                    $response = 'You remove this opinion!';

                } else {

                    LikeUserPost::where('id', $likes->id)->update($data);

                    $response = 'Your like is changed!';

                }

            } else {

                $data['user_id'] = Auth::user()->id;
                $data['post_id'] = $post;

                LikeUserPost::create($data);

                $response = 'Thank for your like!';

            }

            $like = LikeUserPost::where('post_id', $post)->where('like', 1)->count();
            $dislike = LikeUserPost::where('post_id', $post)->where('like', 0)->count();

        }

        return response()->json(array('respons' => $response, 'like' => $like, 'dislike' => $dislike), 200);

    }

}
