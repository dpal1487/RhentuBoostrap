   <!--start::Card body-->
   <div class="card-body pt-0">
       <div class="row g-3">
           <div class="mb-10 fv-row col-6">
               <label class="required form-label">Name</label>
               <div class="">
                   <input type="text" name="name" class="form-control mb-2" placeholder="Plan name"
                       value="{{ @$plan->name }}" />
                   <div class="text-muted fs-7">An Plan name is required </div>
               </div>
           </div>

           <div class="mb-10 fv-row col-6">
               <label class="required form-label">Category </label>
               <div class="">
                   <select class="form-select mb-2" name="category" data-control="select2"
                       data-placeholder="Select an option">
                       <option value="">Select an option</option>
                       @foreach ($category as $val)
                           <option @selected($val->id == @$plan->category_id) value="{{ $val->id }}">
                               {{ $val->name }}
                           </option>
                       @endforeach
                   </select>
                   <div class="text-muted fs-7">Select Category For Plan</div>

               </div>
           </div>
       </div>

       <div class="row g-3">

           <div class="mb-10 fv-row col-6">
               <label class="required form-label">Ammount</label>
               <div class="">
                   <input type="text" name="amount" class="form-control mb-2" placeholder="Amount"
                       value="{{ @$plan->amount }}" />
                   <div class="text-muted fs-7">An Amount field is required.</div>
               </div>
           </div>
           <div class="mb-10 fv-row col-6">
               <label class="required form-label">Currency </label>
               <div class="">
                   <input type="text" name="currancy" class="form-control mb-2" placeholder="Currency"
                       value="{{ @$plan->currancy }}" />
                   <div class="text-muted fs-7">An Currency field is required.</div>
               </div>
           </div>
       </div>
       <div class="row g-3">
           <div class="mb-10 fv-row col-6">
               <label class="required form-label">Number Of Adds</label>
               <div class="">
                   <input type="text" name="no_of_ads" class="form-control mb-2" placeholder="Number Of Adds"
                       value="{{ @$plan->no_of_ads }}" />
                   <div class="text-muted fs-7">An Number Of Adds is required </div>
               </div>
           </div>
           <div class="mb-10 fv-row col-6">
               <label class="form-label">Expires In Days </label>
               <div class="">
                   <input type="text" name="expires_in_days" class="form-control mb-2" placeholder="Expires In Days"
                       value="{{ @$plan->expires_in_days }}" />
               </div>
           </div>
       </div>
       <div class="row g-3">
           <div class="mb-10 fv-row col-6">
               <label class="required form-label">Discount </label>
               <div class="">
                   <input type="text" name="discount" class="form-control mb-2" placeholder="Discount"
                       value="{{ @$plan->discount }}" />
                   <div class="text-muted fs-7">An Discount field is required.</div>
               </div>
           </div>
           <div class="mb-10 fv-row col-6">
               <label class="form-label required">Status </label>
               <div class="">
               <select class="form-select mb-2" name="status" data-control="select2"
                   data-placeholder="Select an option">
                   <option value="">Select an option</option>
                   <option value="1" @selected(@$plan->status == '1')>Active</option>
                   <option value="0" @selected(@$plan->status == '0')>In Active</option>
               </select>
               <div class="text-muted fs-7">Status is required </div>
               </div>

           </div>
       </div>

       <div class="row">
           <div class="fv-row mb-2">
               <label class="form-label required">Description</label>
               <textarea name="description" class="form-control">{{ @$plan->description }}</textarea>
               <div class="text-muted fs-7">Set a description to the plan for better visibility.</div>
           </div>
       </div>
   </div>
   <!--end::Card body-->
