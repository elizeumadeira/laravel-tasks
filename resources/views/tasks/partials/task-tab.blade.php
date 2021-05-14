<div class="tab-pane {{{ $status ?? '' }}}" id="{{ $tab }}">
    <h1>
        {{ $title }}
    </h1>

    {{ trans_choice('task.index.taskcount', count($tasks), ['value' => count($tasks)]) }}
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
