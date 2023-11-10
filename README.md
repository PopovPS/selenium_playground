## Подготовка dev контейнера

```
sudo apt install libzip-dev
sudo -E docker-php-ext-configure zip --with-libzip
sudo -E docker-php-ext-install zip
```

### ссылка откуда скачивать хромдрайвер

https://googlechromelabs.github.io/chrome-for-testing/

*Версия драйвера должна соотвествовать версии браузера установленного в системе*

сам драйвер запускается командой 

```
 .\chromedriver.exe --port=4444  --whitelisted-ips
```

ключ *--whitelisted-ips* нужен чтобы он слушал на всех адресах а не только 127.0.0.1
