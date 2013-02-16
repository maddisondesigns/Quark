/**
 * Load the Google Analytics Tracking code
 */
window._gaq = [['_setAccount', analytics_object.gatrackingid],['_trackPageview'],['_trackPageLoadTime']];
Modernizr.load({
	load: ( 'https:' == location.protocol ? '//ssl' : '//www' ) + '.google-analytics.com/ga.js'
});
