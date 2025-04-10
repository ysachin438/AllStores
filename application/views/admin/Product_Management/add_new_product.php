<div class="card card-info card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header">
        <div class="card-title">
            <h3>Add New Product</h3>
        </div>
        <a href="">
            <button type="button" style="position: absolute; right: 10px;" class="btn btn-secondary btn-sm">Add in Bulk</button>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Form-->
    <form class="needs-validation" action="<?php echo base_url('index.php/admin/registerProductAuth') ?>" method="post" novalidate>
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Row-->
            <div class="row g-3">
                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Product Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="validationCustom01"
                        name="item_name"
                        placeholder="Product Name"
                        value="<?php echo set_value('item_name') ?>"
                        required />
                    <small><?php echo form_error('item_name') ?></small>
                    <div class="valid-feedback">Nice One!</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Price</label>
                    <input
                        type="number"
                        class="form-control"
                        id="validationCustom02"
                        name="item_price"
                        placeholder="Enter amount per unit"
                        step="0.01"
                        value="<?php echo set_value('item_price') ?>"
                        required />
                    <small><?php echo form_error('item_price') ?></small>
                    <div class="valid-feedback">!</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Quantity</label>
                    <input
                        type="number"
                        class="form-control"
                        id="validationCustom03"
                        name="item_quantity"
                        min="1"
                        placeholder="Enter product quantity"
                        value="<?php echo set_value('item_quantity') ?>"
                        required />
                    <small><?php echo form_error('item_quantity') ?></small>
                    <div class="valid-feedback">ok</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">Description</label>
                    <input
                        type="text-box"
                        class="form-control"
                        id="validationCustom04"
                        name="item_desc"
                        placeholder="Add product description"
                        value="<?php echo set_value('item_desc') ?>"
                        required />
                    <small><?php echo form_error('item_desc') ?></small>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer">
            <button class="btn btn-info" type="submit">Add Product</button>
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