<h2 class="item1">Как использовать</h2>

<h5>
    Внедрение скрипта на страницу сводится к нескольким простым шагам.
</h5>

<p>
    <strong>Обратите внимание:</strong> предложенный вариант инициализации может отличаться в зависимости от продукта,
    в котором он внедряется. Информация предоставленная ниже лишь отображает принципы работы со скриптом.
</p>

<h3>
    Скачайте скрипт из Git'a
</h3>

<p>
    Для начала необходимо скачать данный скрипт из нашего публичного репозитория:
    <a href="http://products.git.devoffice.com/coding-development/rd-twitter-feed">Кликабельно</a>
</p>


<h3>
    Локальное тестирование
</h3>

<p>
    При локальном использовании, данные с сервиса <a href="https://twitter.com/">Twitter</a> не будут получены, так как
    сервис аутентификации твитера не может получить доступ к локальным данным. Вместо этого будут показаны тестовые данные,
    идентичные полученным из твитера. При загрузке проекта на рабочий сервер будут
    полученые реальные данные.
</p>


<h3>
    Добавьте необходимую разметку
</h3>

<p>
    HTML разметка по умолчанию для получения данных твиттера выглядит следующим образом.
</p>

<code>
<pre>
&lt;!-- RD Twitter Feed --&gt;
&lt;div class="twitter" data-twitter-username="templatemonster"&gt;
    ...
    &lt;div data-twitter-type="tweet"&gt;
        ...
    &lt;/div&gt;
&lt;/div&gt;
&lt;!-- END RD Twitter Feed--&gt;
</pre>
</code>

<p>
    <strong>Обратите внимание:</strong>
    разметка внутри данного блока может быть произвольной, включая элементы сетки и т.д. Необходимо только наличие
    элемента с атрибутом data-twitter-type="tweet".
</p>


<h3>
    HTML разметка элемента твита
</h3>

<p>
    Получить данные твита возможно только внутри блока с атрибутом data-type="tweet". Для получения данных необходимо
    дописать следующий атрибут: <br/>
    <div style="text-align:center;">data-(название данных)="target"</div> <br/>
    где target - атрибут, в который будут записаны данные. Если в target указать значение “text”, данные будут выведены
    внутрь тега обычным текстом. В target можно записать несколько значений, определив их через запятую. Например для
    вывода картинки и текста твита необходима следующая разметка:
</p>

<code>
<pre>
&lt;div data-twitter-type="tweet"&gt;
    &lt;img data-media_url="src" alt="" src="#"/&gt;
    &lt;div data-tweet="text"&gt;&lt;/div&gt;
&lt;/div&gt;
</pre>
</code>

<h4>Список возможных атрибутов:</h4>
<ul class="marked-list">
    <li>
        <dl class="inline-term">
            <dt>data-media_url</dt>
            <dd>изображение в твите</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-tweet</dt>
            <dd>текст твита</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-date</dt>
            <dd>дата добавления</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-datetime</dt>
            <dd>дата добавления в формате атрибута datetime</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-url</dt>
            <dd>ссылка на твит</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-avatar</dt>
            <dd>аватарка пользователя</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-screen_name</dt>
            <dd>логин пользователя</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-user_name</dt>
            <dd>имя пользователя</dd>
        </dl>
    </li>
</ul>

<h3>
    Вставка ключей для работы с Twitter API
</h3>

<p>
    Для работы с Twitter API вам необходимо <a href='http://iag.me/socialmedia/how-to-create-a-twitter-app-in-8-easy-steps/'>создать приложение</a> со своего аккаунта Twitter, сгенерировать
    ключи и записать их в файл bat/twitter_api/config.php. Список необходимых ключей:
</p>

<ul class="marked-list">
    <li>CONSUMER_KEY;</li>
    <li>CONSUMER_SECRET;</li>
    <li>ACCESS_TOKEN;</li>
    <li>ACCESS_SECRET.</li>
</ul>

<code>
<pre>
// Consumer Key
define('CONSUMER_KEY', 'Put CONSUMER_KEY here ');
define('CONSUMER_SECRET', 'Put CONSUMER_SECRET here');

// User Access Token
define('ACCESS_TOKEN', 'Put ACCESS_TOKEN here');
define('ACCESS_SECRET', 'Put ACCESS_SECRET here');
</pre>
</code>


<h3>
    Подключите скрипт на странице
</h3>

<p>
    Вам необходимо скоппировать скрипт в папку /js вашего проекта и выполнить его подключение на странице. Для это можно
    исспользовать следующий участок кода:
</p>

<code>
<pre>
&lt;script src="js/jquery.rd-twitter-feed.min.js"&gt;&lt;/script&gt;
</pre>
</code>


<h3>
    Выполните инициализацию скрипта
</h3>

<p>
    Вам необходимо выполнить инициализацию скрипта для элементов по целевому селектору, с помощью следующего участка кода
</p>

<code>
<pre>
&lt;script&gt;
  $(document).ready(function () {
    o.RDTwitter({}); // Additional options
  });
&lt;/script&gt;
</pre>
</code>

