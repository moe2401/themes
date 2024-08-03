<div class="breadcrumb <?php if (is_404()) : ?>breadcrumb--white<?php else : ?>layout-breadcrumb decoration<?php endif; ?>">
    <div class="breadcrumb__inner inner">
        <?php if (function_exists('bcn_display')) : ?>
            <div class="about__breadcrumb">
                <div class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
                    <?php bcn_display(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>