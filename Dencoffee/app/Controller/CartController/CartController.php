<?php
    namespace App\Controller\CartController;

    require __DIR__.'/../../phphelper.php';

    use App\Controller\Controller as Controller;
    use App\Models\Users;
    use App\Models\Products;
    use App\Models\Orders;
    use App\Models\Vouchers;
    
    class CartController extends Controller{
        
        public function index(){
            $this->render('cart',[]);
            unset($_SESSION['code']);
            unset($_SESSION['sale']);
            unset($_SESSION['vouid']);
        }

        public function payment(){
            if(isset($_POST['userid'])){
                $userid = $_POST['userid'];
                $products = $_POST['products'];
                $voucherId = $_POST['voucher-id'];
                $addr = $_POST['addr'];

                $currUser = Users::find($userid);
                if($currUser){
                    $currOrder = $currUser->Orders()->create(['addr'=>$addr, 'orderstatus_id'=>1]);
                    $currVoucher = Vouchers::find($voucherId);
                    if($currVoucher){
                        $currOrder->Vouchers()->associate($currVoucher);
                        $currOrder->save();
                    }
                        

                    foreach($products as $product){
                        $currProduct = Products::find($product['id']);
                        $currProduct->Orders()
                                    ->attach($currOrder->id, ['quantity'=>$product['quantity']]);
                        
                        $currProduct->save();
                    }

                    redirect('/lichsudathang',['mess'=>'Đặt hàng thành công!']);
                }

            }
        }

        function getVoucherData(){

            if(isset($_POST['submit'])){
                $vouchercode = $_POST['vouchercode'];
                $codeCanAppliesSalse = json_decode(json_encode(Vouchers::where('code','LIKE',$vouchercode)->get()));
                
                if(count($codeCanAppliesSalse)>0){
                    redirect('/giohang',['mess'=>'Chúc mừng bạn đã sử dụng voucher thành công!',
                                         'vouid'=>$codeCanAppliesSalse[0]->id , 'code'=>$vouchercode,
                                          'sale'=>$codeCanAppliesSalse[0]->sale]);
                }
                else redirect('/giohang',['mess'=>'Voucher của bạn hiện tại không có hiêu lực!']);

            }

        }


    }

?>