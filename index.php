<?php 
session_start();
$url = isset($_GET['url']) == true 
                    ? $_GET['url'] : "/";

require_once './commons/utils.php';
require_once './vendor/autoload.php';
require_once './config/database.php'; 
require_once './commons/routes.php';



// use App\Controllers\CartController;
// use App\Controllers\CategoryController;
// use App\Controllers\ProductController;
// use App\Controllers\HomeController;
// use App\Controllers\OrderController;
// use App\Controllers\UserController;
// use App\Controllers\OrderDetailController;

// use App\Models\Category;
// use App\Models\Order;
// use App\Models\OrderDetail;
// use App\Models\Product;
// use App\Models\User;

// switch($url){
//     //frontend
//     case "/":
//         $ctr = new HomeController();
//         $ctr->index();
//         break;

//     case 'single-product':
//         $ctr = new HomeController();
//         $ctr->singleProduct();
//         break;
        
    
//     case 'registration':
//         $ctr = new HomeController();
//         $ctr->registration();
//         break;
        
//         // giỏ hàng
//     // case 'mycart':
//     //     $ctr = new CartController();
//     //     $ctr->addCart();
//     //     break;

//     case 'mycart': //add-cart
//         $ctr = new CartController();
//         $ctr->addCart();
//         break;     

//     case 'delete-add':
//         $ctr =  new CartController();
//         $ctr->deleteCart();
//         break;
    
//     case 'update-cart':
//         $ctr =  new CartController();
//         $ctr->updateCart(false);
//         break;  

//     case 'add-qty-cart':
//         $ctr =  new CartController();
//         $ctr->updateCart(true);
//         break;   

//         // đặt hàng

//     case 'checkout':
//         $ctr= new CartController();
//         $ctr->checkOut();
//         break;
    
//     case 'check-outs':
//         $ctr= new CartController();
//         $ctr->postCheckout();
//         break;
    


//         // danh sachs sản phẩm hiển thị 

//     case 'shop':
//         $ctr = new HomeController();
//         $ctr->shop();
//         break;

//     case 'category':
//         $ctr = new HomeController();
//         $ctr->category();
//         break;

//     case "login":
//         $ctr = new HomeController();
//         $ctr->loginForm();
//         break;

//     case 'post-login':
//         $ctr = new HomeController();
//         $ctr->postLogin();
//         break;

//     case 'post-reg':
//         $ctr = new HomeController();
//         $ctr->postReg();
//         break;

//     case 'logout':
//         $ctr = new HomeController();
//         $ctr->logout();
//         break;




// // Quản lí website 

//     case "list-cate":
//         checkAuth();
//         $ctr = new CategoryController();
//             $ctr->index();
//         break;

//         // Category
//     case "new-cate":
//         checkAuth();
//         $ctr = new CategoryController();
//          $ctr->addNew();
//         break;
//     case "save-cate":
//         checkAuth();
//         $ctr = new CategoryController();
//          $ctr->saveCate();
//         break;
//     case "edit-cate":
//         checkAuth();
//         $ctr = new CategoryController();
//          $ctr->editCate();
//         break;
//     case "save-edit-cate":
//         checkAuth();
//         $ctr = new CategoryController();
//          $ctr->saveEdit();
//         break;
//     case "remove-cate":
//         checkAuth();
//         $ctr = new CategoryController();
//          $ctr->removeCate();
//         break;
//     // Category

//     case "san-pham":
//         checkAuth();
//         $ctr = new ProductController();     
//          $ctr->index();
//         break;
//         // sản phẩm
//     case 'new-product':
//         checkAuth();
//         $ctr = new ProductController();
//         $ctr->newProduct();
//         break;

//     case 'save-product':
//         checkAuth();
//         $ctr = new ProductController();
//         $ctr->saveProduct();
//         break;

//     case 'edit-save-product':
//         checkAuth();
//         $ctr = new ProductController();
//         $ctr->editSaveProduct();
//         break;

//     case 'delete-product':
//         checkAuth();
//         $ctr = new ProductController();
//         $ctr->delete();
//         break;

//     case 'edit-product':
//         checkAuth();
//         $ctr = new ProductController();
//         $ctr->editProduct();
//         break;

//         // đơn hàng
//     case 'order' :
//         checkAuth();
//         $ctr = new OrderController();
//         $ctr->index();
//         break;
 
//     case 'edit-order' :
//         checkAuth();
//         $ctr = new OrderController();
//         $ctr->editOrder();
//         break;
        
//     case 'delete-order' :
//         checkAuth();
//         $ctr = new OrderController();
//         $ctr->delete();
//         break;

//     case 'save-edit-order' :
//         checkAuth();
//         $ctr = new OrderController();
//         $ctr->saveEditOrder();
//         break;

    
//     case 'user':
//         checkAuth();
//         $ctr = new UserController();
//         $ctr->index();
//         break;
//     case 'add-user':
//         checkAuth();
//         $ctr = new UserController();
//         $ctr->addUser();
//          break;
//     case 'save-user': 
//         checkAuth();
//         $ctr = new UserController();
//         $ctr->saveUser();
//         break;

//     case 'delete-user':
//         checkAuth();
//         $ctr = new UserController();
//         $ctr->delete();
//         break;

//     case 'edit-user':
//         checkAuth();
//         $ctr = new UserController();
//         $ctr->editUser();
//         break;

//     case 'save-edit-user':
//         checkAuth();
//         $ctr = new UserController();
//         $ctr->saveEditUser();
//         break;

//     case 'order-detail':
//         checkAuth();
//         $ctr = new OrderController();
//         $ctr->showDetail();
//         break;
 
//     case 'frontend':
//         $ctr = new HomeController();
//         $ctr->frontend();
//         break;
//     default: 

//         echo  'Không tồn tại trang này nhé';
//         break;
    

// }


?>