( function( api ) {

	// Extends our custom "allure-news" section.
	api.sectionConstructor['allure-news'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
