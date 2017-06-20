<?php

namespace CodeWave\DatabaseDumperCommandBundle\Tests\Integration;

use CodeWave\DatabaseDumperCommandBundle\Command\DatabaseDumperCommand;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Client;

class SetupIntegrationEnv extends  WebTestCase
{
    /** @var ContainerInterface */
    protected $container;
    /** @var Client */
    protected $client;
    /** @var  CommandTester */
    protected $commandTester;
    /** @var  Command */
    protected $command;
    /** @var  string */
    protected $fileName;

    protected $env = '';

    public function testCommand()
    {
        $this->commandTester->execute(['command' => $this->command->getName()]);
        $this->fileName = $this->commandTester->getDisplay();
        $this->fileName = trim(str_replace(PHP_EOL, "", $this->fileName));
        $this->assertFileExists($this->fileName);
    }

    /** {@inheritdoc} */
    public static function getKernelClass()
    {
        include_once __DIR__.'/app/TestKernel.php';
        return 'CodeWave\DatabaseDumperCommandBundle\Tests\Integration\app\TestKernel';
    }

    /** {@inheritdoc} */
    public function setUp()
    {
        $this->client = $this->createClient(['environment' => $this->env]);
        $this->container = $this->client->getContainer();
        $application = new Application();
        $mysqlDumperCommand = new DatabaseDumperCommand();
        $mysqlDumperCommand->setContainer($this->container);
        $application->add($mysqlDumperCommand);

        $this->command = $application->find('cdwv:database:dump');
        $this->commandTester = new CommandTester($this->command);
    }

    /** {@inheritdoc} */
    public function tearDown()
    {
        $this->client = null;
        $this->container = null;
        unlink($this->fileName);
    }
}