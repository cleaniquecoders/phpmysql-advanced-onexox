<?php

require_once 'index.php';
require_once 'app/Support/Upload.php';

$upload = new Upload();

if (Request::isPost()) {
    $upload->setSizeLimit(100000000)
        ->setFormat(['pdf', 'docx', 'xls'])
        ->handle($_FILES['fileToUpload']);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <h1>Upload Class</h1>
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
          Select image to upload:
          <input class="form-control <?php echo (!empty($upload->isError())) ? 'danger' : ''; ?>" type="file" name="fileToUpload" id="fileToUpload">
          <input class="btn btn-success" type="submit" value="Upload Image" name="submit">
          <?php if (!empty($upload->isError())): ?>
            <hr>
            <div class="alert alert-danger">
              <ul>
                <?php foreach ($upload->getErrors() as $key => $value): ?>
                  <li><?php echo $value; ?></li>
                <?php endforeach;?>
              </ul>
            </div>
          <?php endif;?>
      </form>
    </div>
  </body>
</html>
