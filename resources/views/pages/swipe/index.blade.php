@extends('layouts.app')

@section('content')
<div class="p-user-index">
  @if(is_null($user))
    <p class="text-center">あなたの周りにユーザーはいません</p>
  @else
    <!-- ユーザー表示 -->
    <div class="tphoto">
      <img src="{{ $user->image }}" title="tphoto" alt="Tinder Photo" />
      <div class="tname">{{ $user->name }}</div>
    </div>

    <div class="tcontrols">
      <div class="container">
        <div class="row">
          <!-- ごめんなさい -->
          <div class="col-md-6 mb-1">
            <form action="{{ route('swipes.store') }}" method="POST">
              @csrf
              <input type="hidden" name="to_user_id" value="{{ $user->id }}">
              <input type="hidden" name="like" value="0">
              <button class="tno" type="submit">
                <i class="fa fa-times" aria-hidden="true"></i>
              </button>
            </form>
          </div>
          <!-- いいね -->
          <div class="col-md-6 mb-1">
            <form action="{{ route('swipes.store') }}" method="POST">
              @csrf
              <input type="hidden" name="to_user_id" value="{{ $user->id }}">
              <input type="hidden" name="like" value="1">
              <button class="tyes" type="submit">
                <i class="fa fa-heart" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection