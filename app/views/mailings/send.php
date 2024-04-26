<!DOCTYPE html>
<html>
<head>
    <title>Запуск рассылки</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Запуск рассылки</h1>
    <form action="/mailings/process" method="post">
        <div class="form-group">
            <label for="title">Заголовок рассылки:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="text">Текст рассылки:</label>
            <textarea class="form-control" id="text" name="text" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Запуск</button>
    </form>
</div>
</body>
</html>