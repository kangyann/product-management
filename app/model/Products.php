<?php
require_once "app/model/Model.php";
class Products extends Model
{
    protected $data = [];
    public function delete(int $id)
    {
        $query = "DELETE FROM products WHERE id = $id";
        mysqli_query($this->connection, $query);
        return mysqli_affected_rows($this->connection) > 0;
    }
    public function findById(int $id)
    {
        $result = mysqli_query($this->connection, "SELECT `id`,`product_name`,`product_description`,`product_code`,`price`,`stock`,`category_id`,`status` FROM products WHERE id = " . $id);
        while ($item = mysqli_fetch_assoc($result)) {
            $this->data[] = $item;
        }
        return $this->data;
    }
    public function update(array $data, int $id)
    {
        $stmt = $this->connection->prepare(
            "UPDATE products SET
            product_name = ?,
            product_description = ?,
            product_code = ?,
            price = ?,
            stock = ?,
            status = ?,
            category_id = ?
        WHERE id = ?"
        );

        $stmt->bind_param(
            "sssiiiii",
            $data['product_name'],
            $data['product_description'],
            $data['product_code'],
            $data['price'],
            $data['stock'],
            $data['status'],
            $data['category_id'],
            $id
        );

        try {
            return $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                return "duplicate";
            }
            throw $e;
        }
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO products 
(product_name, product_description, product_code, price, stock, category_id)
VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param(
            "sssiii",
            $data['product_name'],
            $data['product_description'],
            $data['product_code'],
            $data['price'],
            $data['stock'],
            $data['category_id']
        );

        try {
            return $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                return "duplicate";
            }
            throw $e;
        }
    }
}
