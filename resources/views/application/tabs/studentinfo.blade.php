<!--begin::Step 2-->
<div data-kt-stepper-element="content">
    <!--begin::Wrapper-->
    <div class="w-100">
        <!--begin::Heading-->
        <div class="pb-10 pb-lg-15">
            <!--begin::Title-->
            <h2 class="fw-bold text-dark">Account Info</h2>
            <!--end::Title-->
            <!--begin::Notice-->
            <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                <a href="#" class="link-primary fw-bold">Help Page</a>.
            </div>
            <!--end::Notice-->
        </div>
        <!--end::Heading-->
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">First Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="first_name" id="first_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter first name" value="{{isset($application->first_name) ? $application->first_name : null}}" />
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            <div class="col-md-12 col-lg-4">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label
                        mb-3 required">Middle Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="middle_name" id="middle_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter middle name" value="{{isset($application->middle_name) ? $application->middle_name : null}}" />
                    <div class="fv-plugins message-container invalid-feedback"></div>
                    <!--end::Input-->

                </div>
                <!--end::Input group-->
            </div>
            <div class="col-md-12 col-lg-4">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label
                        mb-3 required">Last Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="last_name" id="last_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter last name" value="{{isset($application->last_name) ? $application->last_name : null}}" />
                    <div class="fv-plugins message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Date of Birth</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter date of birth" value="{{isset($application->date_of_birth) ? $application->date_of_birth : null}}" />
                    <div class="fv-plugins
                        message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Gender</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="gender" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Please select">
                        <option value="">Please select</option>
                        <option value="male" {{isset($application->gender) && $application->gender == 'male' ? 'selected' : null}}>
                            Male</option>
                        <option value="female" {{isset($application->gender) && $application->gender == 'female' ? 'selected' : null}}>
                            Female</option>
                        <option value="other" {{isset($application->gender) && $application->gender == 'other' ? 'selected' : null}}>
                            Other</option>
                    </select>
                    <div class="fv-plugins message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Email</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="email" name="email" id="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter email" value="{{isset($application->email) ? $application->email : null}}" />
                    <div class="fv-plugins
                        message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Caste</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="caste" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Please select">
                        <option value="">Please select</option>
                        <option value="general" {{isset($application->caste) && $application->caste == 'general' ? 'selected' : null}}>
                            General</option>
                        <option value="sc" {{isset($application->caste) && $application->caste == 'sc' ? 'selected' : null}}>
                            SC</option>
                        <option value="st" {{isset($application->caste) && $application->caste == 'st' ? 'selected' : null}}>
                            ST</option>
                        <option value="obc" {{isset($application->caste) && $application->caste == 'obc' ? 'selected' : null}}>
                            OBC</option>
                        <option value="others" {{isset($application->caste) && $application->caste == 'others' ? 'selected' : null}}>
                            Others</option>
                    </select>
                    <div class="fv-plugins message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Religion</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="religion" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Please select">
                        <option value="">Please select</option>
                        <option value="hindu" {{isset($application->religion) && $application->religion == 'hindu' ? 'selected' : null}}>
                            Hindu</option>
                        <option value="muslim" {{isset($application->religion) && $application->religion == 'muslim' ? 'selected' : null}}>
                            Muslim</option>
                        <option value="christian" {{isset($application->religion) && $application->religion == 'christian' ? 'selected' : null}}>
                            Christian</option>
                        <option value="sikh" {{isset($application->religion) && $application->religion == 'sikh' ? 'selected' : null}}>
                            Sikh</option>
                        <option value="others" {{isset($application->religion) && $application->religion == 'others' ? 'selected' : null}}>
                            Others</option>
                    </select>
                    <div class="fv-plugins message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Nationality</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="nationality" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Please select">
                        <option value="">Please select</option>
                        <option value="indian" {{isset($application->nationality ) && $application->nationality == 'indian' ? 'selected' : null}}>
                            Indian</option>
                        <option value="others" {{isset($application->nationality ) && $application->nationality == 'others' ? 'selected' : null}}>
                            Others</option>
                    </select>
                    <div class="fv-plugins message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Are you differently abled?</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="differently_abled" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Please select">
                        <option value="">Please select</option>
                        <option value="yes" {{isset($application->differently_abled) && $application->differently_abled == 'yes' ? 'selected' : null}}>
                            Yes</option>
                        <option value="no" {{isset($application->differently_abled) && $application->differently_abled == 'no' ? 'selected' : null}}>
                            No</option>
                    </select>
                    <div class="fv-plugins message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
        </div>
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Step 2-->