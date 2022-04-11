<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost:5000">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="position-absolute" id="loading"
        style="z-index: 1000; width:100%;height:100%; left: 50%; background-color: rgba(0, 0, 0, 0.6);transform: translateX(-50%);display:none">
        <img style=" width:100%; height:100%" src=" /upload/loader.gif" alt="loading">
    </div>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="{{ route('admin.postLoginAdmin') }}" method="POST" class="form"
                        id="form-login">
                        <!-- Email input -->
                        @csrf
                        <div class="form-group form-outline mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input name="email" type="email" id="email" class="form-control form-control-lg" />
                            <span class="form-message"></span>
                        </div>

                        <!-- Password input -->
                        <div class="form-group form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input name="password" type="password" id="password" class="form-control form-control-lg" />
                            <span class="form-message"></span>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                <label class="form-check-label" for="form1Example3"> Remember me </label>
                            </div>
                            <a href="#!">Forgot password?</a>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" id="login" class="btn btn-primary btn-lg btn-block">Sign
                            in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="/js/jquery-3.6.0.js"></script>
<script src="/js/validator.js"></script>
<script src="/js/login.js"></script>

<script>
    Validator({
        form: '#form-login',
        errorSelector: '.form-message',
        rules: [
            Validator.isEmail('#email'),
            Validator.isRequired('#password'),
            Validator.isPassword('#password', 6),

        ]

    });
</script>

</html>
