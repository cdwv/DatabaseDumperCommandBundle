<?php

namespace CodeWave\DatabaseDumperCommandBundle\CommandBuilder;

use CodeWave\DatabaseDumperCommandBundle\FileSystem\FileNameBuilderInterface;

class BaseCommandBuilder
{
    /** @var FileNameBuilderInterface */
    protected $fileNameBuilder;

    public function __construct(FileNameBuilderInterface $fileNameBuilder)
    {
        $this->fileNameBuilder = $fileNameBuilder;
    }

    protected function createFullPath($path, $databaseName)
    {
        if (!$path) {
            $path = '.';
        }

        $fileName = $this->fileNameBuilder->buildName(
            $databaseName
        );

        return  $path . '/' . $fileName;
    }
}