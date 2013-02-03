/**
 * Handles the client side Comments form validation.
 */
jQuery(document).ready(function($) {
	$("#commentform").validate({
		rules: {
			author: "required",
			email: {
				required: true,
				email: true
			},
			comment: "required"
		},
		messages: {
			author: '<i class="icon-close icon-small" aria-hidden="true"></i> ' + comments_object.author,
			email: '<i class="icon-close icon-small" aria-hidden="true"></i> ' + comments_object.email,
			comment: '<i class="icon-close icon-small" aria-hidden="true"></i> ' + comments_object.comment
		}
	});

} );