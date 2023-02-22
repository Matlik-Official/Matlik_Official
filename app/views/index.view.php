<?php require_once('partials/head.php'); ?>



    <div class="container">
        <div class="about">
            <img src="/public/images/Logo.png" alt="">
            <h1>Hi!</h1>
            <p>
                I'm Karl, and I'm also front-end developer. 
                <br>
                I also can work on back-end.
            </p>
        </div>

        <div class="space-y"></div>
        <div class="space-y"></div>
        <div class="space-y"></div>

        <div class="work-container">
            <div class="title-box">
                <h2>Some work that I have done.</h1>
            </div>
            <?php foreach ( $featured as $Feature ): ?>
                <div class="work-card">
                    <img src="public/images/projects/<?= $Feature->image; ?>" alt="<?= $Feature->title; ?>">
                    <div>
                        <h1><?= base64_decode($Feature->title); ?></h1>
                        <p>
                        <?= wordLimit(base64_decode($Feature->content), 30); ?>
                        </p>
                        <a href="/project?id=<?= $Feature->id; ?>">Open Project</a>
                    </div>
                </div>
            <?php endforeach;  ?>
        </div>
    </div>



<?php require_once('partials/footer.php'); ?>