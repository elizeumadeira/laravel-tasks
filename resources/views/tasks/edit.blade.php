@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <!-- Display Validation Errors -->
                @include('common.status')

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{__('task.edit.title')}} <strong>{{ $task->name }}</strong>
                    </div>
                    <div class="panel-body">

                        {!! Form::model($task, ['action' => ['TasksController@update', locale()->current(), $task->id], 'method' => 'PUT']) !!}

                        <div class="form-group row">
                            {!! Form::label('name', __('task.create.name'), ['class' => 'col-sm-3 col-sm-offset-1 control-label text-right']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>


                        <div class="form-group row">
                            {!! Form::label('description', __('task.create.description'), ['class' => 'col-sm-3 col-sm-offset-1 control-label text-right']) !!}
                            <div class="col-sm-6">
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>


                        <!-- Task Status -->

                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-sm-offset-1 control-label text-right">Status</label>
                            <div class="col-sm-6">
                                <div class="checkbox">
                                    <label for="status">
                                        {!! Form::checkbox('completed', 1, null, ['id' => 'status']) !!} {{__('task.index.table.complete')}}
                                    </label>
                                </div>
                            </div>
                        </div>


                        <!-- Add Task Button -->
                        <div class="form-group row">
                            <div class="col-sm-offset-4 col-sm-6">
                                {{ Form::button('<span class="fa fa-save fa-fw" aria-hidden="true"></span> ' . __('task.edit.save'), ['type' => 'submit', 'class' => 'btn btn-success btn-block']) }}
                            </div>
                        </div>


                        {!! Form::close() !!}

                    </div>
                    <div class="panel-footer">
                        {{-- <a href="{{ route('tasks.index', locale()->current()) }}" class="btn btn-sm btn-info"
                            type="button">
                            <span class="fa fa-reply" aria-hidden="true"></span> Back to Tasks
                        </a>

                        {!! Form::open(['class' => 'form-inline pull-right', 'method' => 'DELETE', 'route' => ['tasks.destroy', $task->id]]) !!}
                        {{ method_field('DELETE') }}
                        {{ Form::button('<span class="fa fa-trash fa-fw" aria-hidden="true"></span> <span class="hidden-xxs">Delete</span> <span class="hidden-sm hidden-xs">Task</span>', ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                        {!! Form::close() !!} --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
