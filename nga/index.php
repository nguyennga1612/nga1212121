<?php
session_start();
//session_destroy();
$strJsonFileContents = file_get_contents("app/data/shoes.json");
$array = json_decode($strJsonFileContents, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Crimson+Pro">
</head>

<body>
<a href="cart.php" style="font-size:30px;">CART</a>
<div class="container">
    <div class="row">
    <?php
            foreach($array['shoes'] as $da)
            {
                ?>
            <div class="col-md-4 d-flex justify-content-center">
                <div class="product_big">
                        <div class="nike">
                            <img width="30px" src="app/assets/nike.png" alt="">
                            <p class="product_text">Our Product</p>
                        </div>
                        <div class="product_img" style="background: <?php echo $da['color']; ?>">
                            <img class="product_img_responsive"  src="<?php echo $da['image']; ?>" alt="">
                        </div>
                        <div class="product_infomation">
                            <p class="product_infomation_text"><?php echo $da['name']; ?></p> 
                            <p class="product_infomation_param"><?php echo $da['description']; ?></p> 
                            <p style="color: red;font-weight: 900; font-size:22px;">$<?php echo $da['price']; ?></p> 
                            <div class="d-flex justify-content-center">
                            <form >
                        <input type="hidden" name='id' id='id' value="<?php echo $da['id']; ?>">
                        <input type="hidden" name='image'  id='image' value="<?php echo $da['image']; ?>">
                        <input type="hidden" name='price' id='price' value="<?php echo $da['price']; ?>">
                        <input type="hidden" name='name' id='name' value="<?php echo $da['name']; ?>">
                        <input type="hidden" name='color' id='color' value="<?php echo $da['color']; ?>">
                        <input type="hidden" name='qty' id='qty' value="1">
                        
                        <?php
                        if(!empty($_SESSION['cart']))
                        {
                            $ids = array_column($_SESSION['cart'], 'id');
                            if(in_array($da['id'], $ids))
                            {
                                
                                    echo '<img src="app/assets/check.png">';
                            }
                            else
                                {
                                    echo '<div class="click'.$da['id'].'"></div>
                                    <input type="submit" id="click'.$da['id'].'" onclick=" myFunction(this)" class="button1" value="Add to cart">';
                                }
                        }
                        else
                        {
                            echo '<div class="click'.$da['id'].'"></div>
                            <input type="submit" id="click'.$da['id'].'" onclick="myFunction(this)" class="button1" value="Add to cart">';
                        }
                        ?>
                        </form>
                        </div>
                        </div>
                    </div>
            </div>
            
            <?php
            }
        ?> 
        
    </div>
</div>
<div id="result"></div>
</body>

</html>
<script>
$(document).ready(function(){
    $("form").on("submit", function(event){
        event.preventDefault();
        var formValues= $(this).serialize();
        $.post("post.php", formValues, function(data){
            $("#result").html(data);
        });
    });
});
function myFunction(e)
{
    document.querySelector("."+ e.id).innerHTML = "<img src='app/assets/check.png'>";
    document.getElementById(e.id).style.display = 'none';
}
</script>
