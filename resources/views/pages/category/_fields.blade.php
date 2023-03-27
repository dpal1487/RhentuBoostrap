  <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
      <!--begin::Thumbnail settings-->
      <div class="card card-flush py-4">
          <!--begin::Card header-->
          <div class="card-header">
              <!--begin::Card title-->
              <div class="card-title">
                  <h2>Thumbnail</h2>
              </div>
              <!--end::Card title-->
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body text-center pt-0">
              <!--begin::Image input-->
              <!--begin::Image input placeholder-->
              @if ( @$category->image->name )
              <style>
                .image-input-placeholder {
                background-image: url({{ asset('assets/image/category/original/') }}/{{ @$category->image->name }});
                }
                </style>
              @else

              <style>
                  .image-input-placeholder {
                      background-image: url('{{ asset('assets/media/svg/files/blank-image.svg') }}');
                  }

                  [data-theme="dark"] .image-input-placeholder {
                      background-image: url('{{ asset('assets/media/svg/files/blank-image-dark.svg') }}');
                  }
              </style>
              @endif
              <!--end::Image input placeholder-->
              <!--begin::Image input-->
              <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                  data-kt-image-input="true">
                  <!--begin::Preview existing avatar-->
                  <div class="image-input-wrapper w-150px h-150px"></div>
                  <!--end::Preview existing avatar-->
                  <!--begin::Label-->
                  <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                      data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                      <!--begin::Icon-->
                      <i class="bi bi-pencil-fill fs-7"></i>
                      <!--end::Icon-->
                      <!--begin::Inputs-->
                      <input type="file" name="category_image" id="imageInput" accept=".png, .jpg, .jpeg" />
                      <!--end::Inputs-->
                  </label>
                  <!--end::Label-->
                  <!--begin::Cancel-->
                  <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                      data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                      <i class="bi bi-x fs-2"></i>
                  </span>
                  <input type="text" name="image" id="image_id">

                  <!--end::Cancel-->
                  <!--begin::Remove-->
                  <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                      data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                      <i class="bi bi-x fs-2"></i>
                  </span>
                  <!--end::Remove-->
              </div>
              <!--end::Image input-->
              <!--begin::Description-->

              <div class="fv-plugins-message-container invalid-feedback">
                  <div data-field="category_name" data-validator="notEmpty"> @error('category_name')
                          {{ $message }}
                      @enderror
                  </div>
              </div>
              <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg image files
                  are accepted</div>
              <!--end::Description-->
          </div>
          <!--end::Card body-->
      </div>
      <!--end::Thumbnail settings-->

  </div>
  <!--end::Aside column-->
  <!--begin::Main column-->
  <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
      <!--begin::General options-->
      <div class="card card-flush py-4">
          <!--begin::Card header-->
          <div class="card-header">
              <div class="card-title">
                  <h2>General</h2>
              </div>
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body pt-0">
              <!--begin::Input group-->
              <div class="row g-3">
                  <div class="mb-10 fv-row col-6">
                      <!--begin::Label-->
                      <label class="required form-label">Category Name</label>
                      <!--end::Label-->
                      <div class="">
                          <!--begin::Input-->
                          <input type="text" name="name" class="form-control mb-2" placeholder="Product name"
                              value="{{ @$category->name }}" />
                          <!--end::Input-->
                          <!--begin::Description-->
                          <div class="text-muted fs-7">A category name is required and recommended to be unique.</div>
                          <!--end::Description-->
                          <div class="fv-plugins-message-container invalid-feedback">
                              @error('category_name')
                                  {{ $message }}
                              @enderror
                          </div>
                      </div>
                  </div>
                  <!--end::Input group-->
                  <div class="mb-1 fv-row col-6">
                      <!--begin::Select store template-->
                      <label for="parent_category" class="form-label">Select Category Parent
                          Value</label>
                      <!--end::Select store template-->
                      <!--begin::Select2-->
                      {{-- {{ $categoryparent_id->parent_id }}
                      {{  $category}} --}}
                          <select class="form-select mb-2" name="parent_id" data-control="select2"
                              data-hide-search="true" data-placeholder="Select an option"
                              id="parent_category">
                              <option value=" " selected>Parent</option>

                              @foreach ($categoryParent as $val)
                                  <option value="{{ $val->id }}"> {{ $val->name }}</option>
                              @endforeach
                          </select>
                      <!--end::Select2-->
                      <!--begin::Description-->
                      <div class="text-muted fs-7">Assign a template from your current theme to define how the category
                          products are displayed.</div>
                      <!--end::Description-->
                  </div>
                  <!--end::Input group-->
              </div>

              <!--begin::Input group-->
              <div>
                  <!--begin::Label-->
                  <label class="form-label">Description</label>
                  <!--end::Label-->
                  <!--begin::Editor-->
                  <textarea name="category_description" id="category_description">   {{ strip_tags(@$category->description) }}                         </textarea>

                  <!--end::Editor-->
                  <!--begin::Description-->
                  <div class="text-muted fs-7">Set a description to the category for better visibility.</div>
                  <!--end::Description-->
              </div>
              <!--end::Input group-->
                 <!--begin::Input group-->
                 <div>
                    <!--begin::Label-->
                    <label class="form-label">Keywords</label>
                    <!--end::Label-->
                    <!--begin::Editor-->
                    <input id="kt_ecommerce_add_category_keywords" name="keywords" class="form-control mb-2" value="{{ @$category->keywords }}"/>
                    <!--end::Editor-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Set a list of keywords that the category is related to. Separate the
                        keywords by adding a comma
                        <code>,</code>between each keyword.
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
          </div>
          <!--end::Card header-->
      </div>
      <!--end::General options-->
      <!--begin::Meta options-->
      <div class="card card-flush py-4">
          <!--begin::Card header-->
          <div class="card-header">
              <div class="card-title">
                  <h2>Meta Options</h2>
              </div>
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body pt-0">
              <!--begin::Input group-->
              <div class="mb-10">
                  <!--begin::Label-->
                  <label class="form-label">Meta Tag Title</label>
                  <!--end::Label-->
                  <!--begin::Input-->
                  <input type="text" class="form-control mb-2" name="meta_tag" placeholder="Meta tag name"
                      value="{{ @$category->meta->tag }}" />
                  <!--end::Input-->
                  <!--begin::Description-->
                  <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.
                  </div>
                  <!--end::Description-->
              </div>
              <!--end::Input group-->
              <!--begin::Input group-->
              <div class="mb-10">
                  <!--begin::Label-->
                  <label class="form-label">Meta Tag Description</label>
                  <!--end::Label-->
                  <!--begin::Editor-->
                  <textarea name="meta_description" id="meta_description">  {{ strip_tags(@$category->meta->description) }}                          </textarea>
                  <!--begin::Description-->
                  <div class="text-muted fs-7">Set a meta tag description to the category for increased SEO ranking.
                  </div>
                  <!--end::Description-->
              </div>
              <!--end::Input group-->
              <!--begin::Input group-->
              <div>
                  <!--begin::Label-->
                  <label class="form-label">Meta Tag Keywords</label>
                  <!--end::Label-->
                  <!--begin::Editor-->
                  <input id="kt_ecommerce_add_category_meta_keywords" name="meta_keywords" class="form-control mb-2"  value="{{ @$category->meta->keywords }}"/>
                  <!--end::Editor-->
                  <!--begin::Description-->
                  <div class="text-muted fs-7">Set a list of keywords that the category is related to. Separate the
                      keywords by adding a comma
                      <code>,</code>between each keyword.
                  </div>
                  <!--end::Description-->
              </div>
              <!--end::Input group-->
          </div>
          <!--end::Card header-->
      </div>
      <!--end::Meta options-->

      <!--begin::Meta options-->
      <div class="card card-flush py-4">
          <!--begin::Card header-->
          <div class="card-header">
              <div class="card-title">
                  <h2>Banner Images</h2>
              </div>
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body pt-0">
              <!--begin::Input group-->
              <div class="mb-10">
                  <!--begin::Label-->
                  <label class="form-label">Choose Banner Image</label>
                  <!--end::Label-->
                  <!--begin::Input-->
                  <input type="file" class="form-control mb-2" name="banner_image"/>
                  <!--end::Input-->
              </div>
              <!--end::Input group-->
          </div>
          <!--end::Card header-->
      </div>
      <!--end::Meta options-->

      <div class="d-flex justify-content-end">
          <!--begin::Button-->
          <a href="{{ route('category.index') }}" class="btn btn-light me-5">Cancel</a>
          <!--end::Button-->
          <button type="submit" class="btn btn-primary">
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
