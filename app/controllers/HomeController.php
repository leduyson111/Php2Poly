<?php
namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Faker;
use App\Models\ProductGallery;

class HomeController extends BaseController{

    public function index(){

        $category = Category::all();
        $keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "" ;
        if($keyword != ""){
            $products= Product::where("name", "like", "%$keyword%")->get();
        }else{
            $products = Product::limit(5)->get();
        }

        $productPrice = Product::orderBy('star', 'desc')
                        ->orderBy('id', 'desc')->take(8)->get();

        $this->render('frontend.home',compact('category' , 'productPrice', 'products'));
       
    }

    public function category($id){

        $products = Product::where('cate_id' ,'=', $id)->orderBy('price', 'desc')->get();
        $this->render('frontend.category', compact('products'));
       
    }


    public function singleProduct($id){
        $model = Product::find($id);
        $model->load('galleries',"category");
   
        $productRandom = Product::where('cate_id', $model->cate_id)
                                    ->where('id', '<>', $id)
                                    ->orderBy('star', 'desc')
                                    ->take(8)
                                    ->get();
        $this->render('frontend.single-product' , compact('model', 'productRandom'));

    }

    public function shop(){

        $products= Product::all();
        $this->render('frontend.shop', compact('products'));
    }
    
 
    public function loginForm(){

        if (!isset($_SESSION[AUTH])){
            $this->render('auth.login' );
        } else {
            header("Location:" .BASE_URL);
        }

    }

    public function postLogin(){
        $email = isset($_POST['email']) == true  ? trim($_POST['email']) : "" ;

        $password = isset($_POST['password'] ) ==true ? trim($_POST['password']) : "";

        if(empty($email)  ||  empty($password)){

            header('location: ' . BASE_URL . 'login?msg=Tài khoản/mật khẩu không hợp lệ');
            die;

        }
        $user = User::where('email' , $email)->first();

        if(empty($user) || !password_verify($password, $user->password) ){
            header('location: ' . BASE_URL . 'login?msg=Tài khoản/mật khẩu không đúng');
            die;
        }
        $_SESSION[AUTH] = [
            'id' =>$user->id,
            'name'=>$user->name,
            'email' =>$user->email,
            'role' =>$user->role
        ];

    
        if (isset($_SESSION[AUTH]['role']) < 200) {
            header("Location:" . BASE_URL );
        }else {
            header('Location: ' . BASE_URL . 'admin');
        }
    }

    public function logout(){

        unset($_SESSION[AUTH]);
        header('Location: '.BASE_URL);

    }

  
    public function registration(){
        $this->render('auth.registration');
    }

    public function postReg(){

        $model = new User();
        $model->fill($_POST);
        $file = $_FILES['file'];
        $avatar = '';
        
        $model['role'] = 0;

        if($file['size'] > 0 ){

            $avatar = 'public/upload/' .uniqid(). '-'.$file['name'];
            move_uploaded_file($file['tmp_name'], $avatar);
            $model['avatar']  = $avatar;

        }
        $model['password'] = password_hash($model['password'], PASSWORD_DEFAULT);
        $model->save();
        header('Location: '.BASE_URL);

    }


    public function frontend(){
        $this->render('frontend.layouts.main');
    }

    public function fakeUser(){
        $faker = Faker\Factory::create();
        for($i = 0; $i < 100; $i++){
            $model = new User();
            $model->name = $faker->name;
            $model->avatar = 'https://picsum.photos/640/480';
            $model->email = $faker->email;
            $model->role = 1;
            $model->password = password_hash('123456', PASSWORD_DEFAULT);
            $model->save();
        }
        return "Success!";
    }

    
}


?>