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
				author: '<span class="fa fa-times"></span> ' + comments_object.author,
				email: '<span class="fa fa-times"></span> ' + comments_object.email,
				comment: '<span class="fa fa-times"></span> ' + comments_object.comment
			}
		} );

	}
	else {

		$( "#commentform" ).validate( {
			rules: {
				comment: "required"
			},
			messages: {
				comment: '<span class="fa fa-times"></span> ' + comments_object.comment
			}
		} );

	}

} );