<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список задач</title>
    <!-- Подключение Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Подключение Font Awesome для иконок -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .task-card {
            position: relative;
            padding-top: 2rem;
        }
        .edit-icon {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
        }
        .delete-button {
            position: absolute;
            bottom: 0.5rem;
            right: 0.5rem;
        }
    </style>
</head>
<body>
<div class="container my-4">
    <h1 class="text-center">Список задач</h1>

    <!-- Кнопка для перехода на страницу создания задачи -->
    <div class="text-right mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Добавить задачу</a>
    </div>

    <!-- Поиск и фильтр по статусу -->
    <div class="row mb-4">
        <div class="col-md-6">
            <input type="text" id="search" class="form-control" placeholder="Поиск задач...">
        </div>
        <div class="col-md-6">
            <select id="statusFilter" class="form-control">
                <option value="completed">Завершенные</option>
                <option value="in_progress">В процессе</option>
            </select>
        </div>
    </div>

    <div id="tasksList">
        @foreach($tasks as $task)
            <div class="card mb-3 task-card">
                <form action="{{ route('setStatus', $task->id) }}" method="POST" class="edit-icon" style="display:inline-block;">
                    @csrf
                    @if($task->completed)
                        <input type="hidden" name="status" value="0">
                        <button type="submit" class="btn btn-sm btn-info" title="Снять отметку выполнения">
                            <i class="fas fa-check-circle"></i>
                        </button>
                    @else
                        <input type="hidden" name="status" value="1">
                        <button type="submit" class="btn btn-sm btn-info" title="Отметить как выполненное">
                            <i class="fas fa-check"></i>
                        </button>
                    @endif
                </form>

                <form action="{{ route('tasks.edit', $task->id) }}" method="GET" class="edit-icon" style="display:inline-block;margin-right: 40px">
                    <button type="submit" class="btn btn-sm btn-warning" title="Редактировать задачу">
                        <i class="fas fa-edit"></i>
                    </button>
                </form>

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <span class="badge badge-secondary">{{ $task->status }}</span>
                    </div>
                    <p class="card-text">{{ $task->description }}</p>

                    <!-- Кнопка удаления задачи -->
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="delete-button" onsubmit="return confirm('Вы уверены, что хотите удалить эту задачу?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i> Удалить
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Подключение скриптов -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ mix('js/searchTasks.js') }}"></script>
<script src="{{ mix('js/filterTasks.js') }}"></script>
</body>
</html>
