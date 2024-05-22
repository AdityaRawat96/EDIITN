"use strict";

var myDropzone_photo;
var myDropzone_address;
var myDropzone_marksheets;
var KTCreateAccount = (function () {
    var modal,
        stepper,
        form,
        submitButton,
        nextButton,
        previousButton,
        stepperObj,
        validators = [];

    function initializeStepper() {
        stepperObj = new KTStepper(stepper);

        stepperObj.on("kt.stepper.changed", function () {
            var currentIndex = stepperObj.getCurrentStepIndex();
            if (currentIndex === 6) {
                submitButton.classList.remove("d-none");
                submitButton.classList.add("d-inline-block");
                nextButton.classList.add("d-none");
            } else if (currentIndex === 7) {
                submitButton.classList.add("d-none");
                nextButton.classList.add("d-none");
                previousButton.classList.add("d-none");
            } else {
                submitButton.classList.remove("d-inline-block", "d-none");
                nextButton.classList.remove("d-none");
            }
        });

        stepperObj.on("kt.stepper.next", function (e) {
            var validator = validators[e.getCurrentStepIndex() - 1];
            if (validator) {
                validator.validate().then(function (status) {
                    if (status === "Valid") {
                        e.goNext();
                        KTUtil.scrollTop();
                    } else {
                        showValidationError();
                    }
                });
            } else {
                e.goNext();
                KTUtil.scrollTop();
            }

            if (e.getCurrentStepIndex() === 5) {
                // check if dropzones are empty
                const dropzoneItems_photo = document.querySelectorAll(
                    "#kt_dropzonejs_photo .dropzone-item"
                );
                const dropzoneItems_address = document.querySelectorAll(
                    "#kt_dropzonejs_address .dropzone-item"
                );
                const dropzoneItems_marksheets = document.querySelectorAll(
                    "#kt_dropzonejs_marksheets .dropzone-item"
                );

                if (
                    dropzoneItems_photo.length === 0 ||
                    dropzoneItems_address.length === 0 ||
                    dropzoneItems_marksheets.length === 0
                ) {
                    Swal.fire({
                        text: "Please upload all the required documents",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light",
                        },
                    }).then(function () {
                        KTUtil.scrollTop();
                    });
                    e.goPrevious();
                }
            }
        });

        stepperObj.on("kt.stepper.previous", function (e) {
            e.goPrevious();
            KTUtil.scrollTop();
        });
    }

    function showValidationError() {
        Swal.fire({
            text: "Sorry, looks like there are some errors detected, please try again.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-light",
            },
        }).then(function () {
            KTUtil.scrollTop();
        });
    }

    function initializeValidation() {
        validators.push(
            FormValidation.formValidation(form, {
                fields: {
                    account_type: {
                        validators: {
                            notEmpty: { message: "Account type is required" },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            })
        );

        validators.push(
            FormValidation.formValidation(form, {
                fields: {
                    first_name: {
                        validators: {
                            notEmpty: { message: "First name is required" },
                        },
                    },
                    last_name: {
                        validators: {
                            notEmpty: { message: "Last name is required" },
                        },
                    },
                    date_of_birth: {
                        validators: {
                            notEmpty: { message: "Date of birth is required" },
                            callback: {
                                message: "Date of birth is invalid", // Generic message
                                callback: function (input) {
                                    const userCaste = $('[name="caste"]')
                                        .val()
                                        .toLowerCase();
                                    const userDifferentAbled = $(
                                        '[name="differently_abled"]'
                                    )
                                        .val()
                                        .toLowerCase();
                                    const today = new Date();
                                    const maxAge =
                                        userCaste === "sc" ||
                                        userCaste === "st" ||
                                        userDifferentAbled === "yes"
                                            ? 30
                                            : 25;
                                    const maxBirthDate = new Date();
                                    maxBirthDate.setFullYear(
                                        today.getFullYear() - maxAge
                                    );
                                    const enteredDate = new Date(input.value);

                                    if (isNaN(enteredDate)) {
                                        return {
                                            valid: false,
                                            message:
                                                "Please enter a valid date",
                                        };
                                    } else if (enteredDate > today) {
                                        return {
                                            valid: false,
                                            message:
                                                "Date of birth cannot be in the future",
                                        };
                                    } else if (enteredDate < maxBirthDate) {
                                        // Corrected comparison
                                        return {
                                            valid: false,
                                            message: `You must be at least ${maxAge} years old (${maxBirthDate.toLocaleDateString()}) to apply`,
                                        };
                                    }

                                    return { valid: true }; // All checks passed
                                },
                            },
                        },
                    },
                    gender: {
                        validators: {
                            notEmpty: { message: "Gender is required" },
                        },
                    },
                    email: {
                        validators: {
                            notEmpty: { message: "Email is required" },
                            emailAddress: {
                                message:
                                    "The value is not a valid email address",
                            },
                        },
                    },
                    caste: {
                        validators: {
                            notEmpty: { message: "Caste is required" },
                        },
                    },
                    religion: {
                        validators: {
                            notEmpty: { message: "Religion is required" },
                        },
                    },
                    nationality: {
                        validators: {
                            notEmpty: { message: "Nationality is required" },
                        },
                    },
                    differently_abled: {
                        validators: {
                            notEmpty: { message: "Nationality is required" },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            })
        );

        validators.push(
            FormValidation.formValidation(form, {
                fields: {
                    field: {
                        validators: {
                            notEmpty: { message: "Field of study is required" },
                        },
                    },
                    qualification: {
                        validators: {
                            notEmpty: { message: "Qualification is required" },
                        },
                    },
                    university: {
                        validators: {
                            notEmpty: {
                                message: "University name is required",
                            },
                        },
                    },
                    degree_name: {
                        validators: {
                            notEmpty: { message: "Degree name is required" },
                        },
                    },
                    graduation_year: {
                        validators: {
                            notEmpty: {
                                message: "Year of completion is required",
                            },
                            digits: {
                                message:
                                    "Year of completion must contain only digits",
                            },
                            stringLength: {
                                min: 4,
                                max: 4,
                                message:
                                    "Year of completion must contain 4 digits only",
                            },
                        },
                    },
                    percentage_grade: {
                        validators: {
                            notEmpty: { message: "Marks/Grade is required" },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            })
        );

        validators.push(
            FormValidation.formValidation(form, {
                fields: {
                    marital_status: {
                        validators: {
                            notEmpty: { message: "Marital status is required" },
                        },
                    },
                    fathers_name: {
                        validators: {
                            notEmpty: {
                                message:
                                    "Father's / Guardian's name is required",
                            },
                        },
                    },
                    father_occupation: {
                        validators: {
                            notEmpty: {
                                message:
                                    "Father's / Guardian's occupation is required",
                            },
                        },
                    },
                    fathers_mobile_number: {
                        validators: {
                            notEmpty: {
                                message:
                                    "Father's / Guardian's mobile number is required",
                            },
                            phone: {
                                country: "IN",
                                message:
                                    "The value is not a valid Indian phone number",
                            },
                        },
                    },
                    mothers_name: {
                        validators: {
                            notEmpty: {
                                message:
                                    "Mother's / Guardian's name is required",
                            },
                        },
                    },
                    mothers_mobile_number: {
                        validators: {
                            phone: {
                                country: "IN",
                                message:
                                    "The value is not a valid Indian phone number",
                            },
                        },
                    },
                    communication_street_address1: {
                        validators: {
                            notEmpty: {
                                message: "Street address is required",
                            },
                        },
                    },
                    communication_street_address2: {
                        validators: {
                            notEmpty: {
                                message: "Street address line 2 is required",
                            },
                        },
                    },
                    communication_city: {
                        validators: {
                            notEmpty: { message: "City is required" },
                        },
                    },
                    communication_state: {
                        validators: {
                            notEmpty: { message: "State is required" },
                        },
                    },
                    communication_postal_code: {
                        validators: {
                            notEmpty: { message: "Pin code is required" },
                            digits: {
                                message: "Pin code must contain only digits",
                            },
                        },
                    },
                    permanent_street_address1: {
                        validators: {
                            notEmpty: {
                                message: "Street address is required",
                            },
                        },
                    },
                    permanent_street_address2: {
                        validators: {
                            notEmpty: {
                                message: "Street address line 2 is required",
                            },
                        },
                    },
                    permanent_city: {
                        validators: {
                            notEmpty: { message: "City is required" },
                        },
                    },
                    permanent_state: {
                        validators: {
                            notEmpty: { message: "State is required" },
                        },
                    },
                    permanent_postal_code: {
                        validators: {
                            notEmpty: { message: "Pin code is required" },
                            digits: {
                                message: "Pin code must contain only digits",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            })
        );

        validators.push(
            FormValidation.formValidation(form, {
                fields: {
                    photo: {
                        validators: {
                            notEmpty: { message: "Photo is required" },
                            file: {
                                maxSize: "5MB",
                                message: "The selected file is not valid",
                            },
                        },
                    },
                    address_proof: {
                        validators: {
                            notEmpty: {
                                message: "Address proof is required",
                            },
                            file: {
                                maxSize: "5MB",
                                message: "The selected file is not valid",
                            },
                        },
                    },
                    marksheets: {
                        validators: {
                            notEmpty: {
                                message: "Marksheets are required",
                            },
                            file: {
                                maxSize: "5MB",
                                message: "The selected file is not valid",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            })
        );

        validators.push(
            FormValidation.formValidation(form, {
                fields: {
                    declaration: {
                        validators: {
                            notEmpty: {
                                message: "You must agree to the terms",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            })
        );
    }

    function initializeEventListeners() {
        $(submitButton).on("click", function (e) {
            validators[5].validate().then(function (status) {
                if (status === "Valid") {
                    e.preventDefault();
                    $("#kt_create_account_form").submit();
                } else {
                    showValidationError();
                }
            });
        });
    }

    return {
        init: function () {
            modal = $("#kt_modal_create_account");
            stepper = $("#kt_create_account_stepper")[0];
            form = $("#kt_create_account_form")[0];
            submitButton = stepper.querySelector(
                '[data-kt-stepper-action="submit"]'
            );
            nextButton = stepper.querySelector(
                '[data-kt-stepper-action="next"]'
            );
            previousButton = stepper.querySelector(
                '[data-kt-stepper-action="previous"]'
            );

            if (modal && stepper) {
                initializeStepper();
                initializeValidation();
                initializeEventListeners();
            }

            $(document).ready(function (e) {
                $("#kt_create_account_form").on("submit", function (e) {
                    e.preventDefault();
                    submitButton.setAttribute("data-kt-indicator", "on");
                    submitButton.disabled = !0;
                    var formData = new FormData(this);
                    if ($("#kt_create_account_form").attr("method") == "PUT") {
                        formData.append("_method", "PUT");
                    }

                    // Append dropzone files to formData
                    if (myDropzone_photo) {
                        myDropzone_photo.files.forEach(function (file) {
                            formData.append("photo[]", file);
                        });
                    }
                    if (myDropzone_address) {
                        myDropzone_address.files.forEach(function (file) {
                            formData.append("address_proof[]", file);
                        });
                    }
                    if (myDropzone_marksheets) {
                        myDropzone_marksheets.files.forEach(function (file) {
                            formData.append("marksheets[]", file);
                        });
                    }

                    $.ajax({
                        url: $("#kt_create_account_form").attr("action"),
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        cache: false,
                        enctype: "multipart/form-data",
                        success: function (result) {
                            submitButton.removeAttribute("data-kt-indicator");
                            submitButton.disabled = false;
                            if (result.status == "success") {
                                $("#application_id").html(
                                    result.application_id
                                );
                                stepperObj.goNext();
                            }
                        },
                        error: function (err) {
                            submitButton.removeAttribute("data-kt-indicator");
                            submitButton.disabled = false;
                            if (err.status == 422) {
                                console.log(err.responseJSON);
                                // display errors on each form field
                                $.each(
                                    err.responseJSON.errors,
                                    function (i, error) {
                                        var el = $(
                                            "#kt_create_account_form [name='" +
                                                i +
                                                "']"
                                        );
                                        el.closest(".fv-row")
                                            .find(
                                                ".fv-plugins-message-container"
                                            )
                                            .text(error[0]);
                                        el.addClass("is-invalid");

                                        // scroll to the error message
                                        KTUtil.scrollTop();

                                        Swal.fire({
                                            text: "Sorry, looks like there are some errors detected, please try again.",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton:
                                                    "btn btn-primary",
                                            },
                                        });
                                    }
                                );
                            } else {
                                Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                            }
                        },
                    });
                });
            });
        },
        initializePhotoDropZone: function (id, path, paramName, maxfiles = 10) {
            // set the dropzone container id
            const dropzone = document.querySelector(id);

            // set the preview element template
            var previewNode = dropzone.querySelector(".dropzone-item");
            previewNode.id = "";
            var previewTemplate = previewNode.parentNode.innerHTML;
            previewNode.parentNode.removeChild(previewNode);

            myDropzone_photo = new Dropzone(id, {
                // Make the whole body a dropzone
                url: `${siteURL}/${siteUserRole}/applications/${path}`,
                parallelUploads: 20,
                autoProcessQueue: false,
                paramName: paramName,
                previewTemplate: previewTemplate,
                maxFilesize: 5, // Max filesize in MB
                maxFiles: maxfiles,
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: id + " .dropzone-items", // Define the container to display the previews
                clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
            });

            myDropzone_photo.on("addedfile", function (file) {
                // Hookup the start button
                file.previewElement.querySelector(
                    id + " .dropzone-start"
                ).onclick = function () {
                    myDropzone_photo.enqueueFile(file);
                };
                if (file.upload.progress == 100) {
                    file.previewElement.querySelector(
                        id + " .dropzone-filename"
                    ).href = file.dataURL;
                    file.previewElement.querySelector(
                        id + " .dropzone-filename"
                    ).target = "_blank";
                    file.previewElement.querySelector(
                        id + " .dropzone-filename strong"
                    ).innerHTML =
                        "(" +
                        (file.upload.total / Math.pow(1024, 2)).toFixed(2) +
                        " MB)";
                } else {
                    file.previewElement
                        .querySelector(id + " .dropzone-filename")
                        .classList.add("dropzone-local-file");
                }
                const dropzoneItems =
                    dropzone.querySelectorAll(".dropzone-item");
                dropzoneItems.forEach((dropzoneItem) => {
                    dropzoneItem.style.display = "";
                });
                dropzone.querySelector(".dropzone-remove-all").style.display =
                    "inline-block";
            });

            // Update the total progress bar
            myDropzone_photo.on("totaluploadprogress", function (progress) {
                const progressBars = dropzone.querySelectorAll(".progress-bar");
                progressBars.forEach((progressBar) => {
                    progressBar.style.width = progress + "%";
                });
            });

            myDropzone_photo.on("sending", function (file) {
                // Show the total progress bar when upload starts
                const progressBars = dropzone.querySelectorAll(".progress-bar");
                progressBars.forEach((progressBar) => {
                    progressBar.style.opacity = "1";
                });
                // And disable the start button
                file.previewElement
                    .querySelector(id + " .dropzone-start")
                    .setAttribute("disabled", "disabled");
            });

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone_photo.on("complete", function (progress) {
                const progressBars = dropzone.querySelectorAll(".dz-complete");

                setTimeout(function () {
                    progressBars.forEach((progressBar) => {
                        progressBar.querySelector(
                            ".progress-bar"
                        ).style.opacity = "0";
                        progressBar.querySelector(".progress").style.opacity =
                            "0";
                        progressBar.querySelector(
                            ".dropzone-start"
                        ).style.opacity = "0";
                    });
                }, 300);
            });

            // Setup the button for remove all files
            dropzone
                .querySelector(".dropzone-remove-all")
                .addEventListener("click", function () {
                    dropzone.querySelector(
                        ".dropzone-remove-all"
                    ).style.display = "none";
                    myDropzone_photo.removeAllFiles(true);
                });

            // On all files removed
            myDropzone_photo.on("removedfile", function (file) {
                if (myDropzone_photo.files.length < 1) {
                    dropzone.querySelector(
                        ".dropzone-remove-all"
                    ).style.display = "none";
                }
            });
        },
        initializeAddressDropZone: function (
            id,
            path,
            paramName,
            maxfiles = 10
        ) {
            // set the dropzone container id
            const dropzone = document.querySelector(id);

            // set the preview element template
            var previewNode = dropzone.querySelector(".dropzone-item");
            previewNode.id = "";
            var previewTemplate = previewNode.parentNode.innerHTML;
            previewNode.parentNode.removeChild(previewNode);

            myDropzone_address = new Dropzone(id, {
                // Make the whole body a dropzone
                url: `${siteURL}/${siteUserRole}/applications/${path}`,
                parallelUploads: 20,
                autoProcessQueue: false,
                paramName: paramName,
                previewTemplate: previewTemplate,
                maxFilesize: 5, // Max filesize in MB
                maxFiles: maxfiles,
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: id + " .dropzone-items", // Define the container to display the previews
                clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
            });

            myDropzone_address.on("addedfile", function (file) {
                // Hookup the start button
                file.previewElement.querySelector(
                    id + " .dropzone-start"
                ).onclick = function () {
                    myDropzone_address.enqueueFile(file);
                };
                if (file.upload.progress == 100) {
                    file.previewElement.querySelector(
                        id + " .dropzone-filename"
                    ).href = file.dataURL;
                    file.previewElement.querySelector(
                        id + " .dropzone-filename"
                    ).target = "_blank";
                    file.previewElement.querySelector(
                        id + " .dropzone-filename strong"
                    ).innerHTML =
                        "(" +
                        (file.upload.total / Math.pow(1024, 2)).toFixed(2) +
                        " MB)";
                } else {
                    file.previewElement
                        .querySelector(id + " .dropzone-filename")
                        .classList.add("dropzone-local-file");
                }
                const dropzoneItems =
                    dropzone.querySelectorAll(".dropzone-item");
                dropzoneItems.forEach((dropzoneItem) => {
                    dropzoneItem.style.display = "";
                });
                dropzone.querySelector(".dropzone-remove-all").style.display =
                    "inline-block";
            });

            // Update the total progress bar
            myDropzone_address.on("totaluploadprogress", function (progress) {
                const progressBars = dropzone.querySelectorAll(".progress-bar");
                progressBars.forEach((progressBar) => {
                    progressBar.style.width = progress + "%";
                });
            });

            myDropzone_address.on("sending", function (file) {
                // Show the total progress bar when upload starts
                const progressBars = dropzone.querySelectorAll(".progress-bar");
                progressBars.forEach((progressBar) => {
                    progressBar.style.opacity = "1";
                });
                // And disable the start button
                file.previewElement
                    .querySelector(id + " .dropzone-start")
                    .setAttribute("disabled", "disabled");
            });

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone_address.on("complete", function (progress) {
                const progressBars = dropzone.querySelectorAll(".dz-complete");

                setTimeout(function () {
                    progressBars.forEach((progressBar) => {
                        progressBar.querySelector(
                            ".progress-bar"
                        ).style.opacity = "0";
                        progressBar.querySelector(".progress").style.opacity =
                            "0";
                        progressBar.querySelector(
                            ".dropzone-start"
                        ).style.opacity = "0";
                    });
                }, 300);
            });

            // Setup the button for remove all files
            dropzone
                .querySelector(".dropzone-remove-all")
                .addEventListener("click", function () {
                    dropzone.querySelector(
                        ".dropzone-remove-all"
                    ).style.display = "none";
                    myDropzone_address.removeAllFiles(true);
                });

            // On all files removed
            myDropzone_address.on("removedfile", function (file) {
                if (myDropzone_address.files.length < 1) {
                    dropzone.querySelector(
                        ".dropzone-remove-all"
                    ).style.display = "none";
                }
            });
        },
        initializeMarksheetDropZone: function (
            id,
            path,
            paramName,
            maxfiles = 10
        ) {
            // set the dropzone container id
            const dropzone = document.querySelector(id);

            // set the preview element template
            var previewNode = dropzone.querySelector(".dropzone-item");
            previewNode.id = "";
            var previewTemplate = previewNode.parentNode.innerHTML;
            previewNode.parentNode.removeChild(previewNode);

            myDropzone_marksheets = new Dropzone(id, {
                // Make the whole body a dropzone
                url: `${siteURL}/${siteUserRole}/applications/${path}`,
                parallelUploads: 20,
                autoProcessQueue: false,
                paramName: paramName,
                previewTemplate: previewTemplate,
                maxFilesize: 5, // Max filesize in MB
                maxFiles: maxfiles,
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: id + " .dropzone-items", // Define the container to display the previews
                clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
            });

            myDropzone_marksheets.on("addedfile", function (file) {
                // Hookup the start button
                file.previewElement.querySelector(
                    id + " .dropzone-start"
                ).onclick = function () {
                    myDropzone_marksheets.enqueueFile(file);
                };
                if (file.upload.progress == 100) {
                    file.previewElement.querySelector(
                        id + " .dropzone-filename"
                    ).href = file.dataURL;
                    file.previewElement.querySelector(
                        id + " .dropzone-filename"
                    ).target = "_blank";
                    file.previewElement.querySelector(
                        id + " .dropzone-filename strong"
                    ).innerHTML =
                        "(" +
                        (file.upload.total / Math.pow(1024, 2)).toFixed(2) +
                        " MB)";
                } else {
                    file.previewElement
                        .querySelector(id + " .dropzone-filename")
                        .classList.add("dropzone-local-file");
                }
                const dropzoneItems =
                    dropzone.querySelectorAll(".dropzone-item");
                dropzoneItems.forEach((dropzoneItem) => {
                    dropzoneItem.style.display = "";
                });
                dropzone.querySelector(".dropzone-remove-all").style.display =
                    "inline-block";
            });

            // Update the total progress bar
            myDropzone_marksheets.on(
                "totaluploadprogress",
                function (progress) {
                    const progressBars =
                        dropzone.querySelectorAll(".progress-bar");
                    progressBars.forEach((progressBar) => {
                        progressBar.style.width = progress + "%";
                    });
                }
            );

            myDropzone_marksheets.on("sending", function (file) {
                // Show the total progress bar when upload starts
                const progressBars = dropzone.querySelectorAll(".progress-bar");
                progressBars.forEach((progressBar) => {
                    progressBar.style.opacity = "1";
                });
                // And disable the start button
                file.previewElement
                    .querySelector(id + " .dropzone-start")
                    .setAttribute("disabled", "disabled");
            });

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone_marksheets.on("complete", function (progress) {
                const progressBars = dropzone.querySelectorAll(".dz-complete");

                setTimeout(function () {
                    progressBars.forEach((progressBar) => {
                        progressBar.querySelector(
                            ".progress-bar"
                        ).style.opacity = "0";
                        progressBar.querySelector(".progress").style.opacity =
                            "0";
                        progressBar.querySelector(
                            ".dropzone-start"
                        ).style.opacity = "0";
                    });
                }, 300);
            });

            // Setup the button for remove all files
            dropzone
                .querySelector(".dropzone-remove-all")
                .addEventListener("click", function () {
                    dropzone.querySelector(
                        ".dropzone-remove-all"
                    ).style.display = "none";
                    myDropzone_marksheets.removeAllFiles(true);
                });

            // On all files removed
            myDropzone_marksheets.on("removedfile", function (file) {
                if (myDropzone_marksheets.files.length < 1) {
                    dropzone.querySelector(
                        ".dropzone-remove-all"
                    ).style.display = "none";
                }
            });
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTCreateAccount.init();
    KTCreateAccount.initializePhotoDropZone(
        "#kt_dropzonejs_photo",
        "/photo",
        "photo",
        1
    );
    KTCreateAccount.initializeAddressDropZone(
        "#kt_dropzonejs_address",
        "/address_proof",
        "address_proof",
        2
    );
    KTCreateAccount.initializeMarksheetDropZone(
        "#kt_dropzonejs_marksheets",
        "/marksheets",
        "marksheets",
        10
    );
});
