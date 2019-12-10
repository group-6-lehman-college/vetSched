<!DOCTYPE html>
<html>
    <head>
        <title>Add Pet</title>
        <?php include_once("checkSession.php");?>
    </head>
    <body>
        <?php 
        // if(isset($_SESSION['is_admin'])) {

        //     echo "<script>alert('this is an admin');</script>";
        // }
        ?>
        <form id="addPetForm"action="addPet.php" method="POST">
            Name<input type="text" name="name">
            Type<select name="type">
                <option value="Dog">Dog</option>
                <option value="Cat">Cats</option>
                <option value="Bird">Bird</option>
                <option value="Lizard">Lizard</option>
                <option value="Turtle">Turtle</option>
                <option value="other">Other</option>
            </select>
            <p>Sex</p>
                Male<input type="radio" name="sex" value="m" checked="checked">
                Female<input type="radio" name="sex" value="f">
            </select>
            <textarea form="addPetForm" placeholder="Tell us something about your pet" name="description" rows="10"></textarea>
            <input type="submit" value="Add pet">
        </form>
        
    </body>
</html>