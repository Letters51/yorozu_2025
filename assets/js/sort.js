jQuery(function ($) {
    let sort_bottons = $('.sort-button');
    let sort_bottons_all = $('.sort-button--all');
    let sort_bottons_works = $('.sort-button-works');
    let sort_bottons_news = $('.sort-button-news');
    let fetch_more = $('.fetch-more');
    let posts_wrapper = $('.works-list-wrapper');
    let current_item = $('.column-menu-list__item');
    var cat;

    /*
     * Class change category
     */
    function change_cat(post_type, cat, container, action) {
        data = {
            'action': action,
            'counter': 0,
            'cattype': cat,
            'post_type': post_type,
            'nonce': js_globals.nonce
        };
        $.ajax({ // you can also use $.post here
            url: js_globals.ajax_url, // AJAX handler
            data: data,
            type: 'POST',
            dataType: 'json',
            timeout: 10000,
            success: function (data) {
                if (data) {
                    $(container).html(data[0]);
                } else {
                    $(container).html('現在は投稿がありません');
                }
                if (data[1] == false) {
                    fetch_more.addClass('hide');
                }
                fetch_more.data('page', 1);

                if (data[1] == false) {
                    fetch_more.addClass('hide');
                } else {
                    fetch_more.removeClass('hide');
                }
                posts_wrapper.hide().fadeIn();
            }
        }).fail(function () {
            console.log('fail');
        });
    }

    sort_bottons.each(function (index) {
        $(this).click(function () {
            current_item.removeClass('current');
            $(this).parent().addClass('current');
            cat = $(this).data('cat');
            change_cat('post', cat, '#posts-body', 'get_more_post');
            fetch_more.data('cat', cat);
        })
    });

    sort_bottons_news.each(function (index) {
        $(this).click(function () {
            $('.sort-button-news.current').removeClass('current');
            $(this).parent().addClass('current');
            cat = $(this).data('cat');
            change_cat('seminar', cat, '#posts-body', 'get_more_post_ct_01');
            fetch_more.data('cat', cat);
        })
    });

    sort_bottons_works.each(function (index) {
        $(this).click(function () {
            $('.sort-button-works.current').removeClass('current');
            $(this).parent().addClass('current');
            cat = $(this).data('cat');
            change_cat('casestudy', cat, '#posts-body', 'get_more_post_ct_02');
            fetch_more.data('cat', cat);
        })
    });

    /*
     * Class FetchMorePost
     */
    function fetchMorePost() {
        this.start = function (post_type, btn, append_to, action) {
            $(btn).click(function (e) {
                e.preventDefault();
                $this = $(this);
                cat = $this.data('cat');
                var counter = $this.data('page')
                var nextpage;
                data = {
                    'action': action,
                    'counter': counter,
                    'post_type': post_type,
                    'cattype': cat,
                    'nonce': js_globals.nonce
                };
                $.ajax({ // you can also use $.post here
                    url: js_globals.ajax_url, // AJAX handler
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    timeout: 10000,
                    success: function (data) {
                        if (data) {
                            $(append_to).append(data[0]);
                        } else {
                            $(append_to).append('これ以上投稿がありません。');
                        }
                        nextpage = $this.data('page') + 1
                        $this.data('page', nextpage);

                        if (data[1] == false) {
                            fetch_more.addClass('hide');
                        } else {
                            fetch_more.removeClass('hide');
                        }
                    }
                }).fail(function () {
                    console.log('fail');
                });
            });
            return false;
        }
    }
    var fetch_more_posts = new fetchMorePost();
    fetch_more_posts.start('seminar', '#fetch-more-button-news', '#posts-body', 'get_more_post_ct_01');

    var fetch_more_works = new fetchMorePost();
    fetch_more_works.start('casestudy', '#fetch-more-button-works', '#posts-body', 'get_more_post_ct_02');

    /*
     * sort as page loaded
     */
    let pageURL = window.location.href;

    function initialize_post_list(post_type, func) {
        let queryString = window.location.search;
        if (queryString) {
            var lastURLSegment = queryString.replace('?term=', '');
            console.log(lastURLSegment);
        } else {
            if (pageURL.substr(-1) == '/') {
                pageURL = pageURL.slice(0, -1);
            }
            var lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
            if (lastURLSegment == 'casestudy' || lastURLSegment == 'seminar') {
                lastURLSegment = '';
                sort_bottons_all.parent().addClass('current')
            } else {
                sort_bottons.each(function () {
                    if ($(this).data('cat') == lastURLSegment) {
                        $(this).parent().addClass('current');
                    }
                });
            }
        }
        change_cat(post_type, lastURLSegment, '#posts-body', func);
        fetch_more.data('cat', lastURLSegment);
        console.log('sorted');
        return false;
    }

    if (pageURL.includes('seminar')) {
        let initialize = initialize_post_list('seminar', 'get_more_post_ct_01');
    } else if (pageURL.includes('casestudy')) {
        let initialize = initialize_post_list('casestudy', 'get_more_post_ct_02');
    }
});