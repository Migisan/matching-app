<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Swipe;

class SwipeController extends Controller
{
    /**
     * スワイプ画面表示
     * @return view
     */
    public function index()
    {
        return view('pages.swipe.index');
    }

    /**
     * ユーザー取得
     * @return JSON
     */
    public function list()
    {
        // ログインユーザー
        $auth = Auth::user();

        // 既にスワイプ済みのユーザー
        $swipedUsers = Swipe::where('from_user_id', Auth::id())->get();
        $swipedUserIds = $swipedUsers->pluck('to_user_id');

        // 異性のユーザー
        $user = User::where('id', '<>', Auth::id())->where('sex', '<>', $auth->sex)->whereNotIn('id', $swipedUserIds)->first();

        return $user;
    }

    /**
     * スワイプ処理
     * @param Request
     * @return JSON
     */
    public function store(Request $request)
    {
        // スワイプ
        Swipe::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $request->to_user_id,
            'like' => $request->like,
        ]);

        // マッチング判定
        $isMatch = $request->like && 
                    Swipe::where('from_user_id', $request->to_user_id)
                    ->where('to_user_id', Auth::id())
                    ->where('like', true)
                    ->exists();
        
        // ユーザー取得
        $user = $this->list();

        return response()->json([
            'result' => 'success',
            'response' => $user
        ]);
    }
}
