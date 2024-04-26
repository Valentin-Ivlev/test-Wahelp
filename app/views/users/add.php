<!DOCTYPE html>
<html>
<head>
    <title>Добавление пользователей</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <h1>Добавление пользователей</h1>
    <form action="/users/import" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="csv_file">Выберите CSV файл:</label>
            <input type="file" class="form-control-file" id="csv_file" name="csv_file" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
</body>
</html>