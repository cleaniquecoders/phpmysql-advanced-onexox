<?php

class Upload
{
    private $target_dir = 'target/uploads/';
    private $target_file;
    private $file;
    private $formats = '*';
    private $sizeLimit = 500000; //500KB
    private $errors = [];

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
            $this->errors[] = 'File already exist';
            // echo 'file already exist';
            // exit();
        }
        return $this;
    }

    private function checkFormat()
    {
        $fileType = pathinfo($this->target_file, PATHINFO_EXTENSION);

        if ($this->formats != '*'
            && is_array($this->formats)
            && !in_array($fileType, $this->formats)) {
            //echo "Sorry, only " . implode(', ', $this->formats) . " files are allowed.";
            //exit();
            $this->errors[] = "Sorry, only " . implode(', ', $this->formats) . " files are allowed.";
        }
        return $this;
    }

    private function checkFileSize()
    {
        // Check file size
        if ($this->file["size"] > $this->sizeLimit) {
            // echo "Sorry, your file is too large.";
            // exit();
            $this->errors[] = "Sorry, your file is too large.";
        }
        return $this;
    }

    private function move()
    {
        if ($this->isError()) {
            move_uploaded_file($this->file["tmp_name"], $this->target_file);
        }
    }

    public function setFormat($list = [])
    {
        if (!empty($list)) {
            $this->formats = $list;
        }
        return $this;
    }

    public function setSizeLimit($value)
    {
        $this->sizeLimit = $value;
        return $this;
    }

    public function isError()
    {
        return empty($this->errors) ? false : true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setTargetDirectory($path)
    {
        $this->target_dir = $path;
        return $this;
    }
}
