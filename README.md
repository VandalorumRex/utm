# <u>Задание</u>

## Цель
Разработать мини-приложение на CakePHP 2, которое обрабатывает и визуали-зирует UTM-данные в виде древовидной структуры.

## Структура таблицы utm_data
Таблица utm_data должна содержать следующие поля:
>	source - Источник трафика. Обязательное поле.
>
>	medium - Канал трафика. Обязательное поле.
>
>	campaign - Название кампании. Обязательное поле.
>
>	content - Может быть NULL.
>
>	term - Может быть NULL.
## Функциональные требования
1.	На странице по адресу /statistics/utm/list должна быть представлена вло-женная структура данных:
    * a.	Список source
    * b.	Для каждого source — список medium
    * c.	Для каждого medium — список campaign
    * d.	Для каждого campaign — список content
    * e.	Для каждого content — список term
2.	Реализовать пагинацию - на одной странице должно отображаться не более 20 source

## Пример данных
|source|medium|campaign|content|term|
|------|------|--------|-------|----|
|google|cpc|summer|banner|video|
|google|cpc|winter|delta|NULL|

## Ожидаемый вывод на странице
>google
>
>....cpc
>
>........summer
>
>............banner
>
>................video
>
>........winter	
>
>............delta
>
>................NULL

# <u>Выполнение задания</u>
## Системное окружение
>Apache 2.4.62
>
>PHP 5.6.40
>
>MySQL 8.0.43
>
>Composer 2.2.0

## Консольные команды использованные для разворачивание среды
### _Composer_
composer update

### *Создание базы utm (для production)*
bin/create_db

### *Установка пакета миграций для CakePHP*
php composer.phar require cakephp/migrations "@stable"

### *Создание миграции для создания таблицы utm_data (используется robmorgan/phinx)*
vendor/robmorgan/phinx/bin/phinx create CreateUtmData

### *Проведение миграции (для production)*
vendor/robmorgan/phinx/bin/phinx migrate -e production

