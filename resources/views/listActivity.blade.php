@extends('Inspinia.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-2">
                Name
            </div>
            <div class="col-lg-2">
                Status
            </div>
            <div class="col-lg-2">
                Arrival Time
            </div>
            <div class="col-lg-2">
                Start Time
            </div>
            <div class="col-lg-2">
                End Time
            </div>
            <div class="col-lg-2">
                activity
            </div>
        </div>

        @foreach($list as $mem)

            <div class="jumbotron">
                <div class="row">
                    <div class="col-xs-2">
                        {{$mem->name}}
                    </div>
                    <div class="col-xs-2">
                        {{$mem->pivot->status or  "sfsdf"}}
                    </div>
                    <div class="col-xs-2">
                        {{$mem->pivot->arrivalTime}}
                    </div>
                    <div class="col-xs-2">
                        {{$mem->pivot->startTime}}
                    </div>
                    <div class="col-xs-2">
                        {{$mem->pivot->endTime}}
                    </div>
                    <div class="col-xs-2">
                        @if($mem->pivot->status=="Pending")

                            <a href="/start/{{$mem->id}}/{{$mem->pivot->step_id}}" class="btn btn-info">Start</a>

                        @elseif($mem->pivot->status=="Progress")
                            <a href="/done/{{$mem->id}}/{{$mem->pivot->step_id}}" class="btn btn-primary">Done</a>
                        @endif

                    </div>
                </div>

            </div>
        @endforeach
        {{ $list->fragment('foo')->links() }}
    </div>
    </div>



@endsection
