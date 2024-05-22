@extends('layouts.master')

@section('content')
<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex fw-bold fs-3 flex-column justify-content-center my-0">
                    Programme Details
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{env('APP_URL') . '/' . Auth::user()->role}}" class="text-muted text-hover-primary">
                            {{ucfirst(Auth::user()->role)}}
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Programme</li>
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
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-17">
                    <!--begin::Meet-->
                    <div class="mb-18">
                        <!--begin::Wrapper-->
                        <div class="mb-11">
                            <!--begin::Top-->
                            <div class="text-center mb-18">
                                <!--begin::Title-->
                                <h3 class="fs-2hx text-dark mb-6">
                                    TNEDII Admission 2024-25
                                </h3>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fs-5 text-muted fw-semibold">
                                    PG Diploma Entrepreneurship Development & Innovation
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Top-->
                            <!--begin::Overlay-->
                            <div class="overlay">
                                <!--begin::Image-->
                                <img class="w-100 card-rounded" src="{{asset('media/stock/1600x800/img-1.jpg')}}"
                                    alt="">
                                <!--end::Image-->
                            </div>
                            <!--end::Overlay-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Description-->
                        <div class="fs-5 fw-semibold text-gray-600 mt-10">
                            <h2>Fee Structure:</h2>
                            <!--begin::Text-->
                            <table class="table table-striped mt-8">
                                <thead>
                                    <tr>
                                        <th scope="col">Programme</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Fee</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Programme 1</td>
                                        <td>1 year</td>
                                        <td>Rs. 10000</td>
                                    </tr>
                                    <tr>
                                        <td>Programme 2</td>
                                        <td>2 years</td>
                                        <td>Rs. 20000</td>
                                    </tr>
                                    <tr>
                                        <td>Programme 3</td>
                                        <td>3 years</td>
                                        <td>Rs. 30000</td>
                                    </tr>
                            </table>
                            <!--end::Text-->
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Meet-->
                    <!--begin::Join-->
                    <div class="text-center mb-20">
                        <!--begin::Action-->
                        <a href="#" class="btn btn-primary mb-5">Download Brochure</a>
                        <!--end::Action-->
                    </div>
                    <!--end::Join-->
                    <!--begin::Card-->
                    <div class="card mb-4 bg-light text-center">
                        <!--begin::Body-->
                        <div class="card-body py-12">
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="{{asset('media/svg/brand-logos/facebook-4.svg')}}" class="h-30px my-2" alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="{{asset('media/svg/brand-logos/instagram-2-1.svg')}}" class="h-30px my-2"
                                    alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="{{asset('media/svg/brand-logos/github.svg')}}" class="h-30px my-2" alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="{{asset('media/svg/brand-logos/behance.svg')}}" class="h-30px my-2" alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="{{asset('media/svg/brand-logos/pinterest-p.svg')}}" class="h-30px my-2"
                                    alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="{{asset('media/svg/brand-logos/twitter.svg')}}" class="h-30px my-2" alt="">
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="#" class="mx-4">
                                <img src="{{asset('media/svg/brand-logos/dribbble-icon-1.svg')}}" class="h-30px my-2"
                                    alt="">
                            </a>
                            <!--end::Icon-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Body-->
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
@stop