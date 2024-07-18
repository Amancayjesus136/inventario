@extends('layouts.client.invitados-user')
@section('content2')

<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <div>
            <h5 class="text-primary">Bienvenido de nuevo!</h5>
            <p class="text-muted">Inicia sesión para continuar en Velzon.</p>
        </div>

        <div class="mt-4">
            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="float-end">
                        <a href="#" class="text-muted">¿Olvidaste tu contraseña?</a>
                    </div>
                    <label class="form-label" for="password">Contraseña</label>
                    <div class="position-relative auth-pass-inputgroup mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon">
                            <i class="ri-eye-fill align-middle"></i>
                        </button>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check" name="remember">
                    <label class="form-check-label" for="auth-remember-check">Recordarme</label>
                </div>

                <div class="mt-4">
                    <button class="btn btn-success w-100" type="submit">Iniciar sesión</button>
                </div>

                <div class="mt-4 text-center">
{{--
                    <div>
                        <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                        <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                        <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                    </div> --}}
                </div>

            </form>
        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">¿No tienes una cuenta? <a href="{{ route('register.usuario') }}" class="fw-semibold text-primary text-decoration-underline"> Regístrate</a> </p>
        </div>
    </div>
</div>

@endsection
