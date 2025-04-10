<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>AdminLTE 4 | Register Page</title>
  <!--begin::Primary Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="title" content="AdminLTE 4 | Register Page" />
  <meta name="author" content="ColorlibHQ" />
  <meta
    name="description"
    content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
  <meta
    name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
  <!--end::Primary Meta Tags-->
  <!--begin::Fonts-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
    crossorigin="anonymous" />
  <!--end::Fonts-->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
    integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(OverlayScrollbars)-->
  <!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(Bootstrap Icons)-->
  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="<?php echo  base_url(); ?>assets/css/adminlte.css" />
  <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="register-page bg-body-secondary">
  <div class="register-box">
    <div class="register-logo">
      <a href="../index2.html"><b>User</b> Registration</a>
    </div>
    <!-- /.register-logo -->
<!-- Error Display -->
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
<!-- Success Display -->
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="register-box-msg">Create a new account</p>
        <form action="<?= base_url('index.php/auth/register/signup_auth') ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name='fname' placeholder="Full Name" required />
            <div class="input-group-text"><span class="bi bi-person"></span></div>
            <small class="form-text text-muted"><?php echo form_error('fname') ?></small>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required />
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            <small class="form-text text-muted"><?php echo form_error('email') ?></small>
          </div>
          <div class="input-group mb-3">
            <input type="phone" class="form-control" name="phone" placeholder="Phone" required />
            <div class="input-group-text"><span class="bi bi-phone"></span></div>
            <small class="form-text text-muted"><?php echo form_error('phone') ?></small>
          </div>
          <div class="input-group mb-3">
            <input type="username" class="form-control" name="username" placeholder="Username" required />
            <div class="input-group-text"><span class="bi bi-pen"></span></div>
            <small class="form-text text-muted"><?php echo form_error('username') ?></small>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required />
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            <small class="form-text text-muted"><?php echo form_error('password') ?></small>
          </div>
          <!--begin::Row-->
          <div class="row">
            <div class="col-8">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Sign In</button>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!--end::Row-->
        </form>
        <!-- /.social-auth-links -->
        <p class="mb-0">
          <a href="<?php echo base_url() ?>index.php/auth/login/index" class="text-center"> Already have a account </a>
        </p>
      </div>
      <!-- /.register-card-body -->
    </div>
  </div>
  <!-- /.register-box -->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
    crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
  <script src="<?php echo  base_url(); ?>assets/js/adminlte.js"></script>
  <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
  <script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave',
      scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function() {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
      if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll,
          },
        });
      }
    });
  </script>
  <!--end::OverlayScrollbars Configure-->
  <!--end::Script-->
</body>
<!--end::Body-->

</html>