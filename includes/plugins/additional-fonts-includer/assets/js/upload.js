/**
 * Uploading functions
 */

!(function( $ ){
	$(function(){

		/**
		 * Define uploading form
		 */
		var $form = $('#afi-upload-fonts-form');

		if ( $form.length !== 0 ) {

			/**
			 * Catch a submit form
			 */
			$form.submit(function(e){
				
				/**
				 * Basic values
				 */
				var $input     = $(this).find('.font-input');
				var status     = true;
				var $response  = $form.find('#afi-response');

				/**
				 * Values for AJAX Request
				 */
				var data = {
					action: 'afi_file_handling',
					name: ''
				};

				/**
				 * Check each input
				 */
				$input.each(function(){
					var _             = $(this);
					var requiredType  = _.attr('data-type');
					var _value        = _.val();

					/**
					 * Check validation of each field
					 */
					if ( _value == false ) {
						_.closest('tr').find('.error').show();
						status = false;
					} else {
						_.closest('tr').find('.error').hide();
					}
 
 					/**
 					 * Check file type
 					 */
					if ( _value.lastIndexOf(requiredType) !== _value.length - requiredType.length ) {
						_.closest('tr').find('.error').show();
						status = false;
					} else {
						_.closest('tr').find('.error').hide();
					}

					/**
					 * Get file name 
					 */
					if ( data.name === '' ) {
						data.name = _value.split('.' + requiredType)[0].split('fakepath\\')[1];
					}

					/**
					 * Add file to object
					 */
					if ( status != false ) {
						data['font_' + requiredType] = requiredType;
					}
				});

				/**
				 * If something wrong - prevent submitiong
				 */
				if ( status == false ) {
					e.preventDefault();
					return false;
				}
			});

		}
	});
})(jQuery);