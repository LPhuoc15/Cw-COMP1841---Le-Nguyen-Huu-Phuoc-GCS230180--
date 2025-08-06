<form action="" method="post" enctype="multipart/form-data">
    <label for='question'>Type your question here:</label>
    <textarea name='question' id='question' rows='3' cols='40' required></textarea>

    <label for='fileToUpload'>Choose PNG image:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" accept=".png" required />

    <label for="usersid">Select a user:</label>
    <select name="usersid" id="usersid" required>
        <option value="">-- Select a user --</option>
        <?php foreach ($users as $user): ?>
            <option value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="moduleid">Select a module:</label>
    <select name="moduleid" id="moduleid" required>
        <option value="">-- Select a module --</option>
        <?php foreach ($modules as $module): ?>
            <option value="<?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <?= htmlspecialchars($module['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type='submit' value='submit'>
</form>
