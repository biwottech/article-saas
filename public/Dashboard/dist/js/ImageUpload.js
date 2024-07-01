$(document).on("click", "i.del", function() {

    $(".imagePreview").css({
        'background-color': '#ffffff'
    });
    $(".imagePreview").css('background-image', 'none');
    $(".uploadFile").value = "";
});

$("#removeLogo").click(function() {
    $(".imagePreview").css({
        'background-color': '#ffffff'
    });
    $(".imagePreview").css('background-image', 'none');
    $(".uploadLogo").value = "";
});




$(function() {
    $(document).on("change", ".uploadFile", function() {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return;

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() {
                uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
            }
        }

    });
});

$(function() {
    $(document).on("change", ".uploadLogo", function() {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return;

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() {
                uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
            }
        }

    });
});
