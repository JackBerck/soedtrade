<?php

namespace JackBerck\SoedTrade\Domain;

class ProductImages
{
    public ?int $image_id = null;
    public int $product_id;
    public string $image_name;
}