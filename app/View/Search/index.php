<div
        class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 justify-between">
    <?php if (empty($products)): ?>
        <div class="col-span-full text-center">
            <p class="text-gray-700">Tidak ada barang yang ditemukan</p>
        </div>
    <?php else: ?>
        <?php foreach ($products as $index => $product): ?>
            <div class="max-w-[300px] aspect-square bg-white border border-gray-200 rounded-lg shadow">
                <a href="product/<?= $product->product_id; ?>">
                    <img
                            class="rounded-t-lg object-cover w-full h-24 md:h-48"
                            src="/images/products/<?= !empty($product->images) ? $product->images[0] : 'default-image.jpg'; ?>"
                            alt="<?= $product->name; ?> foto"/>
                </a>
                <div class="p-3">
                    <p class="price-title-font-size text-gray-700 price">
                        <?= $product->price; ?>
                    </p>
                    <a href="product/<?= $product->product_id; ?>">
                        <h5 class="mb-2 card-title-font-size font-bold tracking-tight text-dark-base title-product">
                            <?= $product->name; ?>
                        </h5>
                    </a>
                    <p class="description-font-size font-normal text-gray-700 description">
                        <?= $product->description; ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>