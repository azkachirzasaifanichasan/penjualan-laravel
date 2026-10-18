@extends('layouts.guest')

@section('title', 'Daftar')

@section('content')
<header class="mb-5">
    <h1 class="page-title text-2xl">Daftar Akun</h1>
    <p class="page-sub mt-0.5">Buat akun karyawan Toko RPL Jaya</p>
</header>

<form action="{{ route('register') }}" method="POST">
    @csrf

    <div class="grid gap-4">
        <div>
            <label for="name" class="label">Nama Lengkap <span class="req" aria-hidden="true">*</span></label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="input @error('name') input-error @enderror" maxlength="100"
                   required aria-required="true" autocomplete="name" autofocus
                   @error('name') aria-invalid="true" aria-describedby="err-name" @enderror>
            @error('name')
                <p class="error-text" id="err-name">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="label">Email <span class="req" aria-hidden="true">*</span></label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="input @error('email') input-error @enderror"
                   required aria-required="true" autocomplete="email"
                   placeholder="nama@toko.test"
                   @error('email') aria-invalid="true" aria-describedby="err-email" @enderror>
            @error('email')
                <p class="error-text" id="err-email">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="label">Password <span class="req" aria-hidden="true">*</span></label>
            <input type="password" name="password" id="password"
                   class="input @error('password') input-error @enderror" minlength="8"
                   required aria-required="true" autocomplete="new-password"
                   aria-describedby="hint-password">
            <p class="hint-text" id="hint-password">Minimal 8 karakter.</p>
            @error('password')
                <p class="error-text" id="err-password">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="label">Konfirmasi Password <span class="req" aria-hidden="true">*</span></label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="input" required aria-required="true" autocomplete="new-password">
        </div>
    </div>

    <div class="form-actions flex-col items-stretch gap-3">
        <button type="submit" class="btn btn-primary btn-block" data-loading-label="Mendaftarkan…">
            <i class="bi bi-person-plus" aria-hidden="true"></i> Daftar
        </button>
        <p class="hint-text text-center">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-semibold text-accent-dark hover:underline">Masuk di sini</a>
        </p>
    </div>
</form>
@endsection
