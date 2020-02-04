@extends('layouts.dashboard')

@section('title', 'Управление пользователями')

@section('content')
    <div class="card">
        <div class="card-header">@yield('title')</div>

        <div class="card-body">
            <message-dashboard v-if="message.text"
                               :text="message.text"
                               :error="message.error">
            </message-dashboard>
            <users-table v-bind:url="'{{ route('sudo.getusers') }}'"></users-table>
        </div>
    </div>
@endsection
