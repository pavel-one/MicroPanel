@extends('layouts.dashboard')

@section('title', 'Просмотр очередей')

@section('content')
    <div class="card">
        <div class="card-header">@yield('title')</div>

        <div class="card-body">
            <h3>В очереди</h3>
            <data-list :url="'{{ route('sudo.jobs') }}'" :exclude="[]"></data-list>
            <h3>С ошибкой</h3>
            <data-list :url="'{{ route('sudo.error.jobs') }}'" :exclude="[]"></data-list>
        </div>
    </div>
@endsection
