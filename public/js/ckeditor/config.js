/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	config.filebrowserBrowseUrl = 'js/kcfinder/config.php?type=files';
	config.filebrowserImageBrowseUrl = 'js/kcfinder/config.php?type=images';
	config.filebrowserFlashBrowseUrl = 'js/kcfinder/config.php?type=flash';
	config.filebrowserUploadUrl = 	'	js/kcfinder/config.php?type=files';
	config.filebrowserImageUploadUrl = 'js/kcfinder/config.php?type=images';
	config.filebrowserFlashUploadUrl = 'js/kcfinder/config.php?type=flash';
};
