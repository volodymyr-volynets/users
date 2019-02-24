/**
 * Numbers Widgets object
 *
 * @type object
 */
Numbers.Widgets.CheckIn = {

	/**
	 * Initialize
	 */
	init: function() {},

	/**
	 * Get location
	 *
	 * @param string func
	 */
	getLocation: function(func) {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(func);
		} else {
			alert(i18n(null, 'Geolocation is not supported by this browser!'));
		}
	}
};