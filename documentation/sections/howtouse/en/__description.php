<h2 class="item1">How to use</h2>

<h5>
    There are several steps to use RD Twitter Feed
</h5>

<h3>
    Get the script from GIT
</h3>

<p>
    Get the script from our public Repo:
    <a href="http://products.git.devoffice.com/coding-development/rd-twitter-feed">Click</a>
</p>

<h3>
    Local Testing
</h3>

<p>
    If you are using script from local server, data will not be sent to the 
    <a href="https://twitter.com/">Twitter</a> server, due twitter authentication service can't get data from local server.
    Instead of this, script will show test data similar to the twitter data. After upload the project to the live hosting server
    script will get real data.
</p>


<h3>
    Add the HTML markup
</h3>

<p>
    Default HTML markup is shown below
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
    <strong>Attention:</strong> markup in given block bay be any, including elements of the grid, etc. It is only
                                necessary presence element with the attribute data-twitter-type = "tweet".
</p>


<h3>
    Tweet HTML Markup
</h3>

<p>
    Tweet data can be retrieved only in block with attribute data-type = "tweet". To obtain the data necessary to add
    the following attribute: <br/>
    <div style="text-align:center;">data-(data name)="target"</div> <br/>
    target - an attribute in which data will be recorded.
    If you specify a target value of "text", the data will be written into tag as plain text You can write multiple
    values to the target, separating with comma. For example, you can use next markup to display images and text tweet:
</p>

<code>
<pre>
&lt;div data-twitter-type="tweet"&gt;
    &lt;img data-media_url="src" alt="" src="#"/&gt;
    &lt;div data-tweet="text"&gt;&lt;/div&gt;
&lt;/div&gt;
</pre>
</code>

<h4>List of attributes </h4>
<ul class="marked-list">
    <li>
        <dl class="inline-term">
            <dt>data-media_url</dt>
            <dd>tweet image</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-tweet</dt>
            <dd>tweet text</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-date</dt>
            <dd>date added</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-datetime</dt>
            <dd>date in special format for attribute "datetime"</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-url</dt>
            <dd>tweet url</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-avatar</dt>
            <dd>user avatar</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-screen_name</dt>
            <dd>user screen name</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>data-user_name</dt>
            <dd>user login</dd>
        </dl>
    </li>
</ul>

<h3>
    Insert keys for Twitter API
</h3>

<p>
    To work with the Twitter API you need to
    <a href='http://iag.me/socialmedia/how-to-create-a-twitter-app-in-8-easy-steps/'>create applications</a> from your
    twitter account. Generate keys and write them to file bat/twitter_api/config.php. The list of necessary keys:
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
    Include the script
</h3>

<p>
    Include the script on target page
</p>

<code>
<pre>
&lt;script src="js/jquery.rd-twitter-feed.min.js"&gt;&lt;/script&gt;
</pre>
</code>


<h3>
    Initialize the script
</h3>

<p>
    Use this code for script initialization
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

