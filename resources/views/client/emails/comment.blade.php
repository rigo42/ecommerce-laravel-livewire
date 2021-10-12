<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo de notificacion</title>
</head>
<body>
    <strong>{{ $model->name }}</strong><br>
    <p>Nombre: {{ $comment->name }}</p>
    <p>Correo: {{ $comment->email }}</p>
    <p>Estrellas: {{ $comment->stars }}</p>
    <p>Comentario: {{ $comment->body }}</p>
</body>
</html>