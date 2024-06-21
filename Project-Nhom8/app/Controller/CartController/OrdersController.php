<?php
    namespace App\Controller\CartController;

    require __DIR__.'/../../phphelper.php';

    use App\Controller\Controller as Controller;
    use App\Models\Users;
    use App\Models\Orders;
    use App\Models\Orderdetail;
    use DateTime;
    use DateTimeZone;

    class OrdersController extends Controller{
        
        public function index(){

            $orders = $this->getOrders();
            $this->render('orders',['orders'=>$orders]);
        }

        public function getOrders(){
            if(isset($_SESSION['user'])){
                $currUser = Users::find($_SESSION['user']['id']);
                if($currUser) {
                    $orders = $currUser->Orders;
                    foreach($orders as $order){
                        $order->Orderstatus;
                    }
                    
                    $orders = json_decode(json_encode($orders));
                    $orders = array_reverse($orders);

                    foreach($orders as $order){
                        $order->created_at = timeConverting($order->created_at);
                    }

                    return $orders;
                }
            }
            else return [];
        }

        public function getOrdersDetail(){

            $oid = $_GET['oid'];
            $currOrder =  Orders::find($oid);
            $currOrder->Orderstatus;
            $voucher =  $currOrder->Vouchers;
            $orderList = $currOrder->Products;

            foreach($currOrder->products as $product){
                $product->Producttype;
            }

            $currOrder = json_decode(json_encode($currOrder));
            $currOrder->created_at = timeConverting($currOrder->created_at);

            $this->render('orderdetail',['order' => $currOrder]);
        }
    }

?>