<?php
$args = array(
    'limit' => -1,
    'status' => 'publish',
    'paginate' => true,
    'return' => 'objects',
    'orderby' => 'date',
    'order' => 'DESC',
);

$products = wc_get_products($args);


//generate random number in 1,8,15,22
$i = rand(1,4);
$i = $i * 7 - 6;

get_header();
?>
<div class="shop">
    <h1>La galerie des <span class="oeuvres">oeuvres</span> </h1>
    <input type="text" name="search" id="search">

    <div class="products">
        <?php foreach($products->products as $product) : ?>
            <div class="product <?php echo "div".$i ?>">
                <img src="<?php echo wp_get_attachment_image_src($product->get_image_id(), 'full')[0]; ?>" alt="">
                <div class="information">
                    <span class="title"><?php echo $product->get_name(); ?></span>
                    <span class="price"><?php echo $product->get_price(); ?> €</span>
                    <a href="<?php echo get_permalink($product->get_id()); ?>">Voir le produit</a>
                </div>
            </div>
        <?php $i++; endforeach; ?>
    </div> 
</div>

<?php get_footer(); ?>