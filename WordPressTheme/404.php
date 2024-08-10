<?php get_header(); ?>

<!-- パンクズ -->
<?php get_template_part('inc/breadcrumb'); ?>

<div class="error layout-error">
  <div class="error__inner inner">
    <div class="error__content">
      <h1 class="error__title">404</h1>
      <div class="error__text-wrap">
        <p class="error__text">申し訳ありません。</p>
        <p class="error__text">お探しのページが見つかりません。</p>
      </div>
      <div class="error__button">
        <a href="<?php echo esc_url(home_url('')); ?>" class="button button--white">
          <span>Page TOP</span>
        </a>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>