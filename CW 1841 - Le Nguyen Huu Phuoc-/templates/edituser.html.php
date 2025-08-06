<form action="" method="post">
    <input type="hidden" name="id" value="<?=htmlspecialchars($user['id']); ?>">

    <label for="name">Edit your name:</label>
    <input type="text" id="name" name="name" value="<?=htmlspecialchars($user['name']); ?>" required>

    <label for="email">Edit your email:</label>
    <input type="email" id="email" name="email" value="<?=htmlspecialchars($user['email']); ?>" required>

    <label for="password">Edit your password:</label>
    <input type="password" id="password" name="password" placeholder="Leave blank to keep current password">



    <input type="submit" name="submit" value="Save">
</form>
