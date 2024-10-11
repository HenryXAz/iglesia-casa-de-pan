import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';
import 'tinymce/skins/content/default/content.css'
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/code';
import 'tinymce/plugins/table';
import tinymce from "tinymce";

// add tinymce init configuration

window.addEventListener('DOMContentLoaded', () => {

    tinymce.init({
        selector: 'textarea',

        plugins: 'lists table code',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | numlist bullist | table',
        // options
        skin: false,
        license_key: 'GPL',
    });

});
