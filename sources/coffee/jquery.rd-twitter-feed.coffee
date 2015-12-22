###*
* @module       jQuery RD Twitter Feed
* @author       Rafael Shayvolodyan (raffa)
* @version      1.0.2
###

(($, document, window) ->

  ###*
  * Creates a twitter widget.
  * @class RDTwitter.
  * @public
  * @param {HTMLElement} element - The element to create the twitter for.
  * @param {Object} [options] - The options
  ###

  class RDTwitter

    ###*
    * Default options for twitter feed.
    * @public
    ###
    Defaults:
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
        seconds: 'less 1m'
        minutes: 'm'
        hours: 'h'
        yesterday: 'yd'
      }
      callback: false



    constructor: (element, options) ->
      @options = $.extend(true, {}, @Defaults, options)
      @$element = $(element)
      @initialize()

    ###*
    * Initializes the Twitter Widget.
    * @protected
    ###
    initialize: () ->
      $el = @.$element

      console.error 'If you want to fetch tweets from a list, you must define the username of the list owner.' if @.options.list and not @.options.username

      if @.isLocal()
        $el.prepend("<h6>#{@.options.localTemplate.message}</h6>");
      else if not@.isServer()
        $el.prepend("<h6>#{@.options.localTemplate.serverMessage}</h6>");
        return
      $el.append('<span id="loading_tweet">' + if $el.attr('data-twitter-loading') then $el.attr('data-twitter-loading') else @.options.loadingText + '</span>');

      @.fetch();
      return


    ###*
    * Parse string for applies @reply, #hash and http links .
    * @protected
    * @param {String} str - The string for parsing.
    * @param {Object} [tweet] - The twitter object been recevied through API
    ###
    linking: (str, tweet) ->

      # Replace hashtag and users links
      twit = str.replace(/#([a-zA-Z0-9_]+)/g, '<a href="https://twitter.com/search?q=%23$1&amp;src=hash" target="_blank" title="Search for #$1">#$1</a>')
      .replace(/@([a-zA-Z0-9_]+)/g, '<a href="https://twitter.com/$1" target="_blank" title="$1 on Twitter">@$1</a>')

      # Replace text links
      links = str.match(/(https?:\/\/([-\w\.]+)+(:\d+)?(\/([\w\/_\.]*(\?\S+)?)?)?)/ig)
      if (links isnt null)
        for link in links
          flag = false
          for url in tweet.entities.urls
            twit = twit.replace(link, '<a href="' + url.expanded_url + '" target="_blank">' + url.display_url + '</a> ')
          if !flag then twit = twit.replace(link, '')
      twit


    ###*
    * Formating a date
    * @protected
    * @param {Object} twt_date - Twitter date.
    * @param {Boolean} datetime - if true value will be converted to datetime attribute format (for tag time).
    ###
    dating: (twt_date, datetime) ->
      time = twt_date.split ' '

      twt_date = new Date Date.parse time[1] + ' ' + time[2] + ', ' + time[5] + ' ' + time[3] + ' UTC'
      current = new Date()

      diff = (current.getTime() - twt_date.getTime()) / 1000
      months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
      _date =
        '%d': twt_date.getDate(),
        '%m': twt_date.getMonth() + 1
        '%b': months[twt_date.getMonth()].substr 0, 3
        '%B': months[twt_date.getMonth()]
        '%y': String(twt_date.getFullYear()).slice -2
        '%Y': twt_date.getFullYear()

      if datetime
        date = '%Y-%m-%d'
      else
        date = if @.$element.attr('data-twitter-date-format') then @.$element.attr('data-twitter-date-format') else @options.dateFormat

      if diff < 60
        return if @.$element.attr('data-twitter-date-seconds') then @.$element.attr('data-twitter-date-seconds')  else @.options.dateText.seconds
      else if diff / 60 < 60
        return Math.round(diff / 60) + if @.$element.attr('data-twitter-date-minutes') then @.$element.attr('data-twitter-date-minutes')  else @.options.dateText.minutes
      else if diff / 60 / 60 < 24
        return Math.round(diff / 60 / 60) + if @.$element.attr('data-twitter-date-hours') then @.$element.attr('data-twitter-date-hours')  else @.options.dateText.hours
      else if diff / 60 / 60 / 24 < 2
        return if @.$element.attr('data-twitter-date-yesterday') then @.$element.attr('data-twitter-date-yesterday')  else @.options.dateText.yesterday
      else
        formats = date.match /%[dmbByY]/g
        date = date.replace format, _date[format] for format in formats

      date

    ###*
    * Check for local address
    * @protected
    ###
    isLocal: ->
      for addr in ['127.0.0.1', '192.168','localhost']
        if document.location.hostname.indexOf(addr) > -1
          return true
      false

    isServer: ->
      url = window.location.href;
      return if url.indexOf('http://') > -1 || url.indexOf('https://') > -1 then true else false

    ###*
    * Get media from tweet
    * @param {Object} tweet - Twitter tweet.
    * @protected
    ###
    getMedia: (tweet) ->
      if tweet.extended_entities
        if tweet.extended_entities.media
          media = []
          for arr in tweet.extended_entities.media
            media.push arr.media_url
          return media
      else if tweet.entities and tweet.entities.media
        return tweet.entities.media[0].media_url;
      else
        return null;

    ###*
    * Get necessary data from twitter object
    * @param {Object} ctx - RDTwitter.
    * @param {Object} twt - Twitter tweet.
    * @protected
    ###
    getTempData:(ctx,twt) ->
      length = ctx.$element.find('[data-twitter-type="tweet"]').length
      temp_data = Array()

      if ctx.isLocal()
        for i in [0...length]
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
          }
          temp_data.push(arr)
      else
        for i in [0...length]
          tweet = false
          if twt[i]
            tweet = twt[i]
          else if twt.statuses and twt.statuses[i]
            tweet = twt.statuses[i]
          else
            break

          arr = {
            user_name: tweet.user.name,
            date: ctx.dating(tweet.created_at, false),
            datetime: ctx.dating(tweet.created_at, true),
            tweet: ctx.linking(tweet.text, tweet),
            avatar: tweet.user.profile_image_url,
            url: "https://twitter.com/#{tweet.user.screen_name}/status/#{tweet.id_str}",
            retweeted: tweet.retweeted,
            screen_name: ctx.linking('@' + tweet.user.screen_name, tweet)
          }

          arr['media_url'] = ctx.getMedia(tweet)
          temp_data.push(arr)
      temp_data


    ###*
    * Fetch tweets
    * @protected
    ###
    fetch: ->
      $el = @.$element
      $.getJSON(@.options.apiPath, {
        username: if $el.attr('data-twitter-username') then $el.attr('data-twitter-username') else @.options.username,
        list: if $el.attr('data-twitter-listname') then $el.attr('data-twitter-listname') else @.options.list,
        hashtag: if $el.attr('data-twitter-hashtag') then $el.attr('data-twitter-hashtag') else @.options.hashtag,
        count: $el.find('[data-twitter-type="tweet"]').length,
        exclude_replies: @.options.hideReplies
      }, $.proxy((twt)->
        $el.find('#loading_tweet').fadeOut('fast')
        @.construct(@.getTempData(@, twt))
        return
      , @))
      if typeof @.options.callback is 'function'
        @.options.callback()
      return


    ###*
    * Fill html
    * @protected
    * @param {Array} data - Filtered array from Twitter Object.
    ###
    construct: (data) ->
      ctx = @
      $item = ctx.$element.find('[data-twitter-type="tweet"]')

      for i in [0...$item.length]
        if $item.prop('tagName') is 'A'
          @.tweetLink($item.eq(i), data[i])
        mediaNumber = 0;
        $item.eq(i).find('*').each ->
          ctx.parseAttributes(@, data[i], mediaNumber)
          mediaNumber++ if @.hasAttribute('data-media_url')
          return
        $item.css('opacity', '1');
      return

    tweetLink: ($el, data) ->
      $el.attr('href',data.url)
      return

    ###*
    * Parse html elements attributes
    * @param {Object} el - element to parse.
    * @param {Array} data - Filtered array from Twitter Object.
    * @param {Integer} index - Number of media
    * @protected
    ###
    parseAttributes: (el, data, index) ->
      $el = $(el)
      dataArr = $el.data()
      
      for dataEl of dataArr
        if dataArr.hasOwnProperty(dataEl)
          attributes = dataArr[dataEl].split(/\s?,\s?/i)
          for attr in attributes
            if attr.toLowerCase() is 'text'
              el.innerHTML = data[dataEl]
            else if dataEl is 'media_url'
              if $.isArray(data[dataEl]) and data[dataEl].length > index
                el.setAttribute(attr, data[dataEl][index])
              else if data[dataEl] isnt null and index is 0
                el.setAttribute(attr, data[dataEl])
              else
                $el.remove();

            else el.setAttribute(attr, data[dataEl])
      return

    ###*
    * The jQuery Plugin for the RD Twitter
    * @public
    ###
    $.fn.extend RDTwitter: (options) ->
      @each ->
      $this = $(this)
      if !$this.data('RDTwitter')
        $this.data 'RDTwitter', new RDTwitter(this, options)
) window.jQuery, document, window

###*
 * The Plugin AMD export
 * @public
###
if module?
  module.exports = window.RDTwitter
else if typeof define is 'function' && define.amd
  define(["jquery"], () ->
    'use strict'
    return window.RDTwitter
  )