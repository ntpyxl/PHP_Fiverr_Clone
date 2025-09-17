$('.editProposalButton').on('click', function() {
    $(this).closest('.proposalCard').find('.updateProposalForm').toggleClass('hidden');
});