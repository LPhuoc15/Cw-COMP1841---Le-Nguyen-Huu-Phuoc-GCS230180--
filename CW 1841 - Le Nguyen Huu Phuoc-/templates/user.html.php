<p><?= htmlspecialchars($totalUsers) ?> authors have been submitted to the Questions Database.</p>

<?php foreach ($user as $singleUser): ?>
    <strong><?= htmlspecialchars($singleUser['name'], ENT_QUOTES, 'UTF-8'); ?></strong>
    <a href="mailto:<?= htmlspecialchars($singleUser['email'], ENT_QUOTES, 'UTF-8'); ?>">
        <?= htmlspecialchars($singleUser['email'], ENT_QUOTES, 'UTF-8'); ?>
    </a>
    <a href="edituser.php?id=<?= htmlspecialchars($singleUser['id'], ENT_QUOTES, 'UTF-8'); ?>">Edit</a>
    <a href="deleteuser.php?id=<?= htmlspecialchars($singleUser['id'], ENT_QUOTES, 'UTF-8'); ?>">Delete</a>
    </form>
    <br>
<?php endforeach; ?>