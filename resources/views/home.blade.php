<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'bolpatra') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        h1 {
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-top: 1em;
        }

        .container {
            width: 70%;
            display: flex;
            align-items: baseline;
            gap: 3em;
        }

        .form {
            width: 50%;
            margin-top: 2em;
            border: 1px solid rgb(206, 212, 218);
            border-radius: 20px;
            padding: 2em;
        }

        .table-2 {
            padding-top: 5em;
        }

        .image-style {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .button {
            display: flex;
            gap: 1em;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data" class="form">
            {{csrf_field()}}

            <div class="mb-3">
                <label for="Title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="pdf" class="form-label">PDF</label>
                <input type="file" name="pdf" class="form-control" id="file" accept=".pdf,.docs" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="file" accept=".jpg,.png,.jpeg" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Start_date</label>
                <input type="date" name="start_date" class="form-control" id="start_date" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Ending_date</label>
                <input type="date" name="ending_date" class="form-control" id="ending_date" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="desc" class="form-label">Description</label>
                <textarea name="desc" class="form-control" id="desc" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

        <table class="table table-striped mt-4 table-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">PDF</th>
                    <th scope="col">Image</th>
                    <th scope="col">Start_date</th>
                    <th scope="col">Ending_date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tender as $item)
                <th scope="row">
                    {{ $loop->index + 1}}
                </th>
                <td>{{$item->title}}</td>
                <td> <a href="pdf/{{$item->pdf}}" target="_blank">{{$item->pdf}}</a> </td>
                <td> <img src="image/{{$item->image}}" alt="" class="image-style"> </td>
                <td>{{$item->start_date}}</td>
                <td>{{$item->ending_date}}</td>
                <td>{{$item->desc}}</td>
                <td>
                    <div class="button">
                        <a href={{"edit/".$item['id']}}><button class="btn btn-success">Update</button></a>
                        <a href={{"delete/".$item['id']}}><button class="btn btn-danger">Delete</button></a>
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>