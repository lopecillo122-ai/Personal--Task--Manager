<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Task | Task Manager</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #070b12;
            color: #f5f7fa;
            min-height: 100vh;
        }

        .navbar {
            background: #0b111a;
            border-bottom: 1px solid #1b2b3f;
            padding: 20px 7%;
        }

        .logo {
            color: #2997ff;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .container {
            width: 90%;
            max-width: 750px;
            margin: 50px auto;
        }

        .form-box {
            background: #0c131d;
            border: 1px solid #1a2a3c;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .heading {
            margin-bottom: 30px;
        }

        .heading h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .heading p {
            color: #7f90a3;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #c4ced9;
            font-size: 14px;
            font-weight: 700;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px 14px;
            background: #070b12;
            color: white;
            border: 1px solid #293a4f;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #1683ff;
            box-shadow: 0 0 0 3px rgba(22, 131, 255, 0.1);
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .error-box {
            background: #351a20;
            border: 1px solid #71313c;
            color: #ff8995;
            border-radius: 9px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .error-box ul {
            padding-left: 20px;
            margin-top: 5px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .btn {
            border: none;
            border-radius: 9px;
            padding: 12px 20px;
            text-decoration: none;
            font-weight: 700;
            cursor: pointer;
            font-size: 14px;
        }

        .save {
            background: #1683ff;
            color: white;
        }

        .save:hover {
            background: #0875eb;
        }

        .cancel {
            background: #1a222d;
            color: #b8c4d0;
        }

        .cancel:hover {
            background: #222d3b;
        }

        @media (max-width: 600px) {
            .form-box {
                padding: 25px;
            }

            .buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">TASK//MANAGER</div>
    </nav>

    <main class="container">

        <div class="form-box">

            <div class="heading">
                <h1>＋ Add New Task</h1>
                <p>Create a task and keep track of your deadlines.</p>
            </div>

            @if($errors->any())
                <div class="error-box">
                    <strong>Please fix the following:</strong>

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/tasks" method="POST">
                @csrf

                <div class="form-group">
                    <label for="task_name">Task Name</label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        value="{{ old('task_name') }}"
                        placeholder="e.g. Finish Laravel Project"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="description">Description</label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Enter the details of your task..."
                    >{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>

                    <select id="status" name="status">
                        <option value="Pending"
                            {{ old('status', 'Pending') === 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Completed"
                            {{ old('status') === 'Completed' ? 'selected' : '' }}>
                            Completed
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date</label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ old('due_date') }}"
                    >
                </div>

                <div class="buttons">

                    <button type="submit" class="btn save">
                        Save Task
                    </button>

                    <a href="{{ route('tasks.index') }}" class="btn cancel">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </main>

</body>
</html>