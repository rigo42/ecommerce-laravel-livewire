<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo desde el formulario web</title>
</head>
<body>
    <strong>Mensaje enviado desde el formulario web</strong><br>
    <p>Nombre: {{ $data['name'] }}</p>
    <p>Correo: {{ $data['email'] }}</p>
    <p>Mensaje: {{ $data['message'] }}</p>
</body>
</html>