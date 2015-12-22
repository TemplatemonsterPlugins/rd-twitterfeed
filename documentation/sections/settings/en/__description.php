<h2 class="item1">Options</h2>

<h4>
    There are several options available in the script:
</h4>

<h3>
    General Options
</h3>

<p>
    You can define the options below in script initialization
</p>

<h4>username</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>templatemonster</dd>
</dl>

<p>
    Option to load tweets from specified account
</p>

<h4>list</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>null</dd>
</dl>

<p>
    Option to load tweets from specified list. If you define list name you also must define the username of the list
    owner in the <strong>username</strong> option.
</p>

<h4>hashtag</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>null</dd>
</dl>

<p>
    Option to load tweets from specified hashtag
</p>

<h4>dateFormat</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>%b/%d/%Y</dd>
</dl>

<p>
    Your date format. The date will be displayed in this format, after 2 days after adding.
</p>

<h4>apiPath</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>bat/twitter_api/tweet.php</dd>
</dl>

<p>
    Path to your tweet.php file.
</p>

<h4>loadingText</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>Loading...</dd>
</dl>

<p>
    The text to be displayed before loading data from service.
</p>

<h4>localTemplate</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Object</dd>
</dl>

<p>
    Composite object to define data tweet for local testing. It consists 8 nested options:
</p>

<div class="inner">
<h5>message</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>

<p>
    The warning text, which be displayed at a local testing.
</p>

<h5>user_name</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>

<p>
    User name, who posted tweet.
</p>

<h5>date</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default</dt>
    <dd>Fri Nov 06 11:20:43 +0000 2015</dd>
</dl>

<p>
    Tweet date
</p>

<h5>tweet</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<p>
   Tweet text
</p>

<h5>avatar</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<p>
    Link to the user's avatar, who posted tweet.
</p>

<h5>url</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<p>
    Tweet link
</p>

<h5>screen_name</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<p>
    user's login, who posted tweet.
</p>

<h5>media_url</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Array</dd>
</dl>
<dl class="inline-term">
    <dt>Default</dt>
    <dd>['https://pbs.twimg.com/media/CS6HxzwUEAALx0y.jpg', 'http://pbs.twimg.com/media/CShUCIYUcAABb53.jpg']</dd>
</dl>
<p>
    Links to tweet images
</p>
    </div>

<h4>dateText</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Object</dd>
</dl>

<p>
    Composite object to define date text for recent tweets. It consists 4 nested options:
</p>

<div class="inner">
<h5>seconds</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>1m</dd>
</dl>

<p>
    The text, which be displayed instead of the date if the tweet is added less than a minute ago.
</p>

<h5>minutes</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>m</dd>
</dl>

<p>
    The text, which be displayed next to the number of minutes since the addition of tweet (5m).
</p>

<h5>hours</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>h</dd>
</dl>

<p>
    The text, which be displayed next to the number of hours since the addition of tweet (5h).
</p>

<h5>yesterday</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>yd</dd>
</dl>

<p>
    The text, which be displayed instead of the date if the tweet is added yesterday.
</p>
    </div>


<h4>callback</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>function</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>false</dd>
</dl>

<p>
    Function, which be called after the script working
</p>

<h3>
    Customize with data attributes
</h3>

<p>
    The script also supports additional settings in the HTML markup with data-attribute API.
</p>

<h4>data-twitter-username</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>templatemonster</dd>
</dl>

<p>
    Option to load tweets from specified account
</p>

<h4>data-twitter-hashtag</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение</dt>
    <dd>null</dd>
</dl>

<p>
    Option to load tweets from specified hashtag
</p>

<h4>data-twitter-listname</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>null</dd>
</dl>

<p>
    Option to load tweets from specified list. If you define list name you also must define the username of the list
    owner in the <strong>username</strong> option.
</p>

<h4>data-twitter-date-format</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>%b/%d/%Y</dd>
</dl>

<p>
    Your date format. The date will be displayed in this format, after 2 days after adding.
</p>

<h4>data-twitter-date-seconds</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>1m</dd>
</dl>

<p>
    The text, which be displayed instead of the date if the tweet is added less than a minute ago.
</p>

<h4>data-twitter-date-minutes</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>m</dd>
</dl>

<p>
    The text, which be displayed next to the number of minutes since the addition of tweet (5m).
</p>

<h4>data-twitter-date-hours</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>h</dd>
</dl>

<p>
    The text, which be displayed next to the number of hours since the addition of tweet (5h).
</p>

<h4>data-twitter-date-yesterday</h4>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>yd</dd>
</dl>

<p>
    The text, which be displayed instead of the date if the tweet is added yesterday.
</p>














