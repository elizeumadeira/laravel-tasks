@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">

            <!-- Display Validation Errors -->
            @include('common.status')

            <!-- Current Tasks -->
            @if (count($tasks) > 0)

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12">

                                @if (Request::is('tasks-all'))
                                    {{__('task.index.tab.all')}}
                                @elseif (Request::is('tasks-incomplete'))
                                    {{__('task.index.tab.incomplete')}}
                                @elseif (Request::is('tasks-complete'))
                                   {{__('task.index.tab.complete')}}
                                @else
                                    {{__('task.index.tab.without')}}
                                @endif

                                <div class="pull-right">

                                    <a href="{{ url(locale()->current().'/tasks-all') }}" class="btn btn-sm btn-default {{ Request::is('tasks-all') ? 'active' : '' }}" type="button">
                                        <span class="fa fa-tasks" aria-hidden="true"></span> <span class="hidden-xs">{{__('task.index.tab.all')}}</span>
                                    </a>
                                    <a href="{{ url(locale()->current().'/tasks-incomplete') }}" class="btn btn-sm btn-default {{ Request::is('tasks-incomplete') ? 'active' : '' }}" type="button">
                                        <span class="fa fa-square-o" aria-hidden="true"></span> <span class="hidden-xs">{{__('task.index.tab.incomplete')}}</span>
                                    </a>
                                    <a href="{{ url(locale()->current().'/tasks-complete') }}" class="btn btn-sm btn-default {{ Request::is('tasks-complete') ? 'active' : '' }}" type="button">
                                        <span class="fa fa-check-square-o" aria-hidden="true"></span> <span class="hidden-xs">{{__('task.index.tab.complete')}}</span>
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped task-table table-condensed">
                                <thead>
                                    <th>{{__('task.index.table.id')}}</th>
                                    <th>{{__('task.index.table.name')}}</th>
                                    <th>{{__('task.index.table.description')}}</th>
                                    <th>{{__('task.index.table.status')}}</th>
                                    <th>{{__('task.index.table.created')}}</th>
                                    <th>{{__('task.index.table.edited')}}</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        @include('tasks.partials.task-row', ['task' => $task])
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="{{ url('/tasks/create') }}" class="btn btn-sm btn-primary pull-right" type="button">
                                    <span class="fa fa-plus" aria-hidden="true"></span> {{__('task.create.new')}}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            @else

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{__('task.create.new')}}
                    </div>
                    <div class="panel-body">

                        @include('tasks.partials.create-task')

                    </div>
                </div>

            @endif

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('table').DataTable({
                "language": {
                    "url": '{{locale()->get_datatable_url()}}'
                },
            });
        } );
    </script>


<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
</script>

@endsection