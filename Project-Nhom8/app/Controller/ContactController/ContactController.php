<?php
    namespace App\Controller\ContactController;

    require __DIR__.'/../../phphelper.php';
    require __DIR__.'/../../regex.php';

    use App\Controller\Controller as Controller;
    use App\Models\Feedbacks;
    
    class ContactController extends Controller{
        
        public function index(){
            $this->render('contact',[]);
        }

        public function sendFeedback(){
            if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $content = $_POST['content'];

                if( preg_match(REGEX['email'],$email) && strlen($content)>10){
                    Feedbacks::create([
                        'email'=> $email,
                        'text'=> $content
                    ]);

                    redirect('/',['mess'=>'Den Coffee đã ghi nhận góp ý của bạn. Xin cảm ơn!']);
                }
                else {
                    redirect('/',['mess'=>'Góp ý không được gửi do có lỗi xảy ra!']);
                }

            }
        }
    }

?>
