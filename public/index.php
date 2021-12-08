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
<<<<<<< HEAD
        }
        break;
    case 'product':
=======
<<<<<<< HEAD
=======
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
        if(isset($_GET['id']))
        {
            $product=getProduct($_GET['id']);
            if(isset($_POST['verzenden'])) {
               // saveB;
                //ga naar producten
            } else {
                include_once "../Templates/review.php";
            }
        }
        else {
            $titleSuffix = ' | Home';
            include_once "../Templates/home.php";
>>>>>>> 597c3bccbaefdee2ec828665cf59de943077ff49
        }
        break;
    case 'product':
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
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
<<<<<<< HEAD
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
=======
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
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