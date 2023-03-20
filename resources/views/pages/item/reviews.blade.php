@section('stylesheet')
@endsection
<x-app-layout>

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Iten
                    Reviews</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Dashboards</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        {{-- {{ dd($itemdetails) }} --}}
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-sm-12 col-md-5">
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <div class="">
                                <img alt="user image" src="{{ asset('assets/media/avatars/300-1.jpg') }}"
                                    class="rounded h-100 w-100">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="fs-3 fw-bold text-theme-primary">
                                <span>{{ $itemdetails->category->name }} </span>
                                <span>Cusmtomer Reviews</span>
                                <span class="badge badge-light-warning fs-6 fw-bold">10 Reviews
                                </span></span>
                            </div>
                            <div class="rating">
                                <div class="rating-label checked">
                                    <span class="svg-icon">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 16 16" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="rating-label checked">
                                    <span class="svg-icon"><svg stroke="currentColor" fill="currentColor"
                                            stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg></span>
                                </div>
                                <div class="rating-label checked">
                                    <span class="svg-icon"><svg stroke="currentColor" fill="currentColor"
                                            stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg></span>
                                </div>
                                <div class="rating-label checked">
                                    <span class="svg-icon"><svg stroke="currentColor" fill="currentColor"
                                            stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg></span>
                                </div>
                                <div class="rating-label">
                                    <span class="svg-icon"><svg stroke="currentColor" fill="currentColor"
                                            stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg></span>
                                </div>
                                <span class="mx-10 mt-2 fs-5 fw-bold">4 Out Of 5
                                </span>
                            </div>
                            <div class="">
                                <div class="d-flex align-items-center mt-2">
                                    <span style="color:#777777 ; width: 6rem">5 Stars</span>
                                    <div class='ms-4 position-relative bg-secondary rounded-pill'
                                        style="width:12rem;height:1rem;">
                                        <div class="position-absolute bg-warning rounded-pill top-0 start-0 end-0 h-100"
                                            style=" width: 90%";></div>
                                    </div>
                                    <span class='ms-4' style="color:#202020 ;width: 9rem">15 Reviews</span>
                                </div>

                                <div class="d-flex align-items-center mt-2">
                                    <span style="color:#777777 ; width: 6rem">4 Stars</span>
                                    <div class='ms-4 position-relative bg-secondary rounded-pill'
                                        style="width:12rem;height:1rem;">
                                        <div class="position-absolute bg-warning rounded-pill top-0 start-0 end-0 h-100"
                                            style="width: 66%"></div>
                                    </div>
                                    <span class='ms-4' style="color:#202020 ;width: 9rem">10 Reviews</span>
                                </div>

                                <div class="d-flex align-items-center mt-2">
                                    <span style="color:#777777 ; width: 6rem">3 Stars</span>
                                    <div class='ms-4 position-relative bg-secondary rounded-pill'
                                        style="width:12rem;height:1rem;">
                                        <div class="position-absolute bg-warning rounded-pill top-0 start-0 end-0 h-100"
                                            style="width:40%;"></div>
                                    </div>
                                    <span class='ms-4' style="color:#202020 ;width: 9rem">8 Reviews</span>
                                </div>

                                <div class="d-flex align-items-center mt-2">
                                    <span style="color:#777777 ; width: 6rem">2 Stars</span>
                                    <div class='ms-4 position-relative bg-secondary rounded-pill'
                                        style="width:12rem;height:1rem;">
                                        <div class="position-absolute bg-warning rounded-pill top-0 start-0 end-0 h-100"
                                            style="width:20%;"></div>
                                    </div>
                                    <span class='ms-4' style="color:#202020 ;width: 9rem">5 Reviews</span>
                                </div>

                                <div class="d-flex align-items-center mt-2">
                                    <span style="color:#777777 ; width: 6rem">1 Stars</span>
                                    <div class='ms-4 position-relative bg-secondary rounded-pill'
                                        style="width:12rem;height:1rem;">
                                        <div class="position-absolute bg-warning rounded-pill top-0 start-0 end-0 h-100"
                                            style="width:10%;"></div>
                                    </div>
                                    <span class='ms-4' style="color:#202020 ;width: 9rem">2 Reviews</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12 col-md-7">
                    <div class="card mb-3">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>
    @section('javascript')
    @endsection
</x-app-layout>
