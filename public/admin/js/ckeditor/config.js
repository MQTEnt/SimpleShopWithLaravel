/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';


	//Them/Xoa cac button co trong giao dien CKEditor
	//VD: Xoa button can giua 
	config.removeButtons = 'Preview,Print,Templates,Templates,Source,Checkbox,Button,Textarea,Select,Form,Radio,TextField,HiddenField,Flash,ShowBlocks,Maximize,UIColor,CreateDiv,About,Font,Format';
	//Tham khao them cac button tai http://ckeditor.com/comment/123266#comment-123266
};
