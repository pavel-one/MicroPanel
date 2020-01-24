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
1. `php artisan `

## Правила мерджа

- Каждый человек работает в отдельной ветке которая отталкивается от мастера
- Название ветки должно быть максимально понятной и обозначать тот фронт работ, что вы взяли
- Мерджить в мастер категорически запрещено
- Если ветка относится к issue ее название начинается вот так: `#24 BranchName`, где #24 - это id issue
- Каждый коммит относящийся к issue должен начинаться с id issue `#24 CommitName`
- Если мы создаем новую модель, мы обязательно делаем к ней сидеров

## Делаем наш первый PR

..Test..

1. Разворачиваем проект
1. Создаем новую ветку и переключаемся в нее
1. Делаем изменения в проекте, коммитим и пушим
1. Переходим //TODO: Сделать

#### Начинаем новую задачу
1. `git fetch` - скачиваем ветки и изменения
1. `git pull` - обновляем их
1. Переключаемся на мастер
1. Создаем новую ветку
1. `composer install`
1. `php artisan migrate:refresh --seed` - полностью перестраеваем бд с сидорами

## Правила кода

- Бизнес - логику храним в сервисах
- Для логирования используем разные каналы, например если вы разрабатываете модуль оплаты, то канал для его логирования должен называться payment а логи кластся в отдельную папку
- Модели должны быть рассортированы по папкам
- Не забываем правильно указывать индексы в БД

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
