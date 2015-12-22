<h2 class="item1">Настройки скрипта</h2>

<h4>
    Скрипт поддерживает следующие опции для настройки
</h4>

<h3>
    Общие настройки
</h3>

<p>
    Общие настройки скрипта определяются в объекте options при инициализации.
</p>

<h4>username</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>templatemonster</dd>
</dl>

<p>
    Определяет аккаунт с которого будут загружаться твиты.
</p>

<h4>list</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>null</dd>
</dl>

<p>
    Определяет название списка с которого будут загружаться твиты. Для определения списка должен быть указан владелец в опции <strong>username</strong>.
</p>

<h4>hashtag</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение</dt>
    <dd>null</dd>
</dl>

<p>
   Опция для загрузки твитов с определенным хештегом
</p>

<h4>dateFormat</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>%b/%d/%Y</dd>
</dl>

<p>
    Формат вывод даты. Дата будет отображаться в данном формате, по истечении 2-х дней после добавления.
</p>

<h4>apiPath</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>bat/twitter_api/tweet.php</dd>
</dl>

<p>
    Путь к файлу tweet.php
</p>

<h4>loadingText</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>Loading...</dd>
</dl>

<p>
    Текст отображаемый до загрузки данных с сервиса.
</p>


<h4>localTemplate</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Object</dd>
</dl>

<p>
    Составной обьект для определения данных твита для локального тестирования. Состоит из 8-х вложенных опций:
</p>

<div class="inner">

<h5>message</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>

<p>
    Текст предупреждения, выводимый при локальном тестировании.
</p>

<h5>user_name</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>

<p>
    Имя пользователя, опубликовавший твит.
</p>

<h5>date</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>Fri Nov 06 11:20:43 +0000 2015</dd>
</dl>

<p>
    Дата добавления твита.
</p>

<h5>tweet</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<p>
    Текст твита.
</p>

<h5>avatar</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<p>
    Ссылка на аватар пользователя, опубликовавший твит.
</p>

<h5>url</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<p>
    Ссылка на твит.
</p>

<h5>screen_name</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<p>
    Логин пользователя, опубликовавший твит.
</p>

<h5>media_url</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Array</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>['https://pbs.twimg.com/media/CS6HxzwUEAALx0y.jpg', 'http://pbs.twimg.com/media/CShUCIYUcAABb53.jpg']</dd>
</dl>
<p>
    Ссылки на изображения в твите.
</p>
</div>


<h4>dateText</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Object</dd>
</dl>

<p>
    Составной обьект для отображения текста даты при недавнем добавлении твита. Состоит из 4-х вложенных опций:
</p>

<div class="inner">
<h5>seconds</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>1m</dd>
</dl>

<p>
    Текст, выводимый вместо даты, если твит добавлен меньше минуты назад.
</p>

<h5>minutes</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>m</dd>
</dl>

<p>
    Текст, выводимый возле количества минут, с момента добавления твита (5m).
</p>

<h5>hours</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>h</dd>
</dl>

<p>
    Текст, выводимый возле количества часов, с момента добавления твита (5h).
</p>

<h5>yesterday</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>yd</dd>
</dl>

<p>
    Текст, выводимый вместо даты, если твит добавлен вчера.
</p>
</div>

<h4>callback</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>function</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>false</dd>
</dl>

<p>
    Функция, которая будет выполнена после работы скрипта.
</p>

<h3>
    Настройка с помощью data атрибутов
</h3>

<p>
    Скрипт также поддерживает дополнительную настройку в HTML разметке с помощью data-атрибут API.
</p>

<h4>data-twitter-username</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>templatemonster</dd>
</dl>

<p>
    Определяет аккаунт с которого будут загружаться твиты.
</p>

<h4>data-twitter-hashtag</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение</dt>
    <dd>null</dd>
</dl>

<p>
    Опция для загрузки твитов с определенным хештегом
</p>

<h4>data-twitter-listname</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>null</dd>
</dl>

<p>
    Определяет название списка с которого будут загружаться твиты. Для определения списка должен быть указан владелец в опции <strong>username</strong>.
</p>

<h4>data-twitter-date-format</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>%b/%d/%Y</dd>
</dl>

<p>
    Формат вывод даты. Дата будет отображаться в данном формате, по истечении 2-х дней после добавления.
</p>

<h4>data-twitter-date-seconds</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>1m</dd>
</dl>

<p>
    Текст, выводимый вместо даты, если твит добавлен меньше минуты назад.
</p>

<h4>data-twitter-date-minutes</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>m</dd>
</dl>

<p>
    Текст, выводимый возле количества минут, с момента добавления твита (5m).
</p>

<h4>data-twitter-date-hours</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>h</dd>
</dl>

<p>
    Текст, выводимый возле количества часов, с момента добавления твита (5h).
</p>

<h4>data-twitter-date-yesterday</h4>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>yd</dd>
</dl>

<p>
    Текст, выводимый вместо даты, если твит добавлен вчера.
</p>

