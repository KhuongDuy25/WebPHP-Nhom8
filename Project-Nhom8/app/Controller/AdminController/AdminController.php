<?php

    namespace App\Controller\AdminController;

    require __DIR__.'/../../phphelper.php';

    use App\Controller\Controller as Controller;
    use App\Models\Users;
    use App\Models\Products;
    use App\Models\Producttype;
    use App\Models\Images;
    use App\Models\Orders;
    use App\Models\Feedbacks;
    
    class AdminController extends Controller{
        
        public function index(){
            if(adminChecking()){
                $prdNumber = Products::all()->count();
                $userNumber = Users::all()->count();
                $orderNumber = Orders::all()->count();
                $feedbacksNumber = Feedbacks::all()->count();
                
                $this->render('admin_home', ['prdNumber'=>$prdNumber,
                                            'userNumber'=>$userNumber,
                                            'orderNumber'=>$orderNumber,
                                            'feedbacksNumber'=>$feedbacksNumber]);
            }
            else {
                redirect('/',['mess'=>'không có quyền truy cập trang này!']);
            }
        }

        public function getAccounts(){
            if(adminChecking()){
                $users = Users::All();
                foreach ($users as $user)
                    $user->Admins;

                $data = json_decode(json_encode($users));

                $this->render('admin_accounts', ['data'=>$data]);
            }
        }

        public function getNumberDatas(){
            if(adminChecking()){
                
                $data = json_decode(json_encode(''));

                $this->render('admin_data', ['data'=>$data]);
            }
        }

        public function getTurnover(){
            if(adminChecking()){
                
                $data = json_decode(json_encode(''));

                $this->render('admin_turnover', ['data'=>$data]);
            }
        }

        public function getProductsData(){
            if(adminChecking()){
                
                $data = json_decode(json_encode(''));

                $this->render('admin_products_data', ['data'=>$data]);
            }
        }

        public function productManage(){
            if(adminChecking()){

                $typefill;
                if(!isset($_GET['typefill'])) $typefill=0;
                else $typefill = $_GET['typefill'];

                $data;
                if($typefill==0)
                    $data = Products::orderBy('id', 'desc')->get();
                else $data = Products::orderBy('id', 'desc')->where('producttype_id','=',$typefill)->get();

                foreach($data as $prd){
                    $prd->Producttype;
                }

                $data = json_decode(json_encode($data));

                $this->render('admin_products_manage', ['data'=>$data]);
            }
        }

        public function getUpdateProductView(){
            if(adminChecking()){

                $pid = '';
                if(isset($_GET['pid'])) $pid = $_GET['pid'];

                $data = '';
                if($pid>=0){
                    $data = Products::find($pid);
                }

                $data = json_decode(json_encode($data));
                $this->render('admin_update_products', ['data'=>$data]);
            }
        }

        public function getAddProductView(){
            if(adminChecking()){
                $this->render('admin_add_products', []);
            }
        }

        public function updateProuct(){
            if(adminChecking()){

                if(isset($_POST['submit'])){
                    extract($_POST);

                    $product = Products::find($id);
                    $product->Images;
                    $product->name=$name;
                    $product->price=$price;
                    $product->producttype_id=$type;
                    $product->descript=$descript;
                    $product->save();

                    $dir = ROOT_DIR.'/public/imgs/products/';
                    if(isset($_POST['updateimg-check']) && $_POST['updateimg-check']=='on'){

                        unlink($dir.$product->main_image);
                        $product->main_image = '';
                        $product->save();
                        $product->images;

                        foreach($product->images as $image){
                            unlink($dir.$image->url);
                            $image->delete();
                        }

                        
                        if($_FILES['mainimg']['name']){
                            $product->main_image = $_FILES["mainimg"]['name'];
                            $product->save();
                            move_uploaded_file($_FILES["mainimg"]["tmp_name"], $dir.$_FILES["mainimg"]['name']);
                            unset($_FILES["mainimg"]);
                        }
                            
                        foreach($_FILES as $file){
                            if($file['name']){
                                $product->Images()->create([
                                    'url' => $file['name']
                                ]);
                                move_uploaded_file($file["tmp_name"], $dir.$file['name']);
                            }
                        }
                    }


                    redirect('/admin/capnhatsanpham', ['mess'=>'Đã cập nhật sản phẩm']);
                }
            }
        }

        public function addProcut(){
            if(adminChecking()){

                if(isset($_POST['submit'])){
                    extract($_POST);

                    $product = Products::create([
                        'name' => $name,
                        'producttype_id' => $type,
                        'price' => $price,
                        'descript' => $descript
                    ]);

                    $dir = ROOT_DIR.'/public/imgs/products/';
                    if($_FILES['mainimg']['name']){
                        $product->main_image = $_FILES["mainimg"]['name'];
                        $product->save();
                        move_uploaded_file($_FILES["mainimg"]["tmp_name"], $dir.$_FILES["mainimg"]['name']);
                        unset($_FILES["mainimg"]);
                    }
                        
                    foreach($_FILES as $file){
                        if($file['name']){
                            $product->Images()->create([
                                'url' => $file['name']
                            ]);
                            move_uploaded_file($file["tmp_name"], $dir.$file['name']);
                        }
                    }


                    redirect('/admin/capnhatsanpham', ['mess'=>'Đã thêm sản phẩm']);
                }
            }
        }

        public function deleteProduct(){
            if(adminChecking()){
                if(isset($_POST['submit'])){
                    $dir = ROOT_DIR.'/public/imgs/products/';
                    
                    $product = Products::find($_POST['pid']);

                    unlink($dir.$product->main_image);
                    foreach($product->images as $image){
                        unlink($dir.$image->url);
                    }

                    $product->delete();

                    redirect('/admin/capnhatsanpham', ['mess'=>'Đã xóa sản phẩm']);
                }
            }
        }

        public function getOrderManageView(){
            if(adminChecking()){
                $orders = Orders::orderBy('id', 'desc')->get();
                foreach($orders as $order){
                    $order->Users;
                    $order->Products;
                    $order->Orderstatus;
                    $order->Vouchers;
                }

                $data = json_decode(json_encode($orders));
                foreach($data as $order){
                    $order->created_at = timeConverting($order->created_at);
                    $sum = 0;
                    foreach($order->products as $prd){
                        $sum += $prd->price*$prd->pivot->quantity;
                    }
                    $total = $sum-$order?->vouchers?->sale;
                    $order->sum = $total>0?$total:0;
                }

                $this->render('admin_orders', ['data'=>$data]);
            }
        }

        public function changeStatus(){
            if(adminChecking()){
               if(isset($_GET['oid'])){
                    extract($_GET);
                    $order = Orders::find($oid);
                    $order->orderstatus_id = $status;
                    $order->save();

                    $url = '';
                    if($page == 'orderslist') $url = '/admin/quanlydonhang';
                    else if($page == 'orderdetail') $url = '/admin/chitietdonhang?oid='.$oid;
                    redirect($url, ['mess' => 'Đã cập nhật trạng thái đơn hàng']);
               }
            }
        }

        public function getOrderDetailView(){
            if(adminChecking()){
               if(isset($_GET['oid'])){
                    
                    $oid = $_GET['oid'];
                    $order = Orders::find($oid);
                    $order->Users;
                    $order->Products;
                    $order->Orderstatus;
                    $order->Vouchers;

                    foreach($order->products as $prd){
                        $prd->Producttype;
                    }

                    $order = json_decode(json_encode($order));
                    $sum = 0;
                    foreach($order->products as $prd){
                        $sum += $prd->price*$prd->pivot->quantity;
                    }
                    $total = $sum-$order?->vouchers?->sale;
                    $order->sum = $total>0?$total:0;

                    $order->created_at = timeConverting($order->created_at);

                    $this->render('admin_order_detail', ['order'=>$order]);

               }
            }
        }

        public function getFeedbackView(){
            if(adminChecking()){
                $data = Feedbacks::orderBy('id', 'desc')->get();

                $data = json_decode(json_encode($data));
                foreach($data as $feedback){
                    $feedback->created_at = timeConverting($feedback->created_at);
                }

                $this->render('admin_feedbacks', ['data'=>$data]);
            }
        }

        public function deleteAccount(){
            if(adminChecking()){
                if(isset($_POST['submit'])){
                    Users::find($_POST['accid'])->delete();

                    redirect('/admin/taikhoan', ['mess'=>'Đã xóa tài khoản']);
                }
            }
        }
    

    }
?>