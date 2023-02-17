<?php require_once('partials/head.php');

?>

    
    <div class="container">
        <div class="work-container">
            <div class="title-box">
                <h1>My work</h1>
            </div>

            <?php
            
                if (isset($_SESSION['email'])) {
                    ?>
                        <div class="work-card">
                            <h1>Actions<h1>
                            <a href="/work/add"><span class="material-symbols-outlined">add_circle</span></a>
                        </div>
                    <?php
                }
            
            ?>

            <?php foreach ( $works as $work ): ?>
                <div class="work-card">
                    <img src="public/images/projects/<?= $work->image; ?>" alt="<?= $work->title; ?>">
                    <div>
                        <h1><?= base64_decode($work->title); ?></h1>
                        <p>
                        <?= wordLimit(base64_decode($work->content), 30); ?>
                        </p>
                        <a href="/project?id=<?= $work->id; ?>">Open Project</a>
                    </div>
                    <?php
                        if (isset($_SESSION['email'])) {
                            ?>
                                <section>
                                    <a href="/project/edit?id=<?= $work->id; ?>"><span class="material-symbols-outlined">edit</span></a>
                                    <a href="/project/delete?id=<?= $work->id; ?>"><span class="material-symbols-outlined">delete</span></a>
                                </section>
                            <?php
                        }
                    ?>
                </div>
            <?php endforeach;  ?>
    </div>
    

<?php require_once('partials/footer.php'); ?>