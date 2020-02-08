@extends('layouts.dashboard')

@section('title', 'Управление пользователями')

@section('content')
    <div class="card">
        <div class="card-header">@yield('title')</div>

        <div class="card-body">
            <users-table v-bind:url="'{{ route('sudo.getusers') }}'"></users-table>
        </div>
    </div>
@endsection
