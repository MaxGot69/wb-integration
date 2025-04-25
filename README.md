# WB Integration Test (Mock Version)

Тестовое задание для компании Polaris. Выполнено с использованием мок-данных, эмулирующих ответы API Wildberries.

## 🔧 Стек:
- PHP 8.x
- ООП (классы, неймспейсы)
- Простая файловая структура без фреймворков

## 📁 Структура проекта:

- `src/Api/` — бизнес-логика
- `src/Mocks/` — эмуляция ответов API WB
- `tests/` — скрипты запуска по каждому пункту

## 🚀 Запуск:

Примеры:

```bash
php tests/test_get_warehouses.php
php tests/test_create_cards.php
php tests/test_send_stocks.php
php tests/test_handle_orders.php
