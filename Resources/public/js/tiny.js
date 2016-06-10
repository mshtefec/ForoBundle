initTiny('#sistema_forobundle_respuesta_contenido');

function initTiny(selector) {
    tinymce.init({
        selector: selector,
        toolbar: ['undo redo fontsizeselect | bold italic underline strikethrough alignleft aligncenter alignright alignjustify bulllist numlist outdent indent'],
        menubar: false,
        fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
        plugins: "paste",
        paste_as_text: true
    });    
}