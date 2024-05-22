  <!--begin::Modal - New Product-->
  <div class="modal fade" id="kt_create_modal" tabindex="-1" aria-hidden="true">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-650px">
          <!--begin::Modal content-->
          <div class="modal-content">
              <!--begin::Form-->
              <form class="form"
                  action="{{isset($notification) ? route(Auth::user()->role . '.notification.update', $notification->id) : route(Auth::user()->role . '.notification.store')}}"
                  id="kt_create_form" method="{{isset($notification) ? 'PUT' : 'POST'}}" enctype="multipart/form-data">
                  @csrf
                  <!--begin::Modal header-->
                  <div class="modal-header">
                      <!--begin::Modal title-->
                      <h2 class="fw-bold" data-kt-calendar="title">
                          Send Notification
                      </h2>
                      <!--end::Modal title-->
                      <!--begin::Close-->
                      <div class="btn btn-icon btn-sm btn-active-icon-primary" id="kt_modal_close">
                          <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                          <span class="svg-icon svg-icon-1">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                  <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                      fill="currentColor" />
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                      </div>
                      <!--end::Close-->
                  </div>
                  <!--end::Modal header-->
                  <!--begin::Modal body-->
                  <div class="modal-body py-10 px-lg-17">
                      <!--begin::Input group-->
                      <div class="fv-row mb-9">
                          <!--begin::Label-->
                          <label class="fs-6 fw-semibold required mb-2">Title</label>
                          <!--end::Label-->
                          <!--begin::Input-->
                          <input type="text" class="form-control form-control-solid" placeholder="" name="title" />
                          <!--end::Input-->
                          <div class="fv-plugins-message-container invalid-feedback"></div>
                      </div>
                      <!--end::Input group-->
                      <!--begin::Input group-->
                      <div class="fv-row mb-9">
                          <!--begin::Label-->
                          <label class="fs-6 fw-semibold mb-2 required">Description</label>
                          <!--end::Label-->
                          <!--begin::Input-->
                          <textarea class="form-control form-control-solid" name="description" rows="6"></textarea>
                          <!--end::Input-->
                          <div class="fv-plugins-message-container invalid-feedback"></div>
                      </div>
                      <!--end::Input group-->
                      <!--begin::Input group-->
                      <div class="fv-row mb-9">
                          <!--begin::Label-->
                          <label class="fs-6 fw-semibold mb-2">
                              Attachments
                          </label>
                          <!--end::Label-->
                          <!--begin::Dropzone-->
                          <div class="dropzone dropzone-queue mb-2" id="kt_dropzonejs">
                              <!--begin::Controls-->
                              <div class="dropzone-panel mb-lg-0 mb-2">
                                  <a class="dropzone-select btn btn-sm btn-primary me-2">Attach files</a>
                                  <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove
                                      All</a>
                              </div>
                              <!--end::Controls-->

                              <!--begin::Items-->
                              <div class="dropzone-items wm-200px">
                                  <div class="dropzone-item" style="display:none">
                                      <!--begin::File-->
                                      <div class="dropzone-file">
                                          <a href="#" class="dropzone-filename d-block"
                                              title="some_image_file_name.jpg">
                                              <span data-dz-name>some_image_file_name.jpg</span>
                                              <strong>(<span data-dz-size>340kb</span>)</strong>
                                          </a>
                                          <div class="dropzone-error" data-dz-errormessage></div>
                                      </div>
                                      <!--end::File-->

                                      <!--begin::Progress-->
                                      <div class="dropzone-progress">
                                          <div class="progress">
                                              <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0"
                                                  aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress>
                                              </div>
                                          </div>
                                      </div>
                                      <!--end::Progress-->

                                      <!--begin::Toolbar-->
                                      <div class="dropzone-toolbar">
                                          <span class="dropzone-start"><i class="bi bi-play-fill fs-3"></i></span>
                                          <span class="dropzone-cancel" data-dz-remove style="display: none;"><i
                                                  class="bi bi-x fs-3"></i></span>
                                          <span class="dropzone-delete" data-dz-remove><i
                                                  class="bi bi-x fs-1"></i></span>
                                      </div>
                                      <!--end::Toolbar-->
                                  </div>
                              </div>
                              <!--end::Items-->
                          </div>
                          <!--end::Dropzone-->

                          <!--begin::Hint-->
                          <span class="form-text text-muted">Max file size is 5MB and max number of
                              files
                              is 5.</span>
                          <!--end::Hint-->
                      </div>
                      <!--end::Input group-->
                  </div>
                  <!--end::Modal body-->
                  <!--begin::Modal footer-->
                  <div class="modal-footer flex-center">
                      <!--begin::Button-->
                      <button type="reset" id="kt_modal_reset" class="btn btn-light me-3">Reset</button>
                      <!--end::Button-->
                      <!--begin::Button-->
                      <button type="button" id="kt_form_submit" class="btn btn-primary">
                          <span class="indicator-label">
                              {{isset($notification) ? 'Update' : 'Save'}}</span>
                          </span>
                          <span class="indicator-progress">Please wait...
                              <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                      </button>
                      <!--end::Button-->
                  </div>
                  <!--end::Modal footer-->
              </form>
              <!--end::Form-->
          </div>
      </div>
  </div>
  <!--end::Modal - New Product-->