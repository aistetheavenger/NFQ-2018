<?php

include "connect.php";
connect();

$bases = array();
$tops = array();
$frosts = array();
$shipping = 0;

$sql = "SELECT * FROM Cupcakes2 WHERE name='base'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $bases[] =$row;
    }
}
$sql = "SELECT * FROM Cupcakes2 WHERE name='top'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $tops[] =$row;
    }
}
$sql = "SELECT * FROM Cupcakes2 WHERE name='frost'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $frosts[] =$row;
    }
}
$sql = "SELECT * FROM Cupcakes2 WHERE name='shipping'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $shipping =$row['price'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <title></title>
    
    <link rel="stylesheet" href="normalize.css">   
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="title text-center">
            <h1>Welcome friend,</h1>
            <h2>To The Cupcake Land!</h2>
        </div>
        <!--         Make function for changing greeting every ~7 days, or according to weather in location (if location is shown). -->
<!--         Further plan for page:
        Tutorial that shows how to order (only show first time, when opening page)
        Add more options (flavors etc.) and make roullete button, so that user could play and at the same time create original cupcake combination.
        Time from time make quest/enigmas. Pop up "can you create...?". If ures picks correct ingridients add 20% discount etc.
        Limited edition cupcakes (everybody loves limited edition).
        Mobile friendly table. -->
        <div class="row">
            <div class="col-md-6 col-xs-12 main">
                <div id="cupBase" class="cupBasePosition"><img class="position-absolute " src="/images/basevanilla.png"></div>
                <div id="cupTop"></div>
                <div id="cupFrost"></div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 base" id="base" onclick='ChangeImg(this.id)'>
                        <?php 
                        $i = 0;
                        foreach ($bases as $base) {
                            if ($i==0) {
                                echo "<div value='" .$base['price']. "' id='".$base['name'].$base['value']."'><img class='img-fluid' src='" . $base['image'] . "' alt='"  . $base['value'] . "'></div>" ;
                            }else{
                                echo "<div value='" .$base['price']. "' id='".$base['name'].$base['value']."' style='display:none;'><img class='img-fluid' src='" . $base['image'] . "' alt='"  . $base['value'] . "'></div>" ;
                            }
                            $i++;
                        }
                        ?>
                    </div>
                    <div class="col-md-6 top" id='top' onclick='ChangeImg(this.id)'>
                        <?php 
                        $i = 0;
                        foreach ($tops as $top) {
                            if ($i==0) {
                                echo "<div value='" .$top['price']. "' id='".$top['name'].$top['value']."'><img class='img-fluid' src='" . $top['image'] . "' alt='"  . $top['value'] . "'></div>" ;
                            }else{
                                echo "<div value='" .$top['price']. "' id='".$top['name'].$top['value']."' style='display:none;'><img class='img-fluid' src='" . $top['image'] . "' alt='"  . $top['value'] . "'></div>" ;
                            }
                            $i++;
                        }
                        ?>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 frost" id="frost" onclick='ChangeImg(this.id)'>                                 
                        <?php 
                        $i = 0;
                        foreach ($frosts as $frosting) {
                            if ($i==0) {
                                echo "<div value='" .$frosting['price']. "' id='".$frosting['name'].$frosting['value']."'><img class='img-fluid' src='" . $frosting['image'] . "' alt='" . $frosting['value'] . "'></div>" ;
                            }else{
                                echo "<div value='" .$frosting['price']. "' id='".$frosting['name'].$frosting['value']."' style='display:none;'><img class='img-fluid' src='" . $frosting['image'] . "' alt='" . $frosting['value'] . "'></div>" ;
                            }
                            $i++;
                        }
                        ?>
                    </div>
                    <div class="col-md-6 ">
                        <div class="row quantity">
                            <div class="quantity">
                                <p>QUANTITY: <input type="number" value="1" id="kiekis" name="quantity" min="1" max="100" data-width="100%"></p>
                            </div>
                        </div>
                        <div class="row shipping">
                            <input value="<?php echo $shipping?>" id="shipping" type="checkbox" checked data-toggle="toggle" data-on="DELIVERY" data-width="100%" data-off="PICK UP" onchange="GetPrice()">
                        </div>
                        <div class="row makeorder" >
                            <p>YOUR PRICE: <span id="price"></span> €</p>
                        </div>
                        <div class="row">
                            <a class="button placeorder" onclick="SubmitOrder();">ORDER</a>
                        </div>
                    </div>
                </div>           
            </div>
            <div id="feedback"></div>
        </br>
        <div class="btn btn-primary btn-xl rounded-pill">
            <a href="orders.php" >History for orders</a>
        </div>
    </div>

    <script type="text/javascript">
        function ChangeImg(div){
            var divArray = $('#'+div).children();
            for(var i=0; i<divArray.length; i++){
                if($('#'+divArray[i].id).is(':visible')){
                    if((i+1)<divArray.length){
                        $('#'+divArray[i].id).hide();
                        $('#'+divArray[i+1].id).show();
                        changedDivId = $('#'+divArray[i+1].id).attr('id');
                        if(changedDivId.indexOf('base')!==-1){
                            $('#cupBase').html('<img class="position-absolute" src="/images/'+changedDivId+'.png">');
                        }else if(changedDivId.indexOf('top')!==-1){
                            $('#cupTop').html('<img class="position-absolute" src="/images/'+changedDivId+'.png">');
                        }else if(changedDivId.indexOf('frost')!==-1){
                            $('#cupFrost').html('<img class="position-absolute" src="/images/'+changedDivId+'.png">');
                        }
                    }else{
                        $('#'+divArray[i].id).hide();
                        $('#'+divArray[0].id).show();
                        changedDivId = $('#'+divArray[0].id).attr('id');
                        if(changedDivId.indexOf('base')!==-1){
                            $('#cupBase').html('<img class="position-absolute" src="/images/'+changedDivId+'.png">');
                        }else if(changedDivId.indexOf('top')!==-1){
                            $('#cupTop').html('<img class="position-absolute" src="/images/'+changedDivId+'.png">');
                        }else if(changedDivId.indexOf('frost')!==-1){
                            $('#cupFrost').html('<img class="position-absolute" src="/images/'+changedDivId+'.png">');
                        }
                    }
                    break;
                }
            }
            GetPrice();
        }

        function GetPrice() {
            basePrice = $('#base').find('div:visible')[0].getAttribute('value');
            topPrice = $('#top').find('div:visible')[0].getAttribute('value');
            frostPrice = $('#frost').find('div:visible')[0].getAttribute('value');
            shippingPrice = $('#shipping').val();
            kiekis = $('#kiekis').val();

            pickUp = $('#shipping').parent().hasClass('off');
            if(pickUp){
                shippingPrice = 0;
            }
            totalPrice = ((parseFloat(basePrice)+parseFloat(topPrice)+parseFloat(frostPrice)) * (kiekis)) +parseFloat(shippingPrice);
            $('#price').text(totalPrice);
            return totalPrice;
        }

        $(document).ready(function(){
            GetPrice();
        });

        function SubmitOrder(){
            base = $('#base').find('div:visible')[0].id.replace("base","");
            frost = $('#frost').find('div:visible')[0].id.replace("frost","");
            topping = $('#top').find('div:visible')[0].id.replace("top","");
            qty = $('#kiekis').val();
            $.ajax({
                type: 'POST',
                url: 'submitorder.php',
                data: {
                    base: base,
                    frost: frost,
                    top: topping,
                    qty: qty,
                    price: GetPrice()
                },
                success: function(response){
                    $('#feedback').html(response);
                }
            });
        }
    </script>
    <?php 
    $conn->close();
    ?>
</body>
</html>
