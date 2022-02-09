<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crud with Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="antialiased bg-dark">
    <div class="container">
        <header class="my-3">
            <h1 class="text-center text-light">Crud with Laravel</h1>
        </header>

        <div class="row">
            <div class="col-sm-6">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('users.store') }}" method="post">
                            <div class="form-group">
                                <div class="mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Password">
                                </div>
                                <div class="d-flex justify-content-end">
                                    @csrf
                                    <button type="submit" class="btn btn-dark">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <table class="table table-dark">
                            <thead>
                                <tr class="table-secondary">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td scope="row">{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <form action="{{ route('users.destroy', $user) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Do you want to delete...?')">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</body>

</html>
