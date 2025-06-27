<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <style>
            img {
                display: block;
                object-fit: contain;
                max-width: 100%;
                height: 350px;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        @include('sweetalert::alert');
        <div class="container mt-3">
            <div class="row rows-cols-3">
                <div class="col-6">
                    <h1>Book Shelf</h1>
                </div>
                <div class="col-3 mt-3">
                    <h6>{{Auth::user()->name}}</h6>
                </div>
                <div class="col mt-2">
                    <a href="/cart"><button class="btn btn-primary">Cart</button></a>
                </div>
                <div class="col mt-2">
                    <a href="/sign-out"
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
                                <form action="/add-to-cart/{{$book->id}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        Add to Cart
                                    </button>
                                </form>
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
