<div class="col-md-7 mn-cell">
    <div class="heading style3">
        <h4 class="uppercase"><?php echo __('Inspirational'); ?> <span class="main-color"><?php echo __('Quotes'); ?></span></h4>
    </div>
    <div class="testimonials testimonials-1 vertical-slider m-t-3" data-slides_count="4" data-scroll_amount="1" data-slider-speed="300" data-slider-infinite="0" data-slider-dots="0" data-slider-arrows="1">
        <?php foreach ($featuredQuotes as $quote) : ?>
        <div>
            <div class="testimonials-img main-border">
                <?php echo $this->Html->image(
                        $quote['Quote']['image_url'] ?: '/img/default-quote.jpg',
                        array('width' => 70)
                ); ?>
            </div>
            <div class="testimonials-bg">
                <p><?php echo $quote['Quote']['quote']; ?></p>
                <div class="testimonials-name">
                    <span class="main-color">- <?php echo $quote['Quote']['by']; ?></span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="col-md-5 hidden-md"></div>