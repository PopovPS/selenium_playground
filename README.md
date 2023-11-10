## Работа с **Selenium** в PHP (Небольшая песочница)

Суть работы с Selenium.

Сам селениум по факту состоит из двух частей.

1. Драйвер для управления браузером
2. Библиотека для взаимодействия с драйвером

**Драйвер** запускается на том же хосте где должен открываться браузер

Команда для запуска драйвера:

```
 .\chromedriver.exe --port=4444  --whitelisted-ips
```

ключ *--whitelisted-ips* нужен чтобы он слушал на всех адресах а не только 127.0.0.1


---
Скачиваем драйвер для Google Chrome по ссылке:

https://googlechromelabs.github.io/chrome-for-testing/

*Версия драйвера должна соотвествовать версии браузера установленного в системе*

---

из PHP для взаимодействия с драйвером используется библиотека **php-webdriver/webdriver**

Ссылка на github: https://github.com/php-webdriver/php-webdriver

Собственно документацию по установке и использованию смотреть там же.

## Очень кратко как с этим работать

```php
    $serverUrl = 'http://10.10.20.26:4444'; // Адрес где запущен webdriver
    $driver = RemoteWebDriver::create($serverUrl, DesiredCapabilities::chrome()); // Подключаемся
    $driver->get('http://127.0.0.1:8090'); // Открываем нужную нам ссылку
```

после этого webdriver запускает браузер и позволяет делать с ним всякое

НАПРИМЕР:
```php

    $title = self::$driver->getTitle(); // Смотрим что задано в тэге Title

    // Или вытаскиваем содержимое первого встреченного тега H1
    $h1 = $driver->findElement(WebDriverBy::tagName('h1'));
    $h1_text = $h1->getText();

```

ну и т.д.

## Подготовка dev контейнера

```
sudo apt install libzip-dev
sudo -E docker-php-ext-configure zip --with-libzip
sudo -E docker-php-ext-install zip
```
