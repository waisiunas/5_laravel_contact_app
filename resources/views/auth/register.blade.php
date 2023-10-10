<!DOCTYPE html>
<html lang="en">

@section('title', 'Register')
@include('partials.head')

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Get started</h1>
                            <p class="lead">
                                Please register your account for the best possible user experience.
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    @include('partials.alerts')
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                id="name" placeholder="Enter your name!"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                id="email" placeholder="Enter your email!"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" id="password" placeholder="Enter your password!">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Password
                                                Confirmation</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                id="password_confirmation" placeholder="Confirm your password!">
                                        </div>

                                        <div class="mb-3">
                                            <input type="submit" name="submit" value="Register"
                                                class="btn btn-primary">
                                            <input type="reset" value="Reset" class="btn btn-dark">
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            Already have an account? <a href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('template/js/app.js') }}"></script>
</body>

</html>
