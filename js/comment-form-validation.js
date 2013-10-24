/**
 * Handles the client side Comments form validation.
 */
jQuery( document ).ready( function( $ ) {
	if( comments_object.req ) {

		$( "#commentform" ).validate( {
			rules: {
				author: "required",
				email: {
					required: true,
					email: true
				},
				comment: "required"
			},
			messages: {
				author: '<i class="icon-remove"></i> ' + comments_object.author,
				email: '<i class="icon-remove"></i> ' + comments_object.email,
				comment: '<i class="icon-remove"></i> ' + comments_object.comment
			}
		} );

	}
	else {

		$( "#commentform" ).validate( {
			rules: {
				comment: "required"
			},
			messages: {
				comment: '<i class="icon-remove"></i> ' + comments_object.comment
			}
		} );

	}

} );