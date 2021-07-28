@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ログイン</div>

                <div class="card-body text-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- メールアドレス -->
                        <div class="form-group row">
                            <label for="email" class="col-6 form-label text-left">メールアドレス</label>
                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="user@example.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- パスワード -->
                        <div class="form-group row">
                            <label for="password" class="col-6 form-label text-left">パスワード</label>
                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- ボタン -->
                        <div>
                            <button type="submit" class="btn btn-primary mb-2">
                                ログイン
                            </button>
                        </div>

                    </form>
                    
                    <!-- 新規会員登録 -->
                    <a href="{{ route('register') }}" class="text_link">新規会員登録はこちらから</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
