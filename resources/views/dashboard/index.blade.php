@extends('layouts.app')

@section('title', 'Панель управления')

@section('content')
    <div class="container" id="app">
        <div class="row justify-content-center">
            <left-nav :list="{{$menu}}" :route="'{{$currentRoute}}'"></left-nav>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Панель управления</div>

                    <div class="card-body">
                        Ты залогирован
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
