@extends('user.layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">



    <div id="container">
        <div class="bios mx-auto">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <div class="row mt-5">
                <div class="col-md-5">
                    <form method="POST" enctype="multipart/form-data" id="laravel-ajax-file-upload"
                          action="javascript:void(0)">
                        {!! csrf_field() !!}
                        <input type="file" id="FileUpload1" name="photo" style="display: none"/>
                        <button type="submit" style="display:none" id="ajax-submit" class="btn btn-primary">Submit
                        </button>
                    </form>

                    <img id="imgFileUpload" class="d-block mx-auto img-hover" width="150" height="150" style="object-fit:cover;    background-size: cover;
    border-radius: 100%;
    box-shadow: 0 7px 10px rgb(50 50 93 / 10%), 0 3px 4px rgb(0 0 0 / 6%);
    " src="{{ asset($user->photo) }}" alt="">
                    <br/>
                    <span id="spnFilePath"></span>
                </div>
                <div class="col-md-7 edit-bios d-flex align-items-center">
                    <div class="w-100">
                        <form action="{{ route('update-profile') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Full Name</label>
                                <input type="text" name="fullname" value="{{ $user->fullname }}" class="form-control"
                                       id="formGroupExampleInput" placeholder="Kylie Jenner">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Location</label>
                                <input type="text" name="location" value="{{ $user->location }}" class="form-control"
                                       id="formGroupExampleInput2" placeholder="City, Country">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Bio</label>
                                <textarea class="form-control" name="bio"
                                          placeholder="Enterpreneur, Socialite and Media Personality"
                                          id="exampleFormControlTextarea1" rows="3">{{ $user->bio }}</textarea>
                            </div>
                            <button type="submit" style="border-radius: 20px; background: #4e73df"
                                    class="btn btn-primary py-2 px-4 float-right">Done
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="link-buttons mx-auto mt-5 p-3">
            <div class="row mt-4">
                <a id="newLink" style="border-radius: 13px; border: 2px dashed blue; padding: 0;"
                   class="btn d-flex align-items-center mt-4 btn-block btn-lg" data-toggle="collapse"
                   data-target="#collapselink">
                <span style="border-right: 1px solid lightgray"
                      class="float-left p-3 d-flex align-items-center text-light">
                    <i id="newLogo" style="font-size: 180%; color: #4e73df" class="link-logo fas fa-plus-circle"></i>
                </span>
                    <span style="color: #4e73df" class="link-name mx-auto" id="newLinkText" data-id="newLink">Add New Link</span>
                </a>
                <div id="collapselink" class="collapse w-100 p-3 border" style="border-radius: 0 0 13px 13px">
                    <form action="{{ route('create-link') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" oninput="buttonName(this)" data-id="newLink" name="name"
                                   class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput"
                                   placeholder="eg: Instagram">
                        </div>
                        <div class="py-3">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab-short" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="new"
                                       data-toggle="pill" href="#custom-tabs-four-new-short" onclick="SwitchToUrl(this)"
                                       role="tab"
                                       aria-controls="custom-tabs-four-new-short" aria-selected="false">
                                        URL</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="new"
                                       data-toggle="pill" href="#custom-tabs-four-2-new-short"
                                       onclick="SwitchToEmail(this)" role="tab"
                                       aria-controls="custom-tabs-four-2-new-short" aria-selected="false">
                                        Email</a>
                                </li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <input type="url" value="https://" name="link" class="form-control searchFromDatabase"
                                   id="formGroupExampleInput2"
                                   oninput="handleUrl(this)" onkeydown="keephttps(this)" data-button="newLink"
                                   data-id="new" data-text="newLinkText"
                                   data-logo="newLogo"
                                   placeholder="eg: example@email.com">
                            <small class="urlWarning" style="display: none" data-id="new">This url doesn't exist in
                                database. It may
                                take a while to make url. Press "Create"</small>
                        </div>
                        <hr>
                        <button type="submit" data-id="new" onclick="loadingOverlay.activate()"
                                class="btn btn-primary float-right">Create
                        </button>
                    </form>
                </div>

                <input id="rows" type="hidden" value="{{ $user->links_count }}">
                @foreach ($user->links as $link)
                    <input class="clrs" type="hidden" id="colors-{{ $loop->iteration }}" value="{{ $link->colors }}">

                    <a id="li-{{ $loop->iteration }}" style="border-radius: 13px; padding: 0; border:none"
                       class="btn d-flex align-items-center mt-3 btn-block btn-lg" data-toggle="collapse"
                       data-target="#collapselink-{{ $loop->iteration }}"
                       onclick="collapsed(<?php echo $loop->iteration ?>)">
                <span style="border-right: 1px solid lightgray"
                      class="float-left p-3 d-flex align-items-center text-light">
                    @if ($link->brand == 'mail')
                        <i id="e-{{ $loop->iteration }}" style="font-size: 180%" class="link-logo fas fa-envelope"></i>
                    @else
                        <i id="e-{{ $loop->iteration }}" style="font-size: 180%"
                           class="link-logo fab fa-{{ $link->brand }}"></i>
                    @endif
                </span>
                        <span style="color: #f8f9fc" data-id="text-link-{{ $loop->iteration }}"
                              id="link-text-{{ $loop->iteration }}"
                              class="link-name mx-auto">{{ $link->name }}</span>
                    </a>
                    <div id="collapselink-{{ $loop->iteration }}" class="collapse w-100 p-3 border"
                         style="border-radius: 0 0 13px 13px">
                        <form action="{{ route('update-link') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $link->id }}">

                            <div class="form-group">
                                <label for="formGroupExampleInput">Name</label>
                                <input type="text" oninput="buttonName(this)" data-id="text-link-{{ $loop->iteration }}"
                                       name="name" value="{{ $link->name }}" class="form-control"
                                       id="formGroupExampleInput" placeholder="Instagram">
                            </div>
                            <div class="py-3">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab-short" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link {{ strpos($link->link, '@') ? '' : 'active' }}"
                                           id="{{ $link->id }}"
                                           data-toggle="pill" href="#custom-tabs-four-new-short"
                                           onclick="SwitchToUrl(this)" role="tab"
                                           aria-controls="custom-tabs-four-new-short" aria-selected="false">
                                            URL</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ strpos($link->link, '@') ? 'active' : '' }}"
                                           id="{{ $link->id }}"
                                           data-toggle="pill" href="#custom-tabs-four-2-new-short"
                                           onclick="SwitchToEmail(this)" role="tab"
                                           aria-controls="custom-tabs-four-2-new-short" aria-selected="false">
                                            Email</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <input type="url" name="link" value="{{ $link->link }}" class="form-control url"
                                       oninput="handleUrl(this)" onkeydown="keephttps(this)"
                                       data-button="li-{{ $loop->iteration }}" data-id="{{ $link->id }}"
                                       id="colors-input-{{ $loop->iteration }}"
                                       data-text="link-text-{{ $loop->iteration }}"
                                       data-logo="e-{{ $loop->iteration }}"
                                       placeholder="eg: example@email.com">
                                <small class="urlWarning" style="display: none" data-id="{{ $link->id }}">This url
                                    doesn't exist in database. It
                                    may take a while to make url. Press "Update"</small>
                            </div>
                            <hr>
                            <button type="submit" data-id="{{ $link->id }}"
                                    class="btn submit text-light float-right">Update
                            </button>
                        </form>
                        <form action="{{ route('delete-link') }}" method="POST" id="delLink">
                            @csrf
                            <input type="hidden" name="id" value="{{ $link->id }}">
                            <button type="submit" class="btn delete float-left">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/loadingOverlay.js"></script>
    <script>
        function buttonName(e) {
            var value = e.value;
            var dataId = $(e).data('id');
            var input = $('span[data-id=' + dataId + ']');
            $(input).text(value);
            if (value == '') {
                $(input).text('Add New Link');
            }
        }

        function SwitchToEmail(e) {
            var input = $('input[data-id=' + e.id + ']');
            $(input).val('');
            $(input).attr('type', 'email');
            $(input).removeAttr('onkeydown');
            $(input).removeAttr('oninput');
            console.log(input.val());
        }

        function SwitchToUrl(e) {
            var input = $('input[data-id=' + e.id + ']');
            $(input).val('https://');
            $(input).attr('type', 'url');
            $(input).attr('onkeydown', 'keephttps(this)');
            $(input).attr('oninput', 'handleUrl(this)');
            console.log(input.val());
        }

        function is_url(str) {
            regexp =
                /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
            if (regexp.test(str)) {
                return true;
            } else {
                return false;
            }
        }

        function handleUrl(e) {
            checkUrl(e);
            searchFromDatabase(e);
        }

        var input = $('.url');

        function checkUrl(e) {
            var dataId = $(e).data('id');
            if (is_url(e.value)) {
                $('.btn[data-id=' + dataId + ']').prop('disabled', false);
                $(e).css('border', '2px solid green');
            } else {
                $('.btn[data-id=' + dataId + ']').prop('disabled', true);
                $(e).css('border', '2px solid red');
            }
        }

        function searchFromDatabase(e) {
            var value = e.value;
            var dataId = $(e).data('id');
            var dataButton = $(e).data('button');
            var dataButtonText = $(e).data('text');
            var dataButtonLogo = $(e).data('logo');
            console.log('text' + dataButtonText);
            var formData = new FormData();
            formData.append('link', value);
            $.ajax({
                type: 'POST',
                url: "{{ url('search-link-from-database')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(dataId)

                    if (!data.success) {
                        $("#" + dataButton).css('background-color', 'white');
                        $("#" + dataButton).css('border', '2px dashed blue');
                        $("#" + dataButtonText).css('color', '#4e73df');
                        $("#" + dataButtonLogo).removeClass();
                        $("#" + dataButtonLogo).addClass("link-logo");
                        $("#" + dataButtonLogo).addClass("fas fa-plus-circle");
                        $("#" + dataButtonLogo).css('color', '#4e73df');
                        $('small[data-id=' + dataId + ']').css('display', 'block');
                    } else {
                        console.log(data.brand.palette);
                        var color = combineColors(data.brand.palette);
                        $("#" + dataButton).css('background-color', color);
                        $("#" + dataButton).css('border', 'none');
                        $("#" + dataButtonText).css('color', 'white');
                        $("#" + dataButtonLogo).removeClass();
                        $("#" + dataButtonLogo).addClass("link-logo");
                        $("#" + dataButtonLogo).addClass("fab fa-" + data.brand.brand);
                        $("#" + dataButtonLogo).css('color', 'white');
                        // $('#' + dataButton + 'span.link-name').css('color', 'white');
                        console.log($('#' + dataButton + 'span.link-name').text());
                        $('small[data-id=' + dataId + ']').css('display', 'none');
                    }
                },
                error: function (data) {
                    console.log(dataId)
                }
            });
        }

        function keephttps(e) {
            var oldVal = e.value;
            var field = e;

            setTimeout(function () {
                if (field.value.indexOf('https://') !== 0) {
                    field.value = oldVal;
                }
            }, 1);
        }
    </script>

    <script type="text/javascript">
        function collapsed(e) {
            if (!$('#collapselink-' + e).hasClass('show')) {
                $('#li-' + e).css('border-radius', '13px 13px 0 0');
            } else {
                $('#li-' + e).css('border-radius', '13px');
            }
        }

        $('#newLink').on('click', function () {
            if (!$('#collapselink').hasClass('show')) {
                $('#newLink').css('border-radius', '13px 13px 0 0');
            } else {
                $('#newLink').css('border-radius', '13px');
            }
        });

        $(document).ready(function () {
            var fileupload = document.getElementById("FileUpload1");
            var filePath = document.getElementById("spnFilePath");
            var image = document.getElementById("imgFileUpload");

            image.onclick = function () {
                fileupload.click();
            };
            fileupload.onchange = function () {
                document.getElementById('ajax-submit').click();
            };

            $(document).ready(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#laravel-ajax-file-upload').submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('update-avatar')}}",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            this.reset();
                            alert('File has been uploaded successfully');
                            $('#imgFileUpload').attr('src', data.photo);

                            console.log(data);
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                });

                $('.searchFromDatabase').on('input', function (e) {

                });
            });


            //Give Links Color and Icons
            var rows = $('#rows').val();
            for (let i = 0; i < rows; i++) {
                // Replace Undefined Icons
                var el = document.getElementById('e-' + (i + 1));
                var pseudoElementStyle = getComputedStyle(el, '::before');

                if (pseudoElementStyle.content == 'none') {
                    $(el).addClass('fas fa-link');
                } else {
                    //
                }


                var colorsInput = $('#colors-input-' + (i + 1)).val();
                if (colorsInput.includes('@')) {
                    var input = $('#colors-input-' + (i + 1));
                    $(input).attr('type', 'email');
                    $(input).removeAttr('onkeydown');
                    $(input).removeAttr('oninput');
                    console.log(input.val());
                } else {
                    console.log('url')
                }

                var colors = $('#colors-' + (i + 1)).val();
                res = combineColors(colors);
                $('#li-' + (i + 1)).css("background-color", res);
                $('#collapselink-' + (i + 1) + ' form button.submit').css("background-color", res);
                $('#collapselink-' + (i + 1) + ' form button.delete').css("color", res);
            }
        });

        function combineColors(palette) {

            var colors = palette;
            var colors = colors.split(",");

            var avg = function (a, b) {
                    return (a + b) / 2;
                },
                t16 = function (c) {
                    var sum = 0;
                    for (let index = 0; index < c.length; index++) {
                        var int = parseInt(('' + c[index]).replace('#', ''), 16);
                        sum += int;
                    }
                    return sum / c.length;
                },
                hex = function (c) {
                    return (c >> 0).toString(16)
                },
                hexC = t16(colors),
                r = function (hex) {
                    return hex >> 16 & 0xFF
                },
                g = function (hex) {
                    return hex >> 8 & 0xFF
                },
                b = function (hex) {
                    return hex & 0xFF
                },
                res = 'rgb(' +
                    r(hexC) + ',' +
                    g(hexC) + ',' +
                    b(hexC) + ')';

            return res;
        }
    </script>
@endsection
