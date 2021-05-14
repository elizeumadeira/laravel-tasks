@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">

            <!-- Display Validation Errors -->
            @include('common.status')

            @if (count($tasks) > 0)

                <div id="content">
                    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active"><a href="#all" data-toggle="tab"><span class="fa fa-tasks" aria-hidden="true"></span> <span class="hidden-xs">{{__('task.index.tab.all')}}</span></a></li>
                        <li><a href="#incomplete" data-toggle="tab"><span class="fa fa-square-o" aria-hidden="true"></span> <span class="hidden-xs">{{__('task.index.tab.incomplete')}}</span></a></li>
                        <li><a href="#complete" data-toggle="tab"><span class="fa fa-check-square-o" aria-hidden="true"></span> <span class="hidden-xs">{{__('task.index.tab.complete')}}</span></a></li>
                    </ul>
                    <div id="my-tab-content" class="tab-content">

                        @include('tasks/partials/task-tab', array('tab' => 'all', 'tasks' => $tasks, 'title' => __('task.index.tab.all'), 'status' => 'active'))
                        @include('tasks/partials/task-tab', array('tab' => 'incomplete', 'tasks' => $tasksInComplete, 'title' => __('task.index.tab.incomplete')))
                        @include('tasks/partials/task-tab', array('tab' => 'complete', 'tasks' => $tasksComplete, 'title' => __('task.index.tab.complete')))

                    </div>
                </div>
            @else

                <div class="panel panel-default">
                    <div class="panel-heading">{{__('task.create.new')}}</div>
                    <div class="panel-body">

                        @include('tasks.partials.create-task')

                    </div>
                </div>

            @endif

        </div>
    </div>
@endsection