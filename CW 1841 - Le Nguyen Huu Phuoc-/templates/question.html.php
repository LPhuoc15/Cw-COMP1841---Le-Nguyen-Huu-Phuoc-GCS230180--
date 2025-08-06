<?php foreach ($posts as $post): ?>
    <blockquote>
        <?= htmlspecialchars($post['question'], ENT_QUOTES, 'UTF-8'); ?>

        <p><?= htmlspecialchars(date("D d M Y", strtotime($post['postdate'])), ENT_QUOTES, 'UTF-8'); ?></p>
        
        <?php if (!empty($post['image'])): ?>
            <img src="uploads/<?= htmlspecialchars($post['image'], ENT_QUOTES, 'UTF-8'); ?>" style="height: 65px;">
        <?php endif; ?>

        <p><strong>Module:</strong> <?= htmlspecialchars($post['module_name'], ENT_QUOTES, 'UTF-8'); ?></p>

        (by <a href="mailto:<?= htmlspecialchars($post['email'], ENT_QUOTES, 'UTF-8'); ?>">
            <?= htmlspecialchars($post['user_name'], ENT_QUOTES, 'UTF-8'); ?>
        </a>)
        
    </blockquote>
<?php endforeach; ?>
