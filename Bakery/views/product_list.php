<div class="row mb-4">
    <div class="col-md-12">
        <div class="dashboard-header">
            <h2 class="page-title"><i class="fas fa-birthday-cake custom-icon"></i>Our Sweet Products</h2>
            <p class="lead">Browse our delicious baked goods and confections!</p>
            <a href="index.php?page=product_form" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Add New Product
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product->getId(); ?></td>
                                <td><?php echo $product->getName(); ?></td>
                                <td><?php echo $product->getDescription(); ?></td>
                                <td>$<?php echo number_format($product->getPrice(), 2); ?></td>
                                <td>
                                    <a href="index.php?page=product_form&id=<?php echo $product->getId(); ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="index.php?page=product_list&action=delete&id=<?php echo $product->getId(); ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (count($products) == 0): ?>
                            <tr>
                                <td colspan="5" class="text-center">No products found.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>