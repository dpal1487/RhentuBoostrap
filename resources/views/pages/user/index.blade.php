@section('stylesheet')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
@endsection
<x-app-layout>

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <x-header title="Users" />
        <pre>
    </div>
    <!--end::Toolbar-->
   <!--begin::Content-->
   <div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Category-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <form action="{{ route('user') }}">
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="search" name="q" class="form-control form-control-solid w-250px ps-14" placeholder="Search User" />
                        </div>
                    </form>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body overflow-auto pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="user_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-1px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                  <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#user_table .form-check-input" value="1" />
                              </div>
                          </th>
                            <th class="min-w-150px">Name</th>
                            <th class="min-w-150px">Email</th>
                            <th class="min-w-150px">Mobile</th>
                            <th class="min-w-100px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->

                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($result as $row)
<!--begin::Table row-->
                        <tr>
                            <!--begin::Table row-->
                            <td> <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div></td>
                                <!--begin::name=-->
                                <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                <!--end::name=-->
                                 <!--begin::Email=-->
                                 <td>{{ $row->email }} </td>
                                 <!--end::Email=-->
                                 <!--begin::Contact=-->
                                 <td>{{ $row->mobile }} </td>
                                 <!--end::Contact=-->
                                <!--begin::Action=-->
                                <td class="text-end">
                                    <!--begin::Menu-->
                                <div class="menu-item px-3">
                                    <a href="/user/{{ $row->id }}/overview" class="menu-link px-3">View</a>
                                </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                        <!--end::Table row-->
@endforeach

                    </tbody>
                    <!--end::Table body-->
                </table>
                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers"
                            id="kt_ecommerce_category_table_paginate">
                            {{ $result->links() }}
                        </div>
                    </div>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Category-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
    @section('javascript')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
                <!--begin::Custom Javascript(used for this page only)-->
              <script src="{{ asset('assets/js/custom/apps/ecommerce/catalog/categories.js') }}"></script>
              <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
              <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
              <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
              <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
              <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
              <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
              <!--end::Custom Javascript-->
@endsection
</x-app-layout>
