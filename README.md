## Минификатор URL

Пользователю предоставляется поле для ввода URL, по нажатию кнопки “Minify” пользователю предоставляется короткая ссылка с текущим доменом сайта . При переходе по уменьшеной ссылке пользователь будет перенаправлен на исходную страницу.

Пользователь может создавать ссылки с ограниченным сроком жизни.

Пользователь может смотреть количество переходов по данной короткой ссылке.

На один и тот же url можно создавать неограниченное количество коротких ссылок. 

### Установка

```bash
git clone https://github.com/BinaryStudioAcademy/bsa-2019-php-5.git
cd url_minify
composer install
php migrate.php run
```

Создайте файл .env  с настойками конфигурации базы данных и выполните:

```bash
php migrate.php run
```



