import PROJECT_MODULE from './app.js';

function readURL(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            $('#image_preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function checkImage(){
    if(!$("#image_preview").length){
        $('.image_wrapper').append('<img src="" id="image_preview" alt="Immagine della news">');
    }
}

$("#imageUpload").change(function () {
    checkImage();
    readURL(this);
});
