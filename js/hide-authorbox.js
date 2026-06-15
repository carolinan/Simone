// Toggle Author Bio on and off
document.addEventListener('DOMContentLoaded', function() {
	var button = document.querySelector('.reveal-bio button');
	var authorInfo = document.querySelector('.author-info');
	var authorIndex = document.querySelector('.author-index');

	if (!button || !authorInfo) {
		return;
	}

	button.addEventListener('click', function() {
		var expanded = button.getAttribute('aria-expanded') === 'true';
		var label = button.querySelector('.screen-reader-text');

		authorInfo.hidden = expanded;

		if (expanded) {
			button.setAttribute('aria-expanded', 'false');
			button.classList.remove('fa-minus-circle');
			button.classList.add('fa-plus-circle', 'reveal-fix');

			if (label) {
				label.textContent = button.dataset.showLabel;
			}

			if (authorIndex) {
				authorIndex.classList.add('hide-fix');
			}
		} else {
			button.setAttribute('aria-expanded', 'true');
			button.classList.remove('fa-plus-circle', 'reveal-fix');
			button.classList.add('fa-minus-circle');

			if (label) {
				label.textContent = button.dataset.hideLabel;
			}

			if (authorIndex) {
				authorIndex.classList.remove('hide-fix');
			}
		}
	});
});
