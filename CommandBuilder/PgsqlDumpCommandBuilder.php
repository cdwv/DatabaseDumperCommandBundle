<?php

namespace CodeWave\DatabaseDumperCommandBundle\CommandBuilder;

use Doctrine\DBAL\Connection;

class PgsqlDumpCommandBuilder extends BaseCommandBuilder implements DumpCommandBuilderInterface
{
    public function buildCommand(Connection $connection, $path)
    {
        $fullPath = $fullPath = $this->createFullPath($path, $connection->getDatabase());

        $command = 'pg_dump';

        if ($connection->getUsername()) {
            $command .= ' -U ' . $connection->getUsername();
        }

        if ($connection->getPort()) {
            $command .= ' -p=' . $connection->getPort();
        }


        if ($connection->getHost()) {
            $command .= ' -h ' . $connection->getHost();
        }

        $command .= ' -d ' . $connection->getDatabase();

        $command .= ' -v ';

        if ($connection->getPassword()) {
            $command = 'PGPASSWORD="' . $connection->getPassword() . '" ' . $command;
        }

        $command .= ' | bzip2 >> ' . $fullPath . '.bz2';

        return $command;
    }
}
