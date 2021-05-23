<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Swipe;

class ChatController extends Controller
{
    /**
     * チャット画面表示
     */
    public function index()
    {
        // 自分へいいねしたユーザー
        $likedUserIds = Swipe::where('to_user_id', Auth::id())->where('like', true)->pluck('from_user_id');

        // マッチしたユーザー
        $matchedUsers = Swipe::where('from_user_id', Auth::id())->whereIn('to_user_id', $likedUserIds)->where('like', true)->with('toUser')->get();

        return view('pages.chat.index', ['matchedUsers' => $matchedUsers]);
    }
}
