var myDropzone_photo;
var myDropzone_address;
var myDropzone_marksheets;
var myDropzone;

let APPLICATION_STATUS = null;

$(document).ready(function () {
    initializePhotoDropZone();
    initializeAddressDropZone();
    initializeMarksheetsDropZone();

    let modal = $("#kt_create_modal");
    let form = $("#kt_create_form");

    $("#kt_modal_close").on("click", function () {
        modal.modal("hide");
    });

    $("#kt_modal_reset").on("click", function () {
        // clear form and reset dropzone
        form.trigger("reset");
        myDropzone.removeAllFiles();
    });

    $(".nav-link-profile-tab").click(function (e) {
        e.preventDefault();
        $(".nav-link-profile-tab").removeClass("active");
        $(this).addClass("active");
        $(".profile-sections-tab-container").removeClass("active");
        $($(this).data("target")).addClass("active");
    });

    $("#update_status_form").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        if ($("#update_status_form").attr("method") == "PUT") {
            formData.append("_method", "PUT");
        }
        formData.append("status", APPLICATION_STATUS);

        $.ajax({
            url: $("#update_status_form").attr("action"),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            enctype: "multipart/form-data",
            success: function (result) {
                console.log(result);
                Swal.fire({
                    text: "Application status updated successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                }).then(function (e) {
                    e.isConfirmed && window.location.reload();
                });
            },
            error: function (err) {
                if (err.status == 422) {
                    console.log(err.responseJSON);
                    // display errors on each form field
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $("#kt_create_form [name='" + i + "']");
                        el.closest(".fv-row")
                            .find(".fv-plugins-message-container")
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
                                confirmButton: "btn btn-primary",
                            },
                        });
                    });
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

var handleStatusUpdate = (state, app_no) => {
    let swalConfig = {
        confirmButtonText: "Yes, reject!",
        cancelButtonText: "No, cancel",
        customClass: {
            confirmButton: "btn fw-bold btn-danger",
            cancelButton: "btn fw-bold btn-light",
        },
    };
    if (state == "approve") {
        swalConfig = {
            confirmButtonText: "Yes, approve!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-success",
                cancelButton: "btn fw-bold btn-light",
            },
        };
    }

    Swal.fire({
        text:
            "Are you sure you want to " +
            state +
            " application - " +
            app_no +
            "?",
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        ...swalConfig,
    }).then(function (result) {
        if (result.value) {
            Swal.fire({
                text: "Updating application - " + app_no,
                icon: "info",
                buttonsStyling: false,
                showConfirmButton: false,
                timer: 200000,
            });
            APPLICATION_STATUS = state;
            $("#update_status_form").submit();
        } else if (result.dismiss === "cancel") {
            Swal.fire({
                text: "Application status not updated!",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary",
                },
            });
        }
    });
};

function initializePhotoDropZone() {
    // set the dropzone container id
    const id = "#kt_dropzonejs_photo";
    const dropzone = document.querySelector(id);

    // set the preview element template
    var previewNode = dropzone.querySelector(".dropzone-item");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    myDropzone_photo = new Dropzone(id, {
        // Make the whole body a dropzone
        url: `${siteURL}/${siteUserRole}/notification/upload`,
        parallelUploads: 20,
        autoProcessQueue: false,
        paramName: "file",
        previewTemplate: previewTemplate,
        maxFilesize: 5, // Max filesize in MB
        maxFiles: 10,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: id + " .dropzone-items", // Define the container to display the previews
        clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
    });

    myDropzone_photo.on("addedfile", function (file) {
        file.previewElement.querySelector(id + " .dropzone-filename").href =
            file.dataURL;
        file.previewElement.querySelector(id + " .dropzone-filename").target =
            "_blank";
        file.previewElement.querySelector(
            id + " .dropzone-filename strong"
        ).innerHTML =
            "(" + (file.upload.total / Math.pow(1024, 2)).toFixed(2) + " MB)";

        const dropzoneItems = dropzone.querySelectorAll(".dropzone-item");
        dropzoneItems.forEach((dropzoneItem) => {
            dropzoneItem.style.display = "";
        });
    });
}

function initializeAddressDropZone() {
    // set the dropzone container id
    const id = "#kt_dropzonejs_address";
    const dropzone = document.querySelector(id);

    // set the preview element template
    var previewNode = dropzone.querySelector(".dropzone-item");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    myDropzone_address = new Dropzone(id, {
        // Make the whole body a dropzone
        url: `${siteURL}/${siteUserRole}/notification/upload`,
        parallelUploads: 20,
        autoProcessQueue: false,
        paramName: "file",
        previewTemplate: previewTemplate,
        maxFilesize: 5, // Max filesize in MB
        maxFiles: 10,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: id + " .dropzone-items", // Define the container to display the previews
        clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
    });

    myDropzone_address.on("addedfile", function (file) {
        file.previewElement.querySelector(id + " .dropzone-filename").href =
            file.dataURL;
        file.previewElement.querySelector(id + " .dropzone-filename").target =
            "_blank";
        file.previewElement.querySelector(
            id + " .dropzone-filename strong"
        ).innerHTML =
            "(" + (file.upload.total / Math.pow(1024, 2)).toFixed(2) + " MB)";

        const dropzoneItems = dropzone.querySelectorAll(".dropzone-item");
        dropzoneItems.forEach((dropzoneItem) => {
            dropzoneItem.style.display = "";
        });
    });
}

function initializeMarksheetsDropZone() {
    // set the dropzone container id
    const id = "#kt_dropzonejs_marksheets";
    const dropzone = document.querySelector(id);

    // set the preview element template
    var previewNode = dropzone.querySelector(".dropzone-item");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    myDropzone_marksheets = new Dropzone(id, {
        // Make the whole body a dropzone
        url: `${siteURL}/${siteUserRole}/notification/upload`,
        parallelUploads: 20,
        autoProcessQueue: false,
        paramName: "file",
        previewTemplate: previewTemplate,
        maxFilesize: 5, // Max filesize in MB
        maxFiles: 10,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: id + " .dropzone-items", // Define the container to display the previews
        clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
    });

    myDropzone_marksheets.on("addedfile", function (file) {
        file.previewElement.querySelector(id + " .dropzone-filename").href =
            file.dataURL;
        file.previewElement.querySelector(id + " .dropzone-filename").target =
            "_blank";
        file.previewElement.querySelector(
            id + " .dropzone-filename strong"
        ).innerHTML =
            "(" + (file.upload.total / Math.pow(1024, 2)).toFixed(2) + " MB)";

        const dropzoneItems = dropzone.querySelectorAll(".dropzone-item");
        dropzoneItems.forEach((dropzoneItem) => {
            dropzoneItem.style.display = "";
        });
    });
}
