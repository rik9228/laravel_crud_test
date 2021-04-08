@extends('book/layout')
@section('content')
<!-- store > 新規登録 -->
@include('book/form', ['target' => 'store'])
@endsection
