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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">TNEDII
                    Admission 2024-25</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        PG Diploma Entrepreneurship Development &
                        Innovation
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
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
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
                        <!--begin::Nav-->
                        <div class="stepper-nav mb-5">
                            <!--begin::Step 1-->
                            <div class="stepper-item current" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Instructions</h3>
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Student Info</h3>
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 3-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Graduation Info</h3>
                            </div>
                            <!--end::Step 3-->
                            <!--begin::Step 4-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Personal Details</h3>
                            </div>
                            <!--end::Step 4-->
                            <!--begin::Step 5-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Documents Upload</h3>
                            </div>
                            <!--end::Step 5-->
                            <!--begin::Step 6-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Declaration</h3>
                            </div>
                            <!--end::Step 6-->
                            <!--begin::Step 7-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Completed</h3>
                            </div>
                            <!--end::Step 7-->
                        </div>
                        <!--end::Nav-->
                        <!--begin::Form-->
                        <form class="mx-auto mw-800px w-100 pt-15 pb-10" novalidate="novalidate" action="{{isset($application) ? route(Auth::user()->role . '.application.update', $application->id) : route(Auth::user()->role . '.application.store')}}" id="kt_create_account_form" method="{{isset($application) ? 'PUT' : 'POST'}}" enctype="multipart/form-data">

                            @include('application.tabs.instructions')
                            @include('application.tabs.studentinfo')
                            @include('application.tabs.graduationinfo')
                            @include('application.tabs.personalinfo')
                            @include('application.tabs.documentsupload')
                            @include('application.tabs.declaration')
                            @include('application.tabs.completed')

                            <!--begin::Actions-->
                            <div class="d-flex flex-stack pt-15">
                                <!--begin::Wrapper-->
                                <div class="mr-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                                <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Back
                                    </button>
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                                <div>
                                    <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                                        <span class="indicator-label">Submit
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                            <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                        <span class="svg-icon svg-icon-4 ms-1 me-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Stepper-->
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
@stop

@section('pagespecificscripts')
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{asset('js/application/cities.js')}}"></script>
<script src="{{asset('js/application/create.js')}}"></script>
<!--end::Custom Javascript-->
@if(isset($application))
@foreach ($photo_attachments as $attach)
<?php
$path = Storage::url($attach->path) . $attach->url;
?>

<script>
    $("document").ready(() => {
        var path = "{{ $path }}";
        var fileSize = "{$fileSize}}";
        var file = new File([path], "{{ $attach->name }}", {
            type: "{{ $attach->mime_type }}",
            lastModified: "{{ $attach->updated_at }}",
            size: "{{ $attach->size }}" // Set file size in bytes
        });
        file['status'] = "added";
        file['_removeLink'] = "a.dz-remove";
        file['webkitRelativePath'] = "";
        file['accepted'] = true;
        file['dataURL'] = path;
        file['upload'] = {
            bytesSent: 0,
            filename: "{{ $attach->name }}",
            progress: 100,
            total: "{{ $attach->size }}", // Set total file size in bytes
            uuid: "{{ md5($attach->id) }}"
        };
        myDropzone_photo.emit("addedfile", file, path);
        myDropzone_photo.files.push(file);
    });
</script>
@endforeach
@foreach ($address_attachments as $attach)
<?php
$path = Storage::url($attach->path) . $attach->url;
?>

<script>
    $("document").ready(() => {
        var path = "{{ $path }}";
        var fileSize = "{$fileSize}}";
        var file = new File([path], "{{ $attach->name }}", {
            type: "{{ $attach->mime_type }}",
            lastModified: "{{ $attach->updated_at }}",
            size: "{{ $attach->size }}" // Set file size in bytes
        });
        file['status'] = "added";
        file['_removeLink'] = "a.dz-remove";
        file['webkitRelativePath'] = "";
        file['accepted'] = true;
        file['dataURL'] = path;
        file['upload'] = {
            bytesSent: 0,
            filename: "{{ $attach->name }}",
            progress: 100,
            total: "{{ $attach->size }}", // Set total file size in bytes
            uuid: "{{ md5($attach->id) }}"
        };
        myDropzone_address.emit("addedfile", file, path);
        myDropzone_address.files.push(file);
    });
</script>
@endforeach
@foreach ($marksheet_attachments as $attach)
<?php
$path = Storage::url($attach->path) . $attach->url;
?>

<script>
    $("document").ready(() => {
        var path = "{{ $path }}";
        var fileSize = "{$fileSize}}";
        var file = new File([path], "{{ $attach->name }}", {
            type: "{{ $attach->mime_type }}",
            lastModified: "{{ $attach->updated_at }}",
            size: "{{ $attach->size }}" // Set file size in bytes
        });
        file['status'] = "added";
        file['_removeLink'] = "a.dz-remove";
        file['webkitRelativePath'] = "";
        file['accepted'] = true;
        file['dataURL'] = path;
        file['upload'] = {
            bytesSent: 0,
            filename: "{{ $attach->name }}",
            progress: 100,
            total: "{{ $attach->size }}", // Set total file size in bytes
            uuid: "{{ md5($attach->id) }}"
        };
        myDropzone_marksheets.emit("addedfile", file, path);
        myDropzone_marksheets.files.push(file);
    });
</script>
@endforeach
@endif
@stop