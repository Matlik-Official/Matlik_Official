<?php require_once('partials/head.php'); 
    
?>

    <div class="container">
        <div class="project-card">
            <div class="title-box">
                <h1>Project update ( <?= base64_decode($project->title) ?> )</h1>
            </div>
            <form action="/project/edit/post" method="post" enctype="multipart/form-data">
                <input type="text" name="title" id="title" placeholder="Title" value="<?= base64_decode($project->title) ?>">
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Content"><?=  preg_replace('#<br\s*/?>#i', "", base64_decode($project->content)) ?></textarea>
                <input type="url" name="figma" id="figma" placeholder="Figma URL" value="<?= $project->figma ?>">
                <input type="url" name="github" id="github" placeholder="GitHub URL" value="<?= $project->github ?>">
                <input type="url" name="project_page" id="project_page" placeholder="Project's page URL" value="<?= $project->project_page ?>">
                <div class="form-checkbox">
                    <p title="Is it shown on the home page?">Featured?</p>
                    <input type="checkbox" name="featured" id="featured" 
                    <?php 
                        if ($project->featured == 1) {
                            echo "checked";
                        }
                    ?>
                    >
                </div>
                <div class="form-checkbox">
                    <p>Update Cover Image?</p>
                    <input type="checkbox" name="update_img" id="update_img_checkbox">
                </div>
                <div id="update_img_input" class="hidden">
                    <p>Make sure that the image size is 500 x 200px</p>
                    <input type="file" name="file[]" id="file" accept=".jpg,.jpeg,.png,.webp">
                </div>
                <input type="hidden" name="id" value="<?= $project->id ?>">
                <input type="submit" value="Update">
            </form>
        </div>
    </div>

<?php require_once('partials/footer.php'); ?>