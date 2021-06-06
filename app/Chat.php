<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /**
     * ホワイトリスト
     */
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'message',
    ];

    /**
     * 送り手リレーション(主)
     */
    public function fromUser(){
        return $this->belongsTo('App\User', 'from_user_id', 'id');
    }

    /**
     * 受け手リレーション(主)
     */
    public function toUser(){
        return $this->belongsTo('App\User', 'to_user_id', 'id');
    }
}
