  <!--end::Aside column-->
  <!--begin::Main column-->
  <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
      <!--begin::General options-->
      <div class="card card-flush py-4">
          <!--begin::Card header-->
          <div class="card-header">
              <div class="card-title">
                  <h2>Plan </h2>
              </div>
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body pt-0">
              <!--begin::Input group-->
              <div class="row g-3">
                  <div class="mb-10 fv-row col-6">
                      <!--begin::Label-->
                      <label class="required form-label">Plan Name</label>
                      <!--end::Label-->
                      <div class="">
                          <!--begin::Input-->
                          <input type="text" name="name" class="form-control mb-2" placeholder="Plan name"
                              value="{{ @$plan->name }}" />
                          <!--end::Input-->
                          <!--begin::Description-->
                          <div class="text-muted fs-7">An Plan name is required and recommended to be unique.</div>
                          <!--end::Description-->

                      </div>
                  </div>
                  <div class="mb-10 fv-row col-6">
                    <!--begin::Label-->
                    <label class="required form-label">Plan Field</label>
                    <!--end::Label-->
                    <div class="">
                        <!--begin::Input-->
                        <input type="text" name="field" class="form-control mb-2" placeholder="Plan field"
                            value="{{ @$plan->field }}" />
                        <!--end::Input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">An plan field is required.</div>
                        <!--end::Description-->

                    </div>
                </div>
              </div>

              <!--begin::Input group-->

               <!--begin::Input group-->
               <div class="row g-3">
                <div class="mb-10 fv-row col-4">
                    <!--begin::Label-->
                    <label class="required form-label">Category </label>
                    <!--end::Label-->
                    <div class="">
                    <select class="form-select mb-2" name="category"
                    data-control="select2" data-placeholder="Select an option" >
                        <option value="">Select an option</option>

                        @foreach ($category as $val)
                        <option @selected($val->id == @$plan->category_id) value="{{ $val->id }}"        >
                            {{ $val->name }}
                        </option>
                            {{-- <option value="{{ $val->id }}"> {{ $val->name }}</option> --}}
                        @endforeach
                    </select>
                    </div>

                </div>

                <div class="mb-10 fv-row col-4">
                    <label class="required form-label">Input Type </label>
                    <!--end::Label-->
                    <select class="form-select mb-2" name="type" data-control="select2">
                        <option value="">Select an option</option>

                        <option value="input" @selected(@$plan->type == 'input')>Input</option>
                        <option value="checkbox" @selected(@$plan->type == 'checkbox')>Checkbox</option>
                        <option value="select" @selected(@$plan->type == 'select')>Select</option>
                        <option value="radio" @selected(@$plan->type == 'radio')>Radio</option>
                    </select>

                </div>
                <div class="mb-10 fv-row col-4">
                    <label class="form-label">Data Type </label>
                    <!--end::Label-->
                    <select class="form-select mb-2" name="data_type" data-control="select2">
                        <option>Select an option</option>
                        <option value="text" @selected(@$plan->data_type == 'text')>Text</option>
                        <option value="number" @selected(@$plan->data_type == 'number')>Number</option>

                    </select>

                </div>

            </div>

            <!--begin::Input group-->
              <div class="fv-row mb-5">
                  <!--begin::Label-->
                  <label class="form-label">Description</label>
                  <!--end::Label-->
                  <!--begin::Editor-->
                  <textarea name="description" class="form-control">{{ @$plan->description }}</textarea>
                  <!--end::Editor-->
                  <!--begin::Description-->
                  <div class="text-muted fs-7">Set a description to the plan for better visibility.</div>
                  <!--end::Description-->
              </div>
              <!--end::Input group-->

              <div class="row g-10">
                <div class="mb-10 fv-row col-4">
                    <!--begin::Label-->
                    <label class="form-label required">Display Order </label>
                    <!--end::Label-->
                    <select class="form-select mb-2" name="display_order"
                    data-control="select2" data-placeholder="Select an option">
                        <option value="">Select an option</option>
                        <option value="1" @selected(@$plan->display_order == '1')>Yes</option>
                        <option value="0" @selected(@$plan->display_order == '0')>No</option>
                    </select>

                </div>
                <div class="mb-10 fv-row col-4">
                    <!--begin::Label-->
                    <label class="form-label required">Status </label>
                    <!--end::Label-->
                    <select class="form-select mb-2" name="status"
                    data-control="select2" data-placeholder="Select an option">
                        <option value="">Select an option</option>
                        <option value="1" @selected(@$plan->status == '1')>Active</option>
                        <option value="0" @selected(@$plan->status == '0')>In Active</option>
                    </select>

                </div>
              </div>

          </div>
          <!--end::Card header-->
      </div>
      <!--end::General options-->

      <div class="d-flex justify-content-end">
          <!--begin::Button-->
          <a href="{{ route('plan.index') }}" class="btn btn-light me-5">Cancel</a>
          <!--end::Button-->
          <button type="submit" class="btn btn-primary" id="submit">
              <!--begin::Indicator label-->
              <span class="indicator-label">Save</span>
              <!--end::Indicator label-->
              <!--begin::Indicator progress-->
              <span class="indicator-progress">Please wait...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              <!--end::Indicator progress-->
          </button>
          <!--end::Button-->
      </div>
  </div>
