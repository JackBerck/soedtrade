<?php

namespace JackBerck\SoedTrade\Service;

use JackBerck\SoedTrade\Config\Database;
use JackBerck\SoedTrade\Domain\Product;
use JackBerck\SoedTrade\Exception\ValidationException;
use JackBerck\SoedTrade\Model\ProductAddRequest;
use JackBerck\SoedTrade\Model\ProductAddResponse;
use JackBerck\SoedTrade\Repository\ProductRepository;
use JackBerck\SoedTrade\Repository\ProductImagesRepository;
use JackBerck\SoedTrade\Domain\ProductImages;

class ProductService
{
    private ProductRepository $productRepository;
    private ProductImagesRepository $productImagesRepository;

    public function __construct(ProductRepository $productRepository, ProductImagesRepository $productImagesRepository)
    {
        $this->productRepository = $productRepository;
        $this->productImagesRepository = $productImagesRepository;
    }

    public function addProduct(ProductAddRequest $request): void
    {
        $this->validateProductAddRequest($request);

        try {
            Database::beginTransaction();

            $product = new Product();
            $product->seller_id = $request->seller_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->condition = $request->condition;
            $product->category = $request->category;
            $product->description = $request->description;

            $this->productRepository->save($product);

            if (!empty($request->images)) {
                $uploadDir = __DIR__ . "/../../public/images/products/";

                foreach ($request->images["tmp_name"] as $index => $tmp) {
                    $extension = pathinfo($request->images["name"][$index], PATHINFO_EXTENSION);
                    $imgNames = uniqid() . "." . $extension;

                    if (move_uploaded_file($tmp, $uploadDir . $imgNames)) {
                        $postImage = new ProductImages();
                        $postImage->product_id = $product->product_id;
                        $postImage->image_name = $imgNames;
                        $this->productImagesRepository->save($postImage);
                    }
                }
            }

            Database::commitTransaction();
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateProductAddRequest(ProductAddRequest $request)
    {
        if (
            $request->name == null || $request->price == null || $request->condition == null || $request->category == null || $request->description == null || trim($request->name) == "" || trim($request->price) == "" || trim($request->condition) == "" || trim($request->category) == "" || trim($request->description) == ""
        ) {
            throw new ValidationException("Nama, harga, kondisi, kategori, deskripsi, dan gambar tidak boleh kosong");
        }

        if ($request->images == null) {
            throw new ValidationException("Gambar tidak boleh kosong");
        }

        foreach ($request->images["error"] as $err) {
            if ($err !== UPLOAD_ERR_OK) {
                throw new ValidationException("Kesalahan mengunggah file");
            }
        }

        foreach ($request->images["type"] as $file) {
            $validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
            if (!in_array($file, $validTypes)) {
                throw new ValidationException("Jenis file tidak valid");
            }
        }

        foreach ($request->images["size"] as $file) {
            $maxSize = 1024 * 1024;
            if ($file > $maxSize) {
                throw new ValidationException("Ukuran file terlalu besar, ukuran maksimum adalah 1MB");
            }
        }
    }

    public function findAll(): array
    {
        return $this->productRepository->findAll();
    }
}