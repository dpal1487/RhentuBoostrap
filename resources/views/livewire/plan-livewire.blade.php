<div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search "
                    wire:model="q" />

                <div class="d-flex d-flex-end position-relative mx-5">
                    <select class="form-select" wire:model="status">
                        <option value="">All</option>
                        <option value="1">Active</option>
                        <option value="0">In Active</option>
                    </select>
                </div>
            </div>
            <!--end::Search-->
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Add customer-->
            <a href="{{ route('plan.add') }}" class="btn btn-primary">Add <i class="fas fa-plane-alt    "></i></a>
            {{-- <a href="{{ route('category.add') }}" class="btn btn-primary g-5">Add Category</a> --}}
            <!--end::Add customer-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body overflow-auto pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="plan_table">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="w-1px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                data-kt-check-target="#plan_table .form-check-input" value="1" />
                        </div>
                    </th>
                    <th class="min-w-100px">Name</th>
                    <th class="min-w-100px">Description</th>

                    <th class="min-w-100px">Ammount</th>
                    <th class="min-w-100px">Status</th>
                    <th class="text-end min-w-100px">Actions</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-semibold text-gray-600">
                <!--begin::Table row-->
                @foreach ($plans as $plan)
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                        plan-filter="plan_name">{{ $plan->name }}</a>
                                    <!--end::Title-->

                                </div>
                            </div>
                        </td>

                        <td>
                            {{ $plan->sort_description }}
                        </td>
                        <td>
                            {{ $plan->price }}
                        </td>

                        <td>


                            @if ($plan->is_active == 1)
                                <div class="badge badge-light-success">Active</div>
                            @else
                                <div class="badge badge-light-danger">In Active</div>
                            @endif
                            <!--end::Badges-->
                        </td>

                        <td class="text-end">
                            <a href="" class="btn btn-sm btn-light btn-active-light-primary"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('plan.edit', ['id' => $plan->id]) }}"
                                        class="menu-link px-3">Edit</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-id="{{ $plan->id }}"
                                        plan-table="delete_row">Delete</a>
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
                {{ $plans->links() }}
            </div>
        </div>
    </div>
    <!--end::Card body-->
</div>
