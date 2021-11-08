<?php

namespace Logger\writers;

use Logger\WriterInterface;

/**
 * Class FileWriter
 * @package Logger\writers
 */
class FileWriter implements WriterInterface
{

    /**
     * @var string Path to File
     */
    public $filePath;

    /**
     * @var string Path to File
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
        if (!file_exists($this->filePath)) {
            touch($this->filePath);
        }
    }

    /**
     * @param array $data
     */
    public function write(array $data)
    {
        file_put_contents($this->filePath, $data['formated_line'], FILE_APPEND);
    }

}