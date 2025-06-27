
        
        
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8" />
                <meta
                    name="viewport"
                    content="width=device-width, initial-scale=1.0"
                />
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
                <link
                    rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
                    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
                    crossorigin="anonymous"
                />
            </head>
            <body>
                @include('sweetalert::alert');
                <br />
                <br />
                <br />
                <br />
                <br />
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
                            <div class="row-md-8 row-lg-6 row-xl-4 offset-xl-1">
                                <a href="/admin">
                                    <button
                                        type="button"
                                        data-mdb-button-init
                                        data-mdb-ripple-init
                                        class="btn btn-primary btn-lg"
                                        style="
                                            padding-left: 2.5rem;
                                            padding-right: 2.5rem;
                                        "
                                    >
                                        Admin Login
                                    </button>
                                </a>
                                <a href="/login">
                                    <button
                                        type="button"
                                        data-mdb-button-init
                                        data-mdb-ripple-init
                                        class="btn btn-primary btn-lg"
                                        style="
                                            padding-left: 2.5rem;
                                            padding-right: 2.5rem;
                                        "
                                    >
                                        Login
                                    </button>
                                </a>
                                <a href="/register">
                                    <button
                                        type="button"
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
                                </a>                        
                            </div>
                        </div>
                    </div>
                </section>
            </body>
        </html>
