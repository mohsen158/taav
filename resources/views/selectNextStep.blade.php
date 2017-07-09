@extends('Inspinia.app')

@section('title', 'Main page')

@section('content')


    @foreach($list as $s)

        <div class="ibox">
            <div class="ibox-title">
                <a href="/newStep/{{$member->id}}/{{$s->id}}"> <b> {{$s->title}}</b></a>
            </div>

            <div class="ibox-content">sdfdsf

            </div>
        </div>


    @endforeach


    <a class="btn btn-info"> End</a>


@endsection
