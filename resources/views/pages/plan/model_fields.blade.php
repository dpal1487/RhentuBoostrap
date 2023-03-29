<div class="card-body p-9">
<div class="modal-body">
        <!--begin::Form-->
            <!--begin::Card body-->
              <!--begin::Input group-->
              <div class="fv-row mb-5">
                <!--begin::Label-->
                <label class="form-label">Attribute Value</label>
                <!--end::Label-->
                <!--begin::Editor-->
                <input type="text" name="attribute_value" id="attribute_value" class="form-control mb-2" placeholder="Attribute field" valur={{ @$attributeValue->attribute_value }}/>
                <!--end::Editor-->
            </div>
            <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row mb-0">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Attribute Status</label>
                    <!--begin::Label-->
                    <!--begin::Label-->
                   
                    <div class="col-lg-8 fv-row">
                    <select class="form-select mb-2" name="status"
                    data-control="select2" data-placeholder="Select an option">
                        <option value="" >Select an option</option>
                        <option value="1" >Active</option>
                        <option value="0" >In Active</option>
                    </select>
                    </div>
                    <!--begin::Label-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
            <input type="text" name="attribute_id" value="{{ $attribute->id }}" />
            <input type="text" name="attribut_value_id" id="attribut_value_id"  />




            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" id = "submit" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </div>
