const ace = require('brace');
require('brace/mode/php');
require('brace/theme/monokai');

const editor = ace.edit('editor');
editor.getSession().setMode('ace/mode/php');
editor.setTheme('ace/theme/monokai');

const textarea = $('#editor-changes');

editor.getSession().on("change", function () {
    textarea.val(editor.getSession().getValue());
});

$(function() {
    $('#editor').show();
});
