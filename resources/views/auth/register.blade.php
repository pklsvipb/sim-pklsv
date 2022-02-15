@extends('layouts.app')

@section('content')
<div class="page-content" style="padding: 20px;">
    <div class="form-v4-content" style="margin: 30px 0px;">
        <div class="form-left">
            <h2>INFOMATION</h2>
            <p class="text-1" style="text-align: justify;">Segera daftarkan sebagai Admin BPTP daerah untuk dapat mengelola Jaringan Petani Daerah.</p>
            <p class="text-2"><span>Sudah Mendaftar ? </span> Pilih tombol Have An Account untuk langsung Login sebagai Admin BPTP Daerah.</p>
            <div class="form-left-last">
                <a href="{{ route('login') }}"><input type="submit" name="account" class="account" value="Have An Account"></a>
            </div>
        </div>
        <form class="form-detail" action="{{ route('register') }}" method="POST">
            @csrf
            <h2>REGISTER FORM</h2>
            <div class="form-row py-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-row pb-3">
                <label for="email">Your Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group pb-3 py-1">
                <div class="form-row form-row-1">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                    
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-row form-row-1">
                    <label for="comfirm_password">Comfirm Password</label>
                    <input type="password" id="comfirm_password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-row-last">
                <input type="submit" name="register" class="register" value="Register">
            </div>
        </form>
    </div>
</div>
@endsection