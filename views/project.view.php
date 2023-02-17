<?php require_once('partials/head.php'); ?>



    
    <div class="container">
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