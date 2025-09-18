$(document).ready(function() {
    $("#categoriesBtn").on("click", function(e) {
        e.stopPropagation();
        $("#categoriesMenu").toggleClass("hidden");
    });

    $(document).on("click", function(e) {
        if (!$(e.target).closest("#categoriesMenu, #categoriesBtn").length) {
            $("#categoriesMenu").addClass("hidden");
        }
    });
});
