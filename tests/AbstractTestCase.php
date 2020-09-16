<?php
namespace Jtl\Connector\Tests;

use Jtl\Connector\Core\Config\FileConfig;
use Jtl\UnitTest\TestCase;
use PDO;

abstract class AbstractTestCase extends TestCase
{
    public $pdo;
    public $config;
    
    public function initPdoInstance()
    {
        $this->config = new FileConfig(sprintf('%s/config/config.json', dirname(__DIR__)));
        $this->pdo = new PDO(
            sprintf("mysql:host=%s;dbname=%s", $this->config->get('db.host'), "example_connector_db"),
            $this->config->get('db.username'),
            $this->config->get('db.password')
        );
    }
    
    public function setUp() : void
    {
        $this->initPdoInstance();
        parent::setUp();
    }
}