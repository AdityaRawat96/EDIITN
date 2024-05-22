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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard
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
                    <li class="breadcrumb-item text-muted">Dashboard</li>
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
        <div id="kt_app_content_container" class="app-container container-xxl student_dashboard">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-body pt-9 pb-0">
                            <!--begin::Details-->
                            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                                <!--begin: Pic-->
                                <div class="me-7 mb-4">
                                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                        <img src="{{isset($user->avatar) ? asset('storage/'.$user->avatar) : asset('media/svg/avatars/blank.svg')}}"
                                            alt="image" />
                                    </div>
                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="flex-grow-1">
                                    <!--begin::Title-->
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2 mt-5">
                                        <!--begin::User-->
                                        <div class="d-flex flex-column">
                                            <!--begin::Name-->
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="#"
                                                    class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{$user->first_name}}
                                                    {{$user->middle_name}} {{$user->last_name}}</a>
                                                @if($user->role == "admin")
                                                <a href="#">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                            height="24px" viewBox="0 0 24 24">
                                                            <path
                                                                d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                                fill="white" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                @endif
                                            </div>
                                            <!--end::Name-->
                                            <!--begin::Info-->
                                            <div class="fw-semibold fs-6 mb-4 pe-2">
                                                @if($user->role == 'admin')
                                                <a href="#"
                                                    class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                                fill="currentColor" />
                                                            <rect x="7" y="6" width="4" height="4" rx="2"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Administrator
                                                </a>
                                                @endif
                                                <a href="#"
                                                    class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                                                fill="currentColor" />
                                                            <path opacity="0.3"
                                                                d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    +91 {{$user->phone}}
                                                </a>
                                                <a href="#"
                                                    class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    {{$user->email}}
                                                </a>
                                                <a href="#"
                                                    class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    {{$user->application->program}}
                                                </a>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Details-->
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <?php
                    $status = $user->application->status;
                    $background = 'bg-warning';
                    if ($status == 'pending') {
                        $background = 'bg-warning';
                    } elseif ($status == 'processing') {
                        $background = 'bg-primary';
                    } elseif ($status == 'approved') {
                        $background = 'bg-success';
                    } elseif ($status == 'rejected') {
                        $background = 'bg-danger';
                    }
                    ?>
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 mb-5 mb-xl-10 {{$background}}"
                        style="background-image: url('{{asset(`/media/svg/shapes/top-green.png`)}}">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">

                                <!--begin::Subtitle-->
                                <span class="text-white opacity-70 pt-1 fw-semibold fs-6">Application ID:</span>
                                <!--end::Subtitle-->
                                <!--begin::Amount-->
                                <span
                                    class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{$user->application->app_no}}</span>
                                <!--end::Amount-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex pt-0">
                            @if($user->application->status == 'pending')
                            <!--begin::Progress-->
                            <div class="d-flex align-items-end justify-content-end h-100 flex-column mt-3 w-100">
                                <a href="{{route('student.application.edit', $user->application->id)}}"
                                    class="btn bg-white text-dark">Complete Application</a>
                            </div>
                            <!--end::Progress-->
                            @elseif($user->application->status == 'processing')
                            <!--begin::Progress-->
                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                <div class="d-flex justify-content-between fw-bold fs-6 text-white w-100 mt-auto mb-2">
                                    <span class="text-white text-md">Status summary:</span>
                                    <span>{{ucfirst($user->application->status)}}</span>
                                </div>
                                <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                                    <div class="bg-info rounded h-8px" role="progressbar" style="width: 50%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end::Progress-->
                            @elseif($user->application->status == 'approved')
                            <!--begin::Progress-->
                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                <div class="d-flex justify-content-between fw-bold fs-6 text-white w-100 mt-auto mb-2">
                                    <span class="text-white text-md">Status summary:</span>
                                    <span>{{ucfirst($user->application->status)}}</span>
                                </div>
                                <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                                    <div class="bg-info rounded h-8px" role="progressbar" style="width: 100%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end::Progress-->
                            @elseif($user->application->status == 'rejected')
                            <!--begin::Progress-->
                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                <div class="d-flex justify-content-between fw-bold fs-6 text-white w-100 mt-auto mb-2">
                                    <span class="text-white text-md">Status summary:</span>
                                    <span>{{ucfirst($user->application->status)}}</span>
                                </div>
                                <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                                    <div class="bg-info rounded h-8px" role="progressbar" style="width: 100%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end::Progress-->
                            @endif

                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 col-lg-12">
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
                                                        <a href="{{ $file_url }}"
                                                            class="fs-6 text-hover-primary fw-bold" target="_blank"
                                                            download="{{ $attachment->name }}">
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
                </div>
            </div>
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
<!--end::Vendor Stylesheets-->
@stop

@section('pagespecificscripts')
<!--begin::Vendors Javascript(used for this page only)-->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{asset('js/dashboard/index.js')}}"></script>
<!--end::Custom Javascript-->
@stop