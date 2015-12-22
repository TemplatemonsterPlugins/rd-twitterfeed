<h2 class="item1">Use with Require.js</h2>

<h5>
    There are several steps to use RD Twitter Feed with Require.js
</h5>

<h3>
    Get the script from GIT
</h3>

<p>
    Get the script from our public Repo:
    <a href="http://products.git.devoffice.com/coding-development/rd-twitter-feed">Click</a>
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
    <strong>Attention:</strong> markup in given block bay be any, including elements of the grid, etc. It is only
                                necessary presence element with the attribute data-type = "tweet".
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
&lt;div data-type="tweet"&gt;
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
    Update Require.js configuration
</h3>

<p>
    First of all check the paths in require.js. Add path aliaces for jquery and jquery.rd-twitter-feed.
    By default the configuration is defined in main script defined as data-main attribute of require.js
    definition
</p>

<code>
<pre>
&lt;script data-main="js/main" src="js/require.js"&gt;&lt;/script&gt;
</pre>
</code>

<p>
    The target part of require.js configuration is shown below
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
    Initialize the script
</h3>

<p>
    Use this code for script initialization
</p>

<code>
<pre>
requirejs(["jquery", "jquery.rd-twitter-feed"], function($, twitter) {
  var o = $(".twitter");
  o.RDTwitter();
});
</pre>
</code>

