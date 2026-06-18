<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

<div class="container vh-100 d-flex justify-content-center align-items-center">

    <div class="card p-4" style="width:400px;">

        <h2 class="text-center mb-4">Login</h2>

        <form action="ControllerLogin.php" target="_self" method="post">

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" placeholder="David" name="usuario">
            </div>

            <!-- <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Generico@gmail.com" id="">
            </div> -->

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" placeholder="123" name="password">
            </div>
            <img src="img/Padentro.jpg" width="300">
             
            <input type="submit" class="btn btn-primary w-100" value="Enviar"></input>

        </form>

    </div>

</div>
<style>
        body{
            background-image: url("img/Fondo.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</body>
</html>