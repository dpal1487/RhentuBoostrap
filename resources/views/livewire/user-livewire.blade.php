<div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <input type="text"  class="form-control" placeholder="Search" wire:model="searchUser" />

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
                {{ $result->links() }}
            </div>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
