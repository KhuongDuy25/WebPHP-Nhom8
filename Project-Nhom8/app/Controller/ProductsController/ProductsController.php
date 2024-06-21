<?php
    namespace App\Controller\ProductsController;

    require __DIR__.'/../../phphelper.php';

    use App\Controller\Controller as Controller;
    use App\Models\Products;
    
    class ProductsController extends Controller{
     
        public function index(){

            $type = $_GET['type'];
            $page = $_GET['page'];
            $productsData=$this->getProudcts($type, $page, 12);
            $promotions = getPromotionsData();

            $this->render('products',['productsData'=>$productsData, 'promotions'=>$promotions]);
        }

        public function getProudcts($type, $page, $pageSize){
            $products = [];
            switch($type){
                case 'caphe':
                    $type='1';
                    break;

                case 'banhngot':
                    $type='2';
                    break;

                case 'douongkhac':
                    $type='3';
                    break;

                default: 
                    redirect('/sanpham?type=caphe&page=1');
            }
                
            Static::pagination($type, 1, $pageSize);
            if(isset($_SESSION['id_start'][$page])) {
                $products = Static::pagination($type, $page, $pageSize);
            }
            else{
                for($i=2; $i<$page; $i++){
                   Static::pagination($type, $i, $pageSize);
                }

                $products = Static::pagination($type, $page, $pageSize);
            }
            
            $sumPage = ceil(Products::where('producttype_id','=',$type)->count()/$pageSize);
            $products = json_decode(json_encode($products));

            $productsData=['products'=>$products, 'sumPage'=>$sumPage];
            return $productsData;
        }

        public static function pagination($type, $page, $pageSize){
            $products=[];
            if($page == 1){
                $products = Products::orderBy('id','asc')
                                    ->where('producttype_id','=',$type)
                                    ->limit($pageSize)->get();

                $id_start = $products->min('id');
                $_SESSION['id_start'][1] = $id_start-1;

                $id_start = $products->max('id');
                $_SESSION['id_start'][2] = $id_start;

            }
            else{
                $id_start = $_SESSION['id_start'][$page];

                $products = Products::orderBy('id','asc')
                                    ->where('producttype_id','=',$type)
                                    ->where('id','>',$id_start)
                                    ->limit($pageSize)->get();
                

                $id_start = $products->max('id');
                $_SESSION['id_start'][$page+1] = $id_start;
            }

            return $products;
        }
    }

?>