# WB Integration Test — MaxGot69

Тестовое задание для Polaris: интеграция с Wildberries API.

---

## Реализовано:

- Авторизация через токен
- Создание карточек товаров
- Получение складов
- Передача остатков
- Приём заказов через webhook
- Получение информации о заказах

---

## Стек:

- PHP 8.1+
- ООП (классы, неймспейсы)
- Работа с API через `curl`

---

## Запуск проекта:

1. Склонировать репозиторий
2. Создать `config.php`:



```php
<?php
return ['wb_token' => 'ваш_токен'];
