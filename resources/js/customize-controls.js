jQuery( document ).ready( function(){
	wp.customize.controlConstructor['backdrop-radio-image'] = wp.customize.Control.extend( {
		ready: function() {

			let control = this;
			let inputs  = document.querySelectorAll(
				control.selector + ' input[type="radio"]'
			);

			for ( var i = 0; i < inputs.length; i++ ) {

				inputs[ i ].onchange = function() {

					control.setting.set( this.value );
				}
			}
		}
	} );

});