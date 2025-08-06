<h2>Mail from User</h2>
<?php if (empty($contacts)): ?>
    <p>No messages received.</p>
<?php else: ?>
    <?php foreach ($contacts as $contact): ?>
        <blockquote class="contact-message">
            <p><strong>From:</strong> <?= htmlspecialchars($contact['user_name'], ENT_QUOTES, 'UTF-8'); ?> (<?= htmlspecialchars($contact['email'], ENT_QUOTES, 'UTF-8'); ?>)</p>
            <p><strong>Sent On:</strong> <?= htmlspecialchars(date("D d M Y H:i:s", strtotime($contact['contactdate'])), ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Message:</strong></p>
            <p><?= nl2br(htmlspecialchars($contact['text'], ENT_QUOTES, 'UTF-8')); ?></p>
        </blockquote>
    <?php endforeach; ?>
<?php endif; ?>