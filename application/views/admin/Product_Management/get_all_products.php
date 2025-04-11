
<div class="row">
    <div class="col-md-12">
        <div class="card mb-12">
            <div class="card-header">
                <h2 class="card-title">All Products</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr align="middle">
                            <th style="width: 10px">ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th style="width: 40px">Quantity</th>
                            <th style="width: 40px">Description</th>
                            <th>Added On</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($items)): ?>
                            <?php foreach ($items as $item): ?>
                                <tr class="align-middle" align="middle">
                                    <td><?= isset($item['pid']) ? htmlspecialchars($item['pid']) : 'N/A'; ?></td>
                                    <td><?= isset($item['name']) ? htmlspecialchars($item['name']) : 'N/A'; ?></td>
                                    <td><?= isset($item['price']) ? htmlspecialchars($item['price']) : 'N/A'; ?></td>
                                    <td><span class="badge text-bg-danger"><?= isset($item['quantity']) ? htmlspecialchars($item['quantity']) : 'N/A'; ?></span></td>
                                    <td><span class="badge text-bg-success"><?= isset($item['desc']) ? htmlspecialchars($item['desc']) : 'N/A'; ?></span></td>
                                    <td><?= isset($item['created_at']) ? htmlspecialchars($item['created_at']) : 'N/A'; ?></td>
                                    <td><?= isset($item['updated_at']) ? htmlspecialchars($item['updated_at']) : 'N/A'; ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?= base_url('index.php/admin/editItem/' . $item['pid']) ?>">
                                                <button type="button" class="btn btn-outline-primary mb-2">Edit</button>
                                            </a>
                                            <a href="<?= base_url('index.php/admin/deleteItem/' . $item['pid']) ?>">
                                                <button type="button" class="btn btn-outline-danger mb-2">Delete</button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="no-data">No item Found</td>
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