<h2>Contact Admin</h2>

<?php if (isset($messageSent) && $messageSent): ?>
    <p>Your message has been sent to the admin. Thank you!</p>
<?php endif; ?>

<?php if (isset($error) && !empty($error)): ?>
    <p class="errors"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>

<form action="contact.php" method="post">
    <label for="text">Message:</label>
    <textarea id="text" name="text" rows="5" required></textarea>

    <input type="submit" value="Send Message">
</form>