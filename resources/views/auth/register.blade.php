<!doctype html>
<html>

<head>
    <title>Iniciar sesión</title> <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    </head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">IRegistrarse</h2>
                                <p class="text-white-50 mb-5">Ingrese su usuario y contraseña</p>

                                <form method="POST" action="{{route('register')}}">
                                    @csrf

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="name" id="typeEmailX"
                                            class="form-control form-control-lg" placeholder="Ingresar nombre" />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" name="email" id="typeEmailX"
                                            class="form-control form-control-lg" placeholder="Ingresar email" />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password" id="typePasswordX"
                                            class="form-control form-control-lg" placeholder="Ingresar contraseña" />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password_confirmation" id="typePasswordX"
                                            class="form-control form-control-lg" placeholder="Confirmar contraseña" />
                                    </div>
                                    </p>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Registrarse</button>

                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a href="#!" class="text-white"><i
                                                class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                    </div>

                            </div>

                            <div>
                                <a href="{{route('login')}}" class="text-white-50 fw-bold">Log In</a>
                                </p>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>