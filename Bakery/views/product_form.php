<div class="row mb-4">
    <div class="col-md-12">
        <div class="dashboard-header">
            <h2 class="page-title"><i class="fas fa-cookie-bite custom-icon"></i><?php echo isset($product) ? 'Edit Product' : 'Add New Product'; ?></h2>
            <p class="lead"><?php echo isset($product) ? 'Update product information' : 'Add a delicious new item to our menu'; ?></p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-clipboard-list me-2"></i>Product Details</h5>
            </div>
            <div class="card-body">
                <form action="index.php?page=product_form<?php echo isset($product) ? '&id=' . $product->getId() : ''; ?>" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?php echo isset($product) ? $product->getName() : ''; ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required><?php echo isset($product) ? $product->getDescription() : ''; ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" 
                               value="<?php echo isset($product) ? $product->getPrice() : ''; ?>" required>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?page=product_list" class="btn btn-secondary me-md-2">
                            <i class="fas fa-arrow-left me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary" name="submit">
                            <i class="fas fa-save me-1"></i> <?php echo isset($product) ? 'Update' : 'Save'; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>