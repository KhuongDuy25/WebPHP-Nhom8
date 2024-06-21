<?php

    namespace App\Controller\IntroController;

    require __DIR__.'/../../phphelper.php';

    use App\Controller\Controller as Controller;
    use App\Models\Products;
    use App\Models\Storeimages;
    
    class IntroController extends Controller{
        
        public function index(){

            $numbers = getProductCounts();
            $productsData = $this->getProductsData();

            $this->render('intro',['quantity'=>$numbers, 'productsData'=>$productsData]);
        }

        public function getProductsData(){
            $coffeeData = Products::where('producttype_id','=','1')->get();
            $coffeeData = json_decode(json_encode($coffeeData));

            $cakeData = Products::where('producttype_id','=','2')->get();
            $cakeData = json_decode(json_encode($cakeData));

            $drinkingData = Products::where('producttype_id','=','3')->get();
            $drinkingData = json_decode(json_encode($drinkingData));

            $storeImageData = Storeimages::where('id','>','8')->get();
            $storeImageData = json_decode(json_encode($storeImageData));

            $data = [
                'coffee' => $coffeeData,
                'cake' => $cakeData,
                'drinking' => $drinkingData,
                'storeImage' => $storeImageData
            ];

            return json_decode(json_encode($data));

        }
    }
?>