<?php
    namespace App\Controller\LogInSignUpController;

    require __DIR__.'/../../phphelper.php';
    require __DIR__.'/../../regex.php';
    use App\Controller\Controller as Controller;
    use App\Models\Users;
    use App\Models\Admins;
    
    class LogInSignUpController extends Controller{
        
        public function getLogInPage(){
            $this->render('login',[]);
        }

        public function getSignUpPage(){
            $this->render('signup',[]);
        }

        public function logIn(){
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                if( preg_match(REGEX['username'],$username) && preg_match(REGEX['password'],$password)){
                    
                    $currentUser = Users::where('username', '=', $username)->where('password','=', $password)->get();
                    if(count($currentUser)==1){
                        $currentUser = $currentUser[0];
                        $_SESSION['user']=['username'=>$currentUser['username'], 'id'=>$currentUser['id']];
                        
                        
                        if(adminChecking($currentUser)) redirect('/admin',['mess'=>'Đăng nhập thành công với vai trò admin!']);
                        else redirect('/',['mess'=>'Đăng nhập thành công!']);
                    }
                    else redirect('/',['mess'=>'Tài khoản không tồn tại hoặc mật khẩu không đúng!']);
                }
                else {
                    redirect('/',['mess'=>'Đăng nhập thất bại!']);
                }

            }
        }

        public function signUP(){
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $passwordConfirm = $_POST['password-confirm'];
                

                if( preg_match(REGEX['username'],$username) &&
                    preg_match(REGEX['password'],$password) &&
                    preg_match(REGEX['repassword'],$passwordConfirm)){
                    if($password === $passwordConfirm){

                        if(count(Users::where('username','LIKE', $username)->get())==0){
                            $currentUser = Users::create([
                                'username'=>$username,
                                'password'=>$password
                            ]);

                            $_SESSION['user']=['username'=>$currentUser['username'], 'id'=>$currentUser['id']];

                            redirect('/',['mess'=>'Đăng ký thành công!']);
                        }
                        else redirect('/dangky',['mess'=>'Tài khoản đã được sử dụng!']);
                        
                    }
                }
                else redirect('/dangky',['mess'=>'Đăng ký thất bại!']);
            }
        }

        public function logOut(){
            if(isset($_SESSION['user'])){
                unset($_SESSION['user']);
                redirect('/',['mess'=>'Đã đăng xuất!']);
            }
            else redirect('/',['mess'=>'Bạn chưa đăng nhập!']);
           
        }


        
    }

?>