<div class="row mb-4">
    <div class="col-md-12">
        <div class="dashboard-header">
            <h2 class="page-title"><i class="fas fa-user-plus custom-icon"></i><?php echo isset($baker) ? 'Edit Baker' : 'Add New Baker'; ?></h2>
            <p class="lead"><?php echo isset($baker) ? 'Update baker information' : 'Register a new talented baker'; ?></p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-user-edit me-2"></i>Baker Details</h5>
            </div>
            <div class="card-body">
                <form action="index.php?page=baker_form<?php echo isset($baker) ? '&id=' . $baker->getId() : ''; ?>" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?php echo isset($baker) ? $baker->getName() : ''; ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="specialty" class="form-label">Specialty</label>
                        <input type="text" class="form-control" id="specialty" name="specialty" 
                               value="<?php echo isset($baker) ? $baker->getSpecialty() : ''; ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="join_date" class="form-label">Join Date</label>
                        <input type="date" class="form-control" id="join_date" name="join_date" 
                               value="<?php echo isset($baker) ? $baker->getJoinDate() : date('Y-m-d'); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" 
                               value="<?php echo isset($baker) ? $baker->getContact() : ''; ?>" required>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?page=baker_list" class="btn btn-secondary me-md-2">
                            <i class="fas fa-arrow-left me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary" name="submit">
                            <i class="fas fa-save me-1"></i> <?php echo isset($baker) ? 'Update' : 'Save'; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>