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
            break;
        case 'addProducts':
            break;
        case 'deleteProducts':
            break;
        default:
        include_once "../Templates/admin/home.php";
        break;

    }
}
