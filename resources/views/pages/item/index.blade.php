<x-app-layout>
    <style>
        .btn:focus {
            outline: none !important;
        }
    </style>

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Items
                    Details</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted ">Home</a>
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
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Navbar-->


            <div class="card mb-5 mb-xxl-5 bg-transparent">
                @foreach ($items as $item)
                    <x-item-card :item="$item" />

                    {{-- <hr> --}}
                @endforeach
                @if ($items->links()->paginator->hasPages())
                    <div class="mt-4 p-4 box has-text-centered w-fit mx-auto">
                        {{ $items->links() }}
                    </div>
                @endif
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Content container-->
    </div>
    @section('javascript')
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


        <script>
            const button = document.getElementById('kt_docs_sweetalert_basic');

            button.addEventListener('click', e => {
                e.preventDefault();

                Swal.fire({
                    text: "Here's a basic example of SweetAlert!",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            });

            // import * as axios from 'axios';
            $(document).ready(function() {
                // alert( "this.value" );
                $('.statusChange').on('click', async function() {
                    // alert( this.value )
                    // let ItemId = $(this).data('id');
                    // let itemStatusId = $(this).data('value');
                    const {
                        id: ItemId,
                        status: itemStatusId
                    } = $(this)[0].dataset;
                    console.log("id", ItemId, "value", itemStatusId);
                    // console.log("Item Status Id", axios.get )

                    const res = await axios.post('{{ route('/item/status') }}', {
                            'item_id': ItemId,
                            'itemstatus_id': itemStatusId
                        })
                        .then((res) => {
                            //   assign state posts with response data
                            //  posts.value = res.data.data;
                            if (res.status === 200) {
                                let resp = JSON.parse(res.request.response);
                                Swal.fire({
                                    text: resp.success,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            } else {

                                Swal.fire({
                                    text: "Something Went Wrong !",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-warning"
                                    }
                                });

                            }
                        })
                        .catch((error) => {
                            console.log(error.res.data);
                        }).finally(() => {
                            window.location.reload()
                        })
                });
            });
        </script>
    @endsection
</x-app-layout>
