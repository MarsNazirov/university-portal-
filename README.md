# Университет - Модуль «Приемная комиссия»

Модуль ERP‑системы для автоматизации процесса работы приёмной комиссии университета. Реализует полный цикл обработки заявлений абитуриентов с использованием современных архитектурных паттернов.

## Технологический стек

- **Backend:** PHP 8.2+, Laravel 11
- **Database:** MySQL
- **Cache & Queues:** Redis
- **Infrastructure:** Docker (Laravel Sail)
- **Testing:** Pest

## Ключевые архитектурные решения

1. **Service Layer**  
   Вся бизнес‑логика (обработка заявок, смена статусов) вынесена из контроллеров в сервисные классы. Код остаётся чистым и легко тестируемым.

2. **Асинхронность (Highload ready)**  
   Тяжёлые процессы вынесены в фоновые очереди на базе **Redis**:
   - Генерация PDF‑приказов о зачислении (`dompdf`)
   - Интеграция с **Telegram API** (Http Client) для мгновенного уведомления менеджеров о новых заявках

3. **Безопасность (RBAC)**  
   Разграничение прав доступа через Gates и Middleware: абитуриенты видят только свои заявки, менеджеры имеют полный доступ.

4. **Оптимизация БД**  
   Решена проблема N+1 запросов при помощи Eager Loading (`with()`). Добавлены транзакции (`DB::transaction`) для предотвращения гонки состояний (Race Condition).

5. **RESTful API**  
   Реализованы защищённые эндпоинты для мобильного приложения: аутентификация через **Laravel Sanctum**, форматирование ответов с помощью `API Resources`.

## Установка и запуск (Docker)

Проект настроен для запуска через Laravel Sail.

```bash
# 1. Клонирование репозитория
git clone https://github.com/MarsNazirov/university-portal-.git
cd university-portal-

# 2. Настройка окружения
cp .env.example .env

# 3. Запуск контейнеров (App, MySQL, Redis, Mailpit)
./vendor/bin/sail up -d

# 4. Установка зависимостей и миграции
./vendor/bin/sail composer install
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed

# 5. Запуск воркера очередей (Telegram/PDF)
./vendor/bin/sail artisan queue:work

# 6. Создание пользователя-менеджера (если не создан сидом)
./vendor/bin/sail artisan tinker
>>> \App\Models\User::factory()->create(['email' => 'admin@admin.com', 'password' => bcrypt('password'), 'role' => 'admin'])

# 7. Доступные адреса
# http://localhost          - главная страница (список факультетов)
# http://localhost/login    - вход для абитуриентов и менеджеров
# http://localhost/admin    - дашборд администратора (доступ только для менеджеров)

# 8. Запуск тестов
./vendor/bin/sail php artisan test
