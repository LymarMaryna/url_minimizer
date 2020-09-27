## Минификатор URL

Пользователю предоставляется поле для ввода URL, по нажатию кнопки “Minify” пользователю предоставляется короткая ссылка с текущим доменом сайта . При переходе по уменьшеной ссылке пользователь будет перенаправлен на исходную страницу.

Пользователь может создавать ссылки с ограниченным сроком жизни.

Пользователь может смотреть количество переходов по данной короткой ссылке.

На один и тот же url можно создавать неограниченное количество коротких ссылок. 

### Установка

```bash
git clone https://github.com/LymarMaryna/url_minimizer.git
cd url_minimizer
composer install
php migrate.php run
```

Создайте файл .env  с настойками конфигурации базы данных и выполните:

```bash
php migrate.php run
```



