<?php
require_once "app/controllers/Controller.php";
require "app/model/Categories.php";
require "app/model/Products.php";

class DashboardController extends Controller
{
    private $users;
    private $Categories;
    private $Products;
    public function __construct()
    {

        // /** Check Session User is login or not */
        if (!isset($_SESSION["is_login"])) {
            header("Location: /auth/login");
            exit;
        }

        $this->Categories = new Categories();
        $this->Products = new Products();
        $this->users = $_SESSION["users"];
    }
    public function update_products()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo "Method Not Allowed. POST HERE";
        }
        $product_name = $_POST["productName"];
        $product_description = $_POST["productDescription"] ?? "-";
        $product_code = $_POST["productCode"];
        $price = $_POST["price"];
        $stock = $_POST["stock"];
        $status = $_POST["status"];
        $category_id = $_POST["categories"];

        if (
            empty($product_name) ||
            empty($product_description) ||
            empty($product_code) ||
            empty($price) ||
            empty($stock) ||
            empty($category_id)
        ) {
            $_SESSION['flash'] = ["message" => "Periksa Kembali Input yang Dimasukan.", "status" => 500];
            header("Location: /dashboard");
            exit;
        }
        $update = $this->Products->update(
            [
                "product_name" => $product_name,
                "product_description" => $product_description,
                "product_code" =>  $product_code,
                "price" => $price,
                "stock" => $stock,
                "status" => $status,
                "category_id" => $category_id
            ],
            $_POST["id"]
        );
        if ($update) {
            $_SESSION['flash'] = ["message" => "Produk Berhasil Diperbarui.", "status" => 200];
        } else {
            $_SESSION['flash'] = ["message" => "Gagal Memperbarui Produk.", "status" => 500];
        }
        header("Location: /dashboard");
        exit;
    }
    public function update_categories()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo "Method Not Allowed. POST HERE";
        }
        $categoryName = $_POST["categoryName"];
        if (empty($categoryName)) {
            $_SESSION['flash'] = ["message" => "Periksa Kembali Input yang Dimasukan.", "status" => 500];
            header("Location: /dashboard");
            exit;
        }
        $update = $this->Categories->update(
            [
                "category_name" => $categoryName,
            ],
            $_POST["id"]
        );
        if ($update) {
            $_SESSION['flash'] = ["message" => "Kategori Berhasil Diperbarui.", "status" => 200];
        } else {
            $_SESSION['flash'] = ["message" => "Gagal Memperbarui Kategori.", "status" => 500];
        }
        header("Location: /dashboard");
        exit;
    }
    public function delete_products()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo "Method Not Allowed. POST HERE";
        }
        $id = $_POST["id"];
        if (empty($id)) {
            $_SESSION['flash'] = ["message" => "Internal Server Error.", "status" => 500];
            header("Location: /dashboard");
            exit;
        }
        $delete = $this->Products->delete(intval($id));
        if ($delete) {
            $_SESSION['flash'] = ["message" => "Produk Berhasil Dihapus.", "status" => 200];
        } else {
            $_SESSION['flash'] = ["message" => "Gagal Menghapus Produk.", "status" => 500];
        }
        header("Location: /dashboard");
        exit;
    }
    public function delete_categories()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo "Method Not Allowed. POST HERE";
        }
        $id = $_POST["id"];
        if (empty($id)) {
            $_SESSION['flash'] = ["message" => "Internal Server Error.", "status" => 500];
            header("Location: /dashboard");
            exit;
        }
        $delete = $this->Categories->delete(intval($id));
        if ($delete) {
            $_SESSION['flash'] = ["message" => "Kategori Berhasil Dihapus.", "status" => 200];
        } else {
            $_SESSION['flash'] = ["message" => "Gagal Menghapus Kategori.", "status" => 500];
        }
        header("Location: /dashboard");
        exit;
    }
    public function add_products()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo "Method Not Allowed. POST HERE";
        }
        $product_name = $_POST["productName"];
        $product_description = $_POST["productDescription"] ?? "-";
        $product_code = $_POST["productCode"];
        $price = $_POST["price"];
        $stock = $_POST["stock"];
        $category_id = $_POST["categories"];

        if (
            empty($product_name) ||
            empty($product_description) ||
            empty($product_code) ||
            empty($price) ||
            empty($stock) ||
            empty($category_id)
        ) {
            $_SESSION['flash'] = ["message" => "Periksa Kembali Input yang Dimasukan.", "status" => 500];
            header("Location: /dashboard");
            exit;
        }

        $create = $this->Products->create(
            [
                "product_name" => $product_name,
                "product_description" => $product_description,
                "product_code" =>  $product_code,
                "price" => $price,
                "stock" => $stock,
                "category_id" => $category_id
            ]
        );

        if ($create === "duplicate") {
            $_SESSION['flash'] = ["message" => "Gagal Menambahkan Produk, Periksa Kembali Data yang Anda Masukan.", "status" => 500];
            header("Location: /dashboard");
            exit;
        }
        if ($create == true) {
            $_SESSION['flash'] = ["message" => "Produk Berhasil Ditambahkan.", "status" => 200];
            header("Location: /dashboard");
            exit;
        }
    }
    public function add_categories()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo "Method Not Allowed. POST HERE";
        }
        $categoryName = $_POST["categoryName"];
        if (empty($categoryName)) {
            $_SESSION['flash'] = ["message" => "Periksa Kembali Input yang Dimasukan.", "status" => 500];
            header("Location: /dashboard");
            exit;
        }
        $create = $this->Categories->create(["category_name" => $categoryName]);

        if ($create === "duplicate") {
            $_SESSION['flash'] = ["message" => "Gagal Menambahkan Produk, Periksa Kembali Data yang Anda Masukan.", "status" => 500];
            header("Location: /dashboard");
            exit;
        }
        if ($create == true) {
            $_SESSION['flash'] = ["message" => "Kategori Berhasil Ditambahkan.", "status" => 200];
            header("Location: /dashboard");
            exit;
        }
    }
    public function view_index()
    {

        $getAllCategories = $this->Categories->getAll();
        return $this->view("views/dashboard/dashboard.php", ["currentPath" => $this->getCurrentPath(), "users" => $this->users, "categories" => $getAllCategories]);
    }

    public function view_list_product()
    {
        $getAllCategories = $this->Categories->getAll();
        return $this->view("views/dashboard/dashboard-list-product.php", ["currentPath" => $this->getCurrentPath(), "users" => $this->users, "categories" => $getAllCategories]);
    }
}
