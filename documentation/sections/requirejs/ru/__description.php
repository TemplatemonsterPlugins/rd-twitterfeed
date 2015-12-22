<h2 class="item1">Интеграция с Require.js</h2>

<h5>
    Скрипт имеет встроенную поддержку AMD экспорта для интеграции с Require.js. Весь процесс интеграции все также
    сводится к нескольким простым шагам.
</h5>

<h3>
    Скачайте скрипт из Git'a
</h3>

<p>
    Для начала необходимо скачать данный скрипт из нашего публичного репозитория:
    <a href="http://products.git.devoffice.com/coding-development/rd-twitter-feed">Кликабельно</a>
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
&lt;div class="twitter" data-username="templatemonster"&gt;
    ...
    &lt;div data-type="tweet"&gt;
        ...
    &lt;/div&gt;
&lt;/div&gt;
&lt;!-- END RD Twitter Feed--&gt;
</pre>
</code>

<p>
    <strong>Обратите внимание:</strong>
    разметка внутри данного блока может быть произвольной, включая элементы сетки и т.д. Необходимо только наличие
    элемента с атрибутом data-type="tweet".
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
&lt;div data-type="tweet"&gt;
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
    Обновите конфигурацию require.js
</h3>

<p>
    Прежде всего вам нобходимо убедиться в правильности настройки конфигурации путей в require.js. Обязательно необходимо
    определить алиасы jquery и jquery.rd-twitter-feed. В большинстве случаев, данная конфигурация определяется в главном скрипте
    приложения, путь к которому определяется в дата атрибуте data-main при подключении require.js
</p>

<code>
<pre>
&lt;script data-main="js/main" src="js/require.js"&gt;&lt;/script&gt;
</pre>
</code>

<p>
    Сама конфигурация должна содержать следующие алиасы для путей
</p>

<code>
<pre>
requirejs.config({
  paths: {
    "jquery": "path/to/jquery"
    "jquery.rd-twitter-feed": "path/to/jquery.rd-twitter-feed"
  }
});
</pre>
</code>

<h3>
    Выполните инициализацию скрипта
</h3>

<p>
    Для инициализации скрипта достаточно воспользоваться следующим кодом.
</p>

<code>
<pre>
requirejs(["jquery", "jquery.rd-twitter-feed"], function($, twitter) {
  var o = $(".twitter");
  o.RDTwitter();
});
</pre>
</code>

