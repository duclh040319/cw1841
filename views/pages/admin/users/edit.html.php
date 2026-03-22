<h1>Edit user page</h1>

<form action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=users&action=update&id=<?= htmlspecialchars($user["id"]) ?>" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required value="<?= htmlspecialchars($user["username"]) ?>">
    <label for="password">Password</label>
    <input type="text" name="password" id="password" required min="6" value="<?= htmlspecialchars($user["password"]) ?>">
    <label for="role">Role</label>
    <input type="number" name="role" id="role" value="<?= htmlspecialchars($user["role"]) ?>" min="0" max="1">
    <button type="submit">Update</button>
</form>