$('#categorySelect').on('change', function() {
    refreshSubcategoryOptions();
})

function refreshSubcategoryOptions() {
    const formData = {
        category_id: $('#categorySelect').val(),
        refreshSubcategoryOptionsRequest: 1
    }

    $.ajax({
        type: "POST",
        url: "../core/handleForms.php",
        data: formData,
        success: function(data) {
            $('#subcategorySelect').html('<option value="" disabled selected>Select a subcategory</option>' + data);
        }
    })
}