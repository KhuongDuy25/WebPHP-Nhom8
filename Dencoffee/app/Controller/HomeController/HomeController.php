<?php

    namespace App\Controller\HomeController;
    use App\Models\Storeimages;

    require __DIR__.'/../../phphelper.php';

    use App\Controller\Controller as Controller;
    
    class HomeController extends Controller{
        
        public function index(){
            
            $Promotions = getPromotionsData();
            $StoreImages = $this->getStoreImageData();
            $numbers = getProductCounts();
            
            $this->render('home', [
                'quantity'=>$numbers, 
                'Promotions'=>$Promotions, 
                'storeImages' => $StoreImages
            ]);
        }

        public function getStoreImageData(){
            $base = '/imgs/storeimgs/';
            $StoreImages = json_decode(json_encode(Storeimages::all()));
            foreach($StoreImages as $StoreImage){
                $StoreImage->url=$base.$StoreImage->url;
            }

            return $StoreImages;
        }
    }
?>