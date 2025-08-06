<form action="" method="post"enctype="multipart/form-data">
    <input type="hidden" name="postsid" value="<?=$post['id'];?>">

    <label for="question">Edit your question text:</label>
    <textarea id="question" name="question" rows="5" cols="40"><?= isset($post['question']) ? htmlspecialchars($post['question']) : '' ?></textarea><br>

     <label for='fileToUpload'>Choose PNG image (or leave blank to keep existing):</label>
    <input type="file" name="fileToUpload" id="fileToUpload" accept=".png" />
    

    <input type="submit" name="submit" value="Save">
</form>