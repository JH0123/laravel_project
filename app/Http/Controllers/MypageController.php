<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function mypage()
    {
        $posts = Post::where('user_id', auth()->id())->latest()->paginate(10);
        return view('mypage', ['posts' => $posts]);
    }

    // 신청자 리스트
    // public function applyList()
    // {
    //     // user_id와 post_id 불러와라
    //     $apply_list = DB::table('applies')->get();

    //     return view('mypage', ['applies' => $apply_list]);
    // }
}
