<?php

namespace CodeWave\DatabaseDumperCommandBundle\CommandBuilder;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Console\Exception\RuntimeException;

class DumpCommandBuilderProvider
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getCommandBuilder($connectionPlatformName)
    {

        $dumperService = "cdwv.database_dumper.dumper_command_builder.$connectionPlatformName";

        if (!$this->container->has($dumperService)) {
            throw new RuntimeException("Platform: '" . $connectionPlatformName . "' is not supported");
        }

        $commandBuilder = $this->container->get($dumperService);

        return $commandBuilder;
    }
}