/**
 * JQuery to handle the AJAX request
 */
jQuery(document).ready(
    function ($) {
        const loadPostsButton = $('#tanvir-ajax-rest-api-ajax-button');
        if (typeof (loadPostsButton) != 'undefined' && loadPostsButton != null) {
            loadPostsButton.on(
                'click',
                function (event) {
                    $.post(
                        tanvir_learn_ajax_api_object.ajax_url,
                        {
                            'action': 'tanvir_ajax_rest_api'
                        },
                        function (posts) {
                            const textArea = $('#tanvir-ajax-rest-api-posts');
                            posts.forEach(function (post) {
                                textArea.append(post.post_title + '\n');
                            })

                        }
                    )
                }
            );
        }
    }
);


/**
 * Clear the text area button
 */

const clearPostsButton = document.getElementById('tanvir-ajax-rest-api-clear-posts');
if (typeof (clearPostsButton) != 'undefined' && clearPostsButton != null) {
    clearPostsButton.addEventListener(
        'click',
        function () {
            const textArea = document.getElementById('tanvir-ajax-rest-api-posts');
            textArea.value = '';
        }
    );
}


