<?php require_once('partials/head.php'); ?>



    
    <div class="container">

        <form action="/project/delete" method="post" class="project-card">
            <h1>Are you sure You want to delete this project? It can't be taken back.</h1>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <span class="space-y"></span>
            <input type="submit" value="Yes">
            <a href="/work" class="submit">No</a>
        </form>

        <div class="space-y"></div>

        <div class="project-card">
            <div class="title-box">
                <h1><?= base64_decode($project->title) ?></h1>
            </div>
            <div>
                <img src="/public/images/projects/<?= $project->image ?>" alt="<?= $project->title ?>">
            </div>
            <div>
                <p>
                    <?= base64_decode($project->content) ?>
                </p>
            </div>

            <div class="project-links">
                <?php
                    if ($project->project_page) {
                        ?>
                            <a href="<?= $project->project_page ?>" target="_blank">Project Page</a>
                        <?php
                    }
                ?>
                <?php
                    if ($project->github) {
                        ?>
                            <a href="<?= $project->github ?>" target="_blank">Github</a>
                        <?php
                    }
                ?>
                <?php
                    if ($project->figma) {
                        ?>
                            <a href="<?= $project->figma ?>" target="_blank">Figma</a>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>




<?php require_once('partials/footer.php'); ?>