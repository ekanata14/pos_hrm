@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management']) 
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="alert alert-light" role="alert">
                <button class="btn btn-success mb-0">Back</button>
            </div>
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users</h6>
                </div>
                <div class="card-body px-3 py-1">
                    <form method="POST" action="{{ route('user.edit.perform') }}">
                                @csrf
                                <input type="hidden" value="{{ $user->id_user }}" name="id_user">
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Name" value="{{ $user->username}}" >
                                    @error('username') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name" value="{{ $user->name }}" >
                                    @error('name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ $user->email }}" >
                                    @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <textarea name="address" id="address" rows="5" placeholder="Address" class="form-control w-100">{{ $user->address }}</textarea>
                                     @error('address') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <select name="id_role" id="id_role" class="form-select w-25">
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                    @error('role') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn bg-warning text-white w-25 my-4 mb-2">Edit User</button>
                                </div>
                            </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
