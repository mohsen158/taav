@extends('Inspinia.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight" xmlns:v-bind="http://www.w3.org/1999/xhtml">

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
        <div id="app">
            <activities></activities>
            @foreach($list as $mem)

                {{--<div class="jumbotron">--}}
                {{--<div class="row">--}}
                {{--<div class="col-xs-2">--}}
                {{--{{$mem->name}}--}}
                {{--</div>--}}
                {{--<div class="col-xs-2">--}}
                {{--{{$mem->pivot->status or  "sfsdf"}}--}}
                {{--</div>--}}
                {{--<div class="col-xs-2">--}}
                {{--{{$mem->pivot->arrivalTime}}--}}
                {{--</div>--}}
                {{--<div class="col-xs-2">--}}
                {{--{{$mem->pivot->startTime}}--}}
                {{--</div>--}}
                {{--<div class="col-xs-2">--}}
                {{--{{$mem->pivot->endTime}}--}}
                {{--</div>--}}
                {{--<div class="col-xs-2">--}}
                {{--@if($mem->pivot->status=="Pending")--}}

                {{--<a href="/start/{{$mem->id}}/{{$mem->pivot->step_id}}" class="btn btn-info">Start</a>--}}

                {{--@elseif($mem->pivot->status=="Progress")--}}
                {{--<a href="/done/{{$mem->id}}/{{$mem->pivot->step_id}}" class="btn btn-primary">Done</a>--}}
                {{--@endif--}}

                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}
            @endforeach
        </div>
        {{ $list->fragment('foo')->links() }}
    </div>
    </div>
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>

    <template id="temp1">
        <div>
            <select v-model="step">
                <option disabled value="">Please select one</option>

                <option v-for="item in steps">@{{ item.title }}</option>
                <option>all</option>
            </select>

            <input type="text" class="form-control" v-model="search"/>
            <input type="text" class="form-control" v-model="status"/>
            <transition-group name="slideDown" tag="div">
                <div v-for="item in filterby(search,step)" class="jumbotron" v-bind:key="item">

                    <div class="col-md-2">
                        @{{ item.member.name}}
                    </div>
                    <div class="col-md-2">
                        @{{ item.status }}
                    </div>
                    <div class="col-md-2">
                        @{{ item.arrivalTime }}
                    </div>

                    <div class="col-md-2">
                        @{{ item.startTime }}
                    </div>
                    <div class="col-md-2">
                        @{{ item.endTime }}
                    </div>
                    <div class="col-xs-2">

                        <div v-if="item.status=='Pending'">
                            <a v-on:click="start(item)" class="btn btn-info">Start</a>
                        </div>
                        <div v-if="item.status=='Progress'">
                            <a v-on:click="done(item)" class="btn btn-primary">Done</a>
                        </div>


                    </div>
                </div>
            </transition-group>

        {{--</div>--}}

        {{--<div class="jumbotron">--}}
        {{--<div class="row">--}}
        {{--<div class="col-xs-2">--}}
        {{--                {{$mem->name}}--}}
        {{--@{{name}}--}}
        {{--</div>--}}
        {{--<div class="col-xs-2">asd--}}
        {{--                {{$mem->pivot->status or  "sfsdf"}}--}}{{--sdasd--}}
        {{--</div>--}}
        {{--<div class="col-xs-2">asdsa--}}
        {{--                {{$mem->pivot->arrivalTime}}--}}{{--asdasd--}}
        {{--</div>--}}
        {{--<div class="col-xs-2">--}}
        {{--                {{$mem->pivot->startTime}}--}}
        {{--</div>--}}
        {{--asd--}}
        {{--<div class="col-xs-2">asd--}}
        {{--{{$mem->pivot->endTime}}--}}
        {{--</div>--}}
        {{--<div class="col-xs-2">--}}
        {{--@if($mem->pivot->status=="Pending")--}}

        {{--<a href="/start/{{$mem->id}}/{{$mem->pivot->step_id}}" class="btn btn-info">Start</a>--}}

        {{--@elseif($mem->pivot->status=="Progress")--}}
        {{--<a href="/done/{{$mem->id}}/{{$mem->pivot->step_id}}" class="btn btn-primary">Done</a>--}}
        {{--@endif--}}

        {{--</div>--}}
        {{--</div>--}}

        {{--</div>--}}


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">
            Basic fadeIn effect
        </button>
        <div class="modal in modal" id="doneModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>

                        <h4 class="modal-title">Select next step</h4>
                        <small>
                        </small>
                    </div>
                    <div class="modal-body">
                        <select v-model="nextStepId">

                            <option v-for="(item , index) in nextsteps" v-bind:value="item.id" >    @{{ item.title }}</option>

                        </select>


                    </div>
                    <div class="modal-footer">
                        <button v-on:click="doneClick" type="button" class="btn btn-primary" data-dismiss="modal">ok
                        </button>

                    </div>
                </div>
            </div>
        </div>
        </div>

    </template>


    <button id="myshow">show</button>
    <script>

    </script>

@endsection
