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
     */
    public function index()
    {
        // ログインユーザー
        $auth = Auth::user();

        // 既にスワイプ済みのユーザー
        $swipedUsers = Swipe::where('from_user_id', Auth::id())->get();
        $swipedUserIds = $swipedUsers->pluck('to_user_id');

        // 異性のユーザー
        $user = User::where('id', '<>', Auth::id())->where('sex', '<>', $auth->sex)->whereNotIn('id', $swipedUserIds)->first();

        return view('pages.swipe.index', [
            'user' => $user,
        ]);
    }

    /**
     * スワイプ処理
     */
    public function store(Request $request)
    {
        // スワイプ
        Swipe::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $request->input('to_user_id'),
            'like' => $request->input('like'),
        ]);

        // マッチング判定
        $isMatch = $request->input('like') && 
                    Swipe::where('from_user_id', $request->input('to_user_id'))
                    ->where('to_user_id', Auth::id())
                    ->where('like', true)
                    ->exists();
        
        if($isMatch){
            return redirect(route('swipes.index'))->with('flash_message', 'Match!');
        }

        return redirect(route('swipes.index'));
    }
}
