<?php
global $params;

//check if user has role admin
if(!isAdmin()){
    logout();
    header ("location:/home");

}else{
    switch ($params[2]){
        case 'home':
            include_once "../Templates/admin/home.php";
            break;
        case 'products':
            $products = getAllProducts();
            include_once "../Templates/admin/products.php";
            break;
        case 'addProducts':
            include_once "../Templates/admin/addProducts.php";
            break;
        case 'deleteProduct':
            deleteProduct($_GET['id']);
            header("location:/admin/products");
            break;
            default:
        include_once "../Templates/admin/home.php";
        break;
    }
}
