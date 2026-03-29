# University Admissions Portal 🎓

Модуль ERP-системы университета для автоматизации процесса работы приемной комиссии. 
Проект реализует полный цикл обработки заявлений абитуриентов с использованием современных архитектурных паттернов.

## 🛠 Технологический стек

* **Backend:** PHP 8.2+, Laravel 11
* **Database:** MySQL
* **Cache & Queues:** Redis
* **Infrastructure:** Docker (Laravel Sail)
* **Testing:** Pest (Feature tests)

## 🚀 Ключевые архитектурные решения

1. **Service Layer & MVC:** Вся бизнес-логика (обработка заявок, смена статусов) вынесена из контроллеров в сервисные классы (`ApplicationService`).
2. **Асинхронность (Highload Ready):** Тяжелые процессы вынесены в фоновые очереди на базе **Redis**:
   * Генерация PDF-приказов о зачислении (`dompdf`).
   * Интеграция с **Telegram API** (Http Client) для мгновенного уведомления менеджеров о новых заявках.
3. **Безопасность (RBAC):** Разграничение прав доступа через Gates и Middleware.
4. **Оптимизация БД:** Решена проблема N+1 запросов при помощи Eager Loading (`with()`), добавлены транзакции (`DB::transaction`) для предотвращения состояния гонки (Race Condition).
5. **RESTful API:** Реализованы защищенные эндпоинты для мобильного приложения (аутентификация через **Laravel Sanctum**, использование `API Resources`).

## ⚙️ Установка и запуск (Docker)

Проект настроен для запуска через Laravel Sail.

```bash
# 1. Клонирование репозитория
git clone https://github.com/MarsNazirov/university-admissions.git
cd university-admissions

# 2. Настройка окружения
cp .env.example .env

# 3. Запуск контейнеров (App, MySQL, Redis, Mailpit)
./vendor/bin/sail up -d

# 4. Установка зависимостей и миграции
./vendor/bin/sail composer install
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed

# 5. Запуск воркера для обработки очередей (Telegram/PDF)
./vendor/bin/sail artisan queue:work
