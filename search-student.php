<html>
<head>
    <title> Get Your Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="scripts/jquery.js"></script>
</head>
<body>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Enter Your Roll No : </span>
            <input type="text" name="search" id="search" placeholder="Enter Your Roll Number" class="form-control">
        </div>
    </div>
    <div id="result"></div>

    <script>
        $(document).ready(function () {
            $('search').keyup(function () {
                var txt = $(this).value();
                if(txt != ''){
                    $.ajax({
                        url:"show-student-home.php",
                        method:"post",
                        data:{search:txt},
                        dataType:"text",
                        success:function(data){
                            $('#result').html(data);
                        }

                    });
                }
                else {
                    $('#result').html('');
                }
            });
        });
    </script>

<?php require 'footer.php'; ?>

