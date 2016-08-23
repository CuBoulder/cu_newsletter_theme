<?php if ($messages): ?>
  <div id="messages"><div class="section clearfix">
    <?php print $messages; ?>
  </div></div> <!-- /.section, /#messages -->
<?php endif; ?>

<?php
  require_once(drupal_get_path('module', 'cu_newsletter') . '/csstoinlinestyles/vendor/autoload.php');
  use \TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;
  $cssToInlineStyles = new CssToInlineStyles();

  $css = file_get_contents(drupal_get_path('theme', 'emailnewsletter') . '/css/ememo.css');
  $responsive = file_get_contents(drupal_get_path('theme', 'emailnewsletter') . '/css/responsive.css');
  $html = '<style>' . $css . '</style>' . '<style>' . $responsive . '</style>' . render($page['content']);
  //$html = str_replace("\xc2\xa0",' ',$html);
  $cssToInlineStyles->setHTML($html);
  $cssToInlineStyles->setCSS($css);

?>
<style>
  <?php //print $css; ?>
</style>

<?php

  //print render($page['content']);
  $email = $cssToInlineStyles->convert();
  $email = str_replace('src="https://', 'src="http://', $email);
  $email = str_replace('src="//', 'src="http://', $email);
  //$email = str_replace('—', '&mdash;', $email);
  //First convert the special characters to HTML-Entities using a multi-byte safe function
	//$email = mb_convert_encoding($email, 'HTML-ENTITIES', 'UTF-8');





	//Create an associative array with the entities to convert and the character to convert them to. Note: In PHP, it's not necessary to escape single quotes within double quotes, and vice-versa as you will notice below.
	$character_map = array(
  	'&lsquo;' => "'", //Left single quote
  	'&rsquo;' => "'", //Right single quote
  	'&ldquo;' => '"', //Left double quote
  	'&rdquo;' => '"', //Right double quote
	);

	//Remove all leading and trailing white space using PHP's built-in trim() function, and replace the characters defined in the $character_map array using PHP's built-in strtr() function.
	//$email = trim( strtr($email, $character_map) );
  print $email;

?>
<hr />
<textarea rows="50" style="width:100%;">
<?php
  //$html = render($page['content']);
  // fixing weird encoding of &nbsp that is inserted from wysiwyg
  print htmlentities($email, ENT_COMPAT | ENT_HTML401, 'UTF-8');
?>
</textarea>
