/**
 * Copyright (c) 2014-2016, CKSource - Frederico Knabben. All rights reserved.
 * Licensed under the terms of the MIT License (see LICENSE.md).
 *
 * Basic sample plugin inserting abbreviation elements into the CKEditor editing area.
 *
 * Created out of the CKEditor Plugin SDK:
 * http://docs.ckeditor.com/#!/guide/plugin_sdk_sample_1
 */

// Register the plugin within the editor.
CKEDITOR.plugins.add('simpleselect', {
    // Register the icons.
    icons: 'abbr',
    // The plugin initialization logic goes inside this method.
    init: function (editor) {

        // Define an editor command that opens our dialog window.
        editor.addCommand('simpleselect', new CKEDITOR.dialogCommand('simpleselectDialog'));

        // Create a toolbar button that executes the above command.
        editor.ui.addButton('Select', {
            // The text part of the button (if available) and the tooltip.
            label: 'Insert Placeholder',
            // The command to execute on click.
            command: 'simpleselect',
            // The button placement in the toolbar (toolbar group name).
            toolbar: 'insert',
            icon: this.path + 'icons/abbr.png'
        });

        // Register our dialog file -- this.path is the plugin folder path.
        CKEDITOR.dialog.add('simpleselectDialog', this.path + 'dialogs/simpleselect.js');
    }
});
