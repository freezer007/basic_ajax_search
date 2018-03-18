<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Language" content="en-us">
    <title>PHP MySQL Typeahead Autocomplete</title>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style type="text/css">
	ul{
		background-color: #eee;
		cursor: pointer;
	}
	li{
		padding: 12px;
	}
</style>
</head>

<body>
    <div class="container" style="width: 500px">
            <h1>Try it yourself</h1>
            <input type="text" name="blog" id="blog" class="form-control" placeholder="Enter text">
            <div id="bloglist" name="bloglist"></div>
            </br>
            <p id="abcd"></p>
    </div>
        <script>
    document.getElementById('abcd').innerHTML = "hello2";
        $(document).ready(function() {
            $('#blog').keyup(function(){
            	var query = $(this).val();
            	if(query != '')
            	{document.getElementById('abcd').innerHTML = "hello";
            		$.ajax({
            			url:"try2.php",
            			method:"GET",
            			data:{query:query},
            			success:function(data)
            			{
            				$('#bloglist').fadeIn();
            				$('#bloglist').html(data);
            			}
            		});
            	}
            });
             $(document).on('click','li',function(){
        	$('#blog').val($(this).text());
        	$('#bloglist').fadeOut();
        	});
        });
    </script>
</body>

</html>