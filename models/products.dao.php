<?php
require_once "pdo.php";

/**
 * Function that allows to add a product into the DB
 *
 * @param string $productName
 * @param string $productCategory
 * @param string $productPrice
 * @param string $productDesc
 * @param string $productQuantity
 * @param string $productPromo
 * @param int $idImage
 * @return $idProduct
 */
function insertProductIntoDB($productName, $productCategory, $productPrice, $productDesc, $productQuantity, $productPromo/*, $idImage*/)
{
    $DB = connexionPDO();
    $req = 'INSERT INTO products (name, category, price, description, quantity, promotion)
    values (:name, :category, :price, :description, :quantity,:promotion) ';
    $stmt = $DB->prepare($req);
    $stmt->bindValue(":name", $productName, PDO::PARAM_STR);
    $stmt->bindValue(":category", $productCategory, PDO::PARAM_STR);
    $stmt->bindValue(":price", $productPrice, PDO::PARAM_STR);
    $stmt->bindValue(":description", $productDesc, PDO::PARAM_STR);
    $stmt->bindValue(":quantity", $productQuantity, PDO::PARAM_STR);
    $stmt->bindValue(":promotion", $productPromo, PDO::PARAM_STR);
    // $stmt->bindValue(":id_image", $idImage, PDO::PARAM_INT);
    $stmt->execute();
    $idProduct = $DB->lastInsertId();
    $stmt->closeCursor();
    return $idProduct;
}

/**
 * Function that allows to recover the 8 best products from DB
 *
 * @return $products
 */
function getHomeProductsFromDB(){
    $DB = connexionPDO();
    $req = "SELECT * FROM products INNER JOIN images WHERE products.id_image = images.image_id ORDER BY products.quantity DESC LIMIT 8";
    $stmt = $DB->prepare($req);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $products;
}

/**
 * Fonction that allows to recover a product by id from DB
 *
 * @param int $id
 * @return $product
 */
function getProductFromDB($id){
    $DB = connexionPDO();
    $req = "SELECT * FROM products INNER JOIN images WHERE products.id_image = images.image_id AND products.id = :id";
    $stmt = $DB->prepare($req);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $product;
}

/**
 * Fonction that allows to recover all products from DB
 *
 * @return $allProducts
 */
function getAllProductsFromDB(){
    $DB = connexionPDO();
    $req = "SELECT * FROM products JOIN images WHERE products.id_image = images.image_id ORDER BY products.id DESC";
    $stmt = $DB->prepare($req);
    $stmt->execute();
    $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $allProducts;
}

/**
 * Function to retrieve all products by name asc from DB
 *
 * @return $allProducts
 */
function getAllProductsFromDBbyNameAsc(){
    $DB = connexionPDO();
    $req = "SELECT * FROM products INNER JOIN images WHERE products.id_image = images.image_id ORDER BY products.name ASC";
    $stmt = $DB->prepare($req);
    $stmt->execute();
    $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $allProducts;
}

/**
 * Function to retrieve all products by name desc from DB
 *
 * @return $allProducts
 */
function getAllProductsFromDBbyNameDesc(){
    $DB = connexionPDO();
    $req = "SELECT * FROM products INNER JOIN images WHERE products.id_image = images.image_id ORDER BY products.name DESC";
    $stmt = $DB->prepare($req);
    $stmt->execute();
    $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $allProducts;
}

/**
 * Function to retrieve all products by price asc from DB
 *
 * @return $allProducts
 */
function getAllProductsFromDBbyPriceAsc(){
    $DB = connexionPDO();
    $req = "SELECT * FROM products INNER JOIN images WHERE products.id_image = images.image_id ORDER BY products.price ASC";
    $stmt = $DB->prepare($req);
    $stmt->execute();
    $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $allProducts;
}

/**
 * Function to retrieve all products by price desc from DB
 *
 * @return $allProducts
 */
function getAllProductsFromDBbyPriceDesc(){
    $DB = connexionPDO();
    $req = "SELECT * FROM products INNER JOIN images WHERE products.id_image = images.image_id ORDER BY products.price DESC";
    $stmt = $DB->prepare($req);
    $stmt->execute();
    $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $allProducts;
}

/**
 * Function to retrieve a product by id from DB
 *
 * @param int $id
 * @return $product
 */
function getProductById($id){
    $DB = connexionPDO();
    $req = "SELECT * FROM products INNER JOIN images WHERE products.id_image = images.image_id AND products.id = :id";
    $stmt = $DB->prepare($req);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $product;
}

/**
 * Function to update a product with img by id into DB
 *
 * @param string $productName
 * @param string $productCategory
 * @param string $productPrice
 * @param string $productDesc
 * @param string $productQuantity
 * @param string $productPromo
 * @param int $idImage
 * @param int $id
 * @return $result
 */
function updateProductIntoDBWithImg($productName, $productCategory, $productPrice, $productDesc, $productQuantity, $productPromo, $idImage, $id){
    $DB = connexionPDO();
    $req = 'UPDATE products set name = :name, category = :category, price = :price, description = :description, quantity = :quantity, promotion = :promotion, id_image = id_image WHERE id = :id ';
    $stmt = $DB->prepare($req);
    $stmt->bindValue(":name", $productName, PDO::PARAM_STR);
    $stmt->bindValue(":category", $productCategory, PDO::PARAM_STR);
    $stmt->bindValue(":price", $productPrice, PDO::PARAM_STR);
    $stmt->bindValue(":description", $productDesc, PDO::PARAM_STR);
    $stmt->bindValue(":quantity", $productQuantity, PDO::PARAM_INT);
    $stmt->bindValue(":promotion", $productPromo, PDO::PARAM_STR);
    $stmt->bindValue(":id_image", $idImage, PDO::PARAM_INT);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $result = $stmt->execute();
    $stmt->closeCursor();
    if ($result > 0) return true;
    else return false;
}

/**
 * Function to update a product with img by id into DB
 *
 * @param string $productName
 * @param string $productCategory
 * @param string $productPrice
 * @param string $productDesc
 * @param string $productQuantity
 * @param string $productPromo
 * @param int $id
 * @return $result
 */
function updateProductIntoDB($productName, $productCategory, $productPrice, $productDesc, $productQuantity, $productPromo, $id){
    $DB = connexionPDO();
    $req = 'UPDATE products set name = :name, category = :category, price = :price, description = :description, quantity = :quantity, promotion = :promotion WHERE id = :id ';
    $stmt = $DB->prepare($req);
    $stmt->bindValue(":name", $productName, PDO::PARAM_STR);
    $stmt->bindValue(":category", $productCategory, PDO::PARAM_STR);
    $stmt->bindValue(":price", $productPrice, PDO::PARAM_STR);
    $stmt->bindValue(":description", $productDesc, PDO::PARAM_STR);
    $stmt->bindValue(":quantity", $productQuantity, PDO::PARAM_INT);
    $stmt->bindValue(":promotion", $productPromo, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $result = $stmt->execute();
    $stmt->closeCursor();
    if ($result > 0) return true;
    else return false;
}

/**
 * Function that allows a product by id from DB
 *
 * @param int $idProduct
 * @return $result
 */
function deleteProductFromDB($idProduct){
    $DB = connexionPDO();
    $req = 'DELETE FROM products WHERE products.id = :idProduct';
    $stmt = $DB->prepare($req);
    $stmt->bindValue(":idProduct", $idProduct, PDO::PARAM_INT);
    $result = $stmt->execute();
    $stmt->closeCursor();
    return $result;
}
