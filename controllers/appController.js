"use strict";
/*global App*/
App.controller("appController", ["$scope", "myService", function ($scope, myService) {
        myService.then(function (data) {
            $scope.list = data;
        });
    }]).controller("recipeController", ["$scope", "$routeParams", function ($scope, $routeParams) {
        $scope.recipe = $scope.list.data[$routeParams.id];
    }]).controller("editRecipe", ["$scope", "$window", "$routeParams", function ($scope, $window, $routeParams) {
        $scope.recipe = $scope.list.data[$routeParams.id];
        $scope.isValidEditForm = function () {

            if (!$scope.editRecipe.$valid) {
                return;
            }

            if ($scope.editRecipe.$valid) {
                $.ajax({
                    action: "POST",
                    url: "php/edit.php",
                    data: {
                        recipeName: $scope.recipe.name,
                        recipeDescription: $scope.recipe.description,
                        recipeBody: $scope.recipe.body,
                        recipeImage: "food.png",
                        id: $scope.recipe.id
                    }
                }).then(function (data) {
                    if (data) {                        
                        var path = $window.location.pathname;
                        $window.location = "http://" + $window.location.hostname + path + "#/";
                        $("#editRecipe").modal();
                    }
                });
            }
        };
    }]).controller("addRecipe", ["$scope", "$window", function ($scope, $window) {
        $scope.isValidAddForm = function () {
            if (!$scope.addRecipe.$valid) {
                return;
            }
            if ($scope.addRecipe.$valid) {
                $.ajax({
                    action: "POST",
                    url: "php/add.php",
                    data: {
                        recipeName: $scope.recipeName,
                        recipeDescription: $scope.recipeDescription,
                        recipeBody: $scope.recipeBody,
                        recipeImage: "food.png"
                    }
                }).then(function (data) {                    
                    if (data) {
                        var path = $window.location.pathname;
                        $window.location = "http://" + $window.location.hostname + path + "#/";
                        $("#addRecipe").modal();
                    }
                });

            }
        };
    }]);
