"use strict";

var KTCreateAccount = (function () {
    var modal,
        stepper,
        form,
        submitButton,
        nextButton,
        stepperObj,
        validators = [];

    function initializeStepper() {
        stepperObj = new KTStepper(stepper);

        stepperObj.on("kt.stepper.changed", function () {
            var currentIndex = stepperObj.getCurrentStepIndex();
            if (currentIndex === 4) {
                submitButton.classList.remove("d-none");
                submitButton.classList.add("d-inline-block");
                nextButton.classList.add("d-none");
            } else if (currentIndex === 5) {
                submitButton.classList.add("d-none");
                nextButton.classList.add("d-none");
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
    }

    function initializeEventListeners() {
        $(submitButton).on("click", function (e) {
            validators[3].validate().then(function (status) {
                if (status === "Valid") {
                    e.preventDefault();
                    submitButton.disabled = true;
                    submitButton.setAttribute("data-kt-indicator", "on");

                    setTimeout(function () {
                        submitButton.removeAttribute("data-kt-indicator");
                        submitButton.disabled = false;
                        stepperObj.goNext();
                    }, 2000);
                } else {
                    showValidationError();
                }
            });
        });

        $(form)
            .find('[name="card_expiry_month"]')
            .on("change", function () {
                validators[3].revalidateField("card_expiry_month");
            });

        $(form)
            .find('[name="card_expiry_year"]')
            .on("change", function () {
                validators[3].revalidateField("card_expiry_year");
            });

        $(form)
            .find('[name="business_type"]')
            .on("change", function () {
                validators[2].revalidateField("business_type");
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

            if (modal && stepper) {
                initializeStepper();
                initializeValidation();
                initializeEventListeners();
            }
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTCreateAccount.init();
});
