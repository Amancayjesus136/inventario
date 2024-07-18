@extends('layouts.client.invitados-user')
@section('content2')

<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <div>
            <h5 class="text-primary">Registro de Docente</h5>
            <p class="text-muted">Crea una cuenta para continuar en Velzon.</p>
        </div>

        <div class="mt-4">
            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <input type="number" class="form-control" name="status_user" value="2" hidden>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="mt-4">
                    <button class="btn btn-success w-100" type="submit">Registrarse</button>
                </div>

                <div class="mt-4 text-center">
                    {{-- <div class="signin-other-title">
                        <h5 class="fs-13 mb-4 title">Inicia sesión con</h5>
                    </div> --}}

                    {{-- <div>
                        <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                        <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                        <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                    </div> --}}
                </div>
            </form>
        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">¿Ya tienes una cuenta? <a href="{{ route('login.usuario') }}" class="fw-semibold text-primary text-decoration-underline">Inicia sesión</a></p>
        </div>
    </div>
</div>

@endsection
