(function( window, $ ) {
    const DRAWER_ITEM_CLASS = 'pot',
        SWATCH_ITEM_CLASS = 'item',
        PENDANT_ITEM_CLASS = 'bead-item',
        BEAD_ITEM_CLASS = 'bead-item',
        FINDING_ITEM_CLASS = 'finding-item';

    const DRAWER_ITEM_WIDTH = 300,
        EMPTY_CATEGORY_HTML = '<li class="info"><div>Sorry, this category is empty :(</div></li>',
        ERROR_CATEGORY_HTML = '<li class="info"><div>Sorry, some error has ac during loading content. :(</div></li>';

    var app = {
        initialized: false,
        updateDrawerScroll: function(itemsCount) {
            var itemsBeforeSliderInit = this.getDrawerCapacity();
            if (itemsCount <= itemsBeforeSliderInit) {
                this.els.$sliderContainer.mCustomScrollbar('destroy');
                this.els.$sliderContainer.css(
                    'left', (this.els.$sliderContainer.width() - itemsCount * DRAWER_ITEM_WIDTH) / 2
                )
            } else {
                this.els.$sliderContainer.css('left', 0);
                initScroll();
                this.els.$drawer.css('width', itemsCount);
                this.els.$sliderContainer.mCustomScrollbar('update');
            }
        },
        updateDrawer: function(data, isError) {
            var $elements = $(data).filter('.info');

            if (isError === true) {
                $elements = $(ERROR_CATEGORY_HTML);
            } else if (!$elements.length) {
                $elements = $(EMPTY_CATEGORY_HTML);
            }

            app.els.$drawer.append($elements);
            app.updateDrawerScroll($elements.length);
            app.bindDrawerResize($elements.length);

            app.initVisibleItemsDrag();
        },
        bindDrawerResize: function(itemsCount) {
            $(window)
                .off('resize.drawer')
                .on('resize.drawer', function() {
                    app.updateDrawerScroll(itemsCount);
                });
        },
        loadBeads: function(itemType, itemId) {
            if (typeof itemType === 'undefined' ||
                typeof itemId === 'undefined') {
                return;
            }
            $.ajax({
                method: 'GET',
                url: "../bead/" + itemType + "/" + itemId,
                success: app.updateDrawer,
                error: function() {
                    app.updateDrawer('<div></div>', true);
                }
            });
        },
        loadFindings: function(itemType, itemId) {
            if (typeof itemType === 'undefined' ||
                typeof itemId === 'undefined') {
                return;
            }

            $.ajax({
                method: 'GET',
                url: "../finding/" + itemType + "/" + itemId,
                success: app.updateDrawer,
                error: function() {
                    app.updateDrawer('<div></div>', true);
                }
            });
        },
        initVisibleItemsDrag: function() {
            this.els.$drawer
                .find('>li .pot').draggable({
                    zIndex: '99999',
                    helper: function() {
                        return $(this).clone().appendTo('body')
                    },
                    drag: function( a, b ) {
                        if (!window.tomUISortStart) {
                            b.helper.appendTo('body');
                        }
                    },
                    connectToSortable: '#sortingSwatch'
                });

        },
        bindEvents: function () {
            var that = this;

            this.els.$footer
                .on('click', '.colour_id, .type_id, .zodiac_id, .month_id, .shape_id, .size_id, .benefit_id', function() {
                    var itemType = $(this).attr("class");
                    var itemId = $(this).attr("id");

                    app.els.$drawer.empty();
                    app.loadBeads(itemType, itemId);
                });

            this.els.$footer
                .on('click', '.mechanism_id', function() {
                    var itemType = $(this).attr("class");
                    var itemId = $(this).attr("id");

                    app.els.$drawer.empty();
                    app.loadFindings(itemType, itemId);
                });

            this.els.$beadsSwatch
                .sortable({
                    tolerance: 'pointer',
                    cursor: 'pointer',
                    dropOnEmpty: true,
                    appendTo: document.body,
                    helper: 'clone',
                    items: '>.' + BEAD_ITEM_CLASS,
                    zIndex: 9999,
                    stop: function( a, ui ) {
                        $(ui.helper).remove();
                    },
                    over: function( a, b ) {
                        window.tomUISortStart = true;
                        if (b.item.hasClass(BEAD_ITEM_CLASS)) {
                            $(this).addClass('drop--success');
                        }
                    },
                    out: function( a, b ) {
                        if (window.toUIDragStart && b.helper)
                            b.helper.remove();

                        $(this).removeClass('drop--success');
                        window.tomUISortStart = false;
                    },
                    update: function( event, ui ) {
                        ui.item.removeClass('pot');
                    },
                    receive: function(event, ui) {
                        if (!ui.helper.hasClass(BEAD_ITEM_CLASS))
                            ui.helper.remove();

                        if (ui.item.parent().is(that.els.$pendantSwatch)) {
                            ui.item.remove();

                            ui.helper.find('input:hidden').attr('name', 'bead_id[]');
                        }
                        return true;
                    },
                    drag: function (event, ui) {
                        if (!window.tomUISortStart) {
                            ui.helper.appendTo('body');
                        }
                    }
                });

            /*this.els.$pendantSwatch.droppable({
                tolerance  : 'pointer',
                cursor     : 'pointer',
                drop: function(event, ui) {
                    console.log( ui, this );
                },
                accept: '.' + PENDANT_ITEM_CLASS
            });*/

            this.els.$findingSwatch.droppable({
                drop: function(event, ui) {
                    $(this)
                        .empty().append(ui.draggable.clone().attr('style', ''));
                    $(this).removeClass('drop--success');

                    initDragging(that.els.$findingSwatch, FINDING_ITEM_CLASS);
                },
                accept: function(el) {
                    return el.hasClass(FINDING_ITEM_CLASS);
                },
                over: function( a, b ) {
                    if (b.draggable.hasClass(FINDING_ITEM_CLASS)) {
                        $(this).addClass('drop--success');
                    }
                },
                out: function( a, b ) {
                    $(this).removeClass('drop--success');
                }
            });

            this.els.$pendantSwatch.droppable({
                drop: function(event, ui) {
                    var $appendEl = ui.draggable.clone().attr('style', '')
                        .find('input:hidden').attr('name', 'pendant_id[]').end();

                    if (ui.draggable.parent().is(that.els.$beadsSwatch)) {
                        ui.draggable.remove();
                    }

                    $(this)
                        .empty()
                        .append($appendEl);

                    $(this).removeClass('drop--success');

                    initDragging(that.els.$pendantSwatch, PENDANT_ITEM_CLASS);
                },
                accept: function(el) {
                    return el.hasClass(PENDANT_ITEM_CLASS);
                },
                over: function( a, b ) {
                    if (b.draggable.hasClass(PENDANT_ITEM_CLASS)) {
                        $(this).addClass('drop--success');
                    }
                },
                out: function( a, b ) {
                    $(this).removeClass('drop--success');
                }
            });

            function initDragging(element, itemsClass) {
                setTimeout(function() {
                    var settingsObj = {
                        helper: 'clone',
                        appendTo: document.body,
                        zIndex: 9999,
                        tolerance  : 'pointer',
                        cursor     : 'pointer',
                        handle: false,
                        start: function() {
                            $(this).hide();
                        },
                        stop: function () {
                            $(this).show();
                        }

                    };

                    if (element.is(that.els.$pendantSwatch)) {
                        settingsObj.connectToSortable = '#sortingSwatch';
                        settingsObj.drag = function (event, ui) {
                            if (!window.tomUISortStart) {
                                ui.helper.appendTo('body');
                            }
                        }
                    }

                    element
                        .find('.' + itemsClass)
                        .removeClass('pot')
                        .draggable(settingsObj);
                }, 10);
            }

            initDragging(this.els.$findingSwatch, FINDING_ITEM_CLASS);
            initDragging(this.els.$pendantSwatch, PENDANT_ITEM_CLASS);

            this.els.$delete.droppable({
                drop: function(event, ui) {
                    if (!ui.draggable.hasClass('pot')) {
                        ui.draggable.remove();
                        app.els.$delete.addClass('delete--success');
                        setTimeout(function() {
                            app.els.$delete.removeClass('delete--success');
                        }, 200);
                    }
                },
                over: function(event, ui) {
                    if (!ui.draggable.hasClass('pot')) {
                        app.els.$delete.addClass('delete--success');
                    }
                },
                out: function() {
                    app.els.$delete.removeClass('delete--success');
                }
            });

            this.els.$clearBeads.click(function() {
                app.els.$beadsSwatch.empty();
            });
        },
        gatherElements: function () {
            this.els = {};

            this.els.$footer = $('#footer');
            this.els.$drawer = $('#beadSlider');
            this.els.$beadsSwatch = $('#sortingSwatch');
            this.els.$pendantSwatch = $("#pendant");
            this.els.$findingSwatch = $('#finding');
            this.els.$delete = $('#sortable-delete');
            this.els.$sliderContainer = $('.slider_container');
            this.els.$clearBeads = $('#clearBeads');
        },
        getDrawerCapacity: function() {
            return Math.floor(this.els.$sliderContainer.width() / DRAWER_ITEM_WIDTH);
        },
        init: function() {
            if (this.initialized) {
                // in case of multiple initializations
                return;
            }
            this.initialized = true;

            this.gatherElements();
            this.bindEvents();
        }
    };

    $(document).ready(function() {
        app.init();

        $("#makename").keydown(function() {
            $("#makename").css("background-color", "yellow");
        });
        $("#makename").keyup(function() {
            $("#makename").css("background-color", "pink");
        });
    });


    /*
    * Popover init
    * */

    window.$popover = (function initPopover() {
        // popover HTML template
        var template = '<div class="slider-popover top loading">' +
            '<div class="arrow"></div>' +
            '<div class="slider-popover-content">' +
            '<div class="loader"></div>' +
            '<p></p>' +
            '</div>' +
            '</div>';

        var $popover = $(template).hide().appendTo('body'),
            $container = $('.slider_container'),
            $content = $popover.find('.slider-popover-content');

        // adding fancy scroll bar to the popover content area
        $content.mCustomScrollbar({
            axis : "y",
            // Fancy scroll theme, you can chose any other from this page
            // http://manos.malihu.gr/repository/custom-scrollbar/demo/examples/scrollbar_themes_demo.html
            theme: "inset-3-dark"
        });

        $('.items-list').on('click', '.f-popover-trigger', function( e ) {
            var $this = $(this),
                $parent = $this.parents('.info'),
                $draggable = $parent.find('.pot');

            e.preventDefault();

            if ($popover.data('currentlyShowing') && $popover.data('currentlyShowing').is($this))
                return;

            $popover.data('currentlyShowing', $this);

            // setting position for popover and adding it to the corresponding container
            $popover.css({
                    'bottom': $container.outerHeight() - $draggable.position().top + 12,
                    'left'  : $parent.offset().left - $container.offset().left + 4
                }).appendTo($container);

            // settings popover max height to prevent displaying outside of the screen
            $content.css({
                    'maxHeight': $draggable.offset().top - 30
                });

            // cleaning up popover content from previous item
            $content.find('p').html('');

            // updating scroll with empty content area
            $content.mCustomScrollbar("update");

            // showing loader and popover itself
            $popover.addClass('loading').show();

            // requesting popover content
            $.ajax({
                url    : $this.attr('href'),
                cache  : true,
                success: function( responseHTML ) {
                    // hiding loader
                    $popover.removeClass('loading');

                    // updating popover content and triggering scroll refresh
                    $content.find('p').html(responseHTML);
                    $content.mCustomScrollbar("update");
                }
            });

            $(document).on('mousedown.popoverClose', function( e ) {
                var $target = $(e.target);

                if (!$target.is('.popover') && !$target.parents('.slider-popover').length && !$target.is($this)) {
                    // hide popover if user clicks everywhere except popover itself
                    $popover.hide();
                    $popover.data('currentlyShowing', null);
                    $(document).off('mousedown.popoverClose');
                }
            });
        });

        return $popover;
    })();

    $(".dropdown-toggle").click(function() {
        $(".slider-popover").remove();
    });

    /*
    * Fancy scroll init
    * */

    function initScroll() {
        $(function() {
            window.updateScrollPosition = function() {
                var center, $list = $('.items-list'), $container = $('#footer .container'), $footer = $('#footer_content');
                center = ($list.outerWidth() / 2 - $footer.outerWidth() / 2 ) + 'px';
                $('.slider_container').mCustomScrollbar("scrollTo", center);
            };
            // calculating center of content block to set the initial scroll

            $(".slider_container").mCustomScrollbar({
                axis               : "x",
                // Fancy scroll theme, you can chose any other from this page
                // http://manos.malihu.gr/repository/custom-scrollbar/demo/examples/scrollbar_themes_demo.html
                theme              : "inset-3-dark",
//                autoExpandScrollbar: true,
                scrollEasing       : 'linear',/*
                advanced           : {
                    updateOnContentResize: true,
                    updateOnImageLoad    : true,
                    updateOnSelectorChange: 'li.info'
                },*/
                callbacks          : {
                    whileScrolling: function() {
                        // hides popover on scroll
                        if (window.$popover) {
                            window.$popover.hide();
                            $popover.data('currentlyShowing', null);
                        }

                    },
                    onInit        : function() {
                        // changes container visibility and overflow that are added to
                        // prevent spreading for the whole page untill fancy scroll isn't initialized

                        $('.slider_container').css({
                            'overflow'  : 'visible',
                            'visibility': 'visible'
                        });
                    }
                }
            });
        });
    }

    initScroll();
})(window, jQuery);