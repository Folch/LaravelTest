<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;

class Posts extends Controller
{
    /**
     * Display a listing of the resource.
     * @param null $id
     * @return Response
     */
    public function index($id = null)
    {
        if ($id == null) {
            $posts = Post::orderBy('id', 'asc')->where('active', 1)->get();


            $this->setUserName($posts);
            return $posts;
        } else {
            return $this->show($id);
        }
    }

    private function setUserName($posts)
    {

        $users = User::orderBy('id', 'asc')->get(['id', 'name']);

        foreach ($posts as $post) {
            foreach ($users as $user) {
                if ($post->user_id === $user->id) {
                    $post->user_name = $user->name;
                }

            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required|max:2000',
            'active' => 'required',
        ]);
        $post->user_id = $request->input('user_id');
        $post->active = $request->input('active');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->published_at = $request->input('published_at');
        $post->save();

        $posts = [];
        array_push($posts, $post);
        $this->setUserName($posts);
        return json_encode($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        try {
            $this->validate($request, [
                'title' => 'required|max:255',
                'body' => 'required|max:2000',
                'active' => 'required',
            ]);
            $post->active = $request->input('active');
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();

            $response['code'] = 'OK';
        } catch (ValidationException $ex) {
            $response['code'] = 'ER';
        }

        return json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $post = Post::find($request->input('id'));

        $post->delete();

        return json_encode($post);
    }
}
