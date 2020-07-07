var portofolioPostsBtn = document.getElementById("portofolio-posts-btn");
var portofolioPostsContainer = document.getElementById("portofolio-posts-container");





if (portofolioPostsBtn) {
    document.getElementById("portofolio-posts-btn").addEventListener("click", lwp_get_post);

    function lwp_get_post() {
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('GET', magicalData.siteURL + '/wp-json/wp/v2/posts?categories=13&order=asc');
        ourRequest.onload = function () {
            if (ourRequest.status >= 200 && ourRequest.status < 400) {
                var data = JSON.parse(ourRequest.responseText);

                var ourHTMLString = '';

                for (i = 0; i < data.length; i++) {
                    ourHTMLString += '<h2>' + data[i].title.rendered + '</h2>';
                    ourHTMLString += data[i].content.rendered;
                }

                document.getElementById("portofolio-posts-container").innerHTML = ourHTMLString;
                portofolioPostsBtn.remove();

            } else {
                console.log('We connected to the server, but it returned error.');
            }
        }

        ourRequest.onerror = function () {
            console.log('connection error');
        }

        ourRequest.send();

    }
}

//quick add post ajax
var quickAddButton = document.querySelector("#quick-add-button");

if (quickAddButton) {
    quickAddButton.addEventListener("click", function () {
        var ourPostData = {
            "title": document.querySelector('.admin-quick-add [name="title"]').value,
            "content": document.querySelector('.admin-quick-add [name="content"]').value,
            "status": "publish"
        }

        var createPost = new XMLHttpRequest();
        createPost.open('POST', magicalData.siteURL + '/wp-json/wp/v2/posts');
        createPost.setRequestHeader("X-WP-Nonce", magicalData.nonce);
        createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        createPost.send(JSON.stringify(ourPostData));
        createPost.onreadystatechange = function () {
            if (createPost.readyState == 4) {
                if (createPost.status == 201) {
                    document.querySelector('.admin-quick-add [name="title"]').value = '';
                    document.querySelector('.admin-quick-add [name="content"]').value = '';
                } else {
                    alert('Error - Try Again');
                }
            }
        }
    });
}


