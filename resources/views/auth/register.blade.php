<x-layout>
    <div class="register-page bg-body-secondary d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="register-box" style="width: 400px;">
            <div class="card card-outline card-primary">
                
                <div class="card-header text-center">
                    <a href="{{ route('home') }}" class="h1"><b>Uni</b>Portal</a>
                </div>

                <div class="card-body">
                    <p class="login-box-msg">Регистрация нового студента</p>
                    <form method="post" action="{{ route('register.store') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Имя и Фамилия">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Пароль">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Повторите пароль">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block w-100">Зарегистрироваться</button>
                            </div>
                        </div>
                    </form>

                    <a href="{{ route('login.create') }}" class="text-center mt-3 d-block">У меня уже есть аккаунт</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>