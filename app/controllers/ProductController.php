<?php 
namespace App\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use Faker;


class ProductController  extends BaseController{

    public function index(){

        $pagenumber = isset($_GET['page']) == true ? $_GET['page']  : 1;
        $pagesize = isset($_GET['size']) ==true ? $_GET['size'] : 15;

        $offset = ($pagenumber - 1) * $pagesize;

        $keyword = isset($_GET['keyword'])== true ?  $_GET['keyword'] : "";

        if($keyword != ""){

            $products = Product::where("name" ,"like" , "%$keyword%")
                                ->take($pagesize)
                                ->skip($offset)
                                ->get();
            $totalPage = intval(ceil(Product::where("name", "like", "%$keyword%")->count()/$pagesize));
        }else{

                $products = Product::take($pagesize)
                ->skip($offset)
                ->get();
        $totalPage = intval(ceil(Product::count()/$pagesize));
        }

        $products->load('category');
        $this->render('product.index', [
            'products' => $products, 
            'totalPage' => $totalPage, 
            'offset' => $offset,
            'keyword' => $keyword
        ]);

        

    }
    
    public function newProduct(){
        $category = Category::all();
        $this->render('product.new-product' , compact('category'));

    }

    public function editProduct($id){
        $category = Category::all();
        // $id = $_GET['id'];
        $model = Product::find($id);

        if($model){
            $this->render('product.edit-product', compact('model','category'));

        }else{
             header("Location: ".BASE_URL . 'admin/san-pham');
        }


    }

    public function editSaveProduct($id){

        if (isset($_POST)) {
            $err =[];
        
            $model = Product::find($id);
           
            if (empty($_POST['name'])) {
                $err['name'] = "Không được để trống tên sản phẩm";
            }
            if (empty($_POST['short_desc'])) {
                $err['short_desc'] = "Không được để trống phần mô tả";
            }
            if (empty($_POST['price']) || $_POST['price'] == 0) {
                $err['price'] ="Không được để trống giá hoặc giá bằng 0";
            }
            $category = Category::all();
            if (empty($err)) {
                $data = $_POST;
               
                if (!$model) {
                    header("Location: san-pham");
                    die;
                }

                $file = $_FILES['file'];
                $avatar = '';
                if ($file['size']>0) {
                    $avatar = 'public/upload/' . uniqid() . '-' . $file['name'];
                    move_uploaded_file($file['tmp_name'], $avatar);
                    $data['image'] = $avatar;
                }

                $model->fill($data);
                $model->save();
                 header("Location: ".BASE_URL . 'admin/san-pham');
            }
        }
        $this->render('product.edit-product', compact( 'model','category'));
    }

    public function saveProduct(){

        if(isset($_POST)){
            $err =[];
            $file = $_FILES['file'];
            $checkName = Product::where("name" , '=' , "{$_POST['name']}")->get(); 
            if($checkName->count() > 0) {
                $err['name'] = "Không trùng tên" ; 
            }
            if(empty($_POST['name'])){
                $err['name'] = "Không được để trống tên sản phẩm";
            }
            if(empty($_POST['short_desc'])){
                $err['short_desc'] = "Không được để trống phần mô tả";
            }
            if(empty($_POST['price']) || $_POST['price'] == 0){
                $err['price'] ="Không được để trống giá hoặc giá bằng 0";
            } 
            if($file['size'] == 0) {
                $err['image'] = "Cần chọn ảnh"  ;
            }
            $category = Category::all();
           

                if(empty($err)) {
                    $data = $_POST;
                    $model = new Product();
                    $avatar = '';
                    if ($file['size']>0) {
                        $avatar = 'public/upload/' . uniqid() . '-' . $file['name'];
                        move_uploaded_file($file['tmp_name'], $avatar);
                        $data['image'] = $avatar;
                    }
               
                    $model->fill($data);
                    $model->save();
                    header("Location: ".BASE_URL . 'admin/san-pham');
                }
            }
       
        $this->render('product.new-product', compact('err', 'category'));

    }

    public function delete($id){

        // $id = $_GET['id'];
        $model = Product::find($id);

        if(!$model){
             header("Location: ".BASE_URL . 'admin/san-pham');
            exit;

        }
        Product::where('id',$id)->delete();
         header("Location: ".BASE_URL . 'admin/san-pham');

    }

    public function fakeGallery(){
        $products = Product::all();
        foreach($products as $item){
            $ranImg = rand(2, 3);
            for($i = 0; $i < $ranImg; $i++){
                $model = new ProductGallery();
                $model->product_id = $item->id;
                $model->img_url = 'https://picsum.photos/640/480';
                $model->save();
            }
        }
        return "Success!";
    }

    public function fakeProduct(){
        
        $faker = Faker\Factory::create();
        for($i = 0; $i < 100; $i++){
            $model = new Product();
          
            $model->name = $faker->name;

            $model->image = 'https://picsum.photos/640/480';
            $model->cate_id = mt_rand(1,5);
            $model->price =  mt_rand(1000,10000);
            $model->short_desc = $faker->paragraphs;
            $model->star = mt_rand(1,5);
            $model->save();
        }
        return "Success!";
    }

}