@extends('layouts.master')

@section('content')
<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex fw-bold fs-3 flex-column justify-content-center my-0">
                    Report filters
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ env('APP_URL') . '/' . Auth::user()->role }}" class="text-primary text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Report</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0">
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0" id="table_filter">
                    <form class="mx-auto mw-800px w-100 pt-15 pb-10" novalidate="novalidate" action="{{route('admin.report.view')}}" id="kt_create_report_form" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold">Status:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div>
                                        <select name="status" multiple="multiple" class="form-select form-select-solid filter-option" data-kt-select2="true" data-placeholder="Select option" data-filter-type="text-multiple" data-filter-target="applications.status" data-dropdown-parent="#table_filter" data-allow-clear="true" data-multiple="true">
                                            <option></option>
                                            <option value="=,pending">Pending</option>
                                            <option value="=,processing" selected>Processing</option>
                                            <option value="=,approved" selected>Approved</option>
                                            <option value="=,rejected">Rejected</option>
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold">Application Date:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div>
                                        <input name="date_range" class="form-control form-control-solid datetimepicker-input" placeholder="Pick date range" />
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="mb-10 fv-row">
                                    <label class="form-label mb-3 ">State</label>
                                    <select name="communication_state" class="form-select form-select-lg form-select-solid state_inputs filter-option" data-control="select2" data-placeholder="Please Select" data-filter-type="text" data-filter-target="applications.communication_state">
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <div class="mb-10 fv-row">
                                    <label class="form-label mb-3 ">City</label>
                                    <select name="communication_city" class="form-select form-select-lg form-select-solid city_inputs filter-option" data-control="select2" data-placeholder="Please Select" data-filter-type="text-multiple" data-filter-target="applications.communication_city" multiple>
                                    </select>
                                    <div class="fv-plugins message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3 ">Gender</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="gender" class="form-select form-select-lg form-select-solid filter-option" data-control="select2" data-placeholder="Please select" data-filter-type="text" data-filter-target="applications.gender">
                                        <option value="">Please select</option>
                                        <option value="=,male">
                                            Male</option>
                                        <option value="=,female">
                                            Female</option>
                                        <option value="=,other">
                                            Other</option>
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
                                    <label class="form-label mb-3 ">Caste</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="caste" class="form-select form-select-lg form-select-solid filter-option" data-control="select2" data-placeholder="Please select" data-filter-type="text" data-filter-target="applications.caste">
                                        <option value="">Please select</option>
                                        <option value="=,general">
                                            General</option>
                                        <option value="=,sc">
                                            SC</option>
                                        <option value="=,st">
                                            ST</option>
                                        <option value="=,obc">
                                            OBC</option>
                                        <option value="=,others">
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
                                    <label class="form-label mb-3 ">Field of Study</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="field" class="form-select form-select-lg form-select-solid filter-option" data-control="select2" data-placeholder="Please select" data-filter-type="text" data-filter-target="applications.field">
                                        <option value="">Please Select</option>
                                        <option value="=,Engineering">
                                            Engineering</option>
                                        <option value="=,Arts &amp; Science (Arts stream)">
                                            Arts &amp; Science (Arts stream)</option>
                                        <option value="=,Arts &amp; science (Science stream)">
                                            Arts &amp; science (Science stream)</option>
                                        <option value="=,Arts and Science (Commerce)">
                                            Arts and Science (Commerce)</option>
                                        <option value="=,Agriculture">
                                            Agriculture</option>
                                        <option value="=,Fisheries">
                                            Fisheries</option>
                                        <option value="=,Veternary">
                                            Veternary</option>
                                        <option value="=,Medicine (Allopathy, Auyrvedic, Siddha, Homeopathy)">
                                            Medicine (Allopathy, Auyrvedic, Siddha, Homeopathy)</option>
                                        <option value="=,Nursing/Paramedical">
                                            Nursing/Paramedical</option>
                                        <option value="=,Law">
                                            Law</option>
                                        <option value="=,Dental/optholmology/ Psychotherp../Pharmacy">
                                            Dental/optholmology/ Psychotherp../Pharmacy</option>
                                        <option value="=,Others">
                                            Others</option>
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" id="reset_filter">Reset</button>
                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true" id="apply_filter">Apply</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
<!--end::Content wrapper-->
@endsection

@section('pagespecificdrawers')
@stop

@section('pagespecificmodals')
@stop


@section('pagespecificstyles')
<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Vendor Stylesheets-->
@stop

@section('pagespecificscripts')
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('plugins/custom/datatables/responsive.bootstrap.min.js')}}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{asset('js/report/index.js')}}"></script>
<script src="{{asset('js/report/cities.js')}}"></script>
<!--end::Custom Javascript-->
@stop