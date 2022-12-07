@extends('user.layouts.app')

@section('auth')
<link rel="stylesheet" href="{{ asset('user/build/css/intlTelInput.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('user/build/css/demo.css') }}"> -->

<div class="container">
    @if ($errors->any())
    <div class="bg-danger text-white py-2 px-4">
        @foreach ($errors->all() as $error)
        <p class="mb-0">{{ $error }}</p>
        @endforeach
    </div>
    @endif
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Final Process!</h1>
                        </div>
                        <form class="user" action="{{ route('register.final') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="fullname" class="form-control form-control-user"
                                    id="exampleInputEmail" placeholder="Full Name">
                            </div>

                            <div class="form-group">
                                <input id="phone" style="width: 100%" class="form-control form-control-user"
                                    name="phone" type="tel">
                            </div>

                            <button class="btn btn-primary btn-user btn-block">
                                Finish Register
                            </button>
                            <hr>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('dashboard', auth()->user()->username) }}"
                                class="small float-right btn btn-primary" style="border-radius: 25px">Skip
                                -></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="{{ asset('user/build/js/intlTelInput.js') }}"></script>
<script>
var input = document.querySelector("#phone");
window.intlTelInput(input, {
    //   allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    // formatOnDisplay: false,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //   });
    // },
    // hiddenInput: "full_number",
    // initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // placeholderNumberType: "MOBILE",
    // preferredCountries: ['cn', 'jp'],
    // separateDialCode: true,
    utilsScript: "http://127.0.0.1:8000/user/build/js/utils.js",
});
</script>
@endsection