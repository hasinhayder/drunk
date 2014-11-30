/**
 * Created by hasinhayder on 11/16/14.
 */
var myeditor;
(function() {
    tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
        editor.addButton('my_mce_button', {
            text: 'New Button',
            icon: false,
            onclick: function() {
                editor.insertContent('WPExplorer.com is awesome!');
                if(jQuery("#inlinediv").length==0){
                    jQuery("<div/>").attr("id","inlinediv").appendTo(jQuery("body"));
                }
                jQuery("div#inlinediv").load("admin-ajax.php?action=popup",function(){
                    tb_show("My Form",'#TB_inline?width=' + 600 + '&height=' + 400 + '&inlineId=inlinediv')
                });

            }
        });
    });
})();