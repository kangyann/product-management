<?php
require_once "app/model/Model.php";

class Categories extends Model
{

    protected $data = [];
    public function getAll()
    {
        $result = mysqli_query($this->connection, "SELECT 
            c.id AS categories_id,
            c.category_name,
            
            p.id AS product_id,
            p.product_name,
            p.product_description,
            p.product_code,
            p.price,
            p.stock,
            p.status,
            p.category_id
        FROM categories c
        LEFT JOIN products p ON p.category_id = c.id
        ORDER by c.category_name");

        $data = [];
        while ($item = mysqli_fetch_assoc($result)) {
            $category_id = $item["categories_id"];

            if (!isset($data[$category_id])) {
                $data[$category_id] = [
                    "id" => $category_id,
                    "category_name" => $item["category_name"],
                    "products" => []
                ];
            }

            if (!empty($item["product_id"])) {
                $data[$category_id]["products"][] = [
                    "id" => $item["product_id"],
                    "product_name" => $item["product_name"],
                    "product_description" => $item["product_description"],
                    "product_code" => $item["product_code"],
                    "price" => $item["price"],
                    "stock" => $item["stock"],
                    "status" => $item["status"],
                    "category_id" => $item["category_id"]
                ];
            }
        }
        return array_values($data);
    }

    public function findById(int $id)
    {
        $result = mysqli_query($this->connection, "SELECT `id`,`category_name` FROM categories WHERE id = " . $id);
        while ($item = mysqli_fetch_assoc($result)) {
            $this->data[] = $item;
        }
        return $this->data;
    }
    public function findByName(string $category_name)
    {
        $result = mysqli_query($this->connection, "SELECT `id`,`category_name` FROM categories WHERE category_name = " . $category_name);
        while ($item = mysqli_fetch_assoc($result)) {
            $this->data[] = $item;
        }
        return $this->data;
    }
    public function delete(int $id)
    {
        $query = "DELETE FROM categories WHERE id = $id";
        mysqli_query($this->connection, $query);
        return mysqli_affected_rows($this->connection) > 0;
    }
    public function update(array $data, int $id)
    {
        $stmt = $this->connection->prepare(
            "UPDATE categories SET
            category_name = ? WHERE id = ?"
        );

        $stmt->bind_param(
            "si",
            $data['category_name'],
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
        $sql = "INSERT INTO categories (category_name) VALUES (?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param(
            "s",
            $data['category_name']
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
