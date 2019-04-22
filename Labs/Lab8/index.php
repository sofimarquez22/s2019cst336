<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Lab 8</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            /*global $*/
            $("#submit").click(function(){
                $(document).ready(function(){
                    $.ajax({
                        type: "GET",
                        url: "https://pixabay.com/api/",
                        dataType: "json",
                        data:{
                            key: "12231153-f5901ccfe14459c77f3c95dc2",
                            q: "",
                        },
                        success: function(data, status){
                            
                        });
                    }
                });
            });
            
        </script>
    </head>
    <body>
        
    </body>
</html>