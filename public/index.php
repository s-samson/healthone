<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Database.php';

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
        }
        break;
    case 'contact':
        include_once "../Templates/contact.php";
        break;
    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
}

function getTitle() {
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}