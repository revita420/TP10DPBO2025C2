<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Delights Bakery</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #FF9EBB;
            --secondary-color: #FFC7D9;
            --accent-color: #FF6B9A;
            --light-color: #FFE1E9;
            --dark-color: #D9597C;
            --text-color: #4A2940;
        }
        
        body {
            background-color: var(--light-color);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
            color: white !important;
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: var(--light-color) !important;
            transform: translateY(-2px);
        }
        
        .dropdown-menu {
            background-color: var(--light-color);
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .dropdown-item {
            color: var(--text-color);
            transition: all 0.2s;
            padding: 8px 15px;
        }
        
        .dropdown-item:hover {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            background-color: white;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background-color: var(--secondary-color);
            color: var(--text-color);
            font-weight: bold;
            border-radius: 15px 15px 0 0 !important;
            padding: 15px 20px;
        }
        
        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
            font-weight: 500;
            border-radius: 30px;
            padding: 8px 20px;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: var(--dark-color);
            border-color: var(--dark-color);
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background-color: #FF4D6B;
            border-color: #FF4D6B;
            border-radius: 30px;
            padding: 8px 20px;
        }
        
        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }
        
        .table thead {
            background-color: var(--secondary-color);
            color: var(--text-color);
        }
        
        .form-control {
            border-radius: 10px;
            border: 1px solid #FFD1DC;
            padding: 10px 15px;
        }
        
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 107, 154, 0.25);
        }
        
        .page-title {
            color: var(--text-color);
            font-weight: bold;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }
        
        .page-title::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            background-color: var(--accent-color);
            bottom: -10px;
            left: 0;
            border-radius: 10px;
        }
        
        .dashboard-header {
            background-color: var(--secondary-color);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }

        .custom-icon {
            color: var(--accent-color);
            margin-right: 10px;
        }
        
        /* Fix for product table */
        .product-table {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
        }
        
        .product-table th {
            background-color: var(--secondary-color);
            color: var(--text-color);
            font-weight: bold;
            border: none;
        }
        
        .product-table td {
            vertical-align: middle;
            border-color: #FFE1E9;
        }
        
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .action-btn {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        
        .edit-btn {
            background-color: var(--accent-color);
            color: white;
        }
        
        .delete-btn {
            background-color: #FF4D6B;
            color: white;
        }
        
        .add-product-btn {
            background-color: var(--accent-color);
            color: white;
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
        }
        
        .add-product-btn:hover {
            background-color: var(--dark-color);
            transform: translateY(-2px);
        }
        
        .products-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        
        .product-title {
            position: relative;
            margin-bottom: 30px;
            display: inline-block;
            color: var(--text-color);
        }
        
        .product-title::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            background-color: var(--accent-color);
            bottom: -10px;
            left: 25%;
            border-radius: 10px;
        }
        
        /* Quick links section */
        .quick-contact {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .quick-contact h5 {
            color: var(--dark-color);
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .quick-contact ul {
            list-style: none;
            padding-left: 0;
        }
        
        .quick-contact li {
            margin-bottom: 10px;
        }
        
        .quick-contact a {
            color: var(--text-color);
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .quick-contact a:hover {
            color: var(--accent-color);
        }
        
        .contact-icon {
            color: var(--accent-color);
            margin-right: 8px;
            width: 16px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-birthday-cake me-2"></i>Sweet Delights Bakery
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="productDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cookie me-1"></i> Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="productDropdown">
                            <li><a class="dropdown-item" href="index.php?page=product_list">View Products</a></li>
                            <li><a class="dropdown-item" href="index.php?page=product_form">Add Product</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="bakerDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-chef me-1"></i> Bakers
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="bakerDropdown">
                            <li><a class="dropdown-item" href="index.php?page=baker_list">View Bakers</a></li>
                            <li><a class="dropdown-item" href="index.php?page=baker_form">Add Baker</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="orderDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-clipboard-list me-1"></i> Orders
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="orderDropdown">
                            <li><a class="dropdown-item" href="index.php?page=order_list">View Orders</a></li>
                            <li><a class="dropdown-item" href="index.php?page=order_form">Add Order</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

