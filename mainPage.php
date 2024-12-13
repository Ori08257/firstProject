    <?php

    $connection = new mysqli('localhost', 'root', '', 'blugapp');

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    ?>
    
    

<html>
    <head>
        <title>Ori Posts</title>
        <style type="text/css">
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, Helvetica, sans-serif;
                background-color: #f4f4f9;
                color: #333;
            }

            #divForSearch {
                width: 100%;
                background-color: #2c3e50;
                height: 80px;
                display: flex;
                justify-content: center; 
                align-items: center;
                padding: 10px;
            }

            #searchBlog {
                border-radius: 25px;
                padding: 15px 20px;
                width: 600px; 
                font-size: 18px;
                border: none;
                outline: none;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin-left: 600px;
            }

            #btnSearch {
                padding: 15px 25px; 
                border-radius: 25px;
                font-size: 18px; 
                height: 50px; 
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-left: 15px;
                background-color: #ecf0f1;
                border: none;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            #btnSearch:hover {
                background-color: #bdc3c7;
            }

            #sec {
                display: flex;
                align-items: center;
                margin: 30px 0;
                padding: 0 20px;
            }

            h1 {
                font-size: 48px;
                color: #2c3e50;
                margin-left: 50px;
                margin-bottom: auto;
            }

            h2 {
                font-size: 48px;
                color: #2c3e50;
                text-align: center;
                margin-top: 50px;
                margin-bottom: 30px;
            }

            p {
                font-size: 20px;
                line-height: 1.8;
                color: #555;
                text-align: center;
                margin-bottom: 40px;
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }

            #btnCreat {
                border-radius: 30px;
                background-color: #1abc9c;
                width: 220px;
                height: 60px;
                font-size: 22px;
                margin: 0 auto;
                display: block;
                transition: transform 0.2s ease-in-out;
                cursor: pointer;
                border: none;
            }

            #btnCreat:hover {
                transform: translateY(-5px);
                background-color: #16a085;
            }

            #btnCreat:focus {
                outline: none;
            }

            footer {
                text-align: center;
                margin-top: 50px;
                padding: 20px;
                background-color: #2c3e50;
                color: white;
            }

            #forFixing {
                margin-top: 1000px;
            }

            #forPhp {
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-start;
                margin: 0;  
                padding: 0 20px;
                z-index: -2;
            }

            #behindDiv {
                background-color: #fff;
                border: 1px solid #e0e0e0;
                border-radius: 15px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0; 
                z-index: -2;
            }

            .blog-post:hover {
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
                transform: translateY(-5px); 
            }

            .blog-post h3 {
                font-size: 24px;
                color: #2c3e50;
                margin-bottom: 20px;
                text-align: center;
            }

            .blog-post p {
                font-size: 18px;
                color: #555;
                line-height: 1.6;
                text-align: justify;
                height: 60%;  
                overflow-y: auto; 
            }

            footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: #2c3e50;
            color: white;
            }


            #things {
            gap: 50px;
            color: rgb(255, 255, 255);
            display: flex;
            justify-content: center;
            margin-left: 300px;
            }

            a {
                color: white;
                text-decoration: none;
            }

            a:hover {
                color: rgb(2, 204, 255);
            }

            .heart-button {
                font-size: 30px;
                cursor: pointer;
                position: absolute; 
                bottom: 20px; 
                right: 20px; 
                background-color: white;
                border: none;
            }

            .comment-button {
                font-size: 30px;
                cursor: pointer;
                position: absolute; 
                bottom: 20px; 
                right: 80px; 
                background-color: white;
                border: none;
            }

            .blog-post {
                background-color: #fff;
                border: 1px solid #e0e0e0;
                border-radius: 15px;
                margin-right: auto;
                margin-left: auto;
                margin-bottom: 20px;
                padding: 30px;  
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                width: 30%; 
                height: 400px; 
                max-width: 900px; 
                position: relative;
                z-index: 1;
            }

            h4 {
                opacity: 0;
                position: absolute;
                font-size: 25px;
                color: #2c3e50;
                z-index: 3;
            }

            #sendComment {
                opacity: 0;
                position: absolute;
                margin-top: 40px;
                padding: 10px;
                border-radius: 10px;
                border: 1px solid #ccc;
                transition: all 0.3s ease;
                width: 300px;
                z-index: 3;
                font-size: 18px;
            }

            #sendComment:focus {
                outline: none;
                border: 1px solid #2c3e50;
                box-shadow: 0 0 5px rgba(44, 62, 80, 0.2);
            }

            #sendBtn {
                background-color: #1abc9c;
                color: white;
                opacity: 0;
                margin-top: 42px;
                padding: 10px;
                margin-left: 310px;
                border-radius: 10px;
                position: absolute;
                z-index: 3;
                border: none;
                cursor: pointer;
                transition: all 0.3s ease;
                display: inline-block;
                box-shadow: 3px 3px 10px rgb(64, 122, 111);
            }

            #sendBtn:hover {
                transform: translateY(-5px);
            }
            


      

        </style>
    </head>

    <body>
        <div id="divForSearch">
                <input type="text" name="search" id="searchBlog" placeholder="Search for a blog">
                <button type="submit" id="btnSearch" onClick="filterPosts(this)">Search🔎</button>
            <div id="things">
                <span><a href="mainPage.php">Home</a></span>
                <span><a href="helpPage.html">Help</a></span>
                <span><a href="#forHref">About us/creat Blog</a></span>
            </div>
        </div>
        
        <div id="sec">
            <h1>Blogs -</h1>
        </div>
        <div id="forPhp">
        <?php
            
            $query = "SELECT Title, Descript FROM blugdetails";
            $result = $connection->query($query);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    echo "<div class='blog-post'>";
                    echo "<h4 id=comments>Comments -</h4>";
                    echo "<input id=sendComment placeholder=Send a comment>";
                    echo "<button id=sendBtn>📩</button>";
                    echo "<h3 id='title'>" . $row['Title'] . "</h3>";
                    echo "<p id='descripit'>" . $row['Descript'] . "</p>";
                    echo "<button class='comment-button' id='commentBtn_' onClick='gettingDown(this)'>💬</button>";
                    echo "<button class='heart-button' id='heartBtn_' onClick='toggleHeart(this)'>🤍</button>";
                    echo "<div id='behindDiv'>";
                    echo "</div>"; 
                    echo "</div>";
                }
            } else {
                echo "<p>No blogs found.</p>";
            }
        ?>
            
            </div>
        <div id="forFixing">
            <h2>About Us</h2>
            
            <p id="forHref">
                Welcome to our blog! We are a group of passionate writers and individuals dedicated to providing you with insightful, inspiring, and high-quality content. Our goal is to offer you a rich and diverse reading experience as we share thoughts, ideas, and experiences across various topics. Whether you’re looking for information, inspiration, or simply an interesting read, we’re here to deliver the best content for you.
            </p>
            
            <p>
                For creating your own blog, click the button below.
            </p>
            
            <form action="creatBlogPage.html">
                <button id="btnCreat" type="submit">Create</button>
            </form>

            <footer>
                <p>&copy; 2024 Ori Posts. All rights reserved.</p>
            </footer>
        </div>
        
    </body>

