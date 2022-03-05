<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Database.php';
require '../Modules/Review.php';
require '../Modules/login.php';
require '../Modules/logout.php';
require '../Modules/Member.php';
require '../Modules/Register.php';

session_start();
var_dump($_SESSION);
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
    case 'contact':
        include_once "../Templates/contact.php";
        break;

    case 'review':
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            $product = getProduct($productId);
            if (isset($_POST['verzenden'])) {
                //var_dump($_POST);
                $name = $_POST['name'];
                $description = $_POST['description'];
                $stars = $_POST['stars'];
                saveReview($name, $description,$stars,$productId);
                $reviews = getReview($productId);
                include_once "../Templates/product.php";
            } else {
                include_once "../Templates/review.php";
            }
        } else {
            include_once "../Templates/home.php";
        }
        break;
    case 'login';
        $titleSuffix =' | login ';
        if(isset($_POST['login'])){
            var_dump($_POST);
            $result = checkLogin();

            switch ($result){
                case 'ADMIN':
                    header ("Location: /admin/home");
                    break;
                case 'MEMBER':
                    header("location: /member/home");
                    break;
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
    case 'logout':
        $_SESSION=[];
        include_once ('../Templates/home.php');
        break;
    case 'admin':
        include_once ('admin.php');
        break;
    case 'member':
        include_once ('member.php');
        break;

    case 'register':
        $titleSuffix = ' | Register';

        if(isset($_POST['submit'])){
            $result = makeRegistration();
            switch ($result) {
                case 'SUCCESS':
                    header("Location: /home");
                    break;

                case 'INCOMPLETE':
                    $message="Niet alle velden zijn correct ingevuld";
                    include_once "../Templates/register.php";
                    break;

                case 'EXIST':
                    $message = "Gebruiker bestaat al";
                    include_once "../Templates/register.php";
            }
        } else {
            include_once "../Templates/register.php";
        }
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