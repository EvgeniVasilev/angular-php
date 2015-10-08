"use strict";
/*global App*/

App.factory("myService", function ($http) {  
    return $http.get("data/recipes.json");
});
