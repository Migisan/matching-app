@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">会員登録</div>

                <div class="card-body text-center">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- 写真 -->
                        <div class="form-group row">
                            <input id="image" type="file" class="col-12 col-form-label text-md-right mx-auto" name="image" required accept="image/jpeg,image/png">
                        </div><!-- .form-group -->

                        <!-- 性別 -->
                        <div class="form-group row justify-content-center">
                            <input id="men" type="radio" class="col-3 col-form-label text-right" name="sex" value="men" checked><label for="men" class="col-3 text-left">男性</label>
                            <input id="women" type="radio" class="col-3 col-form-label text-right" name="sex" value="women"><label for="women" class="col-3 text-left">女性</label>
                        </div><!-- .form-group -->

                        <!-- ニックネーム -->
                        <div class="form-group row">
                            <label for="name" class="col-6 col-form-label text-left">ニックネーム</label>
                            <div class="col-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- メールアドレス -->
                        <div class="form-group row">
                            <label for="email" class="col-6 col-form-label text-left">メールアドレス</label>
                            <div class="col-12">
                                <input id="email" type="email" class="col-12 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- パスワード -->
                        <div class="form-group row">
                            <label for="password" class="col-6 col-form-label text-left">パスワード</label>
                            <div class="col-12">
                                <input id="password" type="password" class="col-12 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- 確認用パスワード -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-6 col-form-label text-left">確認用パスワード</label>
                            <div class="col-12">
                                <input id="password-confirm" type="password" class="col-12 form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- ボタン -->
                        <div>
                            <button type="submit" class="btn btn-primary mb-2">
                                登録
                            </button>
                        </div>
                    </form>

                    <!-- ログイン -->
                    <a href="{{ route('login') }}" class="text_link">ログインはこちらから</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
