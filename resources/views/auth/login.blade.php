<head>
    <title>Login</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<div class="container h-100">

    <div class="row w-75 h-100 m-auto">
        <div class="card m-auto p-0">
            <div class="card-header text-center">
                <h1>I do Mar Login</h1>
            </div>
            <div class="card-body">
                <form action="{{ url('auth', ['login']) }}" method="POST">
                    @csrf
                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" />
                    </div>
                    @include('layout.flashMessage')

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="{{ url('/register') }}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
