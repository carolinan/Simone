/*
 * Keep source order aligned with visual order for the left-sidebar layout.
 */
document.addEventListener('DOMContentLoaded', function() {
	var primary = document.getElementById('primary');
	var secondary = document.getElementById('secondary');
	var desktopQuery = window.matchMedia('(min-width: 1160px)');

	if (!primary || !secondary || primary.parentNode !== secondary.parentNode) {
		return;
	}

	function updateSidebarOrder() {
		if (desktopQuery.matches) {
			primary.parentNode.insertBefore(secondary, primary);
		} else {
			primary.parentNode.insertBefore(secondary, primary.nextSibling);
		}
	}

	updateSidebarOrder();
	if (desktopQuery.addEventListener) {
		desktopQuery.addEventListener('change', updateSidebarOrder);
	} else if (desktopQuery.addListener) {
		desktopQuery.addListener(updateSidebarOrder);
	}
});
