/*
 Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
 */

//CKEDITOR.editorConfig = function( config )
//{
//    toolbar : 'Basic',
//    config.language = 'vn';
//};

CKEDITOR.editorConfig = function( config )
{
//    config.toolbar = 'MyToolbar';
    config.toolbar = 'Basic';
//    config.protectedSource.push( /<\?[\s\S]*?\?>/g );
    config.language = 'vi';
    config.filebrowserBrowseUrl = '/assets/libs/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '/assets/libs/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = '/assets/libs/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = '/assets/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '/assets/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '/assets/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

    config.toolbar_MyToolbar =
        [

            { name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
            { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
            { name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton',
                'HiddenField' ] },
            '/',
            { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
                '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
            { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
            { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
            '/',
            { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
            { name: 'colors', items : [ 'TextColor','BGColor' ] },
            { name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
        ];

};


