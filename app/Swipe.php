<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Swipe extends Model
{
    /**
     * ホワイトリスト
     */
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'like',
    ];

    /**
     * 受け手リレーション(主)
     */
    public function toUser(){
        return $this->belongsTo('App\User', 'to_user_id', 'id');
    }
}
