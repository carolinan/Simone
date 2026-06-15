/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var container, button, menu, parents, desktopQuery;

	container = document.getElementById( 'site-navigation' );
	if ( ! container )
		return;

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button )
		return;

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( -1 === menu.className.indexOf( 'nav-menu' ) )
		menu.className += ' nav-menu';

	parents = menu.querySelectorAll( '.menu-item-has-children, .page_item_has_children' );
	desktopQuery = window.matchMedia( '(min-width: 601px)' );

	function closeSubmenu( item ) {
		var link = item.querySelector( 'a' );

		item.classList.remove( 'focus' );

		if ( link ) {
			link.setAttribute( 'aria-expanded', desktopQuery.matches ? 'false' : 'true' );
		}

		Array.prototype.forEach.call( item.querySelectorAll( '.focus' ), closeSubmenu );
	}

	function openSubmenu( item ) {
		var link = item.querySelector( 'a' );

		Array.prototype.forEach.call( item.parentNode.children, function( sibling ) {
			if ( sibling !== item )
				closeSubmenu( sibling );
		} );

		item.classList.add( 'focus' );

		if ( link ) {
			link.setAttribute( 'aria-expanded', 'true' );
		}
	}

	function closeAllSubmenus() {
		Array.prototype.forEach.call( parents, closeSubmenu );
	}

	function updateSubmenuState() {
		Array.prototype.forEach.call( parents, function( item ) {
			var link = item.querySelector( 'a' );

			item.classList.remove( 'focus' );

			if ( link ) {
				link.setAttribute( 'aria-expanded', desktopQuery.matches ? 'false' : 'true' );
			}
		} );
	}

	button.onclick = function() {
		var isExpanded = -1 !== container.className.indexOf( 'toggled' );

		if ( isExpanded )
			container.className = container.className.replace( ' toggled', '' );
		else
			container.className += ' toggled';

		button.setAttribute( 'aria-expanded', isExpanded ? 'false' : 'true' );
		button.getElementsByClassName( 'screen-reader-text' )[0].textContent = isExpanded ? button.getAttribute( 'data-label-open' ) : button.getAttribute( 'data-label-close' );
	};

	Array.prototype.forEach.call( parents, function( item ) {
		var link = item.querySelector( 'a' );

		if ( ! link )
			return;

		link.setAttribute( 'aria-haspopup', 'true' );

		item.addEventListener( 'mouseenter', function() {
			if ( desktopQuery.matches )
				openSubmenu( item );
		} );

		item.addEventListener( 'mouseleave', function() {
			if ( desktopQuery.matches )
				closeSubmenu( item );
		} );

		item.addEventListener( 'focusin', function() {
			if ( desktopQuery.matches )
				openSubmenu( item );
		} );

		item.addEventListener( 'focusout', function( event ) {
			if ( desktopQuery.matches && ! item.contains( event.relatedTarget ) )
				closeSubmenu( item );
		} );

		link.addEventListener( 'click', function( event ) {
			if ( ! desktopQuery.matches || item.classList.contains( 'focus' ) )
				return;

			event.preventDefault();
			openSubmenu( item );
		} );
	} );

	updateSubmenuState();

	if ( desktopQuery.addEventListener ) {
		desktopQuery.addEventListener( 'change', updateSubmenuState );
	} else {
		desktopQuery.addListener( updateSubmenuState );
	}

	document.addEventListener( 'click', function( event ) {
		if ( ! container.contains( event.target ) )
			closeAllSubmenus();
	} );

	document.addEventListener( 'keydown', function( event ) {
		if ( 'Escape' === event.key )
			closeAllSubmenus();
	} );
} )();
