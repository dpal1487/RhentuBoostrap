<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <!--begin::Theme mode setup on page load-->
        <script>
            var defaultThemeMode = "light";
            var themeMode;
            if (document.documentElement) {
                if (document.documentElement.hasAttribute("data-theme-mode")) {
                    themeMode = document.documentElement.getAttribute("data-theme-mode");
                } else {
                    if (localStorage.getItem("data-theme") !== null) {
                        themeMode = localStorage.getItem("data-theme");
                    } else {
                        themeMode = defaultThemeMode;
                    }
                }
                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }
                document.documentElement.setAttribute("data-theme", themeMode);
            }
        </script>
        <!--end::Theme mode setup on page load-->
        <!--Begin::Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!--End::Google Tag Manager (noscript) -->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <!--begin::Authentication - Sign-up -->
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <!--begin::Body-->
                <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                    <!--begin::Form-->
                    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                        <!--begin::Wrapper-->
                        <div class="w-lg-500px p-10">
                            <!--begin::Form-->
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <h1 class="text-dark fw-bolder mb-3">Sign Up</h1>
                                    <!--end::Title-->

                                </div>
                                <!--begin::Heading-->


                                <!--begin::Input group=-->



                                <div class="row col-md-12">
                                    <div class="fv-row mb-4 col-md-6">
                                        <!--begin::First Name-->
                                        <input type="text" placeholder="First Name" name="first_name"
                                            class="form-control bg-transparent" />
                                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                        <!-- end::First Name-->
                                    </div>
                                    <div class="fv-row mb-4 col-md-6">
                                        <!--begin::Last Name-->
                                        <input type="text" placeholder="Last Name" name="last_name"
                                            class="form-control bg-transparent" />
                                        <!--end::Last Name-->
                                    </div>
                                </div>
                                <div class="fv-row mb-4">
                                    <!--begin::Mobile-->
                                    <input type="text" placeholder="Mobile" name="mobile"
                                        class="form-control bg-transparent" />
                                    <x-input-error :messages="$errors->get('mobile')" class="mt-2" />

                                    <!--end::Mobile-->
                                </div>
                                <div class="fv-row mb-8">
                                    <!--begin::Email-->
                                    <input type="email" placeholder="Email" name="email" autocomplete="off"
                                        class="form-control bg-transparent" />
                                    <!--end::Email-->
                                </div>
                                <div class="fv-row mb-6">
                                    <!--begin::Label-->

                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <!--begin::Options-->
                                        <div class="d-flex align-items-center mt-3">
                                            <label
                                        class="col-lg-4 col-form-label  fw-semibold fs-6">Gender</label>
                                            <!--begin::Option-->
                                            <label
                                                class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                <input class="form-check-input" name="gender" type="radio"
                                                    value="1" />
                                                <span class="fw-semibold ps-2 fs-6">Male</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label
                                                class="form-check form-check-custom form-check-inline form-check-solid">
                                                <input class="form-check-input" name="gender" type="radio"
                                                    value="2" />
                                                <span class="fw-semibold ps-2 fs-6">Female</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="fv-row mb-8">
                                    <!--begin::DOB-->

                                    <input placeholder="Date Of Birth" name="date_of_birth" autocomplete="off"
                                        class="form-control bg-transparent " id="kt_datepicker_1"/>
                                    <!--end::Email-->
                                </div>
                                <div class="fv-row mb-8">
                                    <!--begin::DOB-->

                                    <input type="password" placeholder="Password" name="password" autocomplete="off"
                                        class="form-control bg-transparent" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                    <!--end::Email-->
                                </div>

                                <!--begin::Submit button-->
                                <div class="d-grid mb-10">
                                    <button type="submit" class="btn btn-primary">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Sign up</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        <!--end::Indicator progress-->
                                    </button>
                                </div>
                                <!--end::Submit button-->
                                <!--begin::Sign up-->
                                <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
                                    <a href="{{ route('login') }}" class="link-primary fw-semibold">Sign in</a>
                                </div>
                                <!--end::Sign up-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Form-->

                </div>
                <!--end::Body-->
                <!--begin::Aside-->
                <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                    style="background-image: url(../../../assets/media/misc/auth-bg.png)">
                    <!--begin::Content-->
                    <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                        <!--begin::Logo-->
                        <a href="../../../index.html" class="mb-0 mb-lg-12">
                            <img alt="Logo" src="{{ asset('assets/media/logos/custom-1.png') }}"
                                class="h-60px h-lg-75px" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Image-->
                        <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                            src="{{ asset('assets/media/misc/auth-screens.png') }}" alt="" />
                        <!--end::Image-->
                        <!--begin::Title-->
                        <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and
                            Productive</h1>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="d-none d-lg-block text-white fs-base text-center">In this kind of post,
                            <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the
                                blogger</a>introduces a person they’ve interviewed
                            <br />and provides some background information about
                            <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the
                                interviewee</a>and their
                            <br />work following this is a transcript of the interview.
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Aside-->
            </div>
            <!--end::Authentication - Sign-up-->
        </div>
        <!--end::Root-->
        <!--begin::Javascript-->
        <script>
            var hostUrl = "{{ asset('assets/index.html')}}";
        </script>
         <script>
            new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"), {
    //put your config here
            });
            </script>
        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Custom Javascript(used for this page only)-->
        <script src="{{ asset('assets/js/custom/authentication/sign-up/general.js') }}"></script>
        <!--end::Custom Javascript-->
        <!--end::Javascript-->

<script>
    $("#kt_datepicker_1").flatpickr();
    </script>

</x-guest-layout>
