@section('stylesheet')
@endsection
<x-app-layout>

 <!--begin::Toolbar-->
 <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <x-header :title="$title" />
    <pre>
</div>
<!--end::Toolbar-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 position: relative;">
                <div class="col-sm-12 col-md-5" style="position: sticky; top: 0">
                    <div class="row col-md-12">
                        <div class="col-md-3">
                            <div class="">
                                <img alt="user image" src="{{ asset('assets/media/avatars/300-1.jpg') }}"
                                    class="rounded h-100 w-100">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="fs-3 fw-bold text-theme-primary">
                                <span>{{ $itemreview->category->name}} </span><br>
                                <span>Cusmtomer Reviews</span>
                                <span class="badge badge-light-info fs-6 fw-bold">
                                    @if ($itemreview->review->rating == null)
                                    0 Reviews
                                    @else

                                    {{ $itemreview->review->rating}}  Reviews
                                    @endif
                                </span></span>
                            </div>
                            <div class="rating">
                                <div class="d-flex">
                                    <x-rating :itemreview="$itemreview->review->rating"/>
                                </div>
                                <span class="mx-10 mt-2 fs-5 fw-bold">
                                    @if ($itemreview == null)
                                    0  Out Of 5
                                    @else

                                    {{ $itemreview->review->rating}} Reviews
                                    @endif

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

                <div class="col-sm-12 col-md-7 overflow-auto" style="height: 100vh;">


                    <div class="card mb-3 mt-4 rounded shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-stretch justify-content-between">
                                <div class="d-flex align-items-stretch">
                                    <div class="me-4" style="height: 4rem;">
                                        <img alt="user image" src="{{ asset('assets/media/avatars/300-1.jpg') }}"
                                            style="width: 4rem;" class="rounded h-100" />
                                    </div>
                                    <div class="">
                                        <h4>
                                            @if ($itemreview->review == null)
                                            John Doe
                                            @else

                                            {{ $itemreview->review->user->first_name}} {{ $itemreview->review->user->last_name}}
                                            @endif

                                        </h4>
                                        <div class="rating">
                                            <div class="d-flex">
                                                <x-rating />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-fit">

                                    @if ($itemreview->review == null)

                                    @else


                                    {{ $itemreview->review->user->created_at->format('d M Y')}}
                                    @endif

                                </div>
                            </div>
                            <div class="mt-2">
                                @if ($itemreview->review == null)

                                @else


                                {{ $itemreview->review->content}}
                                @endif



                            </div>
                        </div>
                    </div>



                    <div class="card mb-3 mt-4 rounded shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-stretch justify-content-between">
                                <div class="d-flex align-items-stretch">
                                    <div class="me-4" style="height: 4rem;">
                                        <img alt="user image" src="{{ asset('assets/media/avatars/300-1.jpg') }}"
                                            style="width: 4rem;" class="rounded h-100" />
                                    </div>
                                    <div class="">
                                        <h4>John Doe</h4>
                                        <div class="rating">
                                            <div class="d-flex">
                                                <x-rating />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-fit">
                                    28 Mar, 2022
                                </div>
                            </div>
                            <div class="mt-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quasi, porro iste? Error ratione beatae, necessitatibus aspernatur iste a obcaecati
                                recusandae,
                                consectetur repellendus repellat officiis deserunt? Quisquam nesciunt quasi nisi
                                tempore.
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 mt-4 rounded shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-stretch justify-content-between">
                                <div class="d-flex align-items-stretch">
                                    <div class="me-4" style="height: 4rem;">
                                        <img alt="user image" src="{{ asset('assets/media/avatars/300-1.jpg') }}"
                                            style="width: 4rem;" class="rounded h-100" />
                                    </div>
                                    <div class="">
                                        <h4>John Doe</h4>
                                        <div class="rating">
                                            <div class="d-flex">
                                                <x-rating />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-fit">
                                    2 Mar, 2022
                                </div>
                            </div>
                            <div class="mt-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quasi, porro iste? Error ratione beatae, necessitatibus aspernatur iste a obcaecati
                                recusandae,
                                consectetur repellendus repellat officiis deserunt? Quisquam nesciunt quasi nisi
                                tempore.
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
