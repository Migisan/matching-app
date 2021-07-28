<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Swipe;
use App\Chat;

class ChatController extends Controller
{
    /**
     * チャット画面表示
     * @return view
     */
    public function index()
    {
        return view('pages.chat.index');
    }

    /**
     * チャット一覧
     * @return JSON
     */
    public function list()
    {
        // 自分へいいねしたユーザー
        $likedUserIds = Swipe::where('to_user_id', Auth::id())->where('like', true)->pluck('from_user_id');

        // マッチしたユーザー
        $matchedUsers = Swipe::where('from_user_id', Auth::id())->whereIn('to_user_id', $likedUserIds)->where('like', true)->with('toUser')->get();

        return $matchedUsers;
    }

    /**
     * トーク画面表示
     * @param $id
     * @return view
     */
    public function talk($id)
    {
        return view('pages.chat.talk', ['id' => $id]);
    }

    /**
     * トークリスト
     * @param $id
     * @return JSON
     */
    public function talk_list($id)
    {
        // お互いのトーク
        $talks = Chat::
        where([
            ['from_user_id', $id],
            ['to_user_id', Auth::id()],
        ])
        ->orWhere(function($query) use ($id) {
            $query->where('from_user_id', Auth::id())
                    ->where('to_user_id', $id);
        })
        ->orderBy('created_at', 'asc')
        ->with('fromUser')
        ->get();

        \Debugbar::info($talks);

        return $talks;
    }

    /**
     * トーク送信
     * @param Request
     * @param $id
     * @return JSON
     */
    public function store(Request $request, $id)
    {
        \Debugbar::info($id, $request->message);
        $chat = new Chat;
        $input['from_user_id'] = Auth::id();
        $input['to_user_id'] = $id;
        $input['message'] = $request->message;
        $chat->fill($input)->save();

        $talks = $this->talk_list($id);

        return response()->json([
            'result' => 'success',
            'response' => $talks
        ]); 
    }
}
