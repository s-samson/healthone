<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
// aantekeningen voor mezelf
// STH = Statement Handle
// PDO = PHP Data Object
// FETCH_ASSOC = Zet data uit een database in een array
// Fetch = haalt de volgende rij op uit een resultaten set
// BindParam = bind een parameter naar een speciefieke variabele naam.
// prepare = Maakt een statement klaar voor executie en return een object.
// query = met een query geef je een opdracht aan de database om een bepaalde actie uit te voeren. geeft eventueel ook data terug.
// Fetchall = Wordt een array gereturned met alle rows van een resultaat



function getProducts(int $categoryId)
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product WHERE category_id=? ');
    $sth->bindParam(1, $categoryId);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}

function getProduct(int $productId)
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product WHERE id=?');
    $sth->bindParam(1, $productId);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product')[0];
}

function getAllProducts(): array
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product ORDER BY category_id');
    $sth -> execute();
    return $sth -> fetchAll(PDO:: FETCH_CLASS, 'Product');
}
function deleteProduct(int $productId){
    global $pdo;
    $id = filter_var($productId, FILTER_VALIDATE_INT);
    if($id!=false){
        $stmnt = $pdo->prepare('DELETE FROM `product` WHERE `id`=:id');
        $stmnt->bindParam(':id' ,$id);
        $stmnt->execute();
    }

}

/*function addProduct(){
    global $pdo;

 try{
     $db = $pdo;


    if(isset($_POST['verzenden'])){
     $name = filter_input(INPUT_POST, "name",FILTER_SANITIZE_STRING);
     //$name = filter_input(INPUT_POST, "picture",FILTER_SANITIZE_NUMBER_INT);
     $description = filter_input(INPUT_POST, "description",FILTER_SANITIZE_STRING);
     $category_id = filter_input(INPUT_POST, "category_id",FILTER_SANITIZE_NUMBER_INT);

     $query = $db -> prepare("INSERT INTO product (name,description,category_id) VALUES(:name, :description, :category_id)");
     $query = bindParam("name",$name);
     $query = bindParam("description",$description);
     $query = bindParam("category_id",$category_id);
     if($query->execute()){
         echo "De nieuwe gegevens zijn toegevoegd";
     }else{
         echo "er is een fout opgetreden";
     }
 }
}catch(PDOException $e){
     die("error!" . $e->getMessage());

 }
} */