</html>
<script>
    function toggleHeart(button) {
        if (button.textContent == "🤍") {
            button.textContent = "❤️";
        } else {
            button.textContent = "🤍";
        }
    }

    function filterPosts(button) {
    const searchTerm = document.getElementById('searchBlog').value.toLowerCase();
    
    const divList = document.getElementById('forPhp');
    const innerList = divList.querySelectorAll('.blog-post');

    let matchingPosts = [];
    innerList.forEach((div, index) => {
        var header = div.querySelector('h3');
        if (header.textContent.toLowerCase().includes(searchTerm)) {
            matchingPosts.push(div);
        }
    });

    if (matchingPosts.length > 0) {
        innerList.forEach((div) => {
            div.style.display = "none";
        });

        matchingPosts.forEach((div) => {
            div.style.display = "block";
        });
    } else {
        innerList.forEach((div) => {
            div.style.display = "block";
        });
    }
}

let isPressed = false;

function gettingDown(button) {
    const parentBlogPost = button.closest('.blog-post');
    const behindDiv = parentBlogPost.querySelector('#behindDiv');
    const title = parentBlogPost.querySelector('#title');
    const descripit = parentBlogPost.querySelector('#descripit');
    const comments = parentBlogPost.querySelector('#comments');
    const sendComment = parentBlogPost.querySelector('#sendComment');
    const sendBtn = parentBlogPost.querySelector('#sendBtn');

    if (behindDiv) {
        behindDiv.style.transition = "opacity 0.3s ease, visibility 0.3s ease"; 

        if (!isPressed) {
            behindDiv.style.opacity = "0";
            behindDiv.style.visibility = "hidden";
            behindDiv.style.pointerEvents = "none";
            title.style.display = "none"; 
            descripit.style.display = "none";
            comments.style.display = "block"; 
            sendComment.style.display = "block";
            sendBtn.style.display = "block";
            sendComment.style.opacity = "1";
            sendBtn.style.opacity = "1";
            comments.style.opacity = "1";

            comments.style.pointerEvents = "auto";  
            sendComment.style.pointerEvents = "auto";
            sendBtn.style.pointerEvents = "auto";

            isPressed = true;
        } else {
            behindDiv.style.opacity = "1";
            behindDiv.style.visibility = "visible";
            behindDiv.style.pointerEvents = "auto";
            title.style.display = "block";
            descripit.style.display = "block";
            comments.style.display = "none";
            sendComment.style.display = "none";
            sendBtn.style.display = "none";
            sendComment.style.opacity = "0";
            sendBtn.style.opacity = "0";

            comments.style.pointerEvents = "none";
            sendComment.style.pointerEvents = "none";
            sendBtn.style.pointerEvents = "none";

            isPressed = false;
        }
    } else {
        console.error('Element with ID "behindDiv" not found');
    }
}




</script>
