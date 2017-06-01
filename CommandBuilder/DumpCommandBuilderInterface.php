<?php

namespace CodeWave\DatabaseDumperCommandBundle\CommandBuilder;

use Doctrine\DBAL\Connection;

interface DumpCommandBuilderInterface
{
    public function buildCommand(Connection $connection, $path);
}