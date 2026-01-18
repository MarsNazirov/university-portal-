<x-layout>
    <div class="login-page bg-body-secondary d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="/" class="h1"><b>Uni</b>Portal</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Войдите для доступа</p>

                    <form action="/login" method="post">
                        @csrf
                        
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Пароль" required>
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block w-100">Войти</button>
                            </div>
                        </div>
                    </form>

                    <p class="mb-0 mt-3 text-center">
                        <a href="{{ route('register') }}" class="text-center">Регистрация</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>