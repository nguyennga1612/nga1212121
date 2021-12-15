<?php
session_start();
$total = 0;
if(isset($_SESSION['cart']))
{
    foreach($_SESSION['cart'] as $data1){
        $total += $data1['price'] * $data1['qty'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a style="font-size:30px;" href="index.php">HOME</a>
    <?php if(!empty($_SESSION['cart']))
            {
                ?>
    <div class="row justify-content-center" style="padding: 50px 20px">
        <div class="row_border">
            <div class="header" style="margin-bottom: 20px; display: flex; justify-content: space-between; ">
                <div class="nike">
                    <img width="30px" src="app/assets/nike.png" alt="">
                    <p class="product_text">Our Product</p>
                </div>
                <div class="">
                    <p class="product_text" style="color:red">$<?php echo $total ?></p>
                </div>
            </div>
            <?php
              foreach($_SESSION['cart'] as $data)
                {
            ?>
            <div class="row ">
                <div class="col">
                    <div class="mr-1"
                        style="background:<?php echo $data['color']; ?>;width: 100px; height: 100px; border-radius: 50%;position: relative;">
                        <img style="transform: rotate(-25deg); position: absolute;right: -15px; bottom: -20px;"
                            class="rounded" src="<?php echo $data['image']; ?>" width="130">
                    </div>
                </div>
                <div class="col-6">
                    <p class="text_name"><?php echo $data['name']; ?></p>
                    <p class="text_price">$<?php echo $data['price']*$data['qty']; ?></p>

                </div>
                <div class="col">
                    <div class="icon_edit">
                        <div class="icon_edit_detail">
                            <span class="icon_edit_plus">
                                <a href="process_form.php?action=add&id=<?php echo $data['id']; ?>"><i
                                        class="fa fa-plus" aria-hidden="true"></i></a>
                            </span>
                            <span class="icon_edit_detail_text"><?php echo $data['qty']; ?></span>
                            <span class="icon_edit_plus">
                                <a href="process_form.php?action=delete&id=<?php echo $data['id']; ?>"><i
                                        class="fa fa-minus" aria-hidden="true"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col delete" style=" display: flex; 
                flex-wrap: nowrap; 
                justify-content: flex-end; 
                align-items: center; ">
                    <div class="icon_deleted ">

                    </div>
                    <div class="icon_delete ">
                        <a href="process_form.php?action=unset&id=<?php echo $data['id']; ?>"> <i class="fa fa-trash"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <?php
                }
            
            ?>
        </div>
    </div>
    </div>
    <?php
    } else{
        ?>
    <h1>Đi mua hàng thôi</h1>
    <?php } ?>
</body>

</html>
<script>
// function quantity(value, id) {
//     send_data({
//         id: id,
//         value:value
//     }, "edit");
// }

// function send_data(data = {}, data_type) {
//     var ajax = new XMLHttpRequest();
//     ajax.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             handle_result(this.responseText);
//         }
//     };
//     ajax.open("POST", "process_form.php", true);
//     ajax.send(JSON.stringify(data));
// }
// function handle_result(result) {
//     console.log(result);
//     if (result != "") {
//         var obj = JSON.parse(result);
//         document.querySelector("#result").innerHTML = obj.data;
//     }
// }
</script>