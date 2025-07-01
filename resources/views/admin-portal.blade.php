<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous"
        />
        <style>
            img {
                display: block;
                object-fit: contain;
                max-width: 100%;
                height: 350px;
            }
        </style>
        <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"
        ></script>
    </head>
    <body>
        @include('sweetalert::alert'); @include('sweetalert2::index');

        <!-- Modal -->
        <div
            class="modal fade"
            id="exampleModalLong"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLongTitle"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="add-new-book">
                            @csrf
                            <p class="h1 text-center">Add Book</p>
                            <br />
                            <span style="color: red"
                                >@error('bookname'){{ $message }}@enderror</span
                            >
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
                            <span style="color: red"
                                >@error('author'){{ $message }}@enderror</span
                            >
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
                            <span style="color: red"
                                >@error('publisher'){{
                                    $message
                                }}@enderror</span
                            >
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
                            <span style="color: red"
                                >@error('published'){{
                                    $message
                                }}@enderror</span
                            >
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
                            <span style="color: red"
                                >@error('quantity'){{ $message }}@enderror</span
                            >
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
                            <span style="color: red"
                                >@error('price'){{ $message }}@enderror</span
                            >
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
                            <span style="color: red"
                                >@error('img_url'){{ $message }}@enderror</span
                            >
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
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="row rows-cols-3">
                <div class="col-6">
                    <h1>Admin Book Shelf</h1>
                </div>
                <div class="col mt-2">
                    <button
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#exampleModalLong"
                        data-backdrop="static"
                        data-keyboard="false"
                    >
                        Add Book
                    </button>
                </div>
                <div class="col mt-2">
                    <a href="/orders"
                        ><button class="btn btn-primary">Orders</button></a
                    >
                </div>
                <div class="col mt-2">
                    <a href="/"
                        ><button class="btn btn-danger">Sign Out</button></a
                    >
                </div>
            </div>
        </div>

        <hr />

        <div class="container-fluid mt-3">
            <div class="row row-cols-3">
                @foreach($books as $book)
                <div class="col mt-3">
                    <div class="card" style="width: 470px">
                        <img
                            class="card-img-top"
                            src="{{$book->picture}}"
                            alt="Card image"
                        />
                        <div class="card-body">
                            <h4
                                class="card-title"
                                style="
                                    text-overflow: ellipsis;
                                    overflow: hidden;
                                    white-space: nowrap;
                                "
                            >
                                {{$book->name}}
                            </h4>
                            <h6 class="card-subtitle">
                                Author: {{$book->author}}
                            </h6>
                            <p class="card-text">
                                Published By: {{$book->publisher}} <br />Publish
                                Date: {{$book->published}}<br />Quantity:
                                {{$book->quantity}}
                            </p>
                            <h4 class="card-title">${{$book->price}}</h4>
                            <div class="text-center">
                                <a
                                    href="populate/{{$book->id}}"
                                    class="btn btn-warning"
                                    >Update</a
                                >
                                <a
                                    href="delete-book/{{$book->id}}"
                                    class="btn btn-danger"
                                    >Delete</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <hr />
    </body>
</html>
