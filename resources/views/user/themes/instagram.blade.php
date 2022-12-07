<link rel="stylesheet" href="{{ asset('css/themes/instagram.css') }}">



<div id="container" class="">
    @auth
    <div class="row">
        <div class="d-flex align-items-center mt-1 mx-auto"
            style="min-width:80px; border: 1px solid lightgrey; background: #fff; border:none; border-radius: 50px;">
            <input class="clipboard hidden" />
            <span onclick="copyText('.copyText')" class="btn px-4 copy"
                style="background: #4e73df; border-radius: 50px">
                <i class="text-light far fa-copy"></i>
            </span>
            <span style="overflow: hidden;" class="copyText text-dark mx-3">{{ route('public', $user->username) }}</span>
        </div>
    </div>
    @endauth
    <div class="bios mx-auto">
        <div class="row mt-5">
            <div class="col-md-5">
                <img class="d-block mx-auto img-hover" width="150" height="150" style="object-fit:cover;    background-size: cover;
        border-radius: 100%;
        box-shadow: 0 7px 10px rgb(50 50 93 / 10%), 0 3px 4px rgb(0 0 0 / 6%);
        " src="{{ asset($user->photo) }}" alt="">
            </div>
            <div class="col-md-7 d-flex align-items-center">
                <div class="mx-auto">
                    <h3 class="bios-fullname text-center text-light">{{ $user->fullname }}</h3>
                    @if ($user->location)
                    <div class="d-flex justify-content-center">
                    <span class="p-1 px-2"
                        style="display:inline-block; border-radius: 25px; color: #fff; border: 2px solid #fff">
                        <i class="fas fa-map-marker-alt" style="color: #fff"></i>
                        {{ $user->location }}</span>
                    </div>
                    @endif
                    <h6 class="py-4 text-center text-light">{{ $user->bio }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="link-buttons mx-auto mt-5 p-3">

        <div class="row mt-4">
            <input id="rows" type="hidden" value="{{ $user->links_count }}">
            @foreach ($user->links as $link)
            <input class="clrs" type="hidden" id="colors-{{ $loop->iteration }}" value="{{ $link->colors }}">

            <a href="{{ $link->brand == 'mail' ? 'mailto:' : '' }}{{ $link->link }}" data-id="{{ $link->id }}"
                onclick="track(this)" id="li-{{ $loop->iteration }}"
                style="border-radius: 13px; padding: 0; background: #fff;"
                class="btn d-flex align-items-center mt-3 btn-block btn-lg">
                <span style="border-right: 1px solid rgba(1,1,1,0.2); padding: 16px;"
                    class="float-left d-flex align-items-center text-light">
                    @if ($link->brand == 'mail')
                    <i id="e-{{ $loop->iteration }}" style="font-size: 180%" class="link-logo fas fa-envelope"></i>
                    @else
                    <i id="e-{{ $loop->iteration }}" style="font-size: 180%"
                        class="link-logo fab fa-{{ $link->brand }}"></i>
                    @endif
                </span>
                <span id="link-text-{{ $loop->iteration }}" class="link-name mx-auto">{{ $link->name }}</span>
            </a>
            @endforeach
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function copyText(e) {
    var textToCopy = document.querySelector(e);
    var textBox = document.querySelector(".clipboard");
    textBox.setAttribute('value', textToCopy.innerHTML);

    textBox.select();
    document.execCommand('copy');
}

function track(e) {

    var id = $(e).attr('data-id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: "{{ url('track/link')}}",
        data: {
            id: id
        },
        success: (data) => {
            console.log(data);
        },
        error: function(data) {
            console.log(data);
        }
    });
}
</script>

<script type="text/javascript">
$(document).ready(function() {

    var rows = $('#rows').val();

    for (let i = 0; i < rows; i++) {

        // Replace Undefined Icons
        var el = document.getElementById('e-' + (i + 1));
        var pseudoElementStyle = getComputedStyle(el, '::before');

        if (pseudoElementStyle.content == 'none') {
            $(el).addClass('fas fa-link');
            console.log('none')
        } else {
            console.log(pseudoElementStyle.content)
        }


        var colors = $('#colors-' + (i + 1)).val();
        var colors = colors.split(",");
        console.log(colors);
        console.log(typeof(colors));


        var avg = function(a, b) {
                return (a + b) / 2;
            },
            t16 = function(c) {
                var sum = 0;
                for (let index = 0; index < c.length; index++) {
                    var int = parseInt(('' + c[index]).replace('#', ''), 16);
                    sum += int;
                }
                return sum / c.length;
            },
            hex = function(c) {
                return (c >> 0).toString(16)
            },
            hexC = t16(colors),
            r = function(hex) {
                return hex >> 16 & 0xFF
            },
            g = function(hex) {
                return hex >> 8 & 0xFF
            },
            b = function(hex) {
                return hex & 0xFF
            },
            res = 'rgb(' +
            r(hexC) + ',' +
            g(hexC) + ',' +
            b(hexC) + ')';

        console.log(res);
        // $('#li-' + (i + 1)).css("border", "3px solid " + res);
        $('#link-text-' + (i + 1)).css("color", res);
        $('#e-' + (i + 1)).css("color", res);
    }
});
</script>
