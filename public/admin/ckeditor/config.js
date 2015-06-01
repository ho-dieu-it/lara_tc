/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	var _FileBrowserLanguage	= 'php' ;	// asp | aspx | cfm | lasso | perl | php | py
	var _QuickUploadLanguage	= 'php' ;	// asp | aspx | cfm | lasso | perl | php | py
	// Don't care about the following two lines. It just calculates the correct connector
// extension to use for the default File Browser (Perl uses "cgi").
var _FileBrowserExtension = _FileBrowserLanguage == 'perl' ? 'cgi' : _FileBrowserLanguage ;
var _QuickUploadExtension = _QuickUploadLanguage == 'perl' ? 'cgi' : _QuickUploadLanguage ;
	$basePath=CKEDITOR.basePath+'plugins/';
	// Define changes to default configuration here. For example:
	config.filebrowserBrowseUrl =$basePath+'filemanager/browser/default/browser.html?Connector='+$basePath+'filemanager/connectors/php/connector.php';
	config.filebrowserImageBrowseUrl = $basePath+'filemanager/browser/default/browser.html?Type=Image&Connector='+$basePath+'filemanager/connectors/php/connector.php';
	config.filebrowserFlashBrowseUrl =$basePath+'filemanager/browser/default/browser.html?Type=Flash&Connector='+$basePath+'filemanager/connectors/php/connector.php';
	
	config.filebrowserUploadUrl = $basePath + 'filemanager/connectors/' + _QuickUploadLanguage + '/upload.' + _QuickUploadExtension ;
	config.filebrowserImageUploadUrl=$basePath + 'filemanager/connectors/' + _QuickUploadLanguage + '/upload.' + _QuickUploadExtension + '?Type=Image' ;
	config.filebrowserFlashUploadUrl=$basePath + 'filemanager/connectors/' + _QuickUploadLanguage + '/upload.' + _QuickUploadExtension + '?Type=Flash' ;
//FCKConfig.LinkUploadAllowedExtensions	= ".(7z|aiff|asf|avi|bmp|csv|doc|fla|flv|gif|gz|gzip|jpeg|jpg|mid|mov|mp3|mp4|mpc|mpeg|mpg|ods|odt|pdf|png|ppt|pxd|qt|ram|rar|rm|rmi|rmvb|rtf|sdc|sitd|swf|sxc|sxw|tar|tgz|tif|tiff|txt|vsd|wav|wma|wmv|xls|xml|zip)$" ;			// empty for all
//FCKConfig.LinkUploadDeniedExtensions	= "" ;	// empty for no one
	//config.language = 'fr';
	//config.uiColor = '#AADC6E';
};
