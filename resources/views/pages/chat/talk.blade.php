@extends('layouts.app')

@section('content')
<div class="talk">
  <talk-component :id="{{ $id }}"></talk-component>
</div><!-- .talk -->
@endsection