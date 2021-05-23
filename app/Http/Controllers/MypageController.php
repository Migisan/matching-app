<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;

class MypageController extends Controller
{
    /**
     * マイページ表示
     * @return view
     */
    public function index()
    {
        return view('pages.mypage.index');
    }

    /**
     * ユーザー情報取得
     * @return JSON
     */
    public function info()
    {
        return Auth::user();
    }

    /**
     * ユーザー情報更新
     * @param Request
     * @return JSON
     */
    public function update(Request $request)
    {
        \Debugbar::info($request->all());
        $user = Auth::user();
        $user->introduction = $request->introduction;
        $user->save();

        return response()->json([
            'result' => 'success',
            'response' => $user
        ]);
    }

    /**
     * ユーザー設定更新
     */
    public function setting()
    {
        return redirect('/mypage');
    }
}
