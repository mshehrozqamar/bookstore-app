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
        crossorigin="anonymous" />
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
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</head>

<body>
    @include('sweetalert::alert') @include('sweetalert2::index')

    <div class="container mt-3">
        <div class="row rows-cols-3">
            <div class="col-6">
                <h1>Orders Page</h1>
            </div>
            <div class="col mt-2"></div>
            <div class="col mt-2">
                <a href="admin-portal"><button class="btn btn-primary">Admin</button></a>
            </div>
            <div class="col mt-2">
                <a href="/"><button class="btn btn-danger">Sign Out</button></a>
            </div>
        </div>
    </div>

    <hr />

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <th>
                    {{$order->id}}
                </th>
                <td>
                    {{$order->user->name}}
                </td>
                <td>
                    {{$order->status}}
                </td>
                <td>
                    <a href="/view-order/{{$order->id}}">
                        <button class="btn btn-secondary">View</button>
                    </a>
                    <a href="/confirm-order/{{$order->id}}">
                        <button class="btn btn-secondary">Confirm</button>
                    </a>
                    <a href="/delete-order/{{$order->id}}">
                        <button class="btn btn-secondary">Cancel</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr />
</body>

</html>