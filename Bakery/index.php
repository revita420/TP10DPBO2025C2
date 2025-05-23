<?php  
// Include files 
include_once 'config/database.php'; 
include_once 'model/Product.php'; 
include_once 'model/Baker.php'; 
include_once 'model/Order.php'; 
include_once 'viewmodel/ProductViewModel.php'; 
include_once 'viewmodel/BakerViewModel.php'; 
include_once 'viewmodel/OrderViewModel.php';  

// database connection 
$database = new Database(); 
$db = $database->getConnection();  

// ViewModels 
$productViewModel = new ProductViewModel($db); 
$bakerViewModel = new BakerViewModel($db); 
$orderViewModel = new OrderViewModel($db);  

// Get page parameter from URL 
$page = isset($_GET['page']) ? $_GET['page'] : 'home'; 
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
$id = isset($_GET['id']) ? $_GET['id'] : null;  

// Include header 
include_once 'views/template/header.php';  

// Page routing 
switch ($page) {     
    // Product pages     
    case 'product_list':         
        // Handle delete action         
        if ($action === 'delete' && $id) {             
            if ($productViewModel->deleteProduct($id)) {                 
                echo '<div class="alert alert-success">Product deleted successfully!</div>';             
            } else {                 
                echo '<div class="alert alert-danger">Failed to delete product. It might be referenced in orders.</div>';             
            }         
        }                  
        
        // Get all products and bind to the view         
        $products = $productViewModel->getAllProducts();         
        include_once 'views/product_list.php';         
        break;              
        
    case 'product_form':         
        // If ID is provided, get the product for editing         
        if ($id) {             
            $product = $productViewModel->getProductById($id);             
            if (!$product) {                 
                echo '<div class="alert alert-danger">Product not found!</div>';                 
                echo '<a href="index.php?page=product_list" class="btn btn-primary">Back to Products</a>';                 
                break;             
            }         
        }                  
        
        // Handle form submission         
        if (isset($_POST['submit'])) {             
            $name = $_POST['name'];             
            $description = $_POST['description'];             
            $price = $_POST['price'];                          
            
            if ($id) {                 
                // Update existing product                 
                if ($productViewModel->updateProduct($id, $name, $description, $price)) {                     
                    echo '<div class="alert alert-success">Product updated successfully!</div>';                     
                    echo '<meta http-equiv="refresh" content="1;url=index.php?page=product_list">';                 
                } else {                     
                    echo '<div class="alert alert-danger">Failed to update product!</div>';                 
                }             
            } else {                 
                // Create new product                 
                if ($productViewModel->createProduct($name, $description, $price)) {                     
                    echo '<div class="alert alert-success">Product created successfully!</div>';                     
                    echo '<meta http-equiv="refresh" content="1;url=index.php?page=product_list">';                 
                } else {                     
                    echo '<div class="alert alert-danger">Failed to create product!</div>';                 
                }             
            }         
        }                  
        
        include_once 'views/product_form.php';         
        break;              
        
    // Baker pages     
    case 'baker_list':         
        // Handle delete action         
        if ($action === 'delete' && $id) {             
            if ($bakerViewModel->deleteBaker($id)) {                 
                echo '<div class="alert alert-success">Baker deleted successfully!</div>';             
            } else {                 
                echo '<div class="alert alert-danger">Failed to delete baker. They might be assigned to orders.</div>';             
            }         
        }                  
        
        // Get all bakers and bind to the view         
        $bakers = $bakerViewModel->getAllBakers();         
        include_once 'views/baker_list.php';         
        break;     
        
    case 'baker_form':         
        // If ID is provided, get the baker for editing         
        if ($id) {             
            $baker = $bakerViewModel->getBakerById($id);             
            if (!$baker) {                 
                echo '<div class="alert alert-danger">Baker not found!</div>';                 
                echo '<a href="index.php?page=baker_list" class="btn btn-primary">Back to Bakers</a>';                 
                break;             
            }         
        }                  
        
        // Handle form submission         
        if (isset($_POST['submit'])) {             
            $name = $_POST['name'];             
            $specialty = $_POST['specialty'];             
            $join_date = $_POST['join_date'];             
            $contact = $_POST['contact'];                          
            
            if ($id) {                 
                // Update existing baker                 
                if ($bakerViewModel->updateBaker($id, $name, $specialty, $join_date, $contact)) {                     
                    echo '<div class="alert alert-success">Baker updated successfully!</div>';                     
                    echo '<meta http-equiv="refresh" content="1;url=index.php?page=baker_list">';                 
                } else {                     
                    echo '<div class="alert alert-danger">Failed to update baker!</div>';                 
                }             
            } else {                 
                // Create new baker                 
                if ($bakerViewModel->createBaker($name, $specialty, $join_date, $contact)) {                     
                    echo '<div class="alert alert-success">Baker created successfully!</div>';                     
                    echo '<meta http-equiv="refresh" content="1;url=index.php?page=baker_list">';                 
                } else {                     
                    echo '<div class="alert alert-danger">Failed to create baker!</div>';                 
                }             
            }         
        }                  
        
        include_once 'views/baker_form.php';         
        break;              
        
    // Order pages     
    case 'order_list':         
        // Handle delete action         
        if ($action === 'delete' && $id) {             
            if ($orderViewModel->deleteOrder($id)) {                 
                echo '<div class="alert alert-success">Order deleted successfully!</div>';             
            } else {                 
                echo '<div class="alert alert-danger">Failed to delete order!</div>';             
            }         
        }                  
        
        // Get all orders and bind to the view         
        $orders = $orderViewModel->getAllOrders();         
        include_once 'views/order_list.php';         
        break;              
        
    case 'order_form':         
        // If ID is provided, get the order for editing         
        if ($id) {             
            $order = $orderViewModel->getOrderById($id);             
            if (!$order) {                 
                echo '<div class="alert alert-danger">Order not found!</div>';                 
                echo '<a href="index.php?page=order_list" class="btn btn-primary">Back to Orders</a>';                 
                break;             
            }         
        }                  
        
        // Get products and bakers for dropdown lists         
        $products = $productViewModel->getAllProducts();         
        $bakers = $bakerViewModel->getAllBakers();                  
        
        // Handle form submission         
        if (isset($_POST['submit'])) {             
            $product_id = $_POST['product_id'];             
            $baker_id = $_POST['baker_id'];             
            $quantity = $_POST['quantity'];             
            $status = $_POST['status'];                          
            
            if ($id) {                 
                // Update existing order                 
                if ($orderViewModel->updateOrder($id, $product_id, $baker_id, $quantity, $status)) {                     
                    echo '<div class="alert alert-success">Order updated successfully!</div>';                     
                    echo '<meta http-equiv="refresh" content="1;url=index.php?page=order_list">';                 
                } else {                     
                    echo '<div class="alert alert-danger">Failed to update order!</div>';                 
                }             
            } else {                 
                // Create new order                 
                if ($orderViewModel->createOrder($product_id, $baker_id, $quantity, $status)) {                     
                    echo '<div class="alert alert-success">Order created successfully!</div>';                     
                    echo '<meta http-equiv="refresh" content="1;url=index.php?page=order_list">';                 
                } else {                     
                    echo '<div class="alert alert-danger">Failed to create order!</div>';                 
                }             
            }         
        }                  
        
        include_once 'views/order_form.php';         
        break;              
        
    // Home page - redirect to product list as default     
    case 'home':     
    default:         
        // Get summary data         
        $products = $productViewModel->getAllProducts();         
        $bakers = $bakerViewModel->getAllBakers();         
        $orders = $orderViewModel->getAllOrders();                  
        
        // Count totals for display         
        $totalProducts = count($products);         
        $totalBakers = count($bakers);         
        $totalOrders = count($orders);                  
        
        // Display product list as home page
        echo '<div class="container mt-4">';
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        echo '<h2>Bakery Management System</h2>';
        echo '<div class="alert alert-info">Welcome to the Bakery Management System! You have ' . $totalProducts . ' products, ' . $totalBakers . ' bakers, and ' . $totalOrders . ' orders.</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        
        // Show product list as default
        include_once 'views/product_list.php';         
        break; 
}  

// Include footer 
include_once 'views/template/footer.php'; 
?>