<?php require_once('partials/head.php'); ?>

    <div class="container">

        <?php
        
            if (isset($_GET['sent'])) {
                ?>
                    <div class="project-card">
                        <h1>Info sent</h1>
                    </div>
                <?php
            }

        ?>

        <div class="space-y"></div>

        <div class="project-card">
            <div class="title-box">
                <h1>Contact Me</h1>
            </div>
            <form action="/contact/post" method="post">
                <input type="text" name="first_name" id="first_name" placeholder="First Name">
                <input type="text" name="last_name" id="last_name" placeholder="Last Name">
                <input type="email" name="email" id="email" placeholder="Email">
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Letter"></textarea>
                <input type="submit" value="Send">
            </form>
        </div>
    </div>

<?php require_once('partials/footer.php'); ?>