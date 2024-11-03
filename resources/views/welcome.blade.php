<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать</title>
    <!-- Подключение Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container text-center mt-5">
    <h1>Добро пожаловать на страницу задач</h1>
    <p class="lead">Перейдите на страницу задач, чтобы просмотреть и управлять ими.</p>
    <!-- Кнопка перехода на tasks.index -->
    <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-lg">Перейти к задачам</a>
</div>

<!-- Подключение Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
