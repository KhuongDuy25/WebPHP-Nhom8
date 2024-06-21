<?php
    use App\Models\Users;
    use App\Models\Products;
    use App\Models\Producttype;
    use App\Models\Storeimages;
    use App\Models\Promotions;
    use Illuminate\Database\Capsule\Manager as DBManager;


    if (!function_exists('redirect')) {
        function redirect($url,array $sessonData=[]){
            foreach ($sessonData as $key => $value) {
                $_SESSION[$key] = $value;
            }
            header('Location: '.$url);
        }
    }

    if (!function_exists('isLogIn')){
        function isLogIn(){
            return isset($_SESSION['user']);
        }
    }

    if (!function_exists('getProductCounts')){
        function getProductCounts(){
            $quantity = DBManager::select('select count(id) as number from Products group by producttype_id');
            $storeImageCount = count(Storeimages::all());
            $numbers = [];
            foreach ($quantity as $number) {
                $numbers = [...$numbers,$number->number];
            }
    
            $numbers = [...$numbers,$storeImageCount];
            return $numbers;
        }
    }

    if (!function_exists('getPromotionsData')){
        function getPromotionsData(){
            $Promotions = Promotions::all();
            $base = '/imgs/products/';
    
            foreach($Promotions as $Promotion){
                $Promotion->url=$base.$Promotion->Products->main_image;
            }
    
            return json_decode(json_encode($Promotions));
        }
    }

    if (!function_exists('timeConverting')){
        function timeConverting($timeStamps){
            $createdTime = new DateTime($timeStamps);
            $createdTime->setTimezone(new DateTimeZone('Asia/Ho_Chi_Minh'));

            $timeData = [
                'day' => $createdTime->format('d'),
                'month' => $createdTime->format('m'),
                'year' => $createdTime->format('Y'),
                'hours' => $createdTime->format('H'),
                'minutes' => $createdTime->format('i'),
                'seconds' => $createdTime->format('s'),
            ];

            return $timeData;
        }
    }

    if (!function_exists('adminChecking')){
        function adminChecking(){
            $currentUser = getCurrentUser();

            if(isset($_SESSION['user'])){
                $ad = $currentUser->Admins;
                return $ad;
            }
            else return false;
        }
    }

    if(!function_exists('getCurrentUser')){
        function getCurrentUser(){
            if(isset($_SESSION['user'])) return Users::find($_SESSION['user']['id']);
            else return null;
        }
    }

    

?>