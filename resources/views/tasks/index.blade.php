<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список задач</title>
    <!-- Подключение Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                <option value="in_progress">В процессе</option>
                <option value="completed">Завершено</option>
            </select>
        </div>
    </div>

    <!-- Список задач -->
    <div id="tasksList">
        @foreach($tasks as $task)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <span class="badge badge-secondary">{{ $task->status }}</span>
                    </div>
                    <p class="card-text">{{ $task->description }}</p>
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
