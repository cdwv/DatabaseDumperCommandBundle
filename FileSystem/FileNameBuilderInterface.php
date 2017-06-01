<?php

namespace CodeWave\DatabaseDumperCommandBundle\FileSystem;

interface FileNameBuilderInterface
{
    public function buildName($databaseName);
}