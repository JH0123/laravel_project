<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyController extends Controller
{
    public function apply($id)
    {
        // 이미 신청한 사람인가?
        // 한번 신청한 사람이라도 post_id가 다르면 DB에 저장되어야 함
        $check = Apply::where('post_id', $id)->where('user_id', auth()->id())->first();
        // post_id가 다르면 DB에 저장
        // $check가 null이면 저장
        if ($check == null) {
            $data['user_id'] = auth()->id();
            $data['post_id'] = $id;
            // 값 넘겨주는거 확인!
            // dd($data);

            Apply::create($data);
            // alert창 뜬다
            return back()->with('success', '신청이 완료되었습니다!');
        } elseif ($check != null) {
            // alert 안뜸
            return back()->with('error', '이미 신청되어있습니다!');
        }
    }
    // 신청자 리스트 보여주기
    public function applyList()
    {
        // user_id와 post_id 불러와라
        $applies = DB::table('applies')->get();
        // $apply_list = Apply::where('user_id', auth()->id())->get();
        // dd($apply_list);
        return view('applyList', ['applies' => $applies]);
    }
    // 신청 수락
    public function accept(Request $request)
    {
        // 신청한 사람의 user_id를 갖고오자
        // $test = $request->request_user_id;
        // dd($test);
        // $test2 = $request->request_post_id;

        // 신청한 클럽에 그 신청한 유저가 있는지 체크
        $check = Club::where('club_id', $request->request_post_id)->where('member', $request->request_user_id)->first();

        // dd($check);

        if ($check == null) {
            // 신청한 사람의 user_id가 넘어가야함
            // 404
            $value['member'] = $request->request_user_id;
            $value['club_id'] = $request->request_post_id;

            // dd($value);

            Club::create($value);

            Apply::where('id', $request->request_user_id)->delete();

            return back()->with('success', '신청이 수락되었습니다!');
        } else {
            return back()->with('error', '이미 있는 맴버입니다!');
        }
    }
    public function refusal(Request $request)
    {
        // 거절을 누르면 신청데이터 삭제
        // Apply::where('user_id', $request->request_user_id)->delete();
        $check = Apply::where('user_id', $request->request_user_id);
        dd($check);
        return redirect()->back();
    }
}
