$(document).ready(function(){
    $("input.image").change(function(){
        var file = this.files[0];
        var url = URL.createObjectURL(file);
        $(this.closest(".row").find(".preview_img").attr("src", url))
    });
});