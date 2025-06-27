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
     
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div
                    class="row d-flex justify-content-center align-items-center h-100"
                >
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="post" action="add-new-book">
                            @csrf
                            <p class="h1 text-center">Add Book</p>
                            <br>
                              <span style="color: red;">@error('bookname'){{$message}}@enderror</span>
                              <div data-mdb-input-init class="form-outline mb-4">
                                <input
                                    name="bookname"
                                    type="text"
                                    id="form3Example3"
                                    class="form-control form-control-lg"
                                    placeholder="Enter Book Name"
                                />
                                <label class="form-label" for="form3Example3"
                                    >Book Name</label
                                >
                            </div>
                            <span style="color: red;">@error('author'){{$message}}@enderror</span>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input
                                    name="author"
                                    type="text"
                                    id="form3Example3"
                                    class="form-control form-control-lg"
                                    placeholder="Enter Author Name"
                                />
                                <label class="form-label" for="form3Example3"
                                    >Author</label
                                >
                            </div>
                            <span style="color: red;">@error('publisher'){{$message}}@enderror</span>
                            <div data-mdb-input-init class="form-outline mb-3">
                                <input
                                    name="publisher"
                                    type="text"
                                    id="form3Example4"
                                    class="form-control form-control-lg"
                                    placeholder="Enter Publisher Name"
                                />
                                <label class="form-label" for="form3Example4"
                                    >Publisher</label
                                >
                            </div>
                            <span style="color: red;">@error('published'){{$message}}@enderror</span>
                            <div data-mdb-input-init class="form-outline mb-3">
                                <input
                                    name="published"
                                    type="date"
                                    id="form3Example4"
                                    class="form-control form-control-lg"
                                />
                                <label class="form-label" for="form3Example4"
                                    >Published on</label
                                >
                            </div>
                            <span style="color: red;">@error('quantity'){{$message}}@enderror</span>
                            <div data-mdb-input-init class="form-outline mb-3">
                                <input
                                    name="quantity"
                                    type="text"
                                    id="form3Example4"
                                    class="form-control form-control-lg"
                                    placeholder="Enter Quantity"
                                />
                                <label class="form-label" for="form3Example4"
                                    >Quantity</label
                                >
                            </div>
                            <span style="color: red;">@error('price'){{$message}}@enderror</span>
                            <div data-mdb-input-init class="form-outline mb-3">
                                <input
                                    name="price"
                                    type="text"
                                    id="form3Example4"
                                    class="form-control form-control-lg"
                                    placeholder="Enter Price"
                                />
                                <label class="form-label" for="form3Example4"
                                    >Price</label
                                >
                            </div>
                            <span style="color: red;">@error('img_url'){{$message}}@enderror</span>
                            <div data-mdb-input-init class="form-outline mb-3">
                                <input
                                    name="img_url"
                                    type="text"
                                    id="form3Example4"
                                    class="form-control form-control-lg"
                                    placeholder="Enter Image URL"
                                />
                                <label class="form-label" for="form3Example4"
                                    >Image URL</label
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
                                    Add Book
                                </button>
                            </div>
                        </form>
                        <br>
                        <br>

                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
