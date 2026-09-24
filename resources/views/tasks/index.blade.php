<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            color: #333;
        }

        .add-btn {
            display: inline-block;
            background: #4f46e5;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #4f46e5;
            color: white;
        }

        .edit {
            color: #2563eb;
        }

        .delete {
            background: #dc2626;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .complete {
            background: #16a34a;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    <a href="{{ route('tasks.create', [], false) }}" class="add-btn">
        + Add New Task
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table>

        <thead>
            <tr>
                <th>Task</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($tasks as $task)

                <tr>
                    <td>{{ $task->task_name }}</td>

                    <td>{{ $task->description ?? 'No description' }}</td>

                    <td>{{ $task->status }}</td>

                    <td>{{ $task->due_date ?? 'No deadline' }}</td>

                    <td>

                        <a href="{{ route('tasks.edit', $task, false) }}" class="edit">
                            Edit
                        </a>

                        <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete"
                                onclick="return confirm('Are you sure you want to delete this task?')">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5">
                        No tasks yet.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>