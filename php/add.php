<?php

require_once "DB.php";
$db = new DB();

$dba = $db->connect("localhost", "root", "", "recipes_db");

// gets the data from add-recipe.html
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

// prepare sql to prevent sql injections
$sql = $dba->prepare("INSERT INTO recipes (recipe_name, recipe_description, recipe_body, recipe_image) VALUES(:name, :description, :body, :image)");
$sql->bindParam(":name", $recipeName);
$sql->bindParam(":description", $recipeDescription);
$sql->bindParam(":body", $recipeBody);
$sql->bindParam(":image", $recipeImage);

// execute insert  query
$insert = $sql->execute();

// cheks if insert query is executed
// and if it is so slects all the recotds
if ($insert) {
    $select = $dba->prepare("SELECT * FROM recipes ORDER BY recipe_id DESC");
    $select->execute();

    while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {
        $row[] = array("id" => $rows["recipe_id"], "name" => $rows["recipe_name"], "description" => $rows["recipe_description"], "body" => $rows["recipe_body"], "image" => $rows["recipe_image"]);
    }

    // put in data file parsed as json all the table records
    file_put_contents("../data/recipes.json", json_encode($row), FILE_TEXT);
}
