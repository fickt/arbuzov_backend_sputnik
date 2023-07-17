# arbuzov_backend_sputnik
ER-diagram link: https://dbdiagram.io/d/64a54e1902bd1c4a5e89b178

Как запустить: 
В терминал вводим: 
1. docker-compose up -d --build
2. docker exec app php artisan migrate:fresh  --seed
3. docker exec app php artisan update
3. docker exec app php artisan key:generate
4. docker exec app php artisan jwt:secret
5. По идее должно работать :)

I.Эндпоинты:

1. Регистрация пользователя
POST http://127.0.0.1:8080/api/users

Ждёт на вход JSON: 
{
  "email":"",
  "password":"",
  "password_confirmation":""
}

Ответ JSON:
{
"data": {
        "id": ,
        "email": "",
        "role": "" (user/admin)
    }

}

2. Авторизация пользователя
POST http://127.0.0.1:8080/api/users/login

Ждёт на вход JSON: 
{
  "email":"",
  "password":"",
}

Ответ JSON:
{
    "access_token": "",
    "token_type": "bearer",
    "expires_in": 3600
}

II. Аккаунты

1. Зайти под юзера JSON {
  "email":"user1super@gmail.com",
  "password":"password",
}

2. Зайти под админа JSON {
  "email":"admin1super@gmail.com",
  "password":"password",
}



