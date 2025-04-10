<div class="card card-info card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header">
        <div class="card-title">Update User: <?php echo $user->fname ?></div>
    </div>
    <!--end::Header-->
    <!--begin::Form-->
    <form class="needs-validation" action="<?php echo base_url('index.php/admin/editUserAuth/' . $user->uid) ?>" method="post" novalidate>
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Row-->
            <div class="row g-3">
                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Full name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="validationCustom01"
                        name="fname"
                        placeholder="Update Name"
                        value="<?php echo $user->fname ?>"
                        required />
                    <small><?php echo form_error('fname') ?></small>
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
                        placeholder="Update email"
                        value="<?php echo $user->email ?>"
                        required />
                    <small><?php echo form_error('email') ?></small>
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
                        placeholder="Update phone number"
                        value="<?php echo $user->phone ?>"
                        required />
                    <small><?php echo form_error('phone') ?></small>
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
                            placeholder="Update username"
                            value="<?php echo $user->username ?>"
                            required />
                        <small><?php echo form_error('username') ?></small>
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
                        name="password"
                        placeholder="Update password"
                        />
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer">
            <button class="btn btn-info" type="submit">Update</button>
            <a href="<?= base_url('index.php/admin/getAllUser') ?>">
                <button type="button" class="btn btn-danger">Cancel</button>
            </a>
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