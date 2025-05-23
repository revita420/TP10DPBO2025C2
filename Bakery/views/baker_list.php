<div class="row mb-4">
    <div class="col-md-12">
        <div class="dashboard-header">
            <h2 class="page-title"><i class="fas fa-users custom-icon"></i>Our Talented Bakers</h2>
            <p class="lead">Meet the skilled professionals who create our delicious treats!</p>
            <a href="index.php?page=baker_form" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Add New Baker
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
                                <th>Specialty</th>
                                <th>Join Date</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bakers as $baker): ?>
                            <tr>
                                <td><?php echo $baker->getId(); ?></td>
                                <td><?php echo $baker->getName(); ?></td>
                                <td><?php echo $baker->getSpecialty(); ?></td>
                                <td><?php echo $baker->getJoinDate(); ?></td>
                                <td><?php echo $baker->getContact(); ?></td>
                                <td>
                                    <a href="index.php?page=baker_form&id=<?php echo $baker->getId(); ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="index.php?page=baker_list&action=delete&id=<?php echo $baker->getId(); ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this baker?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (count($bakers) == 0): ?>
                            <tr>
                                <td colspan="6" class="text-center">No bakers found.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>