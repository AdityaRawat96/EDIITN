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
                    Notifications
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
                    <li class="breadcrumb-item text-muted">Notifications</li>
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
                <div class="card-body">
                    @if(count($notifications) > 0)
                    <div class="timeline">
                        @foreach($notifications as $notification)
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/coding/cod008.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="mb-5 pe-3">
                                    <!--begin::Time-->
                                    <div class="d-flex align-items-center mt-1 fs-6 mb-2">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-semibold text-gray-800 text-hover-primary mb-2">
                                        {{ $notification->title }}
                                    </a>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <p class="text-muted me-2">
                                            {{ $notification->description }}
                                        </p>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                @if($notification->attachments && count($notification->attachments) > 0)
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                        @foreach($notification->attachments as $attachment)
                                        <?php
                                        $mime = explode('/', $attachment->mime_type);
                                        if ($mime[0] == 'image') {
                                            $icon = 'blank-image';
                                        } else if ($mime[1] == 'pdf') {
                                            $icon = 'pdf';
                                        } else {
                                            $icon = 'doc';
                                        }

                                        $size = $attachment->size;
                                        if ($size < 1024) {
                                            $size = $size . 'b';
                                        } else if ($size < 1048576) {
                                            $size = round($size / 1024, 2) . 'kb';
                                        } else {
                                            $size = round($size / 1048576, 2) . 'mb';
                                        }

                                        $file_url = asset('storage/' . $attachment->url);
                                        ?>
                                        <!--begin::Item-->
                                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                            <!--begin::Icon-->
                                            <img alt="" class="w-30px me-3"
                                                src="{{asset('/media/svg/files/'.$icon.'.svg')}}">
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="ms-1 fw-semibold">
                                                <!--begin::Desc-->
                                                <a href="{{ $file_url }}" class="fs-6 text-hover-primary fw-bold"
                                                    target="_blank" download="{{ $attachment->name }}">
                                                    {{ $attachment->name }}
                                                </a>
                                                <!--end::Desc-->
                                                <!--begin::Number-->
                                                <div class="text-gray-400">
                                                    {{ $size }}
                                                </div>
                                                <!--end::Number-->
                                            </div>
                                            <!--begin::Info-->
                                        </div>
                                        <!--end::Item-->
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Timeline details-->
                                @endif
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        @endforeach
                    </div>
                    @else
                    <div class="text-center my-10">
                        <h4 class="text-muted">No notifications available at this time.</h4>
                    </div>
                    @endif
                </div>
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
<script src="{{asset('js/notification/index.js')}}"></script>
<!--end::Custom Javascript-->
@stop