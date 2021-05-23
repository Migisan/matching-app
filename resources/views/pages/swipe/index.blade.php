@extends('layouts.app')

@section('content')
<div class="swipe">
  @if(is_null($user))
    <p class="text-center">該当のユーザーがいません</p>
  @else
    <!-- ユーザー表示 -->
    <div class="photo">
      <img src="{{ $user->image }}" title="photo" alt="写真" />
      <div class="name">{{ $user->name }}</div>
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
              <button class="no" type="submit">
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
              <button class="yes" type="submit">
                <i class="fa fa-heart" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endif
</div><!-- .swipe -->
@endsection