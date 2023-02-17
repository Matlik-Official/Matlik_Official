<?php require_once('partials/head.php'); 

    $title_1 = base64_decode($title);
    
    p($title_1);
?>

    <div class="container">
        <div class="project-card">
            <div class="title-box">
                <h1>Project update ( <?= $title_1 ?> )</h1>
            </div>
            <form action="/project/edit/post" method="post" enctype="multipart/form-data">
                <input type="text" name="title" id="title" placeholder="Title" value="<?= $title_1 ?>">
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Content"><?=  preg_replace('#<br\s*/?>#i', "", base64_decode($content)) ?></textarea>
                <input type="url" name="figma" id="figma" placeholder="Figma URL" value="<?= $figma ?>">
                <input type="url" name="github" id="github" placeholder="GitHub URL" value="<?= $github ?>">
                <input type="url" name="project_page" id="project_page" placeholder="Project's page URL" value="<?= $project_page ?>">
                <div class="form-checkbox">
                    <p>Update Cover Image?</p>
                    <input type="checkbox" name="update_img" id="update_img_checkbox">
                </div>
                <div id="update_img_input" class="hidden">
                    <p>Make sure that the image size is 500 x 200px</p>
                    <input type="file" name="file[]" id="file" accept=".jpg,.jpeg,.png,.webp">
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" value="Update">
            </form>
        </div>
    </div>

<?php require_once('partials/footer.php'); ?>