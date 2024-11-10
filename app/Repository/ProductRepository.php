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
}