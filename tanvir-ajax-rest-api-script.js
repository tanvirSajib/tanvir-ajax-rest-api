


const getPostByRestButton = document.getElementById('tanvir-ajax-rest-api-api-button');
if (typeof (getPostByRestButton) != 'undefined' && getPostByRestButton != null) {
    getPostByRestButton.addEventListener("click", function () {
        var postsCollection = new wp.api.collections.Posts();
        postsCollection.fetch()
            .done(function (posts) {
                const textArea = document.getElementById('tanvir-ajax-rest-api-posts');
                posts.forEach(function (post) {
                   
                    textArea.append(post.title.rendered + '\n');
                })
            });

    })
}


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
            location.reload(true);
        }
    );
}


