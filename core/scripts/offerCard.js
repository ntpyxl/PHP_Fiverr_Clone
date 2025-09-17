$('.editOfferButton').on('click', function() {
    $(this).closest('.offer').find('.updateOfferForm').toggleClass('hidden');
});
