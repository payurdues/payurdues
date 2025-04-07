<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Assuming you have a CSS file for styling -->
</head>
<body>
    <div class="container mt-5">
        <h2>Student Login</h2>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="identifier">Matric Number or Form Number</label>
                <input type="text" class="form-control" id="identifier" name="identifier" value="{{ old('identifier') }}" required>
            </div>

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="password" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script> <!-- Assuming you have a JS file for scripts -->
</body>
</html>
