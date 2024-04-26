<!DOCTYPE html>
<html>
<head>
    <title>Реззультат расылки</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <h1>Реззультат расылки</h1>
    <p>Рассылка успешно завершена.</p>
    <div>
        <?php echo $_SESSION['mailing_info']; ?>
    </div>
    <a href="/mailings/send" class="btn btn-primary">Назад к созданию рассылки</a>
    <a href="/" class="btn btn-primary">Добавить пользователей</a>
</div>
</body>
</html>