"use strict";

// Class definition
var KTDatatablesServerSide = (function () {
    // Shared variables
    var table;
    var dt;
    var filter = [];

    // Private functions
    var initDatatable = function () {
        dt = $("#kt_datatable").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[0, "asc"]],
            stateSave: false,
            ajax: {
                url: `${siteURL}/${siteUserRole}/application`,
                data: function (d) {
                    d.filter = filter;
                },
            },
            columns: [
                { data: "app_no" },
                { data: "name" },
                { data: "phone" },
                { data: "communication_state" },
                { data: "status" },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    searchable: false,
                    className: "text-end",
                    render: function (data) {
                        let actions = `
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm d-flex gap-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                Actions
                                <span class="svg-icon fs-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="${siteURL}/${siteUserRole}/application/${data.id}" class="menu-link px-3" data-kt-docs-table-filter="view_row">
                                        View
                                    </a>
                                </div>
                                <!--end::Menu item-->`;

                        if (siteUserPrivilege == "superadmin") {
                            actions += `<!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="${siteURL}/${siteUserRole}/application/${data.id}/edit" class="menu-link px-3" data-kt-docs-table-filter="edit_row">
                                                Edit
                                            </a>
                                        </div>
                                        <!--end::Menu item-->`;
                        }

                        actions += `<!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="${siteURL}/${siteUserRole}/application/updateStatus/${
                            data.id
                        }" class="menu-link px-3 text-warning" data-kt-docs-table-filter="archive_row" data-value="${!data.archived}" data-id="${
                            data.id
                        }">
                                        ${
                                            data.archived
                                                ? "Unarchive"
                                                : "Archive"
                                        }
                                    </a>
                                </div>
                                <!--end::Menu item-->`;

                        if (siteUserPrivilege == "superadmin") {
                            actions += `
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="${siteURL}/${siteUserRole}/application/${data.id}" class="menu-link px-3 text-danger" data-kt-docs-table-filter="delete_row">
                                        Delete
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->`;
                        }

                        return actions;
                    },
                },
            ],
        });

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on("draw", function () {
            handleDeleteRows();
            handleArchiveRows();
            KTMenu.createInstances();
        });
    };

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector(
            '[data-kt-docs-table-filter="search"]'
        );
        filterSearch.addEventListener("keyup", function (e) {
            dt.search(e.target.value).draw();
        });
    };

    var initDateRangeFilter = () => {
        var startDate = moment().subtract(1, "years").format("DD/MM/YYYY");
        var endDate = moment().format("DD/MM/YYYY");
        $(".datetimepicker-input").daterangepicker({
            timePicker: false,
            startDate: startDate,
            endDate: endDate,
            locale: {
                format: "DD/MM/YYYY",
            },
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [
                    moment().subtract(1, "days"),
                    moment().subtract(1, "days"),
                ],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [
                    moment().startOf("month"),
                    moment().endOf("month"),
                ],
                "Last Month": [
                    moment().subtract(1, "month").startOf("month"),
                    moment().subtract(1, "month").endOf("month"),
                ],
            },
        });

        $(".datetimepicker-input").change(
            "apply.daterangepicker",
            function (ev, picker) {
                // Get filter values
                var date_range = $(".datetimepicker-input").val().split(" - ");
                filter = {
                    start_date: moment(date_range[0], "DD/MM/YYYY").format(
                        "YYYY-MM-DD"
                    ),
                    end_date: moment(date_range[1], "DD/MM/YYYY").format(
                        "YYYY-MM-DD"
                    ),
                };
                setTimeout(() => {
                    $("#filterTriggerButton")[0].click();
                }, 50);
            }
        );
    };

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        var filterOptions = document.querySelectorAll(".filter-option");
        const applyFilterButton = document.querySelector("#apply_filter");
        const clearFilterButton = document.querySelector("#reset_filter");

        // Filter datatable on submit
        applyFilterButton.addEventListener("click", function () {
            // Get filter values
            filter = [];
            filterOptions.forEach((r) => {
                if (r.getAttribute("data-multiple") == "true") {
                    const selected = r.querySelectorAll("option:checked");
                    const values = Array.from(selected).map((el) => el.value);
                    values.forEach((v) => {
                        filter.push({
                            name: r.getAttribute("data-filter-target"),
                            type: r.getAttribute("data-filter-type"),
                            comparator: v.split(",")[0],
                            value: v.split(",")[1],
                        });
                    });
                } else if (r.value) {
                    filter.push({
                        name: r.getAttribute("data-filter-target"),
                        type: r.getAttribute("data-filter-type"),
                        comparator: r.value.split(",")[0],
                        value: r.value.split(",")[1],
                    });
                }
            });

            var date_range = $(".datetimepicker-input").val().split(" - ");
            var rangeFilter = {
                start_date: moment(date_range[0], "DD/MM/YYYY").format(
                    "YYYY-MM-DD"
                ),
                end_date: moment(date_range[1], "DD/MM/YYYY").format(
                    "YYYY-MM-DD"
                ),
            };
            filter.push({
                name: "application_date",
                type: "date",
                comparator: ">=",
                value: rangeFilter.start_date,
            });
            filter.push({
                name: "application_date",
                type: "date",
                comparator: "<=",
                value: rangeFilter.end_date,
            });

            dt.ajax.reload();
        });

        // Clear filter on reset
        clearFilterButton.addEventListener("click", function () {
            $(".filter-option").val(null).trigger("change");
            filter = [];
            dt.ajax.reload();
        });
    };

    // Delete record
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll(
            '[data-kt-docs-table-filter="delete_row"]'
        );

        deleteButtons.forEach((d) => {
            // Delete button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest("tr");

                // Get record name
                const recordName = parent.querySelectorAll("td")[0].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + recordName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: e.target.getAttribute("href"),
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            type: "DELETE", // application.destroy
                            success: function (result) {
                                // Do something with the result
                                Swal.fire({
                                    text: result.message,
                                    icon: "success",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                }).then(function (e) {
                                    // delete row data from server and re-draw datatable
                                    dt.draw();
                                });
                            },
                            error: function (err) {
                                // Do something with the error
                                Swal.fire({
                                    text: err.responseJSON.message,
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                            },
                        });
                    } else if (result.dismiss === "cancel") {
                        Swal.fire({
                            text: recordName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            },
                        });
                    }
                });
            });
        });
    };

    // Archive record
    var handleArchiveRows = () => {
        // Select all archive buttons
        const archiveButtons = document.querySelectorAll(
            '[data-kt-docs-table-filter="archive_row"]'
        );

        archiveButtons.forEach((d) => {
            // Archive button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();
                let formData = new FormData();
                formData.append(
                    "archived",
                    e.target.getAttribute("data-value")
                );
                formData.append("_method", "PUT");
                // Select parent row
                const parent = e.target.closest("tr");
                // Get record name
                const recordName = parent.querySelectorAll("td")[0].innerText;
                const action = e.target.innerText.trim().toLowerCase();

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text:
                        "Are you sure you want to " +
                        action +
                        " " +
                        recordName +
                        "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, " + action + "!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: e.target.getAttribute("href"),
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            cache: false,
                            enctype: "multipart/form-data",
                            success: function (result) {
                                // Do something with the result
                                Swal.fire({
                                    text:
                                        "Application was successfully " +
                                        action +
                                        "d.",
                                    icon: "success",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                }).then(function (e) {
                                    // archive row data from server and re-draw datatable
                                    dt.draw();
                                });
                            },
                            error: function (err) {
                                // Do something with the error
                                Swal.fire({
                                    text: err.responseJSON.message,
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                            },
                        });
                    } else if (result.dismiss === "cancel") {
                        Swal.fire({
                            text: recordName + " was not " + action + ".",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            },
                        });
                    }
                });
            });
        });
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            initDateRangeFilter();
            handleSearchDatatable();
            handleDeleteRows();
            handleArchiveRows();
            handleFilterDatatable();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});
