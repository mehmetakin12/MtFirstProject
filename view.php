<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    <form action="controller.php" method="post">
     <p>Voer een tekst in:
     <input type="text"  name="naam"/>*</p>
     <p>
     <input type="submit" value="submit">
     </p>
    </form>
        
    <?php
        echo $viewData['palindroom']."<br />";
        echo $viewData['message']."<br />";
        echo $viewData['action'];
    ?>
    </body>
</html>