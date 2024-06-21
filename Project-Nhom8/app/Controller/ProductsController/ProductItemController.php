<?php
    namespace App\Controller\ProductsController;
    use App\Controller\Controller as Controller;
    use App\Models\Products;
    use App\Models\Images;
    
    class ProductItemController extends Controller{
        
        public function index(){
            $productData = $this->getProductData($_GET['id']);

            $this->render('product-item',['productData'=>$productData]);
        }

        public function getProductData($id){
            $productData = Products::find($id);
            $subImageData = Products::find($id)->Images;

            $productData->Producttype;

            $productData=['productData'=>$productData, 'subImageData'=>$subImageData];
            return json_decode(json_encode($productData));
        }
    }

?>