<tr>

    <!-- Task Id -->
    <td class="table-text">
        {{ $task->id }}
    </td>

    <!-- Task Name -->
    <td class="table-text">
        {{ $task->name }}
    </td>

    <!-- Task Description -->
    <td>
        {{ $task->description }}
    </td>

    <!-- Task Status -->
    <td>

        @if ($task->completed === 1)

            <span class="label label-success">
                Complete
            </span>

        @else

            <span class="label label-default">
                Incomplete
            </span>

        @endif

    </td>

   

     <!-- Task Created -->
     <td>
        {{ $task->created_at }}
    </td>

     <!-- Task Updated -->
     <td>
        {{ $task->updated_at }}
    </td>

    <!-- Task Edit Icon -->
    <td>
        {{ locale()->current() }}
        <a href="{{ route('tasks.edit', [locale()->current(), $task->id]) }}" class="pull-right">
            <span class="fa fa-pencil fa-fw" aria-hidden="true"></span>
            <span class="sr-only">Edit Task</span>
        </a>
    </td>
</tr>