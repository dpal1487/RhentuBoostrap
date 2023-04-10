<div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                fill="currentColor" />
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="search" wire:model="searchCustomer"  class="form-control form-control-solid w-250px ps-14" placeholder="Search " />
                </div>
            <!--end::Search-->
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->

    <div class="card-body overflow-auto pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="coupon_table">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="w-1px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                          <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#coupon_table .form-check-input" value="1" />
                      </div>
                  </th>
                    <th class="min-w-100px">Name </th>
                    <th class="min-w-100px">Title</th>
                    <th class="min-w-100px">Content</th>
                    <th class="min-w-100px">Rating</th>
                    <th class="min-w-100px">Status</th>
                    {{-- <th class="text-end min-w-100px">Actions</th> --}}
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-semibold text-gray-600">
                <!--begin::Table row-->
                @foreach ($reviews as $value)
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
                                    <p class="text-gray-800 fs-5 fw-bold mb-1"
                                        custome-review-filter="coupon_code">{{ $value->user->first_name }}
                                        {{ $value->user->last_name }}</p>
                                    <!--end::Title-->

                                </div>
                            </div>
                        </td>

                        <td>
                            {{ $value->review->title }}
                        </td>
                        <td>
                            {{ $value->review->content}}

                        </td>

                        <td class="text-end" data-order="rating-5">
                            <div class="rating">
                                <div class="rating-label checked">
                                    <?php
                                    $unselected = 5 - $value->review->rating;


                                    $selected_stars = '';
                                    for ($i = 0; $i < $value->review->rating; $i++) {
                                        $selected_stars .= '<span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path></svg></span>';
                                    }
                                    echo $selected_stars;
                                    ?>
                                </div>
                                <?php
                                $unselected_stars = '';
                                if(!is_nan($unselected)){
                                    for ($i = 0; $i < $unselected; $i++) {
                                        $unselected_stars .= '<span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path></svg></span>';
                                    }
                                }
                                echo $unselected_stars;
                                ?>
                            </div>
                        </td>
                        <td>
                            @if ($value->review->status == 1)
                                <div class="badge badge-light-success">Active</div>
                            @else
                                <div class="badge badge-light-danger">In Active</div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                <!--end::Table row-->
            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
        <div class="row">
            <div class="col-sm-12 d-flex align-items-center justify-content-center justify-content-md-end">
                {{ $reviews->links() }}
            </div>
        </div>
    </div>
    <!--end::Card body-->
</div>
