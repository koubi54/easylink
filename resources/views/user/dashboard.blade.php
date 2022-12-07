@extends('user.layouts.app')

@section('content')

@if ($user)
@include('user.themes.'.$user->theme)
@endif

@endsection