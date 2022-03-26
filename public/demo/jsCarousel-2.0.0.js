$(document).ready(function(){
    $('#product-slider').jsCarousel({ onthumbnailclick: function(src) { alert(src); }, autoscroll: true, masked: true, itemstodisplay: 5, orientation: 'h' });
});
(function($) {
    $.fn.extend({
        jsCarousel: function(options){
            var settings = $.extend({
                scrollspeed: 1500,
                delay: 5000,
                itemstodisplay: 5,
                autoscroll: false,
                circular: false,
                masked: true,
                onthumbnailclick: null,
                orientation: 'h'
            }, options);

            return this.each(function(){
                var oclass = 'horizontal';

                var slidercontents = $(this).addClass('jscarousal-contents-' + oclass + '');
                var slider = $('<div/>').addClass('jscarousal-' + oclass + '').attr('id', slidercontents.attr('id'));
                var backbutton = $('<div/>').addClass('jscarousal-' + oclass + '-back');
                var forwardbutton = $('<div/>').addClass('jscarousal-' + oclass + '-forward');

                slidercontents.removeAttr('id');
                slidercontents.before(slider);
                slider.append(backbutton);
                slider.append(slidercontents);
                slider.append(forwardbutton);

                var total = $('> div', slidercontents).css('display', 'none').length;
                var index = 0;
                var start = 0;
                var current = $('<div/>');
                var noOfBlocks;
                var interval;
                var display = settings.itemstodisplay;
                var speed = settings.scrollspeed;
                var top;
                var left;
                var height;
                var containerHeight;
                var containerWidth;
                var direction = "forward";
                var scrolling = true;

                function initialize() {

                    index = -1;
                    noOfBlocks = parseInt(total / display);
                    if (total % display > 0) noOfBlocks++;
                    index = noOfBlocks - 1;

                    var startIndex = 0;
                    var endIndex = display;
                    var copy = false;
                    var allElements = $('> div', slidercontents);

                    $('> div', slidercontents).remove();

                    if (settings.masked)
                        allElements.addClass('thumbnail-inactive').hover(function() { $(this).removeClass('thumbnail-inactive').addClass('thumbnail-active'); }, function() { $(this).removeClass('thumbnail-active').addClass('thumbnail-inactive'); })
                    for (var i = 0; i < noOfBlocks; i++) {
                        if (total > display) {
                            startIndex = i * display;
                            endIndex = startIndex + display;
                            if (endIndex > total) {
                                startIndex -= (endIndex - total);
                                endIndex = startIndex + display;
                                copy = true;
                            }
                        }else {
                            startIndex = 0;
                            endIndex = total;
                        }
                        var wrapper = $('<div/>')
                        allElements.slice(startIndex, endIndex).each(function(index, el) {
                            if (!copy)
                                wrapper.append(el);
                            else wrapper.append($(el).clone(true));
                        });
                        wrapper.find("img").click(
                         function() {
                             if (settings.onthumbnailclick != null) {
                                 settings.onthumbnailclick($(this).attr('src'));
                             }
                         });
                        slidercontents.append(wrapper);
                    }
                    if (settings.onthumbnailclick != null)
                        $('> div', slidercontents).addClass('hidden');
                        $('> div > div', slidercontents).css('display', '');

                    if (settings.orientation == 'h') {

                        left = $('> div:eq(' + index + ')', slidercontents).css('left');
                        containerWidth = slidercontents.width();
                        height = slidercontents.get(0).offsetHeight;
                        $('> div', slidercontents).css('left', '-' + containerWidth + 'px');
                        $('> div:eq(' + index + ')', slidercontents).stop(false, true).animate({ left: 0 }, speed, function() { scrolling = false; });
                    }

                    $('> div:eq(' + index + ')', slidercontents).addClass('visible').removeClass('hidden');

                    slider.mouseenter(function() { if (settings.autoscroll) stopAnimate(); }).mouseleave(function() { if (settings.autoscroll) animate(); });

                    if (settings.autoscroll)
                        animate();
                    forwardbutton.click(function() {
                        if (!scrolling) {
                            direction = "forward";
                            if (settings.circular)
                                if (index <= 0) index = noOfBlocks;
                            showThumbs();
                        }
                    });

                    backbutton.click(function() {
                        if (!scrolling) {
                            direction = "backward";
                            if (settings.circular)
                                if (index >= noOfBlocks - 1) index = -1;
                            showThumbs();
                        }
                    });
                }

                initialize();

                function stopAnimate() {
                    scrolling = false;
                    clearTimeout(interval);
                    slider.children().clearQueue();
                    slider.children().stop(false, true);
                }

                function animate() {
                    clearTimeout(interval);
                    if (settings.autoscroll)
                        interval = setTimeout(changeSlide, settings.delay);
                }

                function changeSlide() {
                    if (direction == "forward") {
                        if (index <= 0) index = noOfBlocks;
                    }else{
                        if (index >= noOfBlocks - 1) { index = -1; }
                    }
                    showThumbs();
                    interval = setTimeout(changeSlide, settings.delay);
                }

                function getDimensions(value) {
                    return value + 'px';
                }

                function showThumbs() {

                    scrolling = true;
                    var current = $('.visible', slidercontents);
                    var scrollSpeed = speed;

                    if (direction == "forward") {
                        index--;
                        if (index >= 0) {
                            if (settings.orientation == 'h') {
                                $('>div:eq(' + index + ')', slidercontents).css('left', getDimensions(containerWidth)).removeClass('hidden').addClass('visible').stop(false, true).animate({ 'left': '-=' + getDimensions(containerWidth) }, scrollSpeed, function() { scrolling = false; });
                                current.stop(false, true).animate({ 'left': '-=' + getDimensions(containerWidth) }, scrollSpeed, function() {
                                    $(this).removeClass('visible').addClass('hidden');
                                    $(this).css('left', left);
                                    scrolling = false;
                                });
                            }
                        }else index = 0;
                    }else if (direction == "backward") {
                        index++;
                        if (index < noOfBlocks) {
                            if (settings.orientation == 'h') {
                                $('>div:eq(' + index + ')', slidercontents).removeClass('hidden').addClass('visible').css({
                                    'left': getDimensions(-containerWidth)
                                }).stop(false, true).animate({ 'left': '+=' + getDimensions(containerWidth) }, scrollSpeed, function() { scrolling = false; });
                                current.stop(false, true).animate({ 'left': '+=' + getDimensions(containerWidth) }, scrollSpeed,
                                function() {

                                    $(this).removeClass('visible').addClass('hidden');

                                    $(this).css('left', getDimensions(-containerWidth));

                                    scrolling = false;

                                });
                            }
                        }else index = noOfBlocks - 1;
                    }
                }
            });
        }
    });
})(jQuery);