@section('stylesheet')
    <!--begin::Vendor Stylesheets(used for this page only)-->

    <!--end::Vendor Stylesheets-->
@endsection
<x-app-layout>

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toast-->

        <!--end::Toast-->
        <x-header title="Categories" />
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
                    <form action="{{ route('category.index') }}">

                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="search" name="q" class="form-control form-control-solid w-250px ps-14" placeholder="Search Category" />

                        </div>
                    </form>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Add customer-->
                    <a href="{{ route('category.add') }}" class="btn btn-primary">Add Category</a>
                    <!--end::Add customer-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body overflow-auto pt-0">
                <!--begin::Table-->
                <table class="table w-100 align-middle table-row-dashed fs-6 gy-5 table-responsive" id="category_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-1px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                  <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#category_table .form-check-input" value="1" />
                              </div>
                          </th>
                            <th class="min-w-250px">Category</th>
                            <th class="min-w-100px">Meta Tag</th>
                            <th class="min-w-250px">Meta Description</th>
                            <th class="min-w-100px">Meta Keyword</th>
                            <th class="min-w-100px">Category Parent</th>
                            <th class="min-w-50px">Category Status</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">
                        <!--begin::Table row-->
                        @foreach ($categories as $category)
                        <tr>
                                                        <!--begin::Checkbox-->
                                                        <td>
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                        </td>

                                                        <!--end::Checkbox-->
                                                        <!--begin::Category=-->
                                                        <td>
                                                            <div class="d-flex">
                                                                <!--begin::Thumbnail-->
                                                                <a href="" class="symbol symbol-50px">
                                                                    <span class="symbol-label" style="background-image:url({{ asset('assets/image/category/original/') }}/{{ @$category->image->name }} "></span>
                                                                </a>
                                                                <!--end::Thumbnail-->
                                                                <div class="ms-5">
                                                                    <!--begin::Title-->
                                                                    <a href="" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" category-filter="category_name">{{ $category->name }}</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="text-muted fs-7 fw-bold">{{ strip_tags($category->description) }}.</div>
                                                                    <!--end::Description-->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!--end::Category=-->

                                                         <!--begin::Meta Tag-->
                                                         <td>
                                                            <div class="d-flex">
                                                                <div class="ms-5">
                                                                    <!--begin::Description-->
                                                                    <div class="text-muted fs-7 fw-bold">{{ $category->meta ? $category->meta->tag : '' }} </div>
                                                                    <!--end::Description-->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!--end::Meta Tag-->

                                                         <!--begin::Meta Description-->
                                                         <td>
                                                            <div class="d-flex">
                                                                <div class="ms-5">
                                                                    <!--begin::Description-->
                                                                    <div class="text-muted fs-7 fw-bold">{{ $category->meta ? $category->meta->description : '' }} </div>
                                                                    <!--end::Description-->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!--end::Meta Description-->

                                                         <!--begin::Meta Keywords-->
                                                         <td>
                                                            <div class="d-flex">
                                                                <div class="ms-5">
                                                                    <!--begin::Description-->
                                                                    <div class="text-muted fs-7 fw-bold">{{ $category->meta ? $category->meta->keywords : '' }} </div>
                                                                    <!--end::Description-->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!--end::Meta Keywords-->

                                                        <!--begin::Type=-->
                                                        <td>
                                                            <!--begin::Badges-->


                                                            <div class="badge badge-secondary">
                                                                {{ $category->parent ? $category->parent->name : 'Parent' }}
                                                            </div>

                                                            <!--end::Badges-->
                                                        </td>
                                                        <!--end::Type=-->
                                                         <!--begin::Type=-->
                                                         <td>
                                                            <!--begin::Badges-->
                                                            @if ($category->status == 1)
                        <div class="badge badge-light-success">Active</div>
                        @else
                        <div class="badge badge-light-info">In Active</div>
                        @endif
                                                            <!--end::Badges-->
                                                        </td>
                                                        <!--end::Type=-->
                                                        <!--begin::Action=-->
                                                        <td class="text-end">
                                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                            <span class="svg-icon svg-icon-5 m-0">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon--></a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                {{-- <div class="menu-item px-3">
                                                                    <a href="{{ route('category.view', ['id' => $category->id]) }}" class="menu-link px-3">View</a>
                                                                </div> --}}
                                                                <div class="menu-item px-3">
                                                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="menu-link px-3">Edit</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->

                                                                <div class="menu-item px-3">

                                                                    <a href="#" class="menu-link px-3" data-id="{{ $category->id }}" category-table="delete_row">Delete</a>


                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                        <!--end::Action=-->
                                                    </tr>
                        @endforeach

                        <!--end::Table row-->
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->

                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center justify-content-center justify-content-md-end">
                        {{ $categories->links() }}

                    </div>
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Category-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
@section('javascript')
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
          <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
                <script src="{{ asset('assets/js/custom/pages/category/index.js') }}"></script>
@endsection
</x-app-layout>
