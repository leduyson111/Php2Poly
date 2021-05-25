<?php 
namespace App\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

class CartController extends BaseController
{
    public function index()
    {
    }
    
    public function addCart($id)
    {
        if (isset($id)) {
            // $id = $_GET['id'];
            // kiểm tra xem giỏ hàng có tồn tại hay không
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart']  = array();
            } // tạo mới giỏ hàng bằng 1 mảng

            if (!isset($_SESSION['cart'][$id])) { // kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
                // nếu chưa tồn tại sản phẩm trong giỏ hàng thì ta tọa thêm 1 sản phẩm nữa
                $_SESSION['cart'][$id]['qty'] = 1;
            }else {
                // nếu tồn tại thì tăng số lượng lên 1
                // $_SESSION['cart'][$id] = $id;// gán id cho sản phẩm trong giỏ hàng
                // gán số lượng của sản phẩm đó  là 1
                $_SESSION['cart'][$id]['qty']++;
            }
        }

        @$cart=$_SESSION['cart'] ;
        $list_id_produdct_cart=[];

        if (isset($_SESSION['cart'])) {
            foreach ($cart as $key => $value) {
                $list_id_produdct_cart[]=$key;
            }
        }
        $list_products=Product::find($list_id_produdct_cart);
        $this->render('frontend.mycart', ['list_products'=> $list_products]);
     
    }
 
 

    public function showCart(){

        @$cart=$_SESSION['cart'] ;
        $list_id_produdct_cart=[];
        if (isset($_SESSION['cart'])) {
            foreach ($cart as $key => $value) {
                $list_id_produdct_cart[]=$key;
            }
        }
        $list_products=Product::find($list_id_produdct_cart);
        $this->render('frontend.mycart', ['list_products'=> $list_products]);

    }

    public function deleteCart($id){
        // lấy về tên giỏ hàng
         $cart = $_SESSION['cart'];
     
        if($id== 0 ){
            unset($_SESSION['cart']);
            //xóa tất cả các sản phẩm trong giỏ hàng luôn 
        }else{
            unset($_SESSION['cart'][$id]);
            //xóa 1 sản phẩm
        }
        header('Location: '.BASE_URL.'mycart');
    }

    public function updateCart(){
        foreach($_POST['qty'] as $id => $qty){
            if($qty == 0 ){
                unset($_SESSION['cart'][$id]);

                header('Location: '. BASE_URL.'mycart');
                
            }else{

                $_SESSION['cart'][$id]['qty'] = $qty; 
              
                header('Location: '. BASE_URL.'mycart');
            }
        }
    }


    public function updateCarts(){
        foreach($_POST['qty'] as $id => $qty){

                // nếu  thì số lượng sẽ cập nhật lại bên trang detial
                $_SESSION['cart'][$id]['qty'] += $qty;
                header('Location: '. BASE_URL.'mycart');
            }
       
    }

    public function checkOut(){
        $this->render('frontend.checkout');
    }


    public function postCheckout(){

    if (isset($_POST)) {
        $err =[];
            
            if (empty($_POST['customer_name'])) {
                $err['customer_name'] = "Không được để trống tên khách hàng";
            }
            if (empty($_POST['customer_phone_number'])) {
                $err['customer_phone_number'] = "Không được để trống số điện thoại";
            }
            if (empty($_POST['customer_email'])) {
                $err['customer_email'] = "Không được để trống email";
            }

            if (empty($_POST['customer_address'])) {
                $err['customer_address'] = "Không được để trống địa chỉ";
            }

            if (empty($err)) {
                $cart=$_SESSION['cart'];
                $total_price=0;
                $list_id_produdct_carts=[];

                $list_qty_produdct_carts=[];

                foreach ($cart as $keys =>$values) {
                    $list_id_produdct_carts[]=$keys; // id sản phẩm
                    $list_qty_produdct_carts[$keys]=$values;

                    $products = Product::find($keys); // lấy được giá sản phẩm
                    $total_price+=$values['qty']*$products->price;
                }

            
                $order = new Order();
                $order->fill($_POST);

                $order['total_price'] = $total_price;
        
                $order->save();
                $id=$order->id;
        
    
                $list_id_produdct_cart=[];
                $list_qty_produdct_cart=[];

                foreach ($cart as $key => $value) { // value là số lượng
                $list_id_produdct_cart[]=$key; // id sản phẩm
                $list_qty_produdct_cart[$key]=$value; //  số lượng sản phẩm mua
                $products = Product::find($key); // lấy được giá sản phẩm
             
                $insert_data_details=[
                    "invoice_id"=>$id,
                    "product_id"=>$key,
                    "quantity" =>$value['qty'],
                    "unit_price"=>$products->price,
                ];

                    $orderDetail = new OrderDetail();
                    $orderDetail->fill($insert_data_details);
                    $orderDetail->save();
                }
                unset($_SESSION['cart']);
                header("Location: ". BASE_URL.'bill'.'?id='.$id);
            }
        }
        $this->render('frontend.checkout', compact('err'));
    }


    public function bill(){ 

        $id = $_GET['id'];
        $order = Order::find($id);

        $orderDetail = OrderDetail::where("invoice_id" , $id)->get(); // lấy tất cả các bản ghi có invoice_id 

        $list_id_product = [];

        $list_qty_product =[];

        foreach($orderDetail as $orderId){
            $list_id_product[] = $orderId->product_id;
            $list_qty_product[] = $orderId->quantity;
        }    
        $products = Product::find($list_id_product); // lấy được ảnh và giá của sản phẩm



      $this->render("frontend.bill", compact('order' ,'products','list_qty_product' ));
    }

     

}