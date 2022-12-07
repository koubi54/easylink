@extends('user.layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/customize.css') }}">

    <div style="border-radius: 10px" class="border main-box mx-auto">
        <div style="border-bottom: 1px solid #e3e6f0" class="p-4">
            <h5 class="m-0">Theme</h5>
        </div>
        <div class="">
            <div class="row mid-box px-5">
                <div class="custom-col">
                    <div
                        style="border-radius: 13px; position:relative; box-shadow: 0px 9px 20px -10px rgba(0,0,0,0.49);"
                        class="w-90 p-4 col-item">

                        <div class="box-hover" id="standard"
                             style="{{ $user->theme == 'standard' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'standard' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px" class="links bg-primary"></div>
                        <div style="height:20px; border-radius:5px" class="links bg-danger mt-3"></div>
                        <div style="height:20px; border-radius:5px" class="links bg-warning mt-3"></div>
                        <div style="height:20px; border-radius:5px" class="links bg-success mt-3"></div>
                    </div>
                </div>
                <div class="custom-col">
                    <div
                        style="border-radius: 13px; position:relative; background: linear-gradient(to top right,#7979ff,#33cbdf);"
                        class="w-90 p-4 col-item">
                        <div class="box-hover" id="blue" style="{{ $user->theme == 'blue' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'blue' ? 'display: none !important;' : '' }}">
                                <i class="d-block mx-auto selected fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px; color:#fff; background: hsla(0,0%,100%,.25);"
                             class="links">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: hsla(0,0%,100%,.25);"
                             class="links bg-glass mt-3"></div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: hsla(0,0%,100%,.25);"
                             class="links bg-glass mt-3"></div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: hsla(0,0%,100%,.25);"
                             class="links bg-glass mt-3"></div>
                    </div>
                </div>
                <div class="custom-col">
                    <div style="border-radius: 13px; position:relative; background: #1b1b38;" class="w-90 p-4 col-item">
                        <div class="box-hover" id="dark" style="{{ $user->theme == 'dark' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'dark' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px" class="links bg-primary"></div>
                        <div style="height:20px; border-radius:5px" class="links bg-danger mt-3"></div>
                        <div style="height:20px; border-radius:5px" class="links bg-warning mt-3"></div>
                        <div style="height:20px; border-radius:5px" class="links bg-success mt-3"></div>
                    </div>
                </div>
                <div class="custom-col">
                    <div style="border-radius: 13px; position:relative; background: linear-gradient(
-60deg
,#d04042,#8c1b42 40%,#1b2f49);" class="w-90 p-4 col-item bg-danger">
                        <div class="box-hover" id="dusk" style="{{ $user->theme == 'dusk' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'dusk' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links ">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                    </div>
                </div>
                <div class="custom-col">
                    <div
                        style="border-radius: 13px; position:relative; background: radial-gradient(circle at 75% 85%,#7979ff,#303066);"
                        class="w-90 p-4 col-item">
                        <div class="box-hover" id="purple"
                             style="{{ $user->theme == 'purple' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'purple' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px" class="links border"></div>
                        <div style="height:20px; border-radius:5px" class="links border mt-3"></div>
                        <div style="height:20px; border-radius:5px" class="links border mt-3"></div>
                        <div style="height:20px; border-radius:5px" class="links border mt-3"></div>
                    </div>
                </div>
                <div class="custom-col">
                    <div
                        style="border-radius: 13px; position:relative; background: linear-gradient(to bottom right,#571845 0 20%,#900c3e 20% 40%,#c70039 40% 60%,#ff5733 60% 80%,#ffc303 80% 100%); box-shadow: 0px 9px 20px -10px rgba(0,0,0,0.49);"
                        class="w-90 p-4 col-item">
                        <div class="box-hover" id="sunset"
                             style="{{ $user->theme == 'sunset' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'sunset' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px;  background: rgba(0,0,0,.25);" class="links"></div>
                        <div style="height:20px; border-radius:5px; background: rgba(0,0,0,.25);"
                             class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: rgba(0,0,0,.25);"
                             class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: rgba(0,0,0,.25);"
                             class="links mt-3"></div>
                    </div>
                </div>
                <div class="custom-col">
                    <div
                        style="border-radius: 13px; position:relative; background: radial-gradient(circle at 50% 50%, #F5E8E4 0 20%, #F5C7A9 20% 40%, #D1512D 40% 60%, #411530 60% 80%, #F5C7A9 80% 100%);"
                        class="w-90 p-4 col-item">
                        <div class="box-hover" id="friendly"
                             style="{{ $user->theme == 'friendly' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'friendly' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px;  background: #fff" class="links"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                    </div>
                </div>
                <div class="custom-col">
                    <div
                        style="border-radius: 13px; position:relative; background-image: linear-gradient(111.7deg, #a529b9 19.9%, #50b1e1 95%) !important;"
                        class="w-90 p-4 col-item bg-danger">
                        <div class="box-hover" id="lite" style="{{ $user->theme == 'lite' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'lite' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links ">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                    </div>
                </div>
                <div class="custom-col">
                    <div
                        style="border-radius: 13px; position:relative; background-image: linear-gradient(109.6deg, #ffb418 11.2%, #f73131 91.1%) !important;"
                        class="w-90 p-4 col-item bg-danger">
                        <div class="box-hover" id="orange"
                             style="{{ $user->theme == 'orange' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'orange' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links ">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                    </div>
                </div>
                <div class="custom-col">
                    <div
                        style="border-radius: 13px; position:relative; background: linear-gradient(135deg, #44A08D, #093637)  !important;"
                        class="w-90 p-4 col-item bg-danger">
                        <div class="box-hover" id="green"
                             style="{{ $user->theme == 'green' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'green' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links ">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                    </div>
                </div>
                <div class="custom-col">
                    <div
                        style="border-radius: 13px; position:relative; background: linear-gradient(to bottom, #fc5c7d, #6a82fb)  !important;"
                        class="w-90 p-4 col-item bg-danger">
                        <div class="box-hover" id="pink" style="{{ $user->theme == 'pink' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'pink' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links ">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                        <div style="height:20px; border-radius:5px; color:#fff; background: rgba(0,0,0,.25);"
                             class="links mt-3">
                        </div>
                    </div>
                </div>
                <div class="custom-col">
                    <div style="border-radius: 13px; position:relative; background: linear-gradient(115deg, #000000 0%, #00C508 55%, #000000 100%), linear-gradient(115deg, #0057FF 0%, #020077 100%), conic-gradient(from 110deg at -5% 35%, #000000 0deg, #FAFF00 360deg), conic-gradient(from 220deg at 30% 30%, #FF0000 0deg, #0000FF 220deg, #240060 360deg), conic-gradient(from 235deg at 60% 35%, #0089D7 0deg, #0000FF 180deg, #240060 360deg); background-blend-mode: soft-light, soft-light, overlay, screen, normal;
