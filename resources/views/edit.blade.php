extends('book/layout')
@section('content')
@include('book/form',b['target' => 'update'])
@endsection
