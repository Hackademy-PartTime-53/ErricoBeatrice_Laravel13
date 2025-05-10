<x-mainlayout title="Login">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4 text-center">Accedi</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Ricordami
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Accedi</button>

                    @if (Route::has('password.request'))
                        <div class="mt-3">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Hai dimenticato la password?
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-mainlayout>
