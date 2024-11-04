<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать задачу</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h1 class="text-center">Редактировать задачу</h1>

    <!-- Форма редактирования задачи -->
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Название задачи</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Описание задачи</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $task->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
