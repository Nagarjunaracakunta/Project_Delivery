<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>WRITESOFT</title>
	<link rel="stylesheet" type="text/css" href="css/index.css"> 
</head>
<body >
						<div class="col-lg-4 col-xs-offset-4" style="margin-top:100px;">
					          <div class="panel" >
					            <div class="panel-heading">
					              <h4 class="text">ADD PROJECT </h4>
					            </div>
					            <div class="panel-body">
					              <form method="POST" action="business-logic.php"><!--form to fill the details of projects-->
					                			<div class="form-group"><p class="text">Enter Topic:</p><input type="" name="name"></div>
												<div class="form-group"><p class="text">Enter Number of Words:</p><input type="textbox" name="words"></div>
												<div class="form-group"><p class="text">Additional Information:</p><input type="textbox" name="extra"></div>
					                			<button type="submit" class="btn btn-primary">Submit</button>
					              </form>
					            </div>
							</div>
						</div>
</body>
</html>