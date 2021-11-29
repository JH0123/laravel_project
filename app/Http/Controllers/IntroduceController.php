<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->validate($request, ['title' => 'required', 'content' => 'required|min:3']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}