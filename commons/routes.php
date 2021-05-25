<?php

use App\Controllers\CategoryController;
use App\Controllers\UserController;
use App\Controllers\OrderController;
use App\Controllers\HomeController;
use App\Controllers\CartController;
use App\Controllers\ProductController;
use App\Models\Category;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

$router = new RouteCollector();

$router->filter('auth' , function(){
    if(!isset($_SESSION[AUTH]) || empty($_SESSION[AUTH]) || $_SESSION[AUTH]['role'] < 200){

        header("Location: ".BASE_URL . "login");
        die;
    }

}); 
/*
$router->filter('auth', function(){
    if(!isset($_SESSION[AUTH]) || empty($_SESSION[AUTH]) ||$_SESSION[AUTH]['role']<200){
        header('location: ' . BASE_ULR . 'login');
        die;
    }
});
*/
//chay đi 
// ok đợi 
// controller login đâu



$router->get('/', [HomeController::class, "index"]);

$router->get('/single-product/{id}', [HomeController::class, "singleProduct"]);
 
$router->get('/registration', [HomeController::class, "registration"]);
$router->get('/mycart/{id}', [CartController::class, "addCart"]);
$router->get('/mycart', [CartController::class, "showCart"]);
$router->get('/delete-add/{id}', [CartController::class, "deleteCart"]);
 
$router->post('/update-cart', [CartController::class, "updateCart"]);

$router->post('/update-cart-qty', [CartController::class, "updateCarts"]);

$router->get('/checkout', [CartController::class, "checkOut"]);
$router->post('/checkout', [CartController::class, "postCheckout"]);
$router->get('/bill', [CartController::class, 'bill']);



$router->get('/shop', [HomeController::class, "shop"]);

$router->get('/category/{id}', [HomeController::class, "category"]);
$router->get('/login', [HomeController::class, "loginForm"]);
$router->post('/login', [HomeController::class, "postLogin"]);

$router->post('/registration', [HomeController::class, "postReg"]);
$router->get('/logout', [HomeController::class, "logout"]);


// admin
$router->group(['prefix'=>'admin', 'before' => 'auth'], function($router){
    $router->get('/', [CategoryController::class, "index"], ['before'=>'auth']);
    $router->get('/danh-muc', [CategoryController::class, "index"], ['before'=>'auth']);

    $router->group(['prefix' => 'danh-muc'], function($router){
        $router->get('/new-cate', [CategoryController::class, "addNew"]);
        $router->post('/new-cate', [CategoryController::class, "saveCate"]);
        $router->get('/edit-cate/{id}', [CategoryController::class, "editCate"]);
        $router->post('/edit-cate/{id}', [CategoryController::class, "saveEdit"]);
        $router->get('/remove-cate/{id}', [CategoryController::class, "removeCate"]);
    });

    $router->get('/san-pham', [ProductController::class, "index"]);
    $router->group(['prefix' => 'san-pham'], function($router){

        $router->get('/new-product', [ProductController::class, "newProduct"]);
        $router->post('/save-product', [ProductController::class, "saveProduct"]);
        $router->post('/edit-product/{id}', [ProductController::class, "editSaveProduct"]);
        $router->get('/delete-product/{id}', [ProductController::class, "delete"]);
        $router->get('/edit-product/{id}', [ProductController::class, "editProduct"]);
    });

    $router->get('/order', [OrderController::class, "index"]);
    $router->group(['prefix' => 'order'], function($router){
        $router->get('/order', [OrderController::class, "index"]);
        $router->get('/edit-order/{id}', [OrderController::class, "editOrder"]);
        $router->get('/delete-order/{id}', [OrderController::class, "delete"]);
        $router->post('/edit-order/{id}', [OrderController::class, "saveEditOrder"]);
        $router->get('/order-detail/{id}', [OrderController::class, "showDetail"]);

    });
    $router->get('/user', [UserController::class, "index"]);

    $router->group(['prefix' => 'user'], function($router){
        $router->get('/user', [UserController::class, "index"]);
        $router->get('/add-user', [UserController::class, "addUser"]);
        $router->post('/save-user', [UserController::class, "saveUser"]);
        $router->get('/delete-user/{id}', [UserController::class, "delete"]);
        $router->get('/edit-user/{id}', [UserController::class, "editUser"]);
        $router->post('/edit-user/{id}', [UserController::class, "saveEditUser"]);
    });

});

$router->get('/frontend', [HomeController::class, "frontend"]);


$router->get('/error-404', function(){
    return "đường dẫn không tồn tại";
});



$router->get('fake-product-gallery', [ProductController::class, 'fakeGallery']);
$router->get('fake-users', [HomeController::class, 'fakeUser']);
$router->get('fake-product', [ProductController::class, 'fakeProduct']);

// tham số tùy chọn: {name}?
// tham số bắt buộc: {id}

$dispatcher = new Dispatcher($router->getData());

try{
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
}catch(HttpRouteNotFoundException $ex){
    header("Location: ". BASE_URL."error-404");
}
    
// Print out the value returned from the dispatched function
echo $response;

?>