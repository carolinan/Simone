/* 
 * Toggles search on and off
 */
document.addEventListener('DOMContentLoaded', function() {
	var button = document.querySelector('.search-toggle button');
	var wrapper = document.querySelector('.search-box-wrapper');

	if (!button || !wrapper) {
		return;
	}

	button.addEventListener('click', function() {
		var isExpanded = button.getAttribute('aria-expanded') === 'true';
		var nextLabel = isExpanded ? button.dataset.labelOpen : button.dataset.labelClose;
		var label = button.querySelector('.screen-reader-text');
		var searchField = wrapper.querySelector('.search-field');

		button.classList.toggle('active', !isExpanded);
		button.setAttribute('aria-expanded', isExpanded ? 'false' : 'true');
		wrapper.classList.toggle('hide', isExpanded);
		wrapper.hidden = isExpanded;

		if (label) {
			label.textContent = nextLabel;
		}

		if (!isExpanded && searchField) {
			searchField.focus();
		}
	});
});
