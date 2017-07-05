@extends('Inspinia.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
        <div class="jumbotron">
            dd({{$list[0]->pivot->endTime}})

        </div>

        </div>
    </div>

@endsection
