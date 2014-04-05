<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A program that finds all possible paths for a knight to visit all tiles on a board">
    <meta name="author" content="Añonuevo, Bael, Veluz">

    <title>Knight's Tour</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style2.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="/">Home</a></li>
          <li><a href="#">About Knight's Tour</a></li>
          <li><a href="#">Developers</a></li>
        </ul>
        <h3 class="text-muted">Knight's Tour</h3>
      </div>

      <div class="jumbotron">
        <form action="solver.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="file" title="Choose Input File" data-filename-placement="inside" name="input" id="input">
          </div>
          <div class="form-group">
            <input type="submit" name="generate" value="Generate Tour" class="btn btn-primary" >
          </div>
        </form>

        <div id="stage">
          <p id="outputLabel"> Output: </p>
        </div>
      </div>

      

      <div class="footer text-center">
        <p>&copy; Gladdys Añonuevo, Claudine Bael, & Rizianne Veluz 2014</p>
      </div>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.file-input.js"></script>
    <script src="js/k-tour.js"></script>
    <script>$(document).ready(function(){$('input[type=file]').bootstrapFileInput();});</script>
  </body>
</html>
