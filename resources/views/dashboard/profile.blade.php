@extends('layouts.dashboard')

@section('title', 'Редактирование профиля')

@section('content')
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <card-profile :user="this.config.user"></card-profile>
        </div>
        <div class="col-xl-8 order-xl-1">
            <profile-form :user="this.config.user"></profile-form>
        </div>
    </div>
@endsection
