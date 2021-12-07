<?php

namespace App\Http\Controllers;

use App\Models\Apply;
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
    /**
     * DB에서 user_id와 post_id를 받아온다
     * mypage
     */
    public function applyList()
    {
        // user_id와 post_id 불러와라
        $apply_list = DB::table('applies')->get();
        // $apply_list = Apply::where('user_id', auth()->id())->get();
        // dd($apply_list);
        return view('mypage', ['applies' => $apply_list]);
    }
}
