<?php
require 'price.php';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <title></title>
    <link rel="stylesheet" href="style.css">
</head>

</head>
<body>

    <h2>Base</h2>
    <select id="base" class="cost-block">
        <option value="vanilla">vanilla</option>
        <option value="chocolate">chocolate</option>
        <option value="red_velvet">red velvet</option>
        <option value="gluten_free">gluten free</option>
    </select>

    <h2>Frosting</h2>
    <select id="frosting" class="cost-block">
        <option value="none" selected>none</option>  
        <option value="vanilla_buttercream">vanilla buttercream</option>   
        <option value="vanilla_buttercream">vanilla buttercream</option>
        <option value="chocolate_buttercream">chocolate buttercream</option>
        <option value="caramel">caramel</option>
        <option value="vegan_friendly">vegan friendly</option>
    
    </select>

    <h2>Toppings</h2>
    <select id="topping" class="cost-block">
        <option value="none" selected>none</option> 
        <option value="fresh_fruit">fresh fruit</option>
        <option value="sugar_cages">sugar cages</option>
        <option value="caramel_popcorn">caramel popcorn</option>
        <option value="coconut">coconut</option>
        <option value="marshmellow">marshmellow</option>
        <option value="sprincles">sprincles</option>
    </select>

    <h2>Quantity</h2>
    <select id="quantity" class="cost-block">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="12">12</option>
        <option value="18">18</option>
        <option value="24">24</option>
    </select>

    <h2>Delivery</h2>
    <select id="delivery" class="cost-block">
        <option value="delivery">delivery</option>
        <option value="pick_up">pick up</option>
    </select>


    <button id="click">BUY</button>
    <h2>Price</h2>
    <div id="price" class="cost-block">
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            var initBasePrice ="<?php Print($base); ?>";
            var initFrostingPrice ="<?php Print($frosting); ?>";
            var initToppingPrice ="<?php Print($topping); ?>";
            var initDeliveryPrice ="<?php Print($delivery); ?>";
            

        document.getElementById("click").addEventListener("click", function(){
           var x=[];
           var select = document.querySelectorAll('select');

           select.forEach(function(el,i){

              x[el.id] = el.value; 
          })

           console.log(x);

       });
        $('.cost-block').on('change', function(){
            CalcPrice();
        })
        function CalcPrice(){
            if($('#frosting').val() == "none") {
                forstingPrice = 0;
            }else{
                forstingPrice = initFrostingPrice;
            }
            if($('#topping').val() == "none") {
                toppingPrice = 0;
            }else{
                toppingPrice = initToppingPrice;
            }
            if($('#delivery').val() == "pick_up") {
                deliveryPrice = 0;
            }else{
                deliveryPrice = initDeliveryPrice;
            }

            var totalPrice = (parseFloat(initBasePrice) + parseFloat(forstingPrice) + parseFloat(toppingPrice))*($('#quantity').val()) + parseFloat(deliveryPrice);
            $('#price').text(totalPrice);
            console.log('test:');
            console.log(initBasePrice);
            console.log(forstingPrice);
            console.log(toppingPrice);
            console.log(deliveryPrice);
        }

        CalcPrice();
});
    </script>



</body>
</html>


<br>
