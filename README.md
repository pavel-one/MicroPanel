<p align="center">
  <img src="public/template/logo.png?raw=true" alt="Sublime's custom image"/>
</p>

## TODO
- [x] Сделать нормальную документацию
- [ ] Авторизация
- [ ] Генерация токена для шины *(sha+salt)*
- [ ] Листинг и управления пользователями для sudo - админа
- [ ] Нормальное разграничение прав

## О проекте
Описание

## Требования
- php 7.2
- Mysql 5.7

## Установка

1. `git clone https://github.com/pavel-one/MicroPanel.git`
1. `composer install`
1. `cp .env.example .env`
1. `php artisan key:generate`
1. В .env меняем то что нужно поменять, следуем комментариям
1. `php artisan migrate --seed`
1. `php artisan ide-helper:generate`
1. `php artisan ide-helper:generate`
1. `php artisan ide-helper:meta`
1. `npm install`
1. `npm run dev`

## IDE Helper-commands

Это специальное дополнение, дабы помочь IDE понимать абстракции и фасады laravel

- `php artisan ide-helper:models -W` - Добавить автоматическую генерацию phpDoc для моделей
- `php artisan ide-helper:generate` - Генерация ide_helper файла
- `composer run-script post-update-cmd` - Обновить все

## Правила мерджа

- Каждый человек работает в отдельной ветке которая отталкивается от мастера
- Название ветки должно быть максимально понятной и обозначать тот фронт работ, что вы взяли
- Мерджить в мастер категорически запрещено
- Каждый коммит относящийся к issue должен начинаться с id issue `#24 CommitName`
- Если мы создаем новую модель, мы обязательно делаем к ней сидеров

## Делаем наш первый PR

1. Разворачиваем проект
1. Создаем новую ветку и переключаемся в нее
1. Делаем изменения в проекте, коммитим и пушим
1. Переходим в [PR](https://github.com/pavel-one/MicroPanel/pulls)
1. Жмем `New pull request`
1. `Base: master -> Compare: YourBranchName`
1. Разрешаем конфликты и жмем `Create pull request`
1. Подробно описываем что сделали и какие дополнительные действия нужно произвести *Если нужно*
1. Reviewers и Assignees указываем Pavel Zarubin
1. Даже после PR можно дополнять коммитами его, но ДО его принятия ревьювером

#### Начинаем новую задачу
1. `git fetch` - скачиваем ветки и изменения
1. Переключаемся на мастер
1. `git pull` - обновляем его
1. Создаем новую ветку
1. `composer install`
1. `php artisan migrate:refresh --seed` - полностью перестраеваем бд с сидорами

## Правила кода

- Если добавили новую artisan - команду, обновляем list `php artisan list > docs/artisan.list`
- Если добавили новые роуты, перед пушем обновляем роуты `php artisan route:list > docs/route.list`
- Бизнес - логику храним в сервисах
- Для логирования используем разные каналы, например если вы разрабатываете модуль оплаты, то канал для его логирования должен называться payment а логи кластся в отдельную папку
- Модели должны быть рассортированы по папкам
- Не забываем правильно указывать индексы в БД
- Модели создаем с миграциями, не по отдельности, это позволит избежать проблем `php artisan make:model ComponentName/ModelName -m`
- Модели всегда называются в единственном числе
- Если нам нужно изменить существующую таблицу, мы не меняем миграцию, а создаем отдельную
- Соблюдаем правильное именование сетеров и гетеров
- В именовании сервисов, моделей, переменных используем CamelCase а не SnakeCase
- Для контроллеров ресурсов обязательно ставим флаг resource `php artisan make:controller ModelNameController --resource`
- Если добавляется новый конфиг, добавляем его и в .env.example

## Другое

Конфиг nginx
```
server {
    listen 80;
    listen [::]:80;
    server_name    micropanel.local;
    root  /home/pavel/Works/micropanel/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}



```
