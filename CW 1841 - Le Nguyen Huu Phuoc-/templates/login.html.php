<h1>Log In</h1>

<?php if (isset($loginError)): ?>
    <p class="errors"><?= htmlspecialchars($loginError); ?></p>
<?php endif; ?>

<form action="login.php" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" value="Log In">
</form>