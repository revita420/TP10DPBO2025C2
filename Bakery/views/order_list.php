<div class="row mb-4">
    <div class="col-md-12">
        <div class="dashboard-header">
            <h2 class="page-title"><i class="fas fa-clipboard-list custom-icon"></i>Order Management</h2>
            <p class="lead">Track and manage all bakery orders</p>
            <a href="index.php?page=order_form" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Create New Order
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
                                <th>Product</th>
                                <th>Baker</th>
                                <th>Quantity</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $order->getId(); ?></td>
                                <td><?php echo $order->getProductName(); ?></td>
                                <td><?php echo $order->getBakerName(); ?></td>
                                <td><?php echo $order->getQuantity(); ?></td>
                                <td><?php echo date('M d, Y', strtotime($order->getOrderDate())); ?></td>
                                <td>
                                    <span class="badge bg-<?php 
                                        echo ($order->getStatus() == 'Completed') ? 'success' : 
                                            (($order->getStatus() == 'Pending') ? 'warning' : 'info'); 
                                    ?>">
                                        <?php echo $order->getStatus(); ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="index.php?page=order_form&id=<?php echo $order->getId(); ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="index.php?page=order_list&action=delete&id=<?php echo $order->getId(); ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this order?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (count($orders) == 0): ?>
                            <tr>
                                <td colspan="7" class="text-center">No orders found.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>