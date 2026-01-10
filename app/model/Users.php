<?php

require_once "app/model/Model.php";
class User extends Model
{

    public function whereFirst(array $whereQuery)
    {

        $where = array_key_first($whereQuery);
        $data = [];
        $query = mysqli_prepare(
            $this->connection,
            "SELECT `id`,`name`, `username`, `password` FROM users WHERE $where = ?"
        );
        mysqli_stmt_bind_param($query, "s", $whereQuery[$where]);
        mysqli_stmt_execute($query);
        mysqli_stmt_bind_result($query, $id, $name, $username, $passwordhash);

        if (mysqli_stmt_fetch($query)) {
            $data = [
                'id' => $id,
                'name' => $name,
                'username' => $username,
                'password' => $passwordhash
            ];
        }
        mysqli_stmt_close($query);

        return !empty($data) ? $data : null;
    }
}
