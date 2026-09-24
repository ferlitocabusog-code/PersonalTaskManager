<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #333;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #444;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }

        button {
            background: #4f46e5;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #4338ca;
        }

        .cancel {
            margin-left: 10px;
            text-decoration: none;
            color: #555;
        }

        .cancel:hover {
            text-decoration: underline;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add New Task</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tasks" method="POST">

        @csrf

        <label for="task_name">Task Name</label>
        <input
            type="text"
            id="task_name"
            name="task_name"
            value="{{ old('task_name') }}"
            required
        >

        <label for="description">Description</label>
        <textarea
            id="description"
            name="description"
            rows="4"
        >{{ old('description') }}</textarea>

        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>
        </select>

        <label for="due_date">Due Date</label>
        <input
            type="date"
            id="due_date"
            name="due_date"
            value="{{ old('due_date') }}"
        >

        <button type="submit">
            Add Task
        </button>

        <a href="/tasks" class="cancel">
            Cancel
        </a>

    </form>

</div>

</body>
</html>