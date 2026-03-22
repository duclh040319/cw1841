<h1>Create review page</h1>

<form action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=reviews&action=store" method="post">
    <label for="content">Content</label>
    <input type="text" name="content" id="content" required>
    <label for="rating">Rating</label>
    <select name="rating" id="rating">
        <option value="0" selected>None</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <label for="filmId">Films</label>
    <select name="filmId" id="filmId">
        <?php foreach ($films ?? [] as $film): ?>
            <option value="<?= htmlspecialchars($film["id"]) ?>"><?= htmlspecialchars($film["title"]) ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">POST</button>
</form>