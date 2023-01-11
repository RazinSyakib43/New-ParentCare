<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta dicoding -->
    <meta name="dicoding:email" content="muhammadrazin14@gmail.com">
    <title>Login ParentCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <section class="login-page">

        <div class="image-login">
        </div>
        <div class="formLogin">
            <div class="container-fluid">
                <div class="row">
                    <div class="login-card">
                        <h3 class="navbar-brand text-center">Parent<span>Care</span></h3>
                        <h2 class="section-heading mt-3">Sign In</h2>
                        <form role="form" class="text-start" action="../process/processLogin.php" method="POST">
                            <div class="row mt-4 mx-4 question-list">
                                <div class="col-12 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="login-input" placeholder="Masukan Email" id="inputEmail" name="email">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="login-input" name="password" placeholder="Masukan Password">
                                </div>
                                <div class="col-3"> <input type="submit" class="btn btn-second" value="Login" name="login">
                                </div>
                                <p class="mt-4 text-sm text-center">
                                    Belum punya akun?
                                    <a href="../pages/User/register.php" class="text-primary text-gradient font-weight-bold">Register</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>