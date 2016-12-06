<?php if ($queryObject->max_num_pages > 1) : ?>

    <nav class="prev-next-wrap row">
        <div class="col-xs-6 prev">
            <?php previous_posts_link('Prev'); ?>
        </div>
        <div class="col-xs-6 next">
            <?php next_posts_link('Next'); ?>
        </div>
    </nav>

<?php endif; ?>


