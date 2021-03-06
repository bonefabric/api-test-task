## Деплой

1. Склонировать репозиторий
```shell
git clone https://github.com/bonefabric/api-test-task.git
```

2. Перейти в директорию проекта и скопировать .env.example в .env, куда вписать по мере надобности
   переменные окружения. Либо скопировать командой
```shell
cd api-test-task
```
```shell
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

3. Установить зависимости

```shell
composer install
```

4. Поднять контейнеры:
```shell
docker-compose up -d
```
5. Запустить миграции
```shell
docker-compose exec app php artisan migrate
```
6. Запустить воркер
```shell
docker-compose exec app php artisan queue:work
```

## Регистрация:

    POST /api/v1/register
Требуемые поля:

    email - Email
    password - Пароль
    password_confirmation - Подтверждение пароля

В случае удачи вернет строку с email

## Аутентификация

    POST /api/v1/authenticate
Требуемые поля:

    email - Email
    password - Пароль
В случае удачи вернет объект с ключом token, содержащим Bearer токен

## Смена настроек
(Необходима авторизация Bearer - токеном)

    PUT /api/v1/change-settings
Требуемые поля:

    language - язык, два символа (не обязательное)
    timezone - временная зона, от -12 до 12 (UTC) (не обязательное)

<hr>

### Тестирование

```shell
docker-compose exec app php artisan test
```
