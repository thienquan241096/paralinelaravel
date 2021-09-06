@extends('admin.layouts.index')
@section('content')
INDEX DASBOARD
@if(Auth::user())
<p>Chào mừng bạn : {{Auth::user()->name}}</p>
<a class="dropdown-item" href="{{ route('admin.getLogout') }}">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
</a>
@endif

@if (Session::has('messages'))
<p class="text-success">
    {{ Session::get('messages') }}
</p>
@endif
@endsection