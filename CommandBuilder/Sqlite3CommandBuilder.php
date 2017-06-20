<?php

namespace CodeWave\DatabaseDumperCommandBundle\CommandBuilder;

use Doctrine\DBAL\Connection;

class Sqlite3CommandBuilder extends BaseCommandBuilder implements DumpCommandBuilderInterface
{
    public function buildCommand(Connection $connection, $path)
    {
        if (!$connection->getDatabase()) {
            throw new \RuntimeException('No database!');
        }

        if (!$path) {
            $path = '.';
        }

        $databasePath = $connection->getDatabase();
        $databaseName = $this->getDatabaseName($databasePath);

        $fileName = $this->fileNameBuilder->buildName($databaseName);

        $fullPath = $path . $fileName;

        $command = 'sqlite3 ';

        $command = $command . $connection->getParams()['path'];

        $command = $command . ' .dump  >> ' . $fullPath;

        return $command;
    }

    private function getDatabaseName($databasePath)
    {
        $databasePathChunks = explode('/', $databasePath);
        $databaseName = $databasePathChunks[count($databasePathChunks) - 1];

        return str_replace('.', '_', $databaseName);
    }
}