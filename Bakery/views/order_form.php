<div class="row mb-4">
    <div class="col-md-12">
        <div class="dashboard-header">
            <h2 class="page-title"><i class="fas fa-cart-plus custom-icon"></i><?php echo isset($order) ? 'Edit Order' : 'Create New Order'; ?></h2>
            <p class="lead"><?php echo isset($order) ? 'Update order information' : 'Place a new baking order'; ?></p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-clipboard-list me-2"></i>Order Details</h5>
            </div>
            <div class="card-body">
                <form action="index.php?page=order_form<?php echo isset($order) ? '&id=' . $order->getId() : ''; ?>" method="post">
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product</label>
                        <select class="form-select" id="product_id" name="product_id" required>
                            <option value="">Select Product</option>
                            <?php foreach ($products as $product): ?>
                                <option value="<?php echo $product->getId(); ?>" 
                                    <?php echo (isset($order) && $order->getProductId() == $product->getId()) ? 'selected' : ''; ?>>
                                    <?php echo $product->getName(); ?> - $<?php echo number_format($product->getPrice(), 2); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="baker_id" class="form-label">Baker</label>
                        <select class="form-select" id="baker_id" name="baker_id" required>
                            <option value="">Select Baker</option>
                            <?php foreach ($bakers as $baker): ?>
                                <option value="<?php echo $baker->getId(); ?>" 
                                    <?php echo (isset($order) && $order->getBakerId() == $baker->getId()) ? 'selected' : ''; ?>>
                                    <?php echo $baker->getName(); ?> (<?php echo $baker->getSpecialty(); ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" min="1" class="form-control" id="quantity" name="quantity" 
                               value="<?php echo isset($order) ? $order->getQuantity() : '1'; ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Pending" <?php echo (isset($order) && $order->getStatus() == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="In Progress" <?php echo (isset($order) && $order->getStatus() == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                            <option value="Completed" <?php echo (isset($order) && $order->getStatus() == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                            <option value="Cancelled" <?php echo (isset($order) && $order->getStatus() == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?page=order_list" class="btn btn-secondary me-md-2">
                            <i class="fas fa-arrow-left me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary" name="submit">
                            <i class="fas fa-save me-1"></i> <?php echo isset($order) ? 'Update' : 'Save'; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>