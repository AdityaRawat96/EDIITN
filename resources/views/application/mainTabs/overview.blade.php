<div class="row mt-5">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header bg-light-primary">
                <h3 class="fw-bold my-auto text-gray-800">Personal Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">First Name</div>
                            <div class="fs-5 text-gray-800">{{ucfirst($user->first_name)}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Last Name</div>
                            <div class="fs-5 text-gray-800">{{ucfirst($user->last_name)}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Phone</div>
                            <div class="fs-5 text-gray-800">{{$user->phone}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">
                                Gender
                            </div>
                            <div class="fs-5 text-gray-800">{{ucfirst($application->gender)}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">
                                Religion
                            </div>
                            <div class="fs-5 text-gray-800">{{ucfirst($application->religion)}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">
                                Differently Abled
                            </div>
                            <div class="fs-5 text-gray-800">{{ucfirst($application->differently_abled)}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Middle Name</div>
                            <div class="fs-5 text-gray-800">
                                {{isset($user->middle_name) ? ucfirst($user->middle_name) : "-"}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Email</div>
                            <div class="fs-5 text-gray-800">{{$user->email}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">
                                Date of Birth
                            </div>
                            <div class="fs-5 text-gray-800">{{$application->date_of_birth}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">
                                Caste
                            </div>
                            <div class="fs-5 text-gray-800">
                                {{$application->caste === "st" ||  $application->caste === "sc" ||  $application->caste === "obc" ? strtoupper($application->caste) : ucfirst($application->caste)}}
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">
                                Nationality
                            </div>
                            <div class="fs-5 text-gray-800">{{ucfirst($application->nationality)}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">
                                Marital Status
                            </div>
                            <div class="fs-5 text-gray-800">{{ucfirst($application->marital_status)}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header bg-light-primary">
                <h3 class="fw-bold my-auto text-gray-800">Address Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-dark">Permanent Address</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Street Address</div>
                            <div class="fs-5 text-gray-800">{{$application->permanent_street_address1}}
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Street Address Line 2</div>
                            <div class="fs-5 text-gray-800">
                                {{$application->permanent_street_address2}}
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">City</div>
                            <div class="fs-5 text-gray-800">{{$application->permanent_city}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">State</div>
                            <div class="fs-5 text-gray-800">{{$application->permanent_state}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Pin Code</div>
                            <div class="fs-5 text-gray-800">{{$application->permanent_postal_code}}</div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="mb-8">
                            <div class="fw-bold fs-6 text-dark">Address For Communication</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Street Address</div>
                            <div class="fs-5 text-gray-800">{{$application->communication_street_address1}}
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Street Address Line 2</div>
                            <div class="fs-5 text-gray-800">{{$application->communication_street_address2}}
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">City</div>
                            <div class="fs-5 text-gray-800">{{$application->communication_city}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">State</div>
                            <div class="fs-5 text-gray-800">{{$application->communication_state}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Pin Code</div>
                            <div class="fs-5 text-gray-800">{{$application->communication_postal_code}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header bg-light-primary">
                <h3 class="fw-bold my-auto text-gray-800">Family Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Father's / Guardian's Name</div>
                            <div class="fs-5 text-gray-800">{{$application->fathers_name}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Father / Guardian's Occupation</div>
                            <div class="fs-5 text-gray-800">{{$application->father_occupation}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Father's / Guardian's Annual Income
                            </div>
                            <div class="fs-5 text-gray-800">
                                {{isset($application->fathers_annual_income) ? $application->fathers_annual_income : "-"}}
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Father's / Guardian's Mobile Number
                            </div>
                            <div class="fs-5 text-gray-800">{{$application->fathers_mobile_number}}</div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Mother's / Guardian's Name</div>
                            <div class="fs-5 text-gray-800">{{$application->mothers_name}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Mother / Guardian's Occupation</div>
                            <div class="fs-5 text-gray-800">
                                {{isset($application->mother_occupation) ? $application->mother_occupation : "-"}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Mother's / Guardian's Annual Income
                            </div>
                            <div class="fs-5 text-gray-800">
                                {{isset($application->mothers_annual_income) ? $application->mothers_annual_income : "-"}}
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Mother's / Guardian's Mobile Number
                            </div>
                            <div class="fs-5 text-gray-800">
                                {{isset($application->mothers_mobile_number) ? $application->mothers_mobile_number : "-"}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header bg-light-primary">
                <h3 class="fw-bold my-auto text-gray-800">Educational Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Field of Study</div>
                            <div class="fs-5 text-gray-800">{{$application->field}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Qualification</div>
                            <div class="fs-5 text-gray-800">{{$application->qualification}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Name of the University</div>
                            <div class="fs-5 text-gray-800">{{$application->university}}</div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Name of the Degree</div>
                            <div class="fs-5 text-gray-800">{{$application->degree_name}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Year of Completion</div>
                            <div class="fs-5 text-gray-800">{{$application->graduation_year}}</div>
                        </div>
                        <div class="mb-5">
                            <div class="fw-bold fs-6 text-gray-400">Percentage of Marks / Grade</div>
                            <div class="fs-5 text-gray-800">{{$application->percentage_grade}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header bg-light-primary">
                <h3 class="fw-bold my-auto text-gray-800">Documents uploaded</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <!--begin::Label-->
                        <div class="fw-bold fs-6 text-gray-400 mb-5">Passport Photo</div>
                        <!--end::Label-->
                        <!--begin::Dropzone-->
                        <div class="dropzone dropzone-queue mb-2" id="kt_dropzonejs_photo">
                            <!--begin::Controls-->
                            <div class="dropzone-panel mb-lg-0 mb-2 d-none">
                                <a class="dropzone-select btn btn-sm btn-primary me-2">Attach files</a>
                                <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove
                                    All</a>
                            </div>
                            <!--end::Controls-->

                            <!--begin::Items-->
                            <div class="dropzone-items wm-200px">
                                <div class="dropzone-item" style="display:none">
                                    <!--begin::File-->
                                    <div class="dropzone-file">
                                        <a href="#" class="dropzone-filename d-block" title="some_image_file_name.jpg">
                                            <span data-dz-name>some_image_file_name.jpg</span>
                                            <strong>(<span data-dz-size>340kb</span>)</strong>
                                        </a>
                                        <div class="dropzone-error" data-dz-errormessage></div>
                                    </div>
                                    <!--end::File-->
                                </div>
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Dropzone-->
                        @if(count($photo_attachments) == 0)
                        <!--begin::Hint-->
                        <span class="form-text text-muted">
                            No attachments found.
                        </span>
                        <!--end::Hint-->
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <!--begin::Label-->
                        <div class="fw-bold fs-6 text-gray-400 mb-5">Address Proof</div>
                        <!--end::Label-->
                        <!--begin::Dropzone-->
                        <div class="dropzone dropzone-queue mb-2" id="kt_dropzonejs_address">
                            <!--begin::Controls-->
                            <div class="dropzone-panel mb-lg-0 mb-2 d-none">
                                <a class="dropzone-select btn btn-sm btn-primary me-2">Attach files</a>
                                <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove
                                    All</a>
                            </div>
                            <!--end::Controls-->

                            <!--begin::Items-->
                            <div class="dropzone-items wm-200px">
                                <div class="dropzone-item" style="display:none">
                                    <!--begin::File-->
                                    <div class="dropzone-file">
                                        <a href="#" class="dropzone-filename d-block" title="some_image_file_name.jpg">
                                            <span data-dz-name>some_image_file_name.jpg</span>
                                            <strong>(<span data-dz-size>340kb</span>)</strong>
                                        </a>
                                        <div class="dropzone-error" data-dz-errormessage></div>
                                    </div>
                                    <!--end::File-->
                                </div>
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Dropzone-->
                        @if(count($address_attachments) == 0)
                        <!--begin::Hint-->
                        <span class="form-text text-muted">
                            No attachments found.
                        </span>
                        <!--end::Hint-->
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <!--begin::Label-->
                        <div class="fw-bold fs-6 text-gray-400 mb-5">Marksheets</div>
                        <!--end::Label-->
                        <!--begin::Dropzone-->
                        <div class="dropzone dropzone-queue mb-2" id="kt_dropzonejs_marksheets">
                            <!--begin::Controls-->
                            <div class="dropzone-panel mb-lg-0 mb-2 d-none">
                                <a class="dropzone-select btn btn-sm btn-primary me-2">Attach files</a>
                                <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove
                                    All</a>
                            </div>
                            <!--end::Controls-->

                            <!--begin::Items-->
                            <div class="dropzone-items wm-200px">
                                <div class="dropzone-item" style="display:none">
                                    <!--begin::File-->
                                    <div class="dropzone-file">
                                        <a href="#" class="dropzone-filename d-block" title="some_image_file_name.jpg">
                                            <span data-dz-name>some_image_file_name.jpg</span>
                                            <strong>(<span data-dz-size>340kb</span>)</strong>
                                        </a>
                                        <div class="dropzone-error" data-dz-errormessage></div>
                                    </div>
                                    <!--end::File-->
                                </div>
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Dropzone-->
                        @if(count($marksheet_attachments) == 0)
                        <!--begin::Hint-->
                        <span class="form-text text-muted">
                            No attachments found.
                        </span>
                        <!--end::Hint-->
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>