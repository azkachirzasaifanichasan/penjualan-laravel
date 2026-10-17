@extends('layouts.guest')

@section('title', 'Masuk')

@section('content')
<header class="auth-head">
    <h1 class="page-title">Masuk</h1>
    <p class="page-sub">Gunakan akun karyawan atau admin toko</p>
</header>

<form action="{{ route('login') }}" method="POST">
    @csrf

    <div class="grid gap-4">
        <div>
            <label for="email" class="label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="input @error('email') input-error @enderror"
                   required aria-required="true" autocomplete="email" autofocus
                   placeholder="nama@toko.test"
                   @error('email') aria-invalid="true" aria-describedby="err-email" @enderror>
            @error('email')
                <p class="error-text" id="err-email">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="label">Password</label>
            <input type="password" name="password" id="password"
                   class="input @error('password') input-error @enderror"
                   required aria-required="true" autocomplete="current-password"
                   @error('password') aria-invalid="true" aria-describedby="err-password" @enderror>
            @error('password')
                <p class="error-text" id="err-password">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="form-actions auth-actions">
        <button type="submit" class="btn btn-primary btn-block" data-loading-label="Memproses…">
            <i class="bi bi-box-arrow-in-right" aria-hidden="true"></i> Masuk
        </button>
        <p class="hint-text auth-switch">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar di sini</a>
        </p>
    </div>
</form>
@endsection
