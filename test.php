<?php
$url = str_replace("index.php", "images", $_SERVER['SCRIPT_URI']);

$to_name = 'Umair Qureshi';
$to_email = 'umair_kureshi@hotmail.com';
$subject = '';
$body = '';

if(isset($_POST['subject']) && isset($_POST['editor1'])) {

if(isset($_POST['subject'])) {
  $subject = $_POST['subject'];
}

if(isset($_POST['editor1'])) {
	$body = $_POST['editor1'];
}

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: '.$to_name.' <'.$to_email.'>' . "\r\n";
$headers .= 'From: MoboTop <newsletter@mobotop.com>' . "\r\n";

// Send an Email
mail($to_email, $subject, $body, $headers);
}
?>

<!DOCTYPE html>
<!--
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
-->
<html>
<head>
	<title>Email Sender</title>
	<meta charset="utf-8">
	<meta name="ckeditor-sample-required-plugins" content="sourcearea">
	<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/samples/sample.js"></script>
	<link href="ckeditor/samples/sample.css" rel="stylesheet">
	<style type="text/css">
    @font-face {
    font-family: 'dandelion';
    src: url('images/dandelion.ttf');
    src: url('images/dandelion.ttf') format('embedded-opentype'),
         url('images/dandelion.ttf') format('woff'),
         url('images/dandelion.ttf') format('truetype'),
         url('images/dandelion.ttf') format('svg');
    font-weight: normal;
    font-style: normal;
    }
    
    </style>
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<p>
			<label for="editor1">
				<strong>Subject:</strong>
			</label>
			<input type="text" name="subject" id="subject" size="80" value="" />
		</p>

		<p>
			<label for="editor1">
				Body:
			</label>
			<textarea cols="80" id="editor1" name="editor1" rows="10"><span style="font-weight:bold;text-decoration:underline;">dfdsf</span><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><?php include('email_body.php');?></textarea>
			<script>

				CKEDITOR.replace( 'editor1', {
					/*
					 * Style sheet for the contents
					 */
					contentsCss: 'assets/outputxhtml/outputxhtml.css',

					/*
					 * Special allowed content rules for spans used by
					 * font face, size, and color buttons.
					 *
					 * Note: all rules have been written separately so
					 * it was possible to specify required classes.
					 */
					extraAllowedContent: 'span(!FontColor1);span(!FontColor2);span(!FontColor3);' +
						'span(!FontColor1BG);span(!FontColor2BG);span(!FontColor3BG);' +
						'span(!FontComic);span(!FontCourier);span(!FontTimes);' +
						'span(!FontSmaller);span(!FontLarger);span(!FontSmall);span(!FontBig);span(!FontDouble)',

					/*
					 * Core styles.
					 */
					coreStyles_bold: {
						element: 'span',
						attributes: { 'class': 'Bold' }
					},
					coreStyles_italic: {
						element: 'span',
						attributes: { 'class': 'Italic' }
					},
					coreStyles_underline: {
						element: 'span',
						attributes: { 'class': 'Underline' }
					},
					coreStyles_strike: {
						element: 'span',
						attributes: { 'class': 'StrikeThrough' },
						overrides: 'strike'
					},
					coreStyles_subscript: {
						element: 'span',
						attributes: { 'class': 'Subscript' },
						overrides: 'sub'
					},
					coreStyles_superscript: {
						element: 'span',
						attributes: { 'class': 'Superscript' },
						overrides: 'sup'
					},

					/*
					 * Font face.
					 */

					// List of fonts available in the toolbar combo. Each font definition is
					// separated by a semi-colon (;). We are using class names here, so each font
					// is defined by {Combo Label}/{Class Name}.
					font_names: 'dandelion;Comic Sans MS/FontComic;Courier New/FontCourier;Times New Roman/FontTimes',

					// Define the way font elements will be applied to the document. The "span"
					// element will be used. When a font is selected, the font name defined in the
					// above list is passed to this definition with the name "Font", being it
					// injected in the "class" attribute.
					// We must also instruct the editor to replace span elements that are used to
					// set the font (Overrides).
					font_style: {
						element: 'span',
						attributes: { 'class': '#(family)' },
						overrides: [
							{
								element: 'span',
								attributes: {
									'class': /^Font(?:Comic|Courier|Times)$/
								}
							}
						]
					},

					/*
					 * Font sizes.
					 */
					fontSize_sizes: 'Smaller/FontSmaller;Larger/FontLarger;8pt/FontSmall;14pt/FontBig;Double Size/FontDouble',
					fontSize_style: {
						element: 'span',
						attributes: { 'class': '#(size)' },
						overrides: [
							{
								element: 'span',
								attributes: {
									'class': /^Font(?:Smaller|Larger|Small|Big|Double)$/
								}
							}
						]
					} ,

					/*
					 * Font colors.
					 */
					colorButton_enableMore: false,

					colorButton_colors: 'FontColor1/FF9900,FontColor2/0066CC,FontColor3/F00,FontColor4/FFFFFF',
					colorButton_foreStyle: {
						element: 'span',
						attributes: { 'class': '#(color)' },
						overrides: [
							{
								element: 'span',
								attributes: {
									'class': /^FontColor(?:1|2|3)$/
								}
							}
						]
					},

					colorButton_backStyle: {
						element: 'span',
						attributes: { 'class': '#(color)BG' },
						overrides: [
							{
								element: 'span',
								attributes: {
									'class': /^FontColor(?:1|2|3)BG$/
								}
							}
						]
					},

					/*
					 * Indentation.
					 */
					indentClasses: [ 'Indent1', 'Indent2', 'Indent3' ],

					/*
					 * Paragraph justification.
					 */
					justifyClasses: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull' ],

					/*
					 * Styles combo.
					 */
					stylesSet: [
						{ name: 'Strong Emphasis', element: 'strong' },
						{ name: 'Emphasis', element: 'em' },

						{ name: 'Computer Code', element: 'code' },
						{ name: 'Keyboard Phrase', element: 'kbd' },
						{ name: 'Sample Text', element: 'samp' },
						{ name: 'Variable', element: 'var' },

						{ name: 'Deleted Text', element: 'del' },
						{ name: 'Inserted Text', element: 'ins' },

						{ name: 'Cited Work', element: 'cite' },
						{ name: 'Inline Quotation', element: 'q' }
					]
				});

			</script>
		</p>
		<p>
			<input type="submit" value="Send">
		</p>
	</form>
</body>
</html>
