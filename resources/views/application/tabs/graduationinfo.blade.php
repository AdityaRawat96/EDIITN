<!--begin::Step 3-->
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
            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Field of Study</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="field" class="form-select form-select-lg form-select-solid" data-control="select2"
                        data-placeholder="Please select">
                        <option value="">Please Select</option>
                        <option value="Engineering"
                            {{ isset($application->field) && $application->field == 'Engineering' ? 'selected' : null }}>
                            Engineering</option>
                        <option value="Arts &amp; Science (Arts stream)"
                            {{ isset($application->field) && $application->field == 'Arts & Science (Arts stream)' ? 'selected' : null }}>
                            Arts &amp; Science (Arts stream)</option>
                        <option value="Arts &amp; science (Science stream)"
                            {{ isset($application->field) && $application->field == 'Arts & science (Science stream)' ? 'selected' : null }}>
                            Arts &amp; science (Science stream)</option>
                        <option value="Arts and Science (Commerce)"
                            {{ isset($application->field) && $application->field == 'Arts and Science (Commerce)' ? 'selected' : null }}>
                            Arts and Science (Commerce)</option>
                        <option value="Agriculture"
                            {{ isset($application->field) && $application->field == 'Agriculture' ? 'selected' : null }}>
                            Agriculture</option>
                        <option value="Fisheries"
                            {{ isset($application->field) && $application->field == 'Fisheries' ? 'selected' : null }}>
                            Fisheries</option>
                        <option value="Veternary"
                            {{ isset($application->field) && $application->field == 'Veternary' ? 'selected' : null }}>
                            Veternary</option>
                        <option value="Medicine (Allopathy, Auyrvedic, Siddha, Homeopathy)"
                            {{ isset($application->field) && $application->field == 'Medicine (Allopathy, Auyrvedic, Siddha, Homeopathy)' ? 'selected' : null }}>
                            Medicine (Allopathy, Auyrvedic, Siddha, Homeopathy)</option>
                        <option value="Nursing/Paramedical"
                            {{ isset($application->field) && $application->field == 'Nursing/Paramedical' ? 'selected' : null }}>
                            Nursing/Paramedical</option>
                        <option value="Law"
                            {{ isset($application->field) && $application->field == 'Law' ? 'selected' : null }}>
                            Law</option>
                        <option value="Dental/optholmology/ Psychotherp../Pharmacy"
                            {{ isset($application->field) && $application->field == 'Dental/optholmology/ Psychotherp../Pharmacy' ? 'selected' : null }}>
                            Dental/optholmology/ Psychotherp../Pharmacy</option>
                        <option value="Others"
                            {{ isset($application->field) && $application->field == 'Others' ? 'selected' : null }}>
                            Others</option>
                    </select>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Qualification</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="qualification" class="form-select form-select-lg form-select-solid"
                        data-control="select2" data-placeholder="Please select">
                        <option value="">Please Select</option>
                        <option value="UG"
                            {{ isset($application->qualification) && $application->qualification == 'UG' ? 'selected' : null }}>
                            UG</option>
                        <option value="PG"
                            {{ isset($application->qualification) && $application->qualification == 'PG' ? 'selected' : null }}>
                            PG</option>
                        <option value="Final Year (Student)"
                            {{ isset($application->qualification) && $application->qualification == 'Final Year (Student)' ? 'selected' : null }}>
                            Final Year (Student)</option>
                    </select>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>

            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Name of the University</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="university" class="form-select form-select-lg form-select-solid"
                        data-control="select2" data-placeholder="Please select">
                        <option value="">Please Select</option>
                        <option value="Anna University, Chennai"
                            {{ isset($application->university) && $application->university == 'Anna University, Chennai' ? 'selected' : null }}>
                            Anna University, Chennai</option>
                        <option value="Tamil Nadu Dr. M.G.R. Medical University, Chennai"
                            {{ isset($application->university) && $application->university == 'Tamil Nadu Dr. M.G.R. Medical University, Chennai' ? 'selected' : null }}>
                            Tamil Nadu Dr. M.G.R. Medical University, Chennai</option>
                        <option value="Tamil Nadu Agricultural University, Coimbatore"
                            {{ isset($application->university) && $application->university == 'Tamil Nadu Agricultural University, Coimbatore' ? 'selected' : null }}>
                            Tamil Nadu Agricultural University, Coimbatore</option>
                        <option value="Tamil Nadu Veterinary and Animal Sciences University, Chennai"
                            {{ isset($application->university) && $application->university == 'Tamil Nadu Veterinary and Animal Sciences University, Chennai' ? 'selected' : null }}>
                            Tamil Nadu Veterinary and Animal Sciences University, Chennai</option>
                        <option value="Tamil Nadu Open University, Chennai"
                            {{ isset($application->university) && $application->university == 'Tamil Nadu Open University, Chennai' ? 'selected' : null }}>
                            Tamil Nadu Open University, Chennai</option>
                        <option value="Tamil Nadu Physical Education and Sports University, Chennai"
                            {{ isset($application->university) && $application->university == 'Tamil Nadu Physical Education and Sports University, Chennai' ? 'selected' : null }}>
                            Tamil Nadu Physical Education and Sports University, Chennai</option>
                        <option value="Tamil Nadu Teachers Education University, Chennai"
                            {{ isset($application->university) && $application->university == 'Tamil Nadu Teachers Education University, Chennai' ? 'selected' : null }}>
                            Tamil Nadu Teachers Education University, Chennai</option>
                        <option value="Tamil Nadu Music and Fine Arts University, Chennai"
                            {{ isset($application->university) && $application->university == 'Tamil Nadu Music and Fine Arts University, Chennai' ? 'selected' : null }}>
                            Tamil Nadu Music and Fine Arts University, Chennai</option>
                        <option value="Tamil Nadu National Law School, Srirangam"
                            {{ isset($application->university) && $application->university == 'Tamil Nadu National Law School, Srirangam' ? 'selected' : null }}>
                            Tamil Nadu National Law School, Srirangam</option>
                        <option value="Tamil Nadu Fisheries University, Nagapattinam"
                            {{ isset($application->university) && $application->university == 'Tamil Nadu Fisheries University, Nagapattinam' ? 'selected' : null }}>
                            Tamil Nadu Fisheries University, Nagapattinam</option>
                        <option value="Bharathiar University, Coimbatore"
                            {{ isset($application->university) && $application->university == 'Bharathiar University, Coimbatore' ? 'selected' : null }}>
                            Bharathiar University, Coimbatore</option>
                        <option value="Madras University, Chennai"
                            {{ isset($application->university) && $application->university == 'Madras University, Chennai' ? 'selected' : null }}>
                            Madras University, Chennai</option>
                        <option value="Madurai Kamaraj University, Madurai"
                            {{ isset($application->university) && $application->university == 'Madurai Kamaraj University, Madurai' ? 'selected' : null }}>
                            Madurai Kamaraj University, Madurai</option>
                        <option value="Manonmaniam Sundaranar University, Tirunelveli"
                            {{ isset($application->university) && $application->university == 'Manonmaniam Sundaranar University, Tirunelveli' ? 'selected' : null }}>
                            Manonmaniam Sundaranar University, Tirunelveli</option>
                        <option value="Periyar University, Salem"
                            {{ isset($application->university) && $application->university == 'Periyar University, Salem' ? 'selected' : null }}>
                            Periyar University, Salem</option>
                        <option value="Thiruvalluvar University, Vellore"
                            {{ isset($application->university) && $application->university == 'Thiruvalluvar University, Vellore' ? 'selected' : null }}>
                            Thiruvalluvar University, Vellore</option>
                        <option value="Bharath Institute of Higher Education and Research (BIHER), Chennai"
                            {{ isset($application->university) && $application->university == 'Bharath Institute of Higher Education and Research (BIHER), Chennai' ? 'selected' : null }}>
                            Bharath Institute of Higher Education and Research (BIHER), Chennai</option>
                        <option value="Vellore Institute of Technology (VIT), Vellore"
                            {{ isset($application->university) && $application->university == 'Vellore Institute of Technology (VIT), Vellore' ? 'selected' : null }}>
                            Vellore Institute of Technology (VIT), Vellore</option>
                        <option value="SRM Institute of Science and Technology (SRMIST), Chennai"
                            {{ isset($application->university) && $application->university == 'SRM Institute of Science and Technology (SRMIST), Chennai' ? 'selected' : null }}>
                            SRM Institute of Science and Technology (SRMIST), Chennai</option>
                        <option value="SASTRA Deemed University, Thanjavur"
                            {{ isset($application->university) && $application->university == 'SASTRA Deemed University, Thanjavur' ? 'selected' : null }}>
                            SASTRA Deemed University, Thanjavur</option>
                        <option value="Amrita Vishwa Vidyapeetham, Coimbatore"
                            {{ isset($application->university) && $application->university == 'Amrita Vishwa Vidyapeetham, Coimbatore' ? 'selected' : null }}>
                            Amrita Vishwa Vidyapeetham, Coimbatore</option>
                        <option value="Saveetha Institute of Medical and Technical Sciences (SIMATS), Chennai"
                            {{ isset($application->university) && $application->university == 'Saveetha Institute of Medical and Technical Sciences (SIMATS), Chennai' ? 'selected' : null }}>
                            Saveetha Institute of Medical and Technical Sciences (SIMATS), Chennai</option>
                        <option value="Karunya Institute of Technology and Sciences, Coimbatore"
                            {{ isset($application->university) && $application->university == 'Karunya Institute of Technology and Sciences, Coimbatore' ? 'selected' : null }}>
                            Karunya Institute of Technology and Sciences, Coimbatore</option>
                        <option value="Kalasalingam Academy of Research and Higher Education (KARE), Virudhunagar"
                            {{ isset($application->university) && $application->university == 'Kalasalingam Academy of Research and Higher Education (KARE), Virudhunagar' ? 'selected' : null }}>
                            Kalasalingam Academy of Research and Higher Education (KARE), Virudhunagar</option>
                        <option
                            value="Vel Tech Rangarajan Dr. Sagunthala R&amp;D Institute of Science and Technology, Chennai"
                            {{ isset($application->university) && $application->university == 'Vel Tech Rangarajan Dr. Sagunthala R&amp;D Institute of Science and Technology, Chennai' ? 'selected' : null }}>
                            Vel Tech Rangarajan Dr. Sagunthala R&amp;D Institute of Science and Technology, Chennai
                        </option>
                        <option value="Sri Ramachandra Institute of Higher Education and Research (SRIHER), Chennai"
                            {{ isset($application->university) && $application->university == 'Sri Ramachandra Institute of Higher Education and Research (SRIHER), Chennai' ? 'selected' : null }}>
                            Sri Ramachandra Institute of Higher Education and Research (SRIHER), Chennai</option>
                    </select>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>

            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Name of the Degree</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="degree_name" id="degree_name"
                        class="form-control form-control-lg form-control-solid" placeholder="Enter name of the degree"
                        value="{{ isset($application->degree_name) ? $application->degree_name : null }}" />
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>

            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Year of Completion</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="graduation_year" id="graduation_year"
                        class="form-control form-control-lg form-control-solid" placeholder="Enter year of completion"
                        value="{{ isset($application->graduation_year) ? $application->graduation_year : null }}" />
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>

            <div class="col-md-12 col-lg-6">
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Percentage of Marks / Grade</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="percentage_grade" id="percentage_grade"
                        class="form-control form-control-lg form-control-solid" placeholder="Enter marks or grade"
                        value="{{ isset($application->percentage_grade) ? $application->percentage_grade : null }}" />
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
        </div>
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Step 3-->