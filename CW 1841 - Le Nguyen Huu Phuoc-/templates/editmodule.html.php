<form action="" method="post">
    <input type="hidden" name="id" value="<?=htmlspecialchars($module['id']); ?>">

    <label for="name">Edit your name:</label>
    <input type="text" id="name" name="name" value="<?=htmlspecialchars($module['name']); ?>" >

    <input type="submit" name="submit" value="Save">
</form>
