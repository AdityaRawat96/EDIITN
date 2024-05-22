<!--begin::Step 7-->
<div data-kt-stepper-element="content">
    <!--begin::Wrapper-->
    <div class="w-100">
        <!--begin::Heading-->
        <div class="pb-8 pb-lg-10">
            <!--begin::Title-->
            <h2 class="fw-bold text-dark">Application process completed!</h2>
            <!--end::Title-->
            <!--begin::Notice-->
            <div class="text-muted fw-semibold fs-6 mt-10">Your application ID is - <span
                    id="application_id">{{$application->id}}</span>

            </div>
            <!--end::Notice-->
        </div>
        <!--end::Heading-->
        <!--begin::Body-->
        <div class="mb-0">
            <!--begin::Text-->
            <div class="fs-6 text-gray-600 mb-5">
                We have received your application and it is currently being processed. You will receive an email once
                the information has been verified.
                In the meantime keep checking the status of your application <a
                    href="{{route('student.dashboard.view')}}" class="link-primary fw-bold">here</a>.
            </div>
            <!--end::Text-->
            <!--begin::Alert-->
            <!--end::Alert-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Step 7-->