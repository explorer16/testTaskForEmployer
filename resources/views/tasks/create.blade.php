<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать задачу</title>
    <!-- Подключение Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center">Создать задачу</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Название задачи</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Описание задачи</label>
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Создать задачу</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Назад к списку задач</a>
    </form>
</div>

<!-- Подключение Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
