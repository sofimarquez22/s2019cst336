<?php
?>

<html>
<head>
    <title>Shopping Cart</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>
    <h1>Discount Shopping!</h1>
    <table>
    <tr>
        <th>Product</th>
        <th>Unit <br> Price</th>
        <th> Quantity </th>
        <th>Total</th>
    </tr>
    <tr>
        <td id = "productName">Microfiber Beach Towel</td>
        <td id = "price">$30</td>
        <td><input class = "quant" id = "towelQuant" type="text" size="5"></td>
        <td id = "towelTotal"></td>
    </tr>
    <tr>
        <td>Discount</td>
        <td ></td>
        <td id="discount"></td>
        <td id = "savings"></td>
    </tr>    
        
    <tr>
        <td>Subtotal</td>
        <td></td>
        <td></td>
        <td id="subtotal"></td>
    </tr>             
        
    <tr>
        <td>Tax (7%)</td>
        <td></td>
        <td></td>
        <td id="tax"></td>
    </tr>
    
    <tr>
        <td>Total</td>
        <td></td>
        <td></td>
        <td id="total"></td>
    </tr>
       
    </table>
    <br> 
    
    <h3>Enter a code: <input class = "promo" id = "promoText" type="text"></h3>
    <div class = "results" id = "res">Incorrect Promo Code</div>
    
    <script>
    $(".results").hide();
    var total = 0;
    var price = 0;
    var discount = 1;
    $.ajax({
        type: "get",
        url:  "/CST336/Practice/p6/api/getAll.php",
        //dataType: "json",
        data: {},
        success: function(data){
            console.log(data);
            $("#productName").html(data["product"]);
            $("#price").html(data["price"]);
            price = data["price"];
            $("#towelQuant").val(data["quantity"]);
            total = parseInt($("#towelQuant").val()*price)*discount;
            $("#towelTotal").html("$ " + parseInt($("#towelQuant").val())*price);
            $("#subtotal").html("$ " + total);
            $("#tax").html("$ " + parseFloat(total*.07));
            $("#total").html("$ " + parseFloat(total+(total*.07)));
        },
        complete: function(data, status){
            
        }
    });
    $("#towelQuant").change(function(){
        //console.log("here");
        total = parseInt($("#towelQuant").val()*price);
        if(discount!=1){
            $("#discount").html(""+discount*100+"%");
            $("#savings").html("-" + total*discount);
        }
        total*=discount;
        $("#towelTotal").html("$ " + parseInt($("#towelQuant").val())*price);
        $("#subtotal").html("$ " + total);
        $("#tax").html("$ " + parseFloat(total*.1));
        $("#total").html("$ " + parseFloat(total+(total*.1)));
        
    })
    </script>
</body>