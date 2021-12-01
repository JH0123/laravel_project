<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IntroduceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', ['posts' => $posts]);
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // title, content 중 하나라도 비워져 있을 경우 오류 메시지를 출력하게 함(유효성 검사)
        $this->validate($request, ['title' => 'required', 'content' => 'required|min:3', 'hobby' => 'required|min:3']);
        // dd($request->all());

        $fileName = null;
        if ($request->hasFile('image')) { // 이미지 파일이 있는가?
            // dd($request->file('image'));

            // 사진이 있을 경우에만 사진 이름을 현재 시간 + 원래 파일 이름으로 함
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $fileName); //images 폴더에 사진을 저장
            // dd($path);
        }
        $input = array_merge($request->all(), ["user_id" => Auth::user()->id]);
        // dd($input);

        // 이미지가 있다면 $input에 image 항목을 추가
        if ($fileName) {
            $input = array_merge($input, ['image' => $fileName]);
        }
        Post::create($input);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $this->authorize('update', $post);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['title' => 'required', 'content' => 'required|min:3']);

        $post = Post::find($id);

        $this->authorize('update', $post);

        $post->title = $request->title;
        $post->content = $request->content;
        // $post->age = $request->age;
        // $post->hobby = $request->hobby;

        // $request 안에 image가 있다면 image를 저장
        if ($request->hasFile('image')) {
            if ($post->image) { // 만약 $post에 image가 있다면 db에서 지우고 저장하고자 하는 image를 저장한다
                Storage::delete('/storage/images' . $post->image);
            }
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $post->image = $fileName;
            $request->image->storeAs('public/images', $fileName);
        }

        $post->save();

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

        $this->authorize('delete', $post);
        // 게시글에 이미지가 있다면 파일시스템에서도 삭제해줘야 한다
        if ($post->image) {
            Storage::delete('public/images/' . $post->image);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }

    // 이미지만 삭제
    public function deleteImage($id)
    {
        $post = Post::find($id);
        $this->authorize('delete', $post);

        Storage::delete('public/images/' . $post->image);
        $post->image = null;
        $post->save();

        return redirect()->route('posts.edit', ['post' => $post->id]);
    }
}
