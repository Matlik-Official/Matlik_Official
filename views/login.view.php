<?php require_once('partials/head.php'); ?>



    <div class="container">
        <div class="project-card">
            <div class="title-box">
                <h1>Log In</h1>
            </div>
            <form action="/login/check" method="post">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="submit" value="LOGIN">
            </form>
        </div>
    </div>



<?php require_once('partials/footer.php'); ?>