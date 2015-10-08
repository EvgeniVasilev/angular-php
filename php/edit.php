<?php
require_once "DB.php";

$db = new DB();
$dba = $db->connect("localhost", "root", "", "recipes_db");

// get values from edit-recipe.html
if (isset($_REQUEST["id"]) and !empty($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
}
if (isset($_REQUEST["recipeName"]) and !empty($_REQUEST["recipeName"])) {
    $recipeName = $_REQUEST["recipeName"];
}

if (isset($_REQUEST["recipeDescription"]) and !empty($_REQUEST["recipeDescription"])) {
    $recipeDescription = $_REQUEST["recipeDescription"];
}

if (isset($_REQUEST["recipeBody"]) and !empty($_REQUEST["recipeBody"])) {
    $recipeBody = $_REQUEST["recipeBody"];
}

if (isset($_REQUEST["recipeImage"]) and !empty($_REQUEST["recipeImage"])) {
    $recipeImage = $_REQUEST["recipeImage"];
}


$sql = $dba->prepare("UPDATE recipes SET recipe_name = :name,recipe_description = :description, recipe_body = :body,recipe_image = :image WHERE recipe_id = :id");

$sql->bindParam(":id", $id);
$sql->bindParam(":name", $recipeName);
$sql->bindParam(":description", $recipeDescription);
$sql->bindParam(":body", $recipeBody);
$sql->bindParam(":image", $recipeImage);

$update = $sql->execute();

if ($update) {

    $select = $dba->prepare("SELECT * FROM recipes ORDER BY recipe_id DESC");
    $select->execute();

    while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {
        $row[] = array("id" => $rows["recipe_id"], "name" => $rows["recipe_name"], "description" => $rows["recipe_description"], "body" => $rows["recipe_body"], "image" => $rows["recipe_image"]);
    }

    // put in data file parsed as json all the table records
    file_put_contents("../data/recipes.json", json_encode($row), FILE_TEXT);
}
