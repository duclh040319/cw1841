<h1>Create user page</h1>

<form action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=users&action=store" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
    <label for="password">Password</label>
    <input type="text" name="password" id="password" required min="6" >
    <button type="submit">CREATE</button>
</form>