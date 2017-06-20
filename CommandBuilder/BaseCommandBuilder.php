<?php

namespace CodeWave\DatabaseDumperCommandBundle\CommandBuilder;

use CodeWave\DatabaseDumperCommandBundle\FileSystem\FileNameBuilderInterface;

class BaseCommandBuilder
{
    protected $fileNameBuilder;

    public function __construct(FileNameBuilderInterface $fileNameBuilder)
    {
        $this->fileNameBuilder = $fileNameBuilder;
    }
}