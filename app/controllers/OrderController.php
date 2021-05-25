<?php 

namespace App\Controllers;

use  App\Models\Order;
use  App\Models\Product;
use App\Models\OrderDetail;
class OrderController extends BaseController{

    public function index(){


        
        $keyword = isset($_GET['keyword'])== true ?  $_GET['keyword'] : "";

        if($keyword != ""){
            $order = Order::where("customer_name" ,"like" , "%$keyword%")->get();
        }else{
            $order  = Order::all();
        }



        $this->render('orders.index' ,compact('order'));
    } 

 

    public function editOrder($id ){
        // $id = $_GET['id'];

        $model = Order::find($id);

        if($model){
            $this->render('orders.edit-order', compact('model'));
        }else{

            header('Location: order');
        }

    }

    public function delete($id){

        // $id = $_GET['id'];
        $model = Order::find($id);
    
        if(!$model){
            header("Location: ".BASE_URL."admin/order");
            exit;
        }

        // Order::where('id' , $id)->delete();
        $model->delete();
        header("Location: ".BASE_URL."admin/order");

    }

    public function saveEditOrder($id){
       

        $model = Order::find($id);

        if(!$model){
            header("Location: ".BASE_URL."admin/order");
            exit;
        }

        $model -> fill($_POST);
        $model->save();
        header("Location: ".BASE_URL."admin/order");

    }

    public function showDetail($id){
  
        $details= OrderDetail::where("invoice_id", "like", $id)->get();    
      
        $id_product =[];
        foreach($details as $key =>$value){
            $id_product [] = $value->product_id;
        }

        $products = Product::find($id_product);

        $this->render('orders.order-detail',compact('details', 'products'));
       
    }



}
