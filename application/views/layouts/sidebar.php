<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?php echo base_url('index.php/admin/index');?>" class="brand-link">
            <!--begin::Brand Image-->
            <img
                src="<?php echo base_url() ?>assets/img/AdminLTELogo.png"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="<?php echo base_url('index.php/admin/index');?>" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-person"></i>
                        <p>
                            User Management
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/getAllUser');?>" class="nav-link">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/createNewUser')?>" class="nav-link">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>Create New User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>Roles & Permissions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-box-seam"></i>
                        <p>
                            Product Management
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/getAllProducts');?>" class="nav-link">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/registerProduct');?>" class="nav-link">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>Add New Product</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-cart"></i>
                        <p>
                            Cart Management
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/getAllUserCart');?>" class="nav-link">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>All Carts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/createNewUser');?>" class="nav-link">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>Manage Cart</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-cash"></i>
                        <p>
                            Transaction Management
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>Payment History</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>Pending Transactions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>Refunds & Cancellations</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>Revenue Reports</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-bar-chart"></i>
                        <p>Reports</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-question-circle-fill"></i>
                        <p>FAQ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-patch-check-fill"></i>
                        <p>License</p>
                    </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-record-circle-fill"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>