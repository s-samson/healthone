<?php
$host = '127.0.0.1';
$db   = 'healthone';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    include_once ('../Classes/Category.php');
    include_once ('../Classes/Product.php');
    include_once ('../Classes/Review.php');
<<<<<<< HEAD
    include_once ('../Classes/User.php');
=======
>>>>>>> 46f8e6ce64d50b724af07c56f93e77abc68affe9
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
