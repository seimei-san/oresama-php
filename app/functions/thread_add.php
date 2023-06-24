<?php
$error_message = array();

if (isset($_POST["threadSubmitButton"])) {

    if (empty($_POST["title"])) {
        $error_message["title"] = "名前を入力しろ！";
    } else {
        $escaped["title"] = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
    }

    if (empty($_POST["username"])) {
        $error_message["username"] = "名前を入力しろ！";
    } else {
        $escaped["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
    }

    if (empty($_POST["body"])) {
        $error_message["body"] = "コメントを入れろ！";
    } else {
        $escaped["body"] = htmlspecialchars($_POST["body"], ENT_QUOTES, "UTF-8");
    }

    if (empty($error_message)) {
        $post_date = date("Y-m-d H:i:s");

        $pdo->beginTransaction();

        try {
            $sql = "INSERT INTO `thread` (`title`) VALUES (:title);";
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":title", $escaped["title"], PDO::PARAM_STR);

            $statement->execute();


            $sql = "INSERT INTO comment (username, body, post_date, thread_id) 
        VALUES (:username, :body, :post_date, (SELECT id FROM thread WHERE title = :title))";
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":username", $escaped["username"], PDO::PARAM_STR);
            $statement->bindParam(":body", $escaped["body"], PDO::PARAM_STR);
            $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
            $statement->bindParam(":title", $escaped["title"], PDO::PARAM_STR);

            $statement->execute();

            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
        }
    }

    header("Location: http://localhost:8080/oresama-php");
}
