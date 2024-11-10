<?php

namespace JackBerck\SoedTrade\Repository;

use JackBerck\SoedTrade\Domain\ProductImages;

class ProductImagesRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(ProductImages $productImages): ProductImages
    {
        $statement = $this->connection->prepare("INSERT INTO product_images (product_id, image_name) VALUES (?, ?)");
        $statement->execute([$productImages->product_id, $productImages->image_name]);
        return $productImages;
    }

    public function findByProductId(int $productId): array
    {
        $statement = $this->connection->prepare("SELECT image_id, product_id, image_name FROM product_images WHERE product_id = ?");
        $statement->execute([$productId]);

        $data = [];
        while ($rows = $statement->fetchAll(\PDO::FETCH_ASSOC)) {
            foreach ($rows as $row) {

                $img = new ProductImages();
                $img->image_id = $row['image_id'];
                $img->product_id = $row['product_id'];
                $img->image_name = $row['image_name'];

                $data[] = $img;
            }
        }

        return $data;
    }

    public function update(ProductImages $productImages): ProductImages
    {
        $statement = $this->connection->prepare("UPDATE product_images SET image_name = ? WHERE image_id = ?");
        $statement->execute([$productImages->image_name, $productImages->image_id]);
        return $productImages;
    }

    public function delete(int $imageId): void
    {
        $statement = $this->connection->prepare("DELETE FROM product_images WHERE image_id = ?");
        $statement->execute([$imageId]);
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->prepare("DELETE FROM product_images");
        $statement->execute();
    }

}