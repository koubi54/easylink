@extends('user.layouts.app')


@section('content')
    <link rel="stylesheet" href="{{ asset('user/build/css/intlTelInput.css') }}">

    <style>
        div#content {
            background: #fff !important;
        }

        div#content-fluid {
            background: #fff !important;
        }
    </style>

    <div style="border-radius: 10px; max-width: 50rem;" class="border main-box mx-auto">
        <div style="border-bottom: 1px solid #e3e6f0" class="p-4">
            <h5 class="m-0">User Details</h5>
        </div>
        @if ($errors->any())
            <div class="bg-danger text-white py-2 px-4">
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="p-4">
            <form method="POST" action="{{ route('update-user-details') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label><span class="float-right">{{ route('public', $user->username) }}</span>
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                           id="exampleInputEmail1" placeholder="username">
                </div>
                <button type="submit" class="btn my-4 btn-primary">Update</button>
            </form>
        </div>
    </div>

    <div style="border-radius: 10px; max-width: 50rem;" class="border my-5 main-box mx-auto">
        <div style="border-bottom: 1px solid #e3e6f0" class="p-4">
            <h5 class="m-0">Change Password</h5>
        </div>
        @if ($errors->any())
            <div class="bg-danger text-white py-2 px-4">
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="p-4">
            <form method="POST" action="{{ route('update-password') }}" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                           placeholder="New Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail2"
                           placeholder="Re-enter Password">
                </div>

                <button type="submit" class="btn my-4 btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
