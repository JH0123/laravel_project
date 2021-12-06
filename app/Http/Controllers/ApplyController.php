<?php

namespace App\Http\Controllers;

use App\Models\Apply;

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
}
