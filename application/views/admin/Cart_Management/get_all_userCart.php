<div class="row">
    <div class="col-md-12">
        <div class="card mb-12">
            <div class="card-header">
                <h2 class="card-title"><b>User Carts</b></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="align-middle" align="middle">
                            <th style="width: 10px">ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th style="width: 40px">Email</th>
                            <th>Total Items</th>
                            <th>Created At</th>
                            <th>Last Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <tr class="align-middle" align ="middle">
                                    <td><?= isset($user['uid']) ? htmlspecialchars($user['uid']) : 'N/A'; ?></td>
                                    <td><?= isset($user['fname']) ? htmlspecialchars($user['fname']) : 'N/A'; ?></td>
                                    <td><?= isset($user['phone']) ? htmlspecialchars($user['phone']) : 'N/A'; ?></td>
                                    <td><?= isset($user['email']) ? htmlspecialchars($user['email']) : 'N/A'; ?></td>
                                    <td><?= isset($user['total_items']) ? htmlspecialchars($user['total_items']) : 'N/A'; ?></td>
                                    <td><span class="badge text-bg-success"><?= isset($user['created_at']) ? htmlspecialchars($user['created_at']) : 'N/A'; ?></span></td>
                                    <td><span class="badge text-bg-danger"><?= isset($user['updated_at']) ? htmlspecialchars($user['updated_at']) : 'N/A'; ?></span></td>
                                    <td><a href="<?= base_url('index.php/admin/viewCart/' . $user['uid']) ?>">
                                            <button type="button" class="btn btn-outline-warning mb-2">View Cart</button>
                                        </a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr align ="middle">
                                <td colspan="8" class="no-data">No User Found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>