<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Database.php';
require '../Modules/Review.php';

$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$title = "HealthOne";
$titleSuffix = "";

switch ($params[1]) {
    case 'categories':
        $titleSuffix = ' | Categories';
        $categories = getCategories();
        include_once "../Templates/categories.php";
        break;

    case 'category':
        if (isset($_GET['id'])) {
            $categoryId = $_GET['id'];
            $products = getProducts($categoryId);
            $name = getCategoryName($categoryId);
            include_once "../Templates/products.php";
        }
        break;
    case 'product':
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            $product = getProduct($productId);
            $titleSuffix = ' | ' . $product->name;
            include_once "../Templates/product.php";
        }
        break;

    case 'review':
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            $product = getProduct($productId);
            if (isset($_POST['verzenden'])) {
                //var_dump($_POST);
                $name = $_POST['name'];
                $description = $_POST['description'];
                saveReview($name, $description, $productId);
                $reviews = getReview();
                include_once "../Templates/product.php";
            } else {
                include_once "../Templates/review.php";
            }
        } else {
            include_once "../Templates/home.php";
        }
        break;
    case 'login':
        $titleSuffix =' | login ';
        if(isset($_POST['login'])){
            $result = checkLogin();

            switch ($result){
                case 'ADMIN':
                    header ("location : /admin/home");
                    break;
                case 'MEMBER':
                case 'FAILURE':
                    $message = "Email of Password is niet correct ingevuld!";
                    include_once "../Templates/login.php";
                    break;
                case 'INCOMPLETE';
                $message = "Formulier is niet volledig ingevuld!";
                include_once "../Templates/login.php";
                break;

            }
        }
        else{
            include_once "../Templates/login.php";
        }
        break;
    case 'admin':
        include_once ('admin.php');
        break;
    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
        break;
}
function getTitle() {
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}