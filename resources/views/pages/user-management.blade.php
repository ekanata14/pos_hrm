@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management']) 
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="alert alert-light" role="alert">
                <a href="/users/create">
                    <button class="btn btn-primary mb-0">Add User</button>
                </a>
            </div>
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($usersWithRoles as $user)
                                <tr>
                                    <td class="w-0">
                                        <p class="text-sm font-weight-bold mb-0 ms-4">{{ $i++ }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <img src="./img/team-1.jpg" class="avatar me-3" alt="image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $user->username }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $user->name_role }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $user->email  }}</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <a href="https://wa.me/62{{ $user->phone_number }}">
                                            <button class="btn btn-success">
                                                <p class="text-sm font-weight-bold mb-0">WhatsApp</p>
                                            </button>
                                            </a>
                                            <a href="/users/edit/{{ $user->id_user }}">
                                            <button class="btn btn-warning ms-2">
                                                <p class="text-sm font-weight-bold mb-0">Edit</p>
                                            </button>
                                            </a>
                                            <form method="POST" action="/users/delete">
                                                @csrf
                                                <input type="hidden" name="id_user" value="{{ $user->id_user }}">
                                            <button class="btn btn-danger ms-2" type="submit" onclick="return confirm('Yakin ingin menghapus?')"> 
                                                <p class="text-sm font-weight-bold mb-0">Delete</p>
                                            </button> 
                                            </form>
                                        </div>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
