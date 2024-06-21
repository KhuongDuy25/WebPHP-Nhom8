<?php
    namespace App\Controller\APIController;

    require __DIR__.'/../../phphelper.php';

    use App\Controller\Controller as Controller;
    use App\Models\Users;
    use App\Models\Products;
    use App\Models\Producttype;
    use App\Models\Images;
    use App\Models\Orders;
    use App\Models\Feedbacks;
    use Datetime;

    class APIController extends Controller{

        public static function getSalseDay($day){
            $orders = Orders::all();
            $sum=0;
            foreach($orders as $order){
                if((new Datetime($order->created_at))->format('Y-m-d')==$day){
                    $order->Products;
                    $sum+=count($order->products);
                }
            }
            return $sum;
        }

        public static function getTurnOverDay($day){
            $orders = Orders::all();
            $sum=0;
            foreach($orders as $order){
                if((new Datetime($order->created_at))->format('Y-m-d')==$day){
                    $order->Products;
                    foreach($order->products as $prd){
                        $sum+=$prd->price*$prd->pivot->quantity;
                    }
                }
            }
            return $sum;
        }

        public function getData(){
            header('Content-type: application/json');

            $todaySale=[0,0,0];
            $orders = Orders::all();

            $today = (new Datetime())->format('Y-m-d');
            foreach($orders as $order){
                if((new Datetime($order->created_at))->format('Y-m-d')==$today){
                    $order->Products;
                    foreach($order->products as $prd){
                        $todaySale[($prd->producttype_id)-1]++;
                    }
                }
            }

            $monthSale=[];
            $weekSale=[];
            for($i=30; $i>=0; $i--){
                $day = date("Y-m-d", strtotime('-'.(string)$i." day"));
                $daySale = static::getSalseDay($day);
                $monthSale = [...$monthSale, $daySale];
                if($i<7) $weekSale = [...$weekSale, $daySale];
            }

            echo json_encode(['todaySale'=>$todaySale, 'weekSale'=>$weekSale, 'monthSale'=>$monthSale]);
        }

        public function getTurnOVerData(){
            header('Content-type: application/json');

            $todaySale=[0,0,0];
            $orders = Orders::all();

            $today = (new Datetime())->format('Y-m-d');
            foreach($orders as $order){
                if((new Datetime($order->created_at))->format('Y-m-d')==$today){
                    $order->Products;
                    foreach($order->products as $prd){
                        $todaySale[($prd->producttype_id)-1]+=$prd->price*$prd->pivot->quantity;
                    }
                }
            }

            $monthSale=[];
            $weekSale=[];
            for($i=30; $i>=0; $i--){
                $day = date("Y-m-d", strtotime('-'.(string)$i." day"));
                $daySale = static::getTurnOverDay($day);
                $monthSale = [...$monthSale, $daySale];
                if($i<7) $weekSale = [...$weekSale, $daySale];
            }

            echo json_encode(['todaySale'=>$todaySale, 'weekSale'=>$weekSale, 'monthSale'=>$monthSale]);
        }

        public function getProductData(){
            header('Content-type: application/json');
            $productNumber = [Products::where('producttype_id', 1)->count(),
                              Products::where('producttype_id', 2)->count(),
                              Products::where('producttype_id', 3)->count()];

            $orders = Orders::all();
            $day = date("Y-m-d", strtotime("-30 day"));
            $today = date("Y-m-d");
            $weekTotal = [0,0,0];

            $products = Products::all();
            $productsTotal = [];
            foreach($products as $prd){
                $productsTotal[$prd->name]=0;
            }

            foreach($orders as $order){
                $orderDay = (new Datetime($order->created_at))->format('Y-m-d');
                if($orderDay>=$day && $orderDay<=$today){
                    $order->Products;
                    foreach($order->products as $prd){
                        $weekTotal[($prd->producttype_id)-1]+=$prd->price*$prd->pivot->quantity;
                        $productsTotal[$prd->name]+=$prd->pivot->quantity;
                    }
                }
            }

            arsort($productsTotal);
            $productsTotal = array_slice($productsTotal, 0, 10);
            $productsTotalValues = [];
            $productsName = [];
            foreach($productsTotal as $name => $data){
                $productsName = [...$productsName, $name];
                $productsTotalValues = [...$productsTotalValues, $data];
            }

            
            echo json_encode(['productNumber' => $productNumber,
                                'weekTotal'=>$weekTotal,
                                'productsTotalValues'=>$productsTotalValues,
                                'productsName'=>$productsName]);
        }

        

    }
        
?>