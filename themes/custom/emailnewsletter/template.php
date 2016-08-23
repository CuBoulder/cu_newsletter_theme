<?php
/**
 * Implements theme_preprocess_html().
 */
function cuememo_preprocess_html(&$vars) {
  $data = array(
    '#tag' => 'meta',
    '#attributes' => array(
       'http-equiv' => 'Content-Type',
       'content' => 'text/html; charset=utf-8',
    ),
  );
  drupal_add_html_head($data, 'utf');
}

/**
 * Implements theme_preprocess_node().
 */
function emailnewsletter_preprocess_node(&$vars) {

  $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];
  $url = url('node/' . $vars['nid'], array('absolute' => TRUE, 'alias' => TRUE, 'https' => FALSE));
  $vars['node_url'] = $url;
  if ($vars['type'] == 'article') {
    $vars['content']['field_article_thumbnail'][0]['#path']['options']['absolute'] = TRUE;

    if (isset($vars['field_tags'])) {
      foreach ($vars['field_tags'] as $tid) {
        if (isset($tid['tid'])) {
          $tids[] = $tid['tid'];
        }
      }
    }
    if (isset ($tids)) {
      $terms = taxonomy_term_load_multiple($tids);
      foreach ($terms as $term) {
        if (isset($term->name)) {
          $tag = $term->name;
          if (!empty($term->field_tag_term_page_link)) {
            $new_tags[] = l($tag, $term->field_tag_term_page_link[LANGUAGE_NONE][0]['url'], array('absolute' => TRUE, 'alias' => TRUE, 'https' => FALSE));
          }
          else {
            $new_tags[] = $tag;
          }
        }
      }
      $markup = implode(' ', $new_tags);
      unset($vars['content']['field_tags']);
      $vars['content']['field_tags'][0]['#markup'] = '<p>' . $markup . '</p>';
    }
  }
}

/**
 * Implements theme_image_style().
 */
function emailnewsletter_image_style(&$vars) {
  // Determine the dimensions of the styled image.
  $dimensions = array(
    'width' => $vars['width'],
    'height' => $vars['height'],
  );

  image_style_transform_dimensions($vars['style_name'], $dimensions);

  $vars['width'] = $dimensions['width'];
  $vars['height'] = $dimensions['height'];

  // Determine the url for the styled image.
  $vars['path'] = image_style_url($vars['style_name'], $vars['path']);
  $vars['attributes']['class'] = array('image-' . $vars['style_name']);
  return theme('image', $vars);
}
