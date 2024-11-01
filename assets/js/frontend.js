(function ($) {
	'use strict';
	$('.svsfc-vote').on('click', function() {
		$('.svsfc-loading-line').removeClass('svsfc-hide');
		var btn = $(this);
		btn.addClass('svsfc-active');
		var fcFrom = $('.svsfc-feedback-form');
		var voteType = btn.data('vote-type');
		var postId = btn.data('post-id')
		$.ajax({
			type: 'POST',
			url: svsfc_feedback.ajaxurl,
			data: {
				action: 'svsfc_submit_vote',
				vote_type: voteType,
				post_id: postId,
				security: svsfc_feedback.svsfc_nonce,
			},
			success: function(response) {
				$('.svsfc-loading-line').remove();
				fcFrom.find('.svsfc-hide').removeClass('svsfc-hide');
				fcFrom.find('.svsfc-vote').off('click'); //removing multiple votes and ajax calls
				fcFrom.find('.svsfc-vote').removeClass('svsfc-vote');
				if(response.data.result === 1){
					$('#svsfc-yes').text(response.data.yes);
					$('#svsfc-no').text(response.data.no);
					if(response.data.user_answer === 1){
						$('.svsfc-answer-yes').addClass('svsfc-active');
					}else{
						$('.svsfc-answer-no').addClass('svsfc-active');
					}

				};
			},
			error: function(xhr, status, error) {
				console.error('AJAX error:', status, error);
			}
		});


	});
})(jQuery);
