@extends('layouts.app')

@section('content')
<div class="mypage">
  <mypage-component :csrf="{{json_encode(csrf_token())}}"></mypage-component>
</div>
@endsection
