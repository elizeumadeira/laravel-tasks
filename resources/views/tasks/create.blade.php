@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <!-- Display Validation Errors -->
            @include('common.status')

            <div class="panel panel-default">
                <div class="panel-heading">{{__('task.create.new')}}</div>
                <div class="panel-body">

                    @include('tasks.partials.create-task')

                </div>
                <div class="panel-footer">
                    <a href="{{ route('tasks.index', locale()->current()) }}" class="btn btn-sm btn-info" type="button">
                        <span class="fa fa-reply" aria-hidden="true"></span>{{__('task.create.back')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection