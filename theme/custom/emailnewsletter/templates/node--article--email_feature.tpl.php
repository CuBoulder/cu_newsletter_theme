<?php hide($content['field_tags']); ?>
<?php hide($content['article_tags']); ?>



<table class="row">
  <tr>
    <td class="wrapper last">
      <table class="twelve columns">
        <tr>
          <td class="feature">
            <?php if(!empty($content['field_article_thumbnail'])): ?>
              <?php print render($content['field_article_thumbnail']); ?>
            <?php endif; ?>

            <h3 class="feature-title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
            <?php print render($content['body']); ?>
            <div class="tags">
              <?php print render($content['field_tags']); ?>
            </div>
          </td>
          <td class="expander"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
