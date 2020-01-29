@extends('layouts.app')

@section('title', 'Не активирован')

@section('content')
    <div class="card">
        <div class="card-header">@yield('title')</div>
        <div class="card-body">
            {{ __('dashboard.SorryPageText') }}
        </div>
    </div>
@endsection
