<div class="card card-info card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header">
        <div class="card-title">Create New User</div>
        <a href="">
            <button type="button" style="position: absolute; right: 10px;" class="btn btn-secondary btn-sm">Add in Bulk</button>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Form-->
    <form class="needs-validation" action="<?php echo base_url('index.php/admin/createNewUserAuth') ?>" method="post" novalidate>
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Row-->
            <div class="row g-3">
                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">First name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="validationCustom01"
                        name="fname"
                        placeholder="Enter Full Name"
                        required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="validationCustom02"
                        name="email"
                        placeholder="Enter email"
                        required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Phone</label>
                    <input
                        type="phone"
                        class="form-control"
                        id="validationCustom03"
                        name="phone"
                        placeholder="Enter phone number"
                        required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input
                            type="text"
                            class="form-control"
                            id="validationCustomUsername"
                            name="username"
                            aria-describedby="inputGroupPrepend"
                            required />
                        <div class="invalid-feedback">Please choose a username.</div>
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="validationCustom04"
                        name="password"
                        placeholder="Enter a password"
                        required />
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer">
            <button class="btn btn-info" type="submit">Create User</button>
        </div>
        <!--end::Footer-->
    </form>
    <!--end::Form-->
    <!--begin::JavaScript-->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.from(forms).forEach((form) => {
                form.addEventListener(
                    'submit',
                    (event) => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add('was-validated');
                    },
                    false,
                );
            });
        })();
    </script>
    <?php if ($this->session->flashdata('toast_type') && $this->session->flashdata('toast_message')): ?>
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right", // Customize position
                    "timeOut": "3000", // Duration of the toast
                    "extendedTimeOut": "1000"
                };

                var toastType = "<?php echo $this->session->flashdata('toast_type'); ?>";
                var toastMessage = "<?php echo $this->session->flashdata('toast_message'); ?>";

                if (toastType == 'success') {
                    toastr.success(toastMessage);
                } else if (toastType == 'error') {
                    toastr.error(toastMessage);
                } else if (toastType == 'info') {
                    toastr.info(toastMessage);
                } else if (toastType == 'warning') {
                    toastr.warning(toastMessage);
                }
            });
        </script>
    <?php endif; ?>

    <!--end::JavaScript-->
</div>