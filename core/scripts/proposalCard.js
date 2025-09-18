$('.editProposalButton').on('click', function() {
    $(this).closest('.proposalCard').find('.updateProposalForm').toggleClass('hidden');

    let category_id = $(this).closest('.proposalCard').find('.categorySelect').val();
    let subcategory_select = $(this).closest('.proposalCard').find('.subcategorySelect');
    let current_subcategory_id = $(this).data('subcategory-id');

    refreshSubcategoryOptions(category_id, subcategory_select, current_subcategory_id);
});

$('.categorySelect').on('change', function() {
    let category_id = $(this).val();
    let subcategory_select = $(this).closest('.categoryForm').find('.subcategorySelect')
    refreshSubcategoryOptions(category_id, subcategory_select);
})

function refreshSubcategoryOptions(category_id, subcategory_select, current_subcategory_id = null) {
    const formData = {
        category_id: category_id,
        refreshSubcategoryOptionsRequest: 1
    };

    $.ajax({
        type: "POST",
        url: "../core/handleForms.php",
        data: formData,
        success: function(data) {
            $(subcategory_select).html('<option value="" disabled selected>Select a subcategory</option>' + data);

            if (current_subcategory_id) {
                $(subcategory_select).val(current_subcategory_id);
            }
        }
    });
}
