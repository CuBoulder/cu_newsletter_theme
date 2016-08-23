<?php
  global $base_url;
  $theme_path = drupal_get_path('theme', 'emailnewsletter');

  $path = $base_url . '/' . $theme_path;
?>
<?php hide($content['field_ememo_news']); ?>
<?php hide($content['field_ememo_block']); ?>
<?php hide($content['field_ememo_greeting']); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width"/>
</head>
<body>
  <div class="teaser">
		In This Issue:

	</div>
	<table class="body">
		<tr>
			<td class="center" align="center" valign="top">
				<center>
					<table class="container">
						<tr>
							<td>
								<table>
									<tr>
										<td class="title">
											<table class="row">
												<tr>
													<td class="wrapper last">
														<table class="twelve columns">
															<tr>
																<td class="seven sub-columns  content-title" style="text-align:left; vertical-align:middle;">
																	<h1><?php print $title; ?></h1>
																</td>
																<td class="five sub-columns last" style="text-align:right; vertical-align:middle;">
																  <img src="<?php print $path; ?>/images/logo-white.gif" alt=" " id="logo" />
																</td>
																<td class="expander"></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>

					<table class="container">
						<tr>
							<td>
								<table>
									<tr>
										<td class="issue">
											<table class="row">
												<tr>
													<td class="wrapper last">
														<table class="twelve columns">
															<tr>
																<td class="six sub-columns">
																	<strong><?php print $ap_date_cu_medium_date; ?></strong>
																</td>
																<td class="six sub-columns last" style="text-align:right; vertical-align:middle;">
																	<a href="<?php print $base_url . '/node/' . $node->nid; ?>" class="view-large">Email not displaying correctly? See it here</a>
																	<a href="<?php print $base_url . '/node/' . $node->nid; ?>" class="view-small ">View in browser</a>
																</td>
																<td class="expander"></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>


					<!-- start issue contents -->
					<table class="container">
						<tr>
							<td>
								<table>
									<tr>
										<td class="content">
                      <?php print render($content['field_newsletter_section']); ?>



											<!-- START AD 1 -->
                      <?php if (!empty($content['field_newsletter_ad_promo'][0])) : ?>
											<table class="row row-last ad">
												<tr>
													<td class="wrapper last">
														<table class="twelve columns">
															<tr>
																<td>
																	<?php print render($content['field_newsletter_ad_promo'][0]); ?>
																</td>
																<td class="expander"></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<!-- END AD 1 -->
                    <?php endif; ?>
									</td>
								</tr>
							</table>






							<table class="">
								<tr>
									<td>
										<table>
											<tr>
												<td class="extra">


                          <?php
                            $blocks = $content['field_newsletter_text_block'];
                            $columns = 2;
                            $chunks = array_chunk($blocks['#items'], $columns, true);
                          ?>

                          <?php
                            foreach ($chunks as $key => $chunk) :
                           ?>
                           <table class="row">
 														<tr>
                              <?php
                                foreach ($chunk as $key => $block): ?>
 															  <td class="wrapper <?php if ($key == 1) { print 'last'; } ?>">


                                  <table class="six columns">
  																	<tr>
  																		<td>
  																			<?php print render($content['field_newsletter_text_block'][$key]); ?>

  																		</td>
  																		<td class="expander"></td>
  																	</tr>
  																</table>


                              </td>
                              <?php endforeach; ?>
                              <?php
                                // Print empty column
                                for ($i = count($chunk); $i < $columns; $i++): ?>
                                  <td class="wrapper last">
                                    <table class="six columns">
    																	<tr>
    																		<td>
    																		</td>
    																		<td class="expander"></td>
    																	</tr>
    																</table>
                                  </td>
                              <?php endfor; ?>
														</tr>
													</table>
                          <?php endforeach; ?>







                          <!-- START AD 2-->
                          <?php if (!empty($content['field_newsletter_ad_promo'][1])) : ?>
    											<table class="row row ad">
    												<tr>
    													<td class="wrapper last">
    														<table class="twelve columns">
    															<tr>
    																<td>
    																	<?php print render($content['field_newsletter_ad_promo'][1]); ?>
    																</td>
    																<td class="expander"></td>
    															</tr>
    														</table>
    													</td>
    												</tr>
    											</table>
    											<!-- END AD 2 -->
                        <?php endif; ?>





												</td>
											</tr>
										</table>







										<!-- container end below -->
									</td>
								</tr>
							</table>

							<table class="">
								<tr>
									<td>

										<table>
											<tr>
												<td class="footer">
													<table class="row">
														<tr>
															<td class="wrapper last">

																<table class="twelve columns">
																	<tr>
																		<td>
                                      <center>


																			<p><strong><a href="<?php print $base_url; ?>"><?php print variable_get('site_name', ''); ?></a></strong></p>
																			<p class="copyright">&copy; Regents of the University of Colorado</p>
                                      </center>
																		</td>
																		<td class="expander"></td>
																	</tr>
																</table>



															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>

						</center>
					</td>
				</tr>
			</table>
</body>
</html>
