<?php 

namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\User;

class UserController extends BaseController{

    public function index(){
        
        $users  =  User::all();
        $this->render('user.index', compact('users'));
    }

    public function addUser(){

        $this->render('user.add-user');

    }

    public function saveUser(){
        if(isset($_POST)){
            $err =[];


            $checkName = User::where("name" , '=' , "{$_POST['name']}")->get(); 
            $file = $_FILES['file'];
            if($checkName->count() > 0) {
                $err['name'] = "Không trùng tên" ; 
            }
            if(empty($_POST['name'])){
                $err['name'] = "Không được để trống tên thành viên";
            }
            if(empty($_POST['email'])){
                $err['email'] = "Không được để trống phần email";
            }
            if(empty($_POST['password']) ){
                $err['password'] ="Không được để trống mật khẩu ";
            }

            if($file['size'] == 0) {
                $err['image'] = "Cần chọn ảnh"  ;
            }
            if (empty($err)) {
               
                
                $model = new User();
                $model->fill($_POST);
                $file = $_FILES['file'];
                $avatar = '';

                if ($file['size']>0) {
                    $avatar = 'public/upload/' . uniqid() . '-' . $file['name'];
                    move_uploaded_file($file['tmp_name'], $avatar);
                    $model['avatar'] = $avatar;
                }

                $model['password'] = password_hash($model['password'], PASSWORD_DEFAULT);

                $model->save();
                header('Location: '.BASE_URL. 'admin/user');
            }
        }

        $this->render('user.add-user' , compact('err'));

    

    }

    public function delete($id){

     
        $model = User::find($id);
        if(!$model){
            header('Location: '.BASE_URL. 'admin/user');
            exit;
        }
        User::where('id',$id)->delete();
        header('Location: '.BASE_URL. 'admin/user');

    }
    public function editUser($id){

     
        $model = User::find($id);
        if($model){

            $this->render('user.edit' , compact('model'));


        }else{

            header('Location: '.BASE_URL. 'admin/user');

        }
    }
    
    public function saveEditUser($id){

        $model = User::find($id);
        if(empty($_POST['name'])){
            $err['name'] = "Không được để trống tên thành viên";
        }
        if(empty($_POST['email'])){
            $err['email'] = "Không được để trống phần email";
        }
        if(empty($_POST['password']) ){
            $err['password'] ="Không được để trống mật khẩu ";
        }

        if (empty($err)) {
            if (!$model) {
                header('Location: '.BASE_URL. 'admin/user');
                die;
            }
            $model->fill($_POST);
            $file = $_FILES['file'];
            $avatar = '';

            if ($file['size']>0) {
                $avatar = 'public/upload/' . uniqid() . '-' . $file['name'];
                move_uploaded_file($file['tmp_name'], $avatar);
                $model['avatar'] = $avatar;
            }

            $model['password'] = password_hash($model['password'], PASSWORD_DEFAULT);
            $model->save();
            header('Location: '.BASE_URL. 'admin/user');
        }
        $this->render('user.edit' , compact('model'));
    }

}



