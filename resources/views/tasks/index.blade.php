<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task Manager | Dashboard</title>

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

        /* NAVBAR */
        .navbar {
            background: #0b111a;
            border-bottom: 1px solid #1b2b3f;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: 1px;
            color: #2997ff;
        }

        .nav-text {
            color: #78889a;
            font-size: 14px;
        }

        /* MAIN */
        .container {
            width: 86%;
            max-width: 1200px;
            margin: 45px auto;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            gap: 20px;
        }

        .hero h1 {
            font-size: 36px;
            margin-bottom: 8px;
        }

        .hero p {
            color: #8291a3;
            font-size: 15px;
        }

        /* BUTTON */
        .btn {
            border: none;
            border-radius: 9px;
            padding: 12px 18px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            display: inline-block;
        }

        .btn-primary {
            background: #1683ff;
            color: white;
            box-shadow: 0 5px 20px rgba(22, 131, 255, 0.2);
        }

        .btn-primary:hover {
            background: #0875eb;
        }

        /* SUCCESS MESSAGE */
        .alert {
            background: #0d2a1b;
            border: 1px solid #1f7143;
            color: #72e8a0;
            padding: 14px 18px;
            border-radius: 9px;
            margin-bottom: 25px;
        }

        /* STATS */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: #0c131d;
            border: 1px solid #1a2a3c;
            border-radius: 12px;
            padding: 20px;
        }

        .stat-title {
            color: #8291a3;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 800;
            color: #2997ff;
        }

        /* TASK GRID */
        .section-title {
            font-size: 20px;
            margin-bottom: 18px;
        }

        .tasks-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
            gap: 20px;
        }

        .task-card {
            background: #0c131d;
            border: 1px solid #1a2a3c;
            border-radius: 14px;
            padding: 22px;
            transition: 0.2s ease;
        }

        .task-card:hover {
            border-color: #1683ff;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        .task-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
        }

        .pending {
            background: #342b12;
            color: #ffd45c;
        }

        .completed {
            background: #10311f;
            color: #68e99b;
        }

        .task-card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .description {
            color: #9aa8b7;
            font-size: 14px;
            line-height: 1.6;
            min-height: 45px;
            margin-bottom: 17px;
        }

        .due-date {
            color: #718195;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .btn-edit {
            background: #18324d;
            color: #65b5ff;
        }

        .btn-complete {
            background: #153a28;
            color: #70e49b;
        }

        .btn-delete {
            background: #391b21;
            color: #ff7d8a;
        }

        .actions .btn {
            padding: 9px 12px;
            font-size: 12px;
        }

        /* EMPTY */
        .empty {
            background: #0c131d;
            border: 1px solid #1a2a3c;
            border-radius: 14px;
            text-align: center;
            padding: 65px 20px;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .empty h2 {
            margin-bottom: 8px;
        }

        .empty p {
            color: #77889a;
            margin-bottom: 20px;
        }

        form {
            display: inline;
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 30px;
            color: #536477;
            font-size: 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 750px) {
            .hero {
                flex-direction: column;
                align-items: flex-start;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .container {
                width: 92%;
            }

            .hero h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVIGATION -->
    <nav class="navbar">
        <div class="logo">TASK//MANAGER</div>
        <div class="nav-text">Personal Productivity System</div>
    </nav>

    <main class="container">

        <!-- HEADER -->
        <div class="hero">
            <div>
                <h1>My Tasks</h1>
                <p>Stay organized. Stay focused. Get things done.</p>
            </div>

            <a href="/tasks/create" class="btn btn-primary">
    + Add New Task
</a>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert">
                ✓ {{ session('success') }}
            </div>
        @endif

        <!-- STATISTICS -->
        @php
            $totalTasks = $tasks->count();
            $completedTasks = $tasks->where('status', 'Completed')->count();
            $pendingTasks = $tasks->where('status', 'Pending')->count();
        @endphp

        <div class="stats">

            <div class="stat-card">
                <div class="stat-title">TOTAL TASKS</div>
                <div class="stat-number">{{ $totalTasks }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-title">PENDING</div>
                <div class="stat-number">{{ $pendingTasks }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-title">COMPLETED</div>
                <div class="stat-number">{{ $completedTasks }}</div>
            </div>

        </div>

        <!-- TASKS -->
        <h2 class="section-title">Your Tasks</h2>

        @if($tasks->count())

            <div class="tasks-grid">

                @foreach($tasks as $task)

                    <div class="task-card">

                        <div class="task-top">

                            <span class="status {{ $task->status === 'Completed' ? 'completed' : 'pending' }}">
                                {{ strtoupper($task->status) }}
                            </span>

                        </div>

                        <h3>{{ $task->task_name }}</h3>

                        <p class="description">
                            {{ $task->description ?: 'No description provided.' }}
                        </p>

                        <div class="due-date">
                            📅
                            {{ $task->due_date
                                ? $task->due_date->format('M d, Y')
                                : 'No deadline'
                            }}
                        </div>

                        <div class="actions">

                            <!-- EDIT -->
                            <a href="{{ route('tasks.edit', $task) }}"
                               class="btn btn-edit">
                                Edit
                            </a>

                            <!-- COMPLETE / PENDING -->
                            <form action="{{ route('tasks.complete', $task) }}"
                                  method="POST">

                                @csrf
                                @method('PATCH')

                                <button type="submit"
                                        class="btn btn-complete">

                                    {{ $task->status === 'Completed'
                                        ? 'Set Pending'
                                        : 'Complete'
                                    }}

                                </button>

                            </form>

                            <!-- DELETE -->
                            <form action="{{ route('tasks.destroy', $task) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this task?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-delete">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">

                <div class="empty-icon">📋</div>

                <h2>No tasks yet</h2>

                <p>
                    Start organizing your work by creating your first task.
                </p>

                <a href="{{ route('tasks.create') }}"
                   class="btn btn-primary">
                    + Create Your First Task
                </a>

            </div>

        @endif

    </main>

    <footer>
        Personal Task Manager • Laravel Project
    </footer>

</body>
</html>