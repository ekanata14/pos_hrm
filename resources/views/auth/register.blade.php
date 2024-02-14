@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('./img/hrm_img.JPG'); background-position: center; background-size: cover;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <img src="./img/logo_hrm.png" alt="logo-hrm" width="200">
                        <h1 class="text-white mb-2">Selamat Datang!</h1>
                        <p class="text-lead text-white">Isi data diri dan daftarkan dirimu menjadi salah satu anggota dari kami</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0"> 
                        <h1 class="text-center mt-3">Form Pendaftaran</h1>
                        <div class="card-body py-1">
                            <form method="POST" action="{{ route('user.create') }}">
                                @csrf
                                 <div class="flex flex-col mb-3">
                                    <h5>Username</h5>
                                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Name" value="{{ old('username') }}" >
                                    @error('username') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <h5>Nama</h5>
                                    <input type="text" name="name" class="form-control" placeholder="Isi nama lengkapmu disini" aria-label="Name" value="{{ old('name') }}" >
                                    @error('name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <h5>Email</h5>
                                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ old('email') }}" >
                                    @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <h5>Alamat</h5>
                                    <textarea name="address" id="address" rows="5" placeholder="Jangan lupa alamat rumah atau kabupaten/kota Anda" class="form-control w-100"></textarea>
                                     @error('address') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <h5>Password</h5>
                                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                                    @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <input type="hidden" name="id_role" id="id_role" value="2">
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Gabung Sekarang</button>
                                </div>
                                <p class="text-sm text-center mt-3 mb-0">Sudah Punya Akun?<a href="{{ route('login') }}"
                                        class="text-dark font-weight-bolder"> Login Dulu!</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footers.guest.footer')
@endsection
