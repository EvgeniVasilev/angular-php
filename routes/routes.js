"use strict";
/*global App*/
App.config(["$routeProvider", function ($routeProvider) {
        $routeProvider.when("/", {
            templateUrl: "views/recipes.html",
            controller: "appController"
        }).when("/recipe/:id", {
            templateUrl: "views/partials/recipe.html",
            controller: "recipeController"
        }).when("/new/recipe", {
            templateUrl: "views/partials/new-recipe.html",
            controller: "addRecipe"
        }).when("/edit/recipe/:id", {
            templateUrl: "views/partials/edit-recipe.html",
            controller: "editRecipe"
        }).otherwise({"redirectTo": "/"});
    }]);
