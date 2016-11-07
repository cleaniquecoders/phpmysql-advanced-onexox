<?php
function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    exit();
}
require 'Request.php';
$request = new Request();

class Upload
{
    private $target_dir = 'uploads/';
    private $target_file;
    private $file;
    private $formats = '*';
    private $sizeLimit = 500000;

    public function handle($file)
    {
        $this->file = $file;
        $this->target_file = $this->target_dir . basename($this->file["name"]);

        // check file existence, check file format, file size and move the file
        // if no errors
        $this->checkFileExist()
            ->checkFormat()
            ->checkFileSize()
            ->move();
    }

    private function checkFileExist()
    {
        if (file_exists($this->target_file)) {
            echo 'file already exist';
            exit();
        }
        return $this;
    }

    private function checkFormat()
    {
        $fileType = pathinfo($this->target_file, PATHINFO_EXTENSION);

        if ($this->formats != '*'
            && is_array($this->formats)
            && !in_array($fileType, $this->formats)) {
            echo "Sorry, only " . implode(', ', $this->formats) . " files are allowed.";
            exit();
        }
        return $this;
    }

    private function checkFileSize()
    {
        // Check file size
        if ($this->file["size"] > $this->sizeLimit) {
            echo "Sorry, your file is too large.";
            exit();
        }
        return $this;
    }

    private function move()
    {
        move_uploaded_file($this->file["tmp_name"], $this->target_file);
    }

    public function setFormat($list = [])
    {
        if (!empty($list)) {
            $this->formats = $list;
        }
    }

    public function setSizeLimit($value)
    {
        $this->sizeLimit = $value;
    }

}

if ($request->isPost()) {
    $upload = new Upload();
    $upload->setSizeLimit(100000000);
    $upload->setFormat(['pdf', 'docx', 'xls']);
    $file = $_FILES['fileToUpload'];
    $upload->handle($file);
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
          <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
          <input class="btn btn-success" type="submit" value="Upload Image" name="submit">
      </form>
    </div>
  </body>
</html>
