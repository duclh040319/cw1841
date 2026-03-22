<h1>Edit review page</h1>

<form action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=reviews&action=update&id=<?= htmlspecialchars($review["id"]) ?>" method="post">
    <label for="content">Content</label>
    <input type="text" name="content" id="content" required value="<?= htmlspecialchars($review["content"]) ?>">
    <label for="rating">Rating</label >
    <input type="number" name="rating" id="rating" min="1" max="5" value="<?= htmlspecialchars($review["rating"]) ?>">
    <label for="userId">UserID</label>
    <input type="text" name="userId" id="userId" value="<?= htmlspecialchars($review["userId"]) ?>">
    <label for="filmId">FilmID</label>
    <input type="text" name="filmId" id="filmId" value="<?= htmlspecialchars($review["filmId"]) ?>">
    
    <button type="submit">Update</button>
</form>