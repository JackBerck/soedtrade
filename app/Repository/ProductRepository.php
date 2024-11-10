<?php

namespace JackBerck\SoedTrade\Repository;

use JackBerck\SoedTrade\Domain\Product;

class ProductRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Product $product): Product
    {
        $statement = $this->connection->prepare("INSERT INTO products(seller_id, name, price, description, `condition`, category) VALUES (?, ?, ?, ?, ?, ?)");
        $statement->execute([
            $product->seller_id,
            $product->name,
            $product->price,
            $product->description,
            $product->condition,
            $product->category
        ]);
        $product->product_id = (int)$this->connection->lastInsertId();
        return $product;
    }

    public function update(Product $product): Product
    {
        $statement = $this->connection->prepare("UPDATE products SET name = ?, price = ?, description = ?, `condition` = ?, category = ? WHERE product_id = ?");
        $statement->execute([
            $product->name,
            $product->price,
            $product->description,
            $product->condition,
            $product->category,
            $product->product_id
        ]);
        return $product;
    }

    public function findById(string $product_id): ?Product
    {
        $statement = $this->connection->prepare("SELECT product_id, seller_id, name, price, description, `condition`, category, created_at FROM products WHERE product_id = ?");
        $statement->execute([$product_id]);

        try {
            if ($row = $statement->fetch()) {
                $product = new Product();
                $product->product_id = $row['product_id'];
                $product->seller_id = $row['seller_id'];
                $product->name = $row['name'];
                $product->price = $row['price'];
                $product->description = $row['description'];
                $product->condition = $row['condition'];
                $product->category = $row['category'];
                $product->created_at = $row['created_at'];
                return $product;
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function findAll(): array
    {
        $statement = $this->connection->prepare("
        SELECT p.product_id, p.seller_id, p.name, p.price, p.description, p.condition, p.category, p.created_at, pi.image_name
        FROM products p
        LEFT JOIN product_images pi ON p.product_id = pi.product_id
    ");
        $statement->execute();

        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $data = [];
        foreach ($rows as $row) {
            // Cek apakah produk sudah ada dalam array
            if (!isset($data[$row['product_id']])) {
                $data[$row['product_id']] = new Product();
                $data[$row['product_id']]->product_id = $row['product_id'];
                $data[$row['product_id']]->seller_id = $row['seller_id'];
                $data[$row['product_id']]->name = $row['name'];
                $data[$row['product_id']]->price = $row['price'];
                $data[$row['product_id']]->description = $row['description'];
                $data[$row['product_id']]->condition = $row['condition'];
                $data[$row['product_id']]->category = $row['category'];
                $data[$row['product_id']]->created_at = $row['created_at'];
                $data[$row['product_id']]->images = []; // Inisialisasi array untuk gambar
            }

            // Tambahkan gambar ke produk
            if ($row['image_name']) {
                $data[$row['product_id']]->images[] = $row['image_name'];
            }
        }

        return array_values($data); // Mengembalikan array produk
    }
}