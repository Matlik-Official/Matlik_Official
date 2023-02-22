<?php require_once('partials/head.php'); 
    
    // p($project);
?>

    <div class="container">
        <div class="project-card">
            <div class="title-box">
                <h1>Create new work post</h1>
            </div>
            <form action="/project/add/post" method="post" enctype="multipart/form-data">
                <input type="text" name="title" id="title" placeholder="Title">
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Content"></textarea>
                <input type="url" name="figma" id="figma" placeholder="Figma URL">
                <input type="url" name="github" id="github" placeholder="GitHub URL">
                <input type="url" name="project_page" id="project_page" placeholder="Project's page URL">
                <p>Make sure that the image size is 500 x 200px</p>
                <input type="file" name="file[]" id="file" accept=".jpg,.jpeg,.png,.webp">
                <input type="submit" value="Create">
            </form>
        </div>
    </div>

<?php require_once('partials/footer.php'); ?>