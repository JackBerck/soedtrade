<?php

namespace JackBerck\SoedTrade\Domain;

class Product
{
    public ?int $product_id = null;
    public string $seller_id;
    public string $name;
    public string $price;
    public string $condition;
    public string $category;
    public string $description;
    public string $created_at;
}