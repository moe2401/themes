<div class="breadcrumb <?= is_404() ? 'breadcrumb--white' : 'layout-breadcrumb decoration' ?>">
    <div class="breadcrumb__inner inner">
        <?php if (function_exists('bcn_display')) { ?>
            <div class="about__breadcrumb">
                <div class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
                    <?php bcn_display(); ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>