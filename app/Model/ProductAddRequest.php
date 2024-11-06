<?php

namespace JackBerck\SoedTrade\Model;

class ProductAddRequest
{
    public ?string $product_id = null;
    public ?string $seller_id = null;
    public ?string $name = null;
    public ?string $price = null;
    public ?string $condition = null;
    public ?string $category = null;
    public ?string $description = null;
}
