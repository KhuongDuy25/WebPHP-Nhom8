<?php
    require __DIR__ . '/../app/phphelper.php';

    $router = new \Bramus\Router\Router();

    if( !adminChecking(getCurrentUser())){
        
        $router->get('/', 'App\Controller\HomeController\HomeController@index');
        $router->get('/dangnhap','App\Controller\LogInSignUpController\LogInSignUpController@getLogInPage');
        $router->get('/dangky','App\Controller\LogInSignUpController\LogInSignUpController@getSignUpPage');
        $router->get('/sanpham','App\Controller\ProductsController\ProductsController@index');
        $router->get('/giohang', 'App\Controller\CartController\CartController@index');
        $router->get('/lichsudathang', 'App\Controller\CartController\OrdersController@index');
        $router->get('/lienhe', 'App\Controller\ContactController\ContactController@index');
        $router->get('/gioithieu', 'App\Controller\IntroController\IntroController@index');
        $router->get('/sanpham/chitiet', 'App\Controller\ProductsController\ProductItemController@index');
        $router->get('/chitietdonhang','App\Controller\CartController\OrdersController@getOrdersDetail');
    
        $router->post('/dangky','App\Controller\LogInSignUpController\LogInSignUpController@signUp');
        $router->post('/dangnhap','App\Controller\LogInSignUpController\LogInSignUpController@logIn');
        $router->post('/lienhe','App\Controller\ContactController\ContactController@sendFeedback');
        $router->post('/thanhtoan','App\Controller\CartController\CartController@payment');
        $router->post('/magiamgia','App\Controller\CartController\CartController@getVoucherData');
    }
    else {
        $router->get('/admin', 'App\Controller\AdminController\AdminController@index');
        $router->get('/admin/taikhoan', 'App\Controller\AdminController\AdminController@getAccounts');
        $router->get('/admin/solieu', 'App\Controller\AdminController\AdminController@getNumberDatas');
        $router->get('/admin/doanhthu', 'App\Controller\AdminController\AdminController@getTurnover');
        $router->get('/admin/solieusanpham', 'App\Controller\AdminController\AdminController@getProductsData');
        $router->get('/admin/capnhatsanpham', 'App\Controller\AdminController\AdminController@productManage');
        $router->get('/admin/capnhatsanpham/sua', 'App\Controller\AdminController\AdminController@getUpdateProductView');
        $router->get('/admin/capnhatsanpham/them', 'App\Controller\AdminController\AdminController@getAddProductView');
        $router->get('/admin/quanlydonhang', 'App\Controller\AdminController\AdminController@getOrderManageView');
        $router->get('/admin/quanlydonhang/doitrangthai', 'App\Controller\AdminController\AdminController@changeStatus');
        $router->get('/admin/chitietdonhang', 'App\Controller\AdminController\AdminController@getOrderDetailView');
        $router->get('/admin/phanhoi', 'App\Controller\AdminController\AdminController@getFeedbackView');
        
        
        $router->post('/admin/capnhatsanpham/sua', 'App\Controller\AdminController\AdminController@updateProuct');
        $router->post('/admin/capnhatsanpham/them', 'App\Controller\AdminController\AdminController@addProcut');
        $router->post('/admin/capnhatsanpham/xoa', 'App\Controller\AdminController\AdminController@deleteProduct');
        $router->post('/admin/taikhoan/xoa', 'App\Controller\AdminController\AdminController@deleteAccount');

        //API

        $router->get('/api/v1/getdata', 'App\Controller\APIController\APIController@getData');
        $router->get('/api/v1/getturnoverdata', 'App\Controller\APIController\APIController@getTurnOverdata');
        $router->get('/api/v1/getproductdata', 'App\Controller\APIController\APIController@getProductData');

    }

    $router->get('/dangxuat','App\Controller\LogInSignUpController\LogInSignUpController@logOut');


    $router->run();
    
?>