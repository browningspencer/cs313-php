<?php
session_start();
require "../dbConnect.php";
$db = get_db();
$action = filter_input(INPUT_POST, 'action');

if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

    case 'viewRecipes':
        $userId = $_SESSION['clientData']['userid'];

        function getRecipes($userId){
            $db = get_db();
            $sql = 'SELECT recipeid, recipetitle, recipecategory, to_char(recipedate, \'MM-DD-YYYY\') as date, recipeingredients, recipedirections from recipes where userid = :userid order by DATE ASC ';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
            $recipes = $stmt->fetchALL(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $recipes;
        }

        $recipes = getRecipes($userId);

//             foreach ($recipes as $recipe) {
//            echo '<div class="panel panel-default">';
//            echo '<div class="panel-heading">';
//            echo '<h3><span> Title: <strong>'. $recipe['recipetitle'].'</strong></span>';
//            echo '<span> Date: <strong>'. $recipe['date'].'</strong></span>';
//            echo '</h3>';
//            echo ' </div>';
//            echo ' <div class="panel-body">';
//            echo '<p>'.$recipe['recipetext'].'</p>';
//            echo ' </div></div>';
//            }

        include '../view/recipes.php';
    break;

    case 'addRecipe':
        $userId = $_SESSION['clientData']['userid'];
        $recipeTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $recipeCategory = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        //$recipeText = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
        $recipeIngredients = filter_input(INPUT_POST, 'ingredients', FILTER_SANITIZE_STRING);
        $recipeDirections = filter_input(INPUT_POST, 'directions', FILTER_SANITIZE_STRING);

        function addRecipe($userId, $title, $category, $ingredients, $directions){
            $db = get_db();
            //$sql = 'INSERT INTO recipes (userid, recipetitle, recipetext) VALUES (:userid, :title, :text)';
            $sql = 'INSERT INTO recipes (userid, recipetitle, recipecategory, recipeingredients, recipedirections) VALUES (:userid, :title, :category, :ingredients, :directions)';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':userid', $userId, PDO::PARAM_STR);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            //$stmt->bindValue(':text', $text, PDO::PARAM_STR);
            $stmt->bindValue(':category', $category, PDO::PARAM_STR);
            $stmt->bindValue(':ingredients', $ingredients, PDO::PARAM_STR);
            $stmt->bindValue(':directions', $directions, PDO::PARAM_STR);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            $stmt->closeCursor();
            return $rowCount;
        }

        //$newRecipe = addRecipe($userId, $recipeTitle, $recipeText);
        $newRecipe = addRecipe($userId, $recipeTitle, $recipeCategory, $recipeIngredients, $recipeDirections);

        if ($newRecipe == 1){
            $message = 'Recipe was added succesfully';
        }else{
            $message = 'ERROR: recipe not added, please contact administrator';
        }
        include '../view/your-page.php';

    break;

    case 'goAddRecipe':
        include '../view/new-recipe.php';
        break;

        case 'Logout' :
            session_destroy();
            header('location: ../');
        break;

    case 'editRecipe':

        $recipeId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        function getRecipe($recipeId){
            $db = get_db();
            //$sql = 'SELECT recipeid, recipetitle, to_char(recipedate, \'MM-DD-YYYY\') as date, recipetext from recipes where recipeid = :recipeid';
            $sql = 'SELECT recipeid, recipetitle, recipecategory, to_char(recipedate, \'MM-DD-YYYY\') as date, recipeingredients, recipedirections from recipes where recipeid = :recipeid';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':recipeid', $recipeId, PDO::PARAM_STR);
            $stmt->execute();
            $recipes = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $recipes;
        }

        $recipe = getRecipe($recipeId);

        $_SESSION['recipeId'] = $recipe['recipeid'];

        function buildRecipeEditForm($recipe){


            $review = "<form  class='inline-form' action='../recipes/?action=updateRecipe' method='post' enctype='multipart/form-data' name='updateRecipe' id= 'updateRecipeForm'> ";
            $review .= "<h2>$recipe[recipetitle]</h2>";
            $review .= "<h4>$recipe[recipecategory]</h4>";
            $review .= "<p>Entered on $recipe[date]</p>";
            $review .= "<label>Review Ingredients and Directions </label><br>";
            $review .= "<textarea class='form-control' name = 'newIngredients' rows='20' cols='60' required>";
            $review .= $recipe['recipeingredients'];
            $review .= "</textarea><br>";
            $review .= "<textarea class='form-control' name = 'newDirections' rows='25' cols='60' required>";
            $review .= $recipe['recipedirections'];
            $review .= "</textarea><br>";
            $review .= "<input type = 'submit' value = 'update' >";
            $review .= "<input type = 'hidden' name = 'action' value = 'updateRecipe'>";
            $review .= "<input type = 'hidden' name = 'reviewId' value = '$recipe[recipeid]'>";
            $review .= "</form>";
            return $review;
        }

        $editRecipeView= buildRecipeEditForm($recipe);
        include '../view/edit-recipe.php';

        break;

    case 'updateRecipe':
      $recipeId = $_SESSION['recipeId'];

        //$newText =  filter_input(INPUT_POST, 'newText', FILTER_SANITIZE_STRING);
        $newIngredients = filter_input(INPUT_POST, 'newIngredients', FILTER_SANITIZE_STRING);
        $newDirections = filter_input(INPUT_POST, 'newDirections', FILTER_SANITIZE_STRING);
//        var_dump($newText);
//        exit();
        function addRecipe($ingredients, $directions, $recipeId){
            $db = get_db();
            //$sql = 'UPDATE recipes SET  recipetext = :text WHERE recipeid = :recipeid';
            $sql = 'UPDATE recipes SET recipeingredients = :ingredients WHERE recipeid = :recipeid';
            $sql = 'UPDATE recipes SET recipedirections = :directions WHERE recipeid = :recipeid';
            $stmt = $db->prepare($sql);
            //$stmt->bindValue(':text', $text, PDO::PARAM_STR);
            $stmt->bindValue(':ingredients', $ingredients, PDO::PARAM_STR);
            $stmt->bindValue(':directions', $directions, PDO::PARAM_STR);
            $stmt->bindValue(':recipeid', $recipeId, PDO::PARAM_STR);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            $stmt->closeCursor();
            return $rowCount;
        }
        $newRecipe = addRecipe($newIngredients, $newDirections, $recipeId);
        if ($newRecipe == 1){
            $message = 'recipe was updated successfully';
        }else{
            $message = 'ERROR: recipe not updated, please contact administrator';
        }
        include '../view/your-page.php';

        break;

    case 'goDelete' :


        $recipeId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        function getRecipe($recipeId){
            $db = get_db();
            //$sql = 'SELECT recipeid, recipetitle, to_char(recipedate, \'MM-DD-YYYY\') as date, recipetext from recipes where recipeid = :recipeid';
            $sql = 'SELECT recipeid, recipetitle, recipecategory, to_char(recipedate, \'MM-DD-YYYY\') as date, recipeingredients, recipedirections from recipes where recipeid = :recipeid';            
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':recipeid', $recipeId, PDO::PARAM_STR);
            $stmt->execute();
            $recipes = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $recipes;
        }

        $recipe = getRecipe($recipeId);

        $_SESSION['recipeId'] = $recipe['recipeid'];

        function buildRecipeEditForm($recipe){
            $review = "<form  class='inline-form' action='../recipes/' method='post' enctype='multipart/form-data' name='updateRecipe' id= 'updateRecipeForm'> ";
            $review .= "<div class='panel panel-default'>";
            $review .= "<div class='panel-heading'>";
            $review .= "<h2>Recipe title: $recipe[recipetitle]</h2>";
            $review .= "<h4>$recipe[recipecategory]</h4>";
            $review .= "<p>Recipe date: $recipe[date]</p>";
            $review .= "</div>";
            $review .= "<div class = 'panel-body'>";
            $review .= "<label>Ingredients: </label><br>";
            $review .= "<p name = 'newIngredients' required>";
            $review .= $recipe['recipeingredients'];
            $review .= "</p><br>";
            $review .= "<label>Directions: </label><br>";
            $review .= "<p name = 'newDirections' required>";
            $review .= $recipe['recipedirections'];
            $review .= "</p><br>";
            $review .= "</div></div>";
            $review .= "<input type = 'submit' value = 'Delete Recipe' >";
            $review .= "<input type = 'hidden' name = 'action' value = 'deleteRecipe'>";
            $review .= "<input type = 'hidden' name = 'recipeId' value = '$recipe[recipeid]'>";
            $review .= "</form>";
            return $review;
        }

        $deleteRecipeView= buildRecipeEditForm($recipe);
        include '../view/delete-recipe.php';

        break;

    case 'deleteRecipe':

        $recipeId = $_SESSION['recipeId'];

        function addRecipe($recipeId){
            $db = get_db();
            $sql = 'DELETE FROM recipes  WHERE recipeid = :recipeid';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':recipeid', $recipeId, PDO::PARAM_STR);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            $stmt->closeCursor();
            return $rowCount;
        }
        $newRecipe = addRecipe($recipeId);
        if ($newRecipe == 1){
            $message = 'recipe was delete successfully';
        }else{
            $message = 'ERROR: recipe not deleted, please contact administrator';
        }
        include '../view/your-page.php';

        break;



    default:
        include '../view/your-page.php';

        
}