create table recipes (
  recipe_id int (11) AUTO_INCREMENT PRIMARY KEY,
  recipe_name varchar (255) NOT NULL DEFAULT  "Recipe Name",
  recipe_description varchar (255) NOT NULL Default "Recipe Description",
  recipe_body  text,
  recipe_image varchar (50) NOT NULL DEFAULT  "food.jpg"
);
