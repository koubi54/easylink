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
            <h5 class="m-0">Profile Summary</h5>
        </div>
        <div class="d-flex justify-content-center">
            <div class="py-5">
                <h1>{{ $total }} clicks</h1>
            </div>
        </div>
    </div>

    <ul class="list-group mx-auto my-4" style=" max-width: 50rem;">
        <li class="list-group-item py-4">
            <h5 class="m-0">Link Clicks</h5>
        </li>
        @foreach ($tracker as $track)
            <li class="list-group-item">
                <div class="float-left">
                    <h5 class="m-0 font-weight-bold">{{ $track->link->name }}</h5><span
                        class="text-muted">{{ $track->link->link }}</span>
                </div>
                <div class="float-right">
                    <span>Clicks: {{ $track->total }}</span><br>
                    <span>Guests: {{ $track->unique_users }}</span>
                </div>
            </li>
        @endforeach
    </ul>

    <script src="{{ asset('user/build/js/intlTelInput.js') }}"></script>
@endsection
