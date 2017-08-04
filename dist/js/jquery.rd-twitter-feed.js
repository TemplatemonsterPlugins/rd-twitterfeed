
/**
* @module       jQuery RD Twitter Feed
* @author       Rafael Shayvolodyan (raffa)
* @version      1.0.4
 */

(function() {
  (function($, document, window) {

    /**
    * Creates a twitter widget.
    * @class RDTwitter.
    * @public
    * @param {HTMLElement} element - The element to create the twitter for.
    * @param {Object} [options] - The options
     */
    var RDTwitter;
    return RDTwitter = (function() {

      /**
      * Default options for twitter feed.
      * @public
       */
      RDTwitter.prototype.Defaults = {
        username: 'templatemonster',
        list: null,
        hashtag: null,
        hideReplies: true,
        dateFormat: '%b/%d/%Y',
        apiPath: 'bat/twitter_api/tweet.php',
        loadingText: 'Loading...',
        localTemplate: {
          message: 'This is sample tweet for local testing. Upload your project to the live hosting server for get data from twitter.com',
          serverMessage: 'RD Twitter Feed: Please upload project to the server for enable plugin!',
          user_name: 'TemplateMonster',
          date: 'Fri Nov 06 11:20:43 +0000 2015',
          tweet: 'Check Out NEW #Photographer Portfolio Responsive Photo - goo.gl/ECjPvq',
          avatar: 'http://pbs.twimg.com/profile_images/611164752396419072/hJYLqLJR_normal.jpg',
          url: 'https://twitter.com/templatemonster/status/660069673464160256',
          screen_name: '@templatemonster',
          media_url: ['https://pbs.twimg.com/media/CS6HxzwUEAALx0y.jpg', 'http://pbs.twimg.com/media/CShUCIYUcAABb53.jpg']
        },
        dateText: {
          seconds: 'less 1m',
          minutes: 'm',
          hours: 'h',
          yesterday: 'yd'
        },
        callback: false
      };

      function RDTwitter(element, options) {
        this.options = $.extend(true, {}, this.Defaults, options);
        this.$element = $(element);
        this.initialize();
      }


      /**
      * Initializes the Twitter Widget.
      * @protected
       */

      RDTwitter.prototype.initialize = function() {
        var $el;
        $el = this.$element;
        if (this.options.list && !this.options.username) {
          console.error('If you want to fetch tweets from a list, you must define the username of the list owner.');
        }
        if (this.isLocal()) {
          $el.prepend("<h6>" + this.options.localTemplate.message + "</h6>");
        } else if (!this.isServer()) {
          $el.prepend("<h6>" + this.options.localTemplate.serverMessage + "</h6>");
          return;
        }
        $el.append('<span id="loading_tweet">' + ($el.attr('data-twitter-loading') ? $el.attr('data-twitter-loading') : this.options.loadingText + '</span>'));
        this.fetch();
      };


      /**
      * Parse string for applies @reply, #hash and http links .
      * @protected
      * @param {String} str - The string for parsing.
      * @param {Object} [tweet] - The twitter object been recevied through API
       */

      RDTwitter.prototype.linking = function(str, tweet) {
        var flag, j, k, len, len1, link, links, ref, twit, url;
        twit = str.replace(/#([a-zA-Z0-9_]+)/g, '<a href="https://twitter.com/search?q=%23$1&amp;src=hash" target="_blank" title="Search for #$1">#$1</a>').replace(/@([a-zA-Z0-9_]+)/g, '<a href="https://twitter.com/$1" target="_blank" title="$1 on Twitter">@$1</a>');
        links = str.match(/(https?:\/\/([-\w\.]+)+(:\d+)?(\/([\w\/_\.]*(\?\S+)?)?)?)/ig);
        if (links !== null) {
          for (j = 0, len = links.length; j < len; j++) {
            link = links[j];
            flag = false;
            ref = tweet.entities.urls;
            for (k = 0, len1 = ref.length; k < len1; k++) {
              url = ref[k];
              twit = twit.replace(link, '<a href="' + url.expanded_url + '" target="_blank">' + url.display_url + '</a> ');
            }
            if (!flag) {
              twit = twit.replace(link, '');
            }
          }
        }
        return twit;
      };


      /**
      * Formating a date
      * @protected
      * @param {Object} twt_date - Twitter date.
      * @param {Boolean} datetime - if true value will be converted to datetime attribute format (for tag time).
       */

      RDTwitter.prototype.dating = function(twt_date, datetime) {
        var _date, current, date, diff, format, formats, j, len, months, time;
        time = twt_date.split(' ');
        twt_date = new Date(Date.parse(time[1] + ' ' + time[2] + ', ' + time[5] + ' ' + time[3] + ' UTC'));
        current = new Date();
        diff = (current.getTime() - twt_date.getTime()) / 1000;
        months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        _date = {
          '%d': twt_date.getDate(),
          '%m': twt_date.getMonth() + 1,
          '%b': months[twt_date.getMonth()].substr(0, 3),
          '%B': months[twt_date.getMonth()],
          '%y': String(twt_date.getFullYear()).slice(-2),
          '%Y': twt_date.getFullYear()
        };
        if (datetime) {
          date = '%Y-%m-%d';
        } else {
          date = this.$element.attr('data-twitter-date-format') ? this.$element.attr('data-twitter-date-format') : this.options.dateFormat;
        }
        if (diff < 60) {
          if (this.$element.attr('data-twitter-date-seconds')) {
            return this.$element.attr('data-twitter-date-seconds');
          } else {
            return this.options.dateText.seconds;
          }
        } else if (diff / 60 < 60) {
          return Math.round(diff / 60) + (this.$element.attr('data-twitter-date-minutes') ? this.$element.attr('data-twitter-date-minutes') : this.options.dateText.minutes);
        } else if (diff / 60 / 60 < 24) {
          return Math.round(diff / 60 / 60) + (this.$element.attr('data-twitter-date-hours') ? this.$element.attr('data-twitter-date-hours') : this.options.dateText.hours);
        } else if (diff / 60 / 60 / 24 < 2) {
          if (this.$element.attr('data-twitter-date-yesterday')) {
            return this.$element.attr('data-twitter-date-yesterday');
          } else {
            return this.options.dateText.yesterday;
          }
        } else {
          formats = date.match(/%[dmbByY]/g);
          for (j = 0, len = formats.length; j < len; j++) {
            format = formats[j];
            date = date.replace(format, _date[format]);
          }
        }
        return date;
      };


      /**
      * Check for local address
      * @protected
       */

      RDTwitter.prototype.isLocal = function() {
        var addr, j, len, ref;
        ref = ['127.0.0.1', '192.168', 'localhost'];
        for (j = 0, len = ref.length; j < len; j++) {
          addr = ref[j];
          if (document.location.hostname.indexOf(addr) > -1) {
            return true;
          }
        }
        return false;
      };

      RDTwitter.prototype.isServer = function() {
        var url;
        url = window.location.href;
        if (url.indexOf('http://') > -1 || url.indexOf('https://') > -1) {
          return true;
        } else {
          return false;
        }
      };


      /**
      * Get media from tweet
      * @param {Object} tweet - Twitter tweet.
      * @protected
       */

      RDTwitter.prototype.getMedia = function(tweet) {
        var arr, j, len, media, ref;
        if (tweet.extended_entities) {
          if (tweet.extended_entities.media) {
            media = [];
            ref = tweet.extended_entities.media;
            for (j = 0, len = ref.length; j < len; j++) {
              arr = ref[j];
              media.push(arr.media_url);
            }
            return media;
          }
        } else if (tweet.entities && tweet.entities.media) {
          return tweet.entities.media[0].media_url;
        } else {
          return null;
        }
      };


      /**
      * Get necessary data from twitter object
      * @param {Object} ctx - RDTwitter.
      * @param {Object} twt - Twitter tweet.
      * @protected
       */

      RDTwitter.prototype.getTempData = function(ctx, twt) {
        var arr, i, j, k, length, ref, ref1, temp_data, tweet;
        length = ctx.$element.find('[data-twitter-type="tweet"]').length;
        temp_data = Array();
        if (ctx.isLocal()) {
          for (i = j = 0, ref = length; 0 <= ref ? j < ref : j > ref; i = 0 <= ref ? ++j : --j) {
            arr = {
              user_name: ctx.options.localTemplate.user_name,
              date: ctx.dating(ctx.options.localTemplate.date, false),
              datetime: ctx.dating(ctx.options.localTemplate.date, true),
              tweet: ctx.linking(ctx.options.localTemplate.tweet),
              avatar: ctx.options.localTemplate.avatar,
              url: ctx.options.localTemplate.url,
              retweeted: false,
              screen_name: ctx.linking(ctx.options.localTemplate.screen_name),
              media_url: ctx.options.localTemplate.media_url
            };
            temp_data.push(arr);
          }
        } else {
          for (i = k = 0, ref1 = length; 0 <= ref1 ? k < ref1 : k > ref1; i = 0 <= ref1 ? ++k : --k) {
            tweet = false;
            if (twt[i]) {
              tweet = twt[i];
            } else if (twt.statuses && twt.statuses[i]) {
              tweet = twt.statuses[i];
            } else {
              break;
            }
            arr = {
              user_name: tweet.user.name,
              date: ctx.dating(tweet.created_at, false),
              datetime: ctx.dating(tweet.created_at, true),
              tweet: ctx.linking(tweet.text, tweet),
              avatar: tweet.user.profile_image_url,
              url: "https://twitter.com/" + tweet.user.screen_name + "/status/" + tweet.id_str,
              retweeted: tweet.retweeted,
              screen_name: ctx.linking('@' + tweet.user.screen_name, tweet)
            };
            arr['media_url'] = ctx.getMedia(tweet);
            temp_data.push(arr);
          }
        }
        return temp_data;
      };


      /**
      * Fetch tweets
      * @protected
       */

      RDTwitter.prototype.fetch = function() {
        var $el;
        $el = this.$element;
        $.getJSON(this.options.apiPath, {
          username: $el.attr('data-twitter-username') ? $el.attr('data-twitter-username') : this.options.username,
          list: $el.attr('data-twitter-listname') ? $el.attr('data-twitter-listname') : this.options.list,
          hashtag: $el.attr('data-twitter-hashtag') ? $el.attr('data-twitter-hashtag') : this.options.hashtag,
          count: $el.find('[data-twitter-type="tweet"]').length + 1,
          exclude_replies: this.options.hideReplies
        }, $.proxy(function(twt) {
          $el.find('#loading_tweet').fadeOut('fast');
          this.construct(this.getTempData(this, twt));
        }, this));
        if (typeof this.options.callback === 'function') {
          this.options.callback();
        }
      };


      /**
      * Fill html
      * @protected
      * @param {Array} data - Filtered array from Twitter Object.
       */

      RDTwitter.prototype.construct = function(data) {
        var $item, ctx, i, j, mediaNumber, ref;
        ctx = this;
        $item = ctx.$element.find('[data-twitter-type="tweet"]');
        for (i = j = 0, ref = $item.length; 0 <= ref ? j < ref : j > ref; i = 0 <= ref ? ++j : --j) {
          if ($item.prop('tagName') === 'A') {
            this.tweetLink($item.eq(i), data[i]);
          }
          mediaNumber = 0;
          $item.eq(i).find('*').each(function() {
            ctx.parseAttributes(this, data[i], mediaNumber);
            if (this.hasAttribute('data-media_url')) {
              mediaNumber++;
            }
          });
          $item.css('opacity', '1');
        }
      };

      RDTwitter.prototype.tweetLink = function($el, data) {
        $el.attr('href', data.url);
      };


      /**
      * Parse html elements attributes
      * @param {Object} el - element to parse.
      * @param {Array} data - Filtered array from Twitter Object.
      * @param {Integer} index - Number of media
      * @protected
       */

      RDTwitter.prototype.parseAttributes = function(el, data, index) {
        var $el, attr, attributes, dataArr, dataEl, j, len;
        $el = $(el);
        dataArr = $el.data();
        for (dataEl in dataArr) {
          if (dataArr.hasOwnProperty(dataEl)) {
            attributes = dataArr[dataEl].split(/\s?,\s?/i);
            for (j = 0, len = attributes.length; j < len; j++) {
              attr = attributes[j];
              if (attr.toLowerCase() === 'text') {
                el.innerHTML = data[dataEl];
              } else if (dataEl === 'media_url') {
                if ($.isArray(data[dataEl]) && data[dataEl].length > index) {
                  el.setAttribute(attr, data[dataEl][index]);
                } else if (data[dataEl] !== null && index === 0) {
                  el.setAttribute(attr, data[dataEl]);
                } else {
                  $el.remove();
                }
              } else {
                el.setAttribute(attr, data[dataEl]);
              }
            }
          }
        }
      };


      /**
      * The jQuery Plugin for the RD Twitter
      * @public
       */

      $.fn.extend({
        RDTwitter: function(options) {
          var $this;
          this.each(function() {});
          $this = $(this);
          if (!$this.data('RDTwitter')) {
            return $this.data('RDTwitter', new RDTwitter(this, options));
          }
        }
      });

      return RDTwitter;

    })();
  })(window.jQuery, document, window);


  /**
   * The Plugin AMD export
   * @public
   */

  if (typeof module !== "undefined" && module !== null) {
    module.exports = window.RDTwitter;
  } else if (typeof define === 'function' && define.amd) {
    define(["jquery"], function() {
      'use strict';
      return window.RDTwitter;
    });
  }

}).call(this);
