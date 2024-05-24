"use strict";

// Class definition
var KTDatatablesServerSide = (function () {
    // Shared variables
    var dt;
    var filter = [];

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

            // submit form without ajax append filter to form
            const form = document.querySelector("#kt_create_report_form");
            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "filter";
            input.value = JSON.stringify(filter);
            form.appendChild(input);
            form.submit();
        });

        // Clear filter on reset
        clearFilterButton.addEventListener("click", function () {
            $(".filter-option").val(null).trigger("change");
            filter = [];
        });
    };

    // Public methods
    return {
        init: function () {
            initDateRangeFilter();
            handleFilterDatatable();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});
