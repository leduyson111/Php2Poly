<?php 
namespace App\Controllers;

 
use App\Models\Category;
use App\Models\Product;

class CategoryController extends BaseController{

    public function index(){

        $keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "" ;

        if($keyword != ""){

            $cates= Category::where("cate_name", "like", "%$keyword%")->get();
         
        }else{
            $cates = Category::all();
            
        }
        $cates->load('products');
        $this->render('cates.cate-list', ['cates' => $cates]);
        // $this->render('cate-list', compact($cates));
    }

    public function addNew(){

        $this->render("cates/add-new");
       
    }

    public function saveCate(){

        if(isset($_POST)){
        
            $err =[];
            $checkName = Category::where("cate_name" , '=' , "{$_POST['cate_name']}")->get(); 
            
            if($checkName->count() > 0) {
                $err['cate_name'] = "Không trùng tên" ; 
            }

            if(empty($_POST['cate_name'])){
                $err['cate_name'] = "Không được để trống mục";
            }
            if(empty($_POST['desc'])){
                $err['desc'] = "Không được để trống phần mô tả";
            }
            if(empty($err)){


            $model = new Category();
            $model->fill($_POST);
            $model ->save();
             header('Location: '.BASE_URL. 'admin/danh-muc');
            }
        }
        $this->render('cates.add-new', compact('err'));


    }
    
    public function editCate($id ){
       
        $model = Category::find($id);
    
        if($model){

            $this->render('cates/edit', compact('model'));

        }else{
            header('Location: '.BASE_URL. 'admin/danh-muc');

        }

    }

    public function removeCate($id ){

       
        $model = Category::find($id);

        if(!$model){
           header('Location: '.BASE_URL. 'admin');

        }
        Product::where('cate_id',$id)->delete();
        $model->delete();
        header('Location: '.BASE_URL. 'admin');

    }
    public function saveEdit($id){

        $model = Category::find($id);

        if(isset($_POST)){
            $err =[];
            $checkName = Category::where("cate_name" , '=' , "{$_POST['cate_name']}")->get(); 
            
            if($checkName->count() > 0) {
                $err['cate_name'] = "Không trùng tên" ; 
            }
            if(empty($_POST['cate_name'])){
                $err['cate_name'] = "Không được để trống mục";
            }

            if(empty($_POST['desc'])){
                $err['desc'] = "Không được để trống phần mô tả";
            }

            if (empty($err)) {
                if (!$model) {
                   header('Location: '.BASE_URL. 'admin');
                    die;
                }
              
                $model->fill($_POST);
                $model->save();
             
               header('Location: '.BASE_URL. 'admin');
            }
        }
        $this->render('cates.edit', compact('model', 'err'));
        
    }

}