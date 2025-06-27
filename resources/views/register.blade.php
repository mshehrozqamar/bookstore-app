<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <style>
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }
            .h-custom {
                height: calc(100% - 73px);
            }
            @media (max-width: 450px) {
                .h-custom {
                    height: 100%;
                }
            }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <br>
        <br>
        <br>
        <br>
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div
                    class="row d-flex justify-content-center align-items-center h-100"
                >
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                            class="img-fluid"
                            alt="Sample image"
                        />
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="post" action="customer-register">
                            @csrf
                            <p class="h1 text-center">Register</p>
                            <br>
                            <!-- Email input -->
                             <span style="color: red;">@error('name'){{$message}}@enderror</span>
                              <div data-mdb-input-init class="form-outline mb-4">
                                <input
                                    name="name"
                                    type="text"
                                    id="form3Example3"
                                    class="form-control form-control-lg"
                                    placeholder="Enter your Full Name"
                                    value="{{ old('name') }}"
                                />
                                <label class="form-label" for="form3Example3"
                                    >Full Name</label
                                >
                            </div>
                            <span style="color: red;">@error('email'){{$message}}@enderror</span>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input
                                    name="email"
                                    type="email"
                                    id="form3Example3"
                                    class="form-control form-control-lg"
                                    placeholder="Enter a valid email address"
                                    value="{{ old('email') }}"
                                />
                                <label class="form-label" for="form3Example3"
                                    >Email address</label
                                >
                            </div>

                            <!-- Password input -->
                             <span style="color: red;">@error('password'){{$message}}@enderror</span>
                            <div data-mdb-input-init class="form-outline mb-3">
                                <input
                                    name="password"
                                    type="password"
                                    id="form3Example4"
                                    class="form-control form-control-lg"
                                    placeholder="Enter password"
                                />
                                <label class="form-label" for="form3Example4"
                                    >Password</label
                                >
                            </div>

                            <!-- Password input -->
                             <span style="color: red;">@error('password_confirmation'){{$message}}@enderror</span>
                            <div data-mdb-input-init class="form-outline mb-3">
                                <input
                                    name="password_confirmation"
                                    type="password"
                                    id="form3Example4"
                                    class="form-control form-control-lg"
                                    placeholder="Confirm password"
                                />
                                <label class="form-label" for="form3Example4"
                                    >Confirm Password</label
                                >
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button
                                    type="submit"
                                    data-mdb-button-init
                                    data-mdb-ripple-init
                                    class="btn btn-primary btn-lg"
                                    style="
                                        padding-left: 2.5rem;
                                        padding-right: 2.5rem;
                                    "
                                >
                                    Register
                                </button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">
                                    Already have an account?
                                    <a href="/login" class="link-danger"
                                        >Login</a
                                    >
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
