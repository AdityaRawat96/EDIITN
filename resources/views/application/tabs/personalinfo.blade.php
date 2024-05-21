 <!--begin::Step 4-->
 <div data-kt-stepper-element="content">
     <!--begin::Wrapper-->
     <div class="w-100">
         <!--begin::Heading-->
         <div class="pb-10 pb-lg-15">
             <!--begin::Title-->
             <h2 class="fw-bold text-dark">Billing Details</h2>
             <!--end::Title-->
             <!--begin::Notice-->
             <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                 <a href="#" class="text-primary fw-bold">Help Page</a>.
             </div>
             <!--end::Notice-->
         </div>
         <!--end::Heading-->
         <div class="row">
             <!-- Marital Status -->
             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">Marital Status</label>
                     <select name="marital_status" class="form-select form-select-lg form-select-solid"
                         data-control="select2" data-placeholder="Please Select">
                         <option value="">Please select</option>
                         <option value="Married"
                             {{isset($application->marital_status) && $application->marital_status == 'Married' ? 'selected' : null}}>
                             Married</option>
                         <option value="Separated"
                             {{isset($application->marital_status) && $application->marital_status == 'Separated' ? 'selected' : null}}>
                             Separated</option>
                         <option value="Divorced"
                             {{isset($application->marital_status) && $application->marital_status == 'Divorced' ? 'selected' : null}}>
                             Divorced</option>
                         <option value="Single"
                             {{isset($application->marital_status) && $application->marital_status == 'Single' ? 'selected' : null}}>
                             Single</option>
                         <option value="Widow (er)"
                             {{isset($application->marital_status) && $application->marital_status == 'Widow (er)' ? 'selected' : null}}>
                             Widow (er)</option>
                     </select>
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <!-- Father's / Guardian's Name -->
             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">Father's / Guardian's Name</label>
                     <input type="text" name="fathers_name" id="fathers_name"
                         class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Enter father's / guardian's name"
                         value="{{isset($application->fathers_name) ? $application->fathers_name : null}}" />
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <!-- Father's / Guardian's Occupation -->
             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">Father's / Guardian's Occupation</label>
                     <select name="father_occupation" class="form-select form-select-lg form-select-solid"
                         data-control="select2" data-placeholder="Please Select">
                         <option value="">Please select</option>
                         <option value="Salaried"
                             {{isset($application->father_occupation) && $application->father_occupation == 'Salaried' ? 'selected' : null}}>
                             Salaried</option>
                         <option value="Self Employed"
                             {{isset($application->father_occupation) && $application->father_occupation == 'Self Employed' ? 'selected' : null}}>
                             Self Employed</option>
                         <option value="Entrepreneur"
                             {{isset($application->father_occupation) && $application->father_occupation == 'Entrepreneur' ? 'selected' : null}}>
                             Entrepreneur</option>
                         <option value="Farmer"
                             {{isset($application->father_occupation) && $application->father_occupation == 'Farmer' ? 'selected' : null}}>
                             Farmer</option>
                         <option value="Others"
                             {{isset($application->father_occupation) && $application->father_occupation == 'Others' ? 'selected' : null}}>
                             Others</option>
                     </select>
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <!-- Father's / Guardian's Annual Income -->
             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3">Father's / Guardian's Annual Income</label>
                     <select name="fathers_annual_income" class="form-select form-select-lg form-select-solid"
                         data-control="select2" data-placeholder="Please Select">
                         <option value="">Please select</option>
                         <option value="Below Rs.1,50,000"
                             {{isset($application->fathers_annual_income) && $application->fathers_annual_income == 'Below Rs.1,50,000' ? 'selected' : null}}>
                             Below Rs.1,50,000</option>
                         <option value="Rs.1,50,001 to Rs 3,00,000"
                             {{isset($application->fathers_annual_income) && $application->fathers_annual_income == 'Rs.1,50,001 to Rs 3,00,000' ? 'selected' : null}}>
                             Rs.1,50,001 to Rs 3,00,000</option>
                         <option value="Rs. 3,00,001 to Rs.5,00,000"
                             {{isset($application->fathers_annual_income) && $application->fathers_annual_income == 'Rs. 3,00,001 to Rs.5,00,000' ? 'selected' : null}}>
                             Rs. 3,00,001 to Rs.5,00,000</option>
                         <option value="Above Rs. 5,00,000"
                             {{isset($application->fathers_annual_income) && $application->fathers_annual_income == 'Above Rs. 5,00,000' ? 'selected' : null}}>
                             Above Rs. 5,00,000</option>
                     </select>
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <!-- Father's / Guardian's Mobile Number -->
             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">Father's / Guardian's Mobile Number</label>
                     <input type="text" name="fathers_mobile_number" id="fathers_mobile_number"
                         class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Enter father's / guardian's mobile number"
                         value="{{isset($application->fathers_mobile_number) ? $application->fathers_mobile_number : null}}" />
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <!-- Mother's / Guardian's Name -->
             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">Mother's / Guardian's Name</label>
                     <input type="text" name="mothers_name" id="mothers_name"
                         class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Enter mother's / guardian's name"
                         value="{{isset($application->mothers_name) ? $application->mothers_name : null}}" />
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <!-- Mother / Guardian's Occupation -->
             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3">Mother / Guardian's Occupation</label>
                     <select name="mother_occupation" class="form-select form-select-lg form-select-solid"
                         data-control="select2" data-placeholder="Please Select">
                         <option value="">Please select</option>
                         <option value="Salaried"
                             {{isset($application->mother_occupation) && $application->mother_occupation == 'Salaried' ? 'selected' : null}}>
                             Salaried</option>
                         <option value="Self Employed"
                             {{isset($application->mother_occupation) && $application->mother_occupation == 'Self Employed' ? 'selected' : null}}>
                             Self Employed</option>
                         <option value="Entrepreneur"
                             {{isset($application->mother_occupation) && $application->mother_occupation == 'Entrepreneur' ? 'selected' : null}}>
                             Entrepreneur</option>
                         <option value="Farmer"
                             {{isset($application->mother_occupation) && $application->mother_occupation == 'Farmer' ? 'selected' : null}}>
                             Farmer</option>
                         <option value="House wife"
                             {{isset($application->mother_occupation) && $application->mother_occupation == 'House wife' ? 'selected' : null}}>
                             House wife</option>
                         <option value="Others"
                             {{isset($application->mother_occupation) && $application->mother_occupation == 'Others' ? 'selected' : null}}>
                             Others</option>
                     </select>
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <!-- Mother's / Guardian's Annual Income -->
             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3">Mother's / Guardian's Annual Income</label>
                     <select name="mothers_annual_income" class="form-select form-select-lg form-select-solid"
                         data-control="select2" data-placeholder="Please Select">
                         <option value="">Please select</option>
                         <option value="Below Rs.1,50,000"
                             {{isset($application->mothers_annual_income) && $application->mothers_annual_income == 'Below Rs.1,50,000' ? 'selected' : null}}>
                             Below Rs.1,50,000</option>
                         <option value="Rs.1,50,001 to Rs 3,00,000"
                             {{isset($application->mothers_annual_income) && $application->mothers_annual_income == 'Rs.1,50,001 to Rs 3,00,000' ? 'selected' : null}}>
                             Rs.1,50,001 to Rs 3,00,000</option>
                         <option value="Rs. 3,00,001 to Rs.5,00,000"
                             {{isset($application->mothers_annual_income) && $application->mothers_annual_income == 'Rs. 3,00,001 to Rs.5,00,000' ? 'selected' : null}}>
                             Rs. 3,00,001 to Rs.5,00,000</option>
                         <option value="Above Rs. 5,00,000"
                             {{isset($application->mothers_annual_income) && $application->mothers_annual_income == 'Above Rs. 5,00,000' ? 'selected' : null}}>
                             Above Rs. 5,00,000</option>
                         <option value="others"
                             {{isset($application->mothers_annual_income) && $application->mothers_annual_income == 'others' ? 'selected' : null}}>
                             others</option>
                     </select>
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <!-- Mother's / Guardian's Mobile Number -->
             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3">Mother's / Guardian's Mobile Number</label>
                     <input type="text" name="mothers_mobile_number" id="mothers_mobile_number"
                         class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Enter mother's / guardian's mobile number"
                         value="{{isset($application->mothers_mobile_number) ? $application->mothers_mobile_number : null}}" />
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <!-- Address For Communication -->
             <div class="col-md-12">
                 <div class="mb-10 fv-row">
                     <h4 class="mb-">Permanent Address</h4>
                 </div>
             </div>

             <!-- Street Address -->
             <div class="col-md-12">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">Street Address</label>
                     <input type="text" name="permanent_street_address1" id="permanent_street_address1"
                         class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Enter street address"
                         value="{{isset($application->permanent_street_address1) ? $application->permanent_street_address1 : null}}" />
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <!-- Street Address Line 2 -->
             <div class="col-md-12">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">Street Address Line 2</label>
                     <input type="text" name="permanent_street_address2" id="permanent_street_address2"
                         class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Enter street address line 2"
                         value="{{isset($application->permanent_street_address2) ? $application->permanent_street_address2 : null}}" />
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">State</label>
                     <select name="permanent_state" class="form-select form-select-lg form-select-solid state_inputs"
                         data-control="select2" data-placeholder="Please Select"
                         data-value="{{isset($application->permanent_state) ? $application->permanent_state : null}}">
                     </select>
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">City</label>
                     <select name="permanent_city" class="form-select form-select-lg form-select-solid city_inputs"
                         data-control="select2" data-placeholder="Please Select"
                         data-value="{{isset($application->permanent_city) ? $application->permanent_city : null}}">
                     </select>
                     <div class="fv-plugins message-container invalid-feedback"></div>
                 </div>
             </div>

             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">Postal Code</label>
                     <input type="text" name="permanent_postal_code" id="permanent_postal_code"
                         class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Enter postal code"
                         value="{{isset($application->permanent_postal_code) ? $application->permanent_postal_code : null}}" />
                     <div class="fv-plugins message-container invalid-feedback"></div>
                 </div>
             </div>


             <!-- Address For Communication -->
             <div class="col-md-12">
                 <div class="mb-10 fv-row">
                     <h4 class="mb-">Address For Communication</h4>
                 </div>
             </div>

             <div class="col-md-12">
                 <div class="mb-10 fv-row d-flex items-center">
                     <div class="form-check">
                         <input class="form-check-input" type="checkbox" value="" id="same_address" />
                         <label class="form-check-label text-dark" for="same_address">
                             Same as Permanent Address
                         </label>
                     </div>
                     <div class="fv-plugins message-container invalid-feedback"></div>
                 </div>
             </div>


             <!-- Street Address -->
             <div class="col-md-12">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">Street Address</label>
                     <input type="text" name="communication_street_address1" id="communication_street_address1"
                         class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Enter street address"
                         value="{{isset($application->communication_street_address1) ? $application->communication_street_address1 : null}}" />
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <!-- Street Address Line 2 -->
             <div class="col-md-12">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">Street Address Line 2</label>
                     <input type="text" name="communication_street_address2" id="communication_street_address2"
                         class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Enter street address line 2"
                         value="{{isset($application->communication_street_address2) ? $application->communication_street_address2 : null}}" />
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">State</label>
                     <select name="communication_state"
                         class="form-select form-select-lg form-select-solid state_inputs" data-control="select2"
                         data-placeholder="Please Select"
                         data-value="{{isset($application->communication_state) ? $application->communication_state : null}}">
                     </select>
                     <div class="fv-plugins-message-container invalid-feedback"></div>
                 </div>
             </div>

             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">City</label>
                     <select name="communication_city" class="form-select form-select-lg form-select-solid city_inputs"
                         data-control="select2" data-placeholder="Please Select"
                         data-value="{{isset($application->communication_city) ? $application->communication_city : null}}">
                     </select>
                     <div class="fv-plugins message-container invalid-feedback"></div>
                 </div>
             </div>

             <div class="col-md-12 col-lg-6">
                 <div class="mb-10 fv-row">
                     <label class="form-label mb-3 required">Postal Code</label>
                     <input type="text" name="communication_postal_code" id="communication_postal_code"
                         class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                         placeholder="Enter postal code"
                         value="{{isset($application->communication_postal_code) ? $application->communication_postal_code : null}}" />
                     <div class="fv-plugins message-container invalid-feedback"></div>
                 </div>
             </div>

         </div>
     </div>
     <!--end::Wrapper-->
 </div>
 <!--end::Step 4-->