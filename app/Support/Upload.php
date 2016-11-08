<?php

class Upload
{
    use ErrorHandler;

    private $target_dir = 'target/uploads/';
    private $target_file;
    private $file;
    private $formats = '*';
    private $sizeLimit = 500000; //500KB

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
            $this->setError('File already exist');
        }
        return $this;
    }

    private function checkFormat()
    {
        $fileType = pathinfo($this->target_file, PATHINFO_EXTENSION);

        if ($this->formats != '*'
            && is_array($this->formats)
            && !in_array($fileType, $this->formats)) {
            $this->setError("Sorry, only " . implode(', ', $this->formats) . " files are allowed.");
        }
        return $this;
    }

    private function checkFileSize()
    {
        // Check file size
        if ($this->file["size"] > $this->sizeLimit) {
            $this->setError("Sorry, your file is too large.");
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

    public function setTargetDirectory($path)
    {
        $this->target_dir = $path;
        return $this;
    }
}
