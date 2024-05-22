var myDropzone_photo;
var myDropzone_address;
var myDropzone_marksheets;
var myDropzone;

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
                timer: 2000,
            }).then(function () {
                Swal.fire({
                    text:
                        "Application was successfully " +
                        (state == "approve" ? "approved" : "rejected") +
                        "!.",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary",
                    },
                }).then(function () {
                    // reload page
                    location.reload();
                });
            });
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
