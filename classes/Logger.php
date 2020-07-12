<?php

class Logger {
    private $filePath = 'logs.txt';

    public function getFilePath(){
        return $this->filePath;
    }

    public function createLog($message){
        file_put_contents($this->getFilePath(), $message);
    }
}