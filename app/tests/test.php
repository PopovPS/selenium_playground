<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED); // Запретить ругаться на деприкеты

require __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;


final class WebDriverTest extends TestCase
{
    private static RemoteWebDriver $driver;

    public static function setUpBeforeClass(): void
    {
        $serverUrl = 'http://10.10.20.26:4444';
        self::$driver = RemoteWebDriver::create($serverUrl, DesiredCapabilities::chrome());
        self::$driver->get('http://127.0.0.1:8090');
    }

    public static function tearDownAfterClass(): void
    {
        self::$driver->close();
    }

    public function test_title(): void
    {
        $title = self::$driver->getTitle();
        $this->assertEquals($title, 'PHP 8.2.12 - phpinfo()');
    }

    public function test_bad(): void
    {
        $h1 = self::$driver->findElement(WebDriverBy::tagName('h1'));
        $h1_text = $h1->getText();
        $this->assertEquals($h1_text, 'PHP Version 8.2.12');
    }
}