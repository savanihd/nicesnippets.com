/**
 * Countable is a script to allow for live paragraph-, word- and character-
 * counting on an HTML element. Usage is recommended on `input` and `textarea`
 * elements.
 *
 * @author   Sacha Schmid (http://github.com/RadLikeWhoa)
 * @version  1.1.1
 * @license  MIT
 */

;(function () {
  'use strict';

  /**
   * String.trim() polyfill for non-supporting browsers.
   *
   * @return  {String}  The original string with leading and trailing
   *                    whitespace removed.
   */

  if (typeof String.prototype.trim !== 'function') {
    String.prototype.trim = function () {
      return this.replace(/^\s+|\s+$/g, '');
    };
  }

  /**
   * Create a new Countable instance on an HTML element.
   *
   * @constructor
   *
   * @param    {HTMLElement}  element     The element to be used for the
   *                                      counting.
   * @param    {Function}     [callback]  The callback to receive and process
   *                                      the result. The callback should
   *                                      accept only one parameter. (default:
   *                                      logs to console)
   * @param    {Boolean}      [hard]      Sets whether to use hard returns (2
   *                                      line breaks) or not. (default: false)
   *
   * @example  new Countable(elem, function (counter) {
   *             alert(counter.paragraphs, counter.words, counter.characters);
   *           });
   *
   * @return   {Countable}    An instance of the Countable class.
   */

  var _ = window.Countable = function (element, callback, hard) {

    /**
     * Expect a valid HTMLElement. If no element or an invalid value is given,
     * Countable returns nothing.
     */

    if (!element || element.nodeType !== 1) return;

    this.element = element;
    this.callback = typeof callback === 'function' ? callback : function (counter) {
      if (typeof console !== 'undefined') console.log(counter);
    };
    this.hard = hard;

    this.init();

    return this;
  };

  _.prototype = {

    /**
     * Trim leading and trailing whitespace and count paragraphs, words and
     * characters.
     *
     * @return  {Object}  The object containing the number of paragraphs, words
     *                    and characters, all accessible by their names.
     */

    count: function () {
      var orig = (this.element.value || this.element.innerText || this.element.textContent || ''),
          str = orig.trim();

      return {
        paragraphs: str ? (str.match(this.hard ? /\n{2,}/g : /\n+/g) || []).length + 1 : 0,
        words: str ? (str.replace(/\s['";:,.?Â¿\-!Â¡]/g, '').match(/\s+/g) || []).length + 1 : 0,
        characters: str ? str.replace(/\s/g, '').length : 0,
        all: orig.replace(/[\n\r]/g, '').length
      };
    },

    /**
     * Initiate the Countable object by calling the `count()` function and
     * adding the `input` event listener to the given element.
     */

    init: function () {
      var self = this;

      self.callback(self.count());

      if (typeof self.element.addEventListener !== 'undefined') {
        self.element.addEventListener('input', function () {
          self.callback(self.count());
        });
      } else if (typeof self.element.attachEvent !== 'undefined') {
        self.element.attachEvent('onkeydown', function () {
          self.callback(self.count());
        });
      }
    }

  };
}());

$(document).ready(function(){

  // Publish output from HTMl, CSS, and JS textareas in the iframe below
  onload=(document).onkeyup=function(){
    (document.getElementById("preview").contentWindow.document).write(
      html.value+"<style>"+css.value+"<\/style><script>"+js.value+"<\/script>"
    );
    (document.getElementById("preview").contentWindow.document).close()
  };

  // Pressing the Tab key inserts 2 spaces instead of shifting focus
  $("textarea").keydown(function(event){
    if(event.keyCode === 9){
      var start = this.selectionStart;
      var end = this.selectionEnd;
      var $this = $(this);
      var value = $this.val();
      $this.val(value.substring(0, start)+"  "+value.substring(end));
      this.selectionStart = this.selectionEnd = start+1;
      event.preventDefault();
    }
  });

  // Store contents of textarea in sessionStorage
  $("textarea").keydown(function(){
      sessionStorage[$(this).attr("id")] = $(this).val();
  });
  $("#html").html(sessionStorage["html"]);
  $("#css").html(sessionStorage["css"]);
  $("#js").html(sessionStorage["js"]);
  function init() {
    if (sessionStorage["html"]) {
        $("#html").val(sessionStorage["html"]);
      }
    if (sessionStorage["css"]) {
        $("#css").val(sessionStorage["css"]);
      }  
    if (sessionStorage["js"]) {
        $("#js").val(sessionStorage["js"]);
      }
  };

  // Clear textareas with button
  $(".clearLink").click(clearAll);

  function clearAll(){
    document.getElementById("html").value = "";
    document.getElementById("css").value = "";
    document.getElementById("js").value = "";
    sessionStorage.clear();
  }

});