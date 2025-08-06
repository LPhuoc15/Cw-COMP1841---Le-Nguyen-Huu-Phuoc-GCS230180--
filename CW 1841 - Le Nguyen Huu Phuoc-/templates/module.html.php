<p><?= htmlspecialchars($totalModules) ?> modules have been submitted to the Questions Database.</p>

<?php foreach ($module as $modules): ?>
    <strong><?= htmlspecialchars($modules['name'], ENT_QUOTES, 'UTF-8'); ?></strong>
    
    <a href="editmodule.php?id=<?= htmlspecialchars($modules['id'], ENT_QUOTES, 'UTF-8'); ?>">Edit</a>
    <a href="deletemodule.php?id=<?= htmlspecialchars($modules['id'], ENT_QUOTES, 'UTF-8'); ?>">Delete</a>
    </form>
    <br>
<?php endforeach; ?>