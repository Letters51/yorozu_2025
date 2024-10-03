jQuery(function ($) {

    /*
     * Class FetchMorePost
     */
    function fetchMorePost() {
        this.offset_counter = function () {
            var counter = 0;
            return function () {
                counter += 1;
                return counter;
            }
        };

        this.start = function (post_type, btn) {
            var add_offset = this.offset_counter();
            $(btn).click(function (e) {
                e.preventDefault();
                var button = $(this),
                    data = {
                        'action': localize.action,
                        'counter': add_offset(),
                        'post_type': post_type,
                        'nonce': localize.nonce
                    };
                $.ajax({ // you can also use $.post here

                    url: localize.ajax_url, // AJAX handler
                    data: data,
                    type: 'POST',
                    dataType: 'html',
                    timeout: 10000,
                    success: function (data) {
                        if (data) {
                            jQuery(".post-body").append(data);
                        } else {
                            button.text('これ以上の記事はありません'); // if no data, remove the button as well
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
    fetch_more_posts.start('post', '.fetch_more_post');

    var fetch_more_seminar = new fetchMorePost();
    fetch_more_seminar.start('seminar', '.fetch_more_seminar');

    var fetch_more_casestudy = new fetchMorePost();
    fetch_more_casestudy.start('casestudy', '.fetch_more_casestudy');


    /*
     * Class switch category
     */
    function switchCategory(btn) {
        this.start = function () {
            $btn = $(btn);
            $btn.click(function (e) {
                e.preventDefault();
                var $this = $(this);
                var cp = $this.data('cp');
                var term_label = $this.data('termlabel');
                var taxonomy = $this.data('texonomy');
                var term = $this.data('term');

                var target = '.' + taxonomy + '-' + term;
                var $target_elm = $(target);

                var number_of_posts = $target_elm.length;

                data = {
                    'action': localize.action_switch_category,
                    'cp': cp,
                    'termlabel': term_label,
                    'taxonomy': taxonomy,
                    'term': term,
                    'number_of_posts': number_of_posts,
                    'nonce': localize.nonce_switch_category
                };

                $.ajax({ // you can also use $.post here
                    url: localize.ajax_url, // AJAX handler
                    data: data,
                    type: 'POST',
                    dataType: 'html',
                    timeout: 10000,
                    success: function (data) {
                        console.log(data);
                        $readmore = $(".readmore-button")
                        $readmore.html(data);
                        var $all_elm = $('article');
                        console.log($this.hasClass('show-all-cat'));
                        if ($this.hasClass('show-all-cat')) {
                            $all_elm.hide();
                            $all_elm.fadeIn();

                        } else {

                            $all_elm.hide();
                            $target_elm.fadeIn();
                        }
                    }
                }).fail(function () {
                    console.log('fail');
                });
            });
            return false;
        }
    }




    var switch_category = new switchCategory('.cat-switcher');
    switch_category.start();

});