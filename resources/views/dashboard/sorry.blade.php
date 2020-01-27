@extends('layouts.app')

@section('title', 'Не активирован')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')</div>

                    <div class="card-body">
                        {{ __('dashboard.SorryPageText') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
