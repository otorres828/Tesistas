

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Tesistas - Login</title>
    <!-- Bootstrap CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">

</head>

<body class="text-center">
    <div class="container ">

        <div class="pt-10">
            <form  action="login-iniciar" method="POST">

                <?php session_start(); if (isset($_SESSION['mensaje'])) { ?>
                    <div class="alert alert-<?= $_SESSION['colorcito']; ?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['mensaje']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php session_unset(); ?>
                <?php } ?>
                
                <h1 class="h3 mb-3 fw-normal">Inicia sesion 😉</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" name="correo" placeholder="name@example.com" require>
                    <label for="floatingInput">Correo electronico</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="clave" placeholder="Password" require>
                    <label for="floatingPassword">Contraseña</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Recordarme
                    </label>
                </div>
                <input type="submit" class="w-100 btn btn-lg btn-success mb-2" value='Iniciar sesion'>

                <p class="mt-5 mb-3 text-muted">&copy; 2022 TESISTAS-UCAB</p>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>