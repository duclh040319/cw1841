    <?php

    require __DIR__."/../config/database.php";

    function addCategory($type)
    {
        global $pdo;

        $sql = "INSERT INTO category(type) VALUES(?);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$type]);
    }

    function getAllCategories()
    {
        global $pdo;

        $sql = "SELECT * FROM category";
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll();
    }

    function getCategoryById($id)
    {
        global $pdo;

        $sql = "SELECT * FROM category WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }
    function getCategoryByType($type)
    {
        global $pdo;

        $sql = "SELECT * FROM category WHERE type=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$type]);

        return $stmt->fetch();
    }

    function updateCategory($id, $type)
    {
        global $pdo;

        $sql = "UPDATE category SET type=? WHERE id=?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$type, $id]);
    }

    function deleteCategory($id)
    {
        global $pdo;

        $sql = "DELETE FROM category WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }
