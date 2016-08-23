<?php hide($content['field_tags']); ?>
<?php hide($content['article_tags']); ?>


<table class="row">
  <tr>
    <td class="wrapper last">
      <table class="twelve columns">
        <tr>
          <?php if (!empty($content['field_article_thumbnail'])): ?>
          <td class="three sub-columns ">
            <?php print render($content['field_article_thumbnail']); ?>
          </td>
          <td class="nine sub-columns ">
          <?php else: ?>
          <td class="twelve sub-columns ">
          <?php endif; ?>
            <h3 class="teaser-title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
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
