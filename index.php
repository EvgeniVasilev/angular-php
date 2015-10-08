<!DOCTYPE html>
<html lang="en" data-ng-app="App">
    <head>
        <title>Grandmother Recipes</title>
        <meta charset="UTF-8"/>
        <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="bower_components/jquery/dist/jquery.js" type="text/javascript"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.js" type="text/javascript"></script>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }

            .center {
                text-align: center;
                padding-bottom: 6px;
            }

            .my-header {
                color: #CB6741;
            }

            .center-block-custom {
                margin-bottom: 40px;
            }          

            img{
                width: 100%;
            }

            .description{                
                display: block;
                text-align: justify;
                text-indent: 40px;
                padding: 0 20px;
            }

            .description:first-letter{
                font-size: 19px;
                font-weight: bold;
                text-decoration: underline;
                margin: 0 5px 0 0; 
                font-style: normal;
                color: maroon;
            }

            .custom-error-class{                
                color: red;				
                font-size: 12px;
                position: absolute;	
                -webkit-transition: all linear 0.7s;
                -moz-transition: all linear 0.7s;
                transition: all linear 0.7s;
                display: block;
                width: 100%;
            }
            
            .custom-error-class.ng-hide {
                opacity:0;
            }     

        </style>
        <script src="bower_components/angular/angular.js" type="text/javascript"></script> 
        <!--angular animate-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-animate.js" type="text/javascript"></script>
        <!--angular routes-->
        <script src="bower_components/angular-route/angular-route.js" type="text/javascript"></script>
        <!--create application-->
        <script src="app/app.js" type="text/javascript"></script>
        <!--services-->
        <script src="services/myService.js" type="text/javascript"></script>
        <!--main controller-->
        <script src="controllers/appController.js" type="text/javascript"></script>
        <!--application routes-->
        <script src="routes/rotes.js" type="text/javascript"></script>
    </head>
    <body data-ng-controller="appController">
        <div class="container-fluid">
            <header class="page-header well">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="my-header">
                            Grandmother's Recipes
                        </h1>
                    </div>
                    <div class="col-lg-6">
                        <a href="#new/recipe" class="btn btn-primary  pull-right">Add new Recipe</a>
                    </div>
                </div>
            </header>
            <div class="alert-danger center center-block-custom hidden">
                <h2>
                    <small>
                        Pease, note! The Application is in production state  yet! Back-end is under development!
                    </small>
                </h2>
            </div>
            <div data-ng-view=""></div>

            <footer class="well">
                <p>
                    &copy; The code is free for use
                </p>
                <p>
                    <a href="https://github.com/EvgeniVasilev/Angular-and-PHP-Integraton" target="_blank">https://github.com/EvgeniVasilev/Angular-and-PHP-Integraton</a>
                </p>
                <p>
                    Author:<a href="mailto: evgeni.vasilev0912@gmail.com">evgeni.vasilev0912@gmail.com</a> 
                </p>
            </footer>
        </div>

        <!--modal added recipe-->
        <!-- Modal -->
        <div id="addRecipe" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Message fro Grandmother's Recipes</h4>
                    </div>
                    <div class="modal-body">
                        <p>The recipe was successfully added!</p>
                    </div>                    
                </div>

            </div>
        </div>
        
        <!--modal edited recipe-->      
        
        <!-- Modal -->
        <div id="editRecipe" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Message fro Grandmother's Recipes</h4>
                    </div>
                    <div class="modal-body">
                        <p>The recipe was successfully edited!</p>
                    </div>                    
                </div>

            </div>
        </div>
        
    </body>
</html>