"
                         class="w-90 p-4 col-item">
                        <div class="box-hover" id="abstract-blue"
                             style="{{ $user->theme == 'abstract-blue' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'abstract-blue' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px;  background: #fff" class="links"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                    </div>
                </div>
                <div class="custom-col">
                    <div style="border-radius: 13px; position:relative; background: linear-gradient(180deg, #0C003C 0%, #BFFFAF 100%), linear-gradient(165deg, #480045 25%, #E9EAAF 100%), linear-gradient(145deg, #480045 25%, #E9EAAF 100%), linear-gradient(300deg, rgba(233, 223, 255, 0) 0%, #AF89FF 100%), linear-gradient(90deg, #45EBA5 0%, #45EBA5 30%, #21ABA5 30%, #21ABA5 60%, #1D566E 60%, #1D566E 70%, #163A5F 70%, #163A5F 100%); background-blend-mode: overlay, overlay, overlay, multiply, normal;
"
                         class="w-90 p-4 col-item">
                        <div class="box-hover" id="abstract-sky"
                             style="{{ $user->theme == 'abstract-sky' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'abstract-sky' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px;  background: #fff" class="links"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                    </div>
                </div>
                <div class="custom-col">
                    <div style="border-radius: 13px; position:relative; background: linear-gradient(rgb(131, 0, 255), rgba(255, 0, 0, 0.78));
"
                         class="w-90 p-4 col-item">
                        <div class="box-hover" id="instagram"
                             style="{{ $user->theme == 'instagram' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'instagram' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px;  background: #fff" class="links"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                    </div>
                </div>
                <div class="custom-col">
                    <div style="border-radius: 13px;
                    position:relative;
                    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
                    background-size: 1000% 1000%;
                    animation: gradient 8s ease infinite;

"
                         class="w-90 p-4 col-item">
                        <div class="box-hover" id="animation1"
                             style="{{ $user->theme == 'animation1' ? 'display: block;' : '' }}">
                            <div class="d-flex align-items-center"
                                 style="{{ $user->theme != 'animation1' ? 'display: none !important;' : '' }}">
                                <i class="d-block selected mx-auto fas fa-check-circle"></i>
                            </div>
                        </div>

                        <div style="height:20px; border-radius:5px;  background: #fff" class="links"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                        <div style="height:20px; border-radius:5px; background: #fff" class="links mt-3"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <input id="route" type="hidden" value="{{ route('dashboard', auth()->user()->username) }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(".box-hover").on('click', function (e) {
            var theme = e.target.id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ url('update-theme')}}",
                data: {
                    theme: theme
                },
                success: (data) => {
                    console.log(data);
                    var route = $('#route').val();
                    window.location.replace(route);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        })
    </script>

@endsection
