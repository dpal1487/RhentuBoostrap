@section('stylesheet')
<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}"
    rel="stylesheet" type="text/css" />
<!--end::Vendor Stylesheets-->
@endsection
<x-app-layout>

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row" id="category_form" action="{{ url('category/store') }}"
                method="POST">
                @csrf
                <!--begin::Aside column-->
                @include('pages.category._fields')
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    @section('javascript')
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/pages/category/form.js') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <!--end::Custom Javascript-->
    <script type="text/javascript">
        $(document).ready(function () {

            $('#imageInput').change(async function () {
                const file = this.files[0];
                // console.log("see event", file);
                const data = new FormData();

                data.append('image', file);

                try {
                    let response = await axios.post('/upload/image',
                        data, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then((response) => {
                        $("#image_id").val(response.data.data.id)
                    });

                    // window.location.reload();
                } catch (error) {
                    console.log(error);
                }

                console.log("see response", response.data);
            });
        });

        ClassicEditor
            .create(document.querySelector('#category_description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
            .create(document.querySelector('#meta_description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

    </script>
    @endsection
</x-app-layout>
