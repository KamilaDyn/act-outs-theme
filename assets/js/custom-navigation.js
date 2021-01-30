/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
	let container, button, menu, links, i, len, menuContainer, overflow;
	
		container = document.querySelector('#site-navigation');
		if (!container) {
			return;
		}
	
		button = container.querySelector('button')
		if ('undefined' === typeof button) {
			return;
		}
	
		menu = container.querySelector('ul')
	
		menuContainer = container.querySelector('.menu-main-menu-container')
		overflow = document.querySelector('.overflow');
		button.onclick = function () {
			if (-1 !== container.className.indexOf('toggled')) {
				container.className = container.className.replace(' toggled', '');
				menuContainer.style.transform = 'translateX(-100%)';
				overflow.style.display = 'none';
	
			} else {
				container.className += ' toggled';
				menuContainer.style.transform = 'translateX(0)'
				menuContainer.style.transition = "all 0.5s ease-in";
				overflow.style.display = 'block';
				// button.setAttribute( 'aria-expanded', 'true' );
				// menu.setAttribute( 'aria-expanded', 'true' );
			}
		};
	
	overflow.onclick = function(){
		container.className = container.className.replace(' toggled', '');
		menuContainer.style.transform = 'translateX(-100%)';
		overflow.style.display = 'none';
	}
		// Get all the link elements within the menu.
		links = menu.querySelector('a');
	
		// Each time a menu link is focused or blurred, toggle focus.
		for (i = 0, len = links.length; i < len; i++) {
			links[i].addEventListener('focus', toggleFocus, true);
			links[i].addEventListener('blur', toggleFocus, true);
		}
	
		/**
		 * Sets or removes .focus class on an element.
		 */
		function toggleFocus() {
			var self = this;
	
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while (-1 === self.className.indexOf('nav-menu')) {
	
				// On li elements toggle the class .focus.
				if ('li' === self.tagName.toLowerCase()) {
					if (-1 !== self.className.indexOf('focus')) {
						self.className = self.className.replace(' focus', '');
					} else {
						self.className += ' focus';
					}
				}
	
				self = self.parentElement;
			}
		}
	
		/**
		 * Toggles `focus` class to allow submenu access on tablets.
		 */
		(function (container) {
			var touchStartFn, i,
				parentLink = container.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');
	
			if ('ontouchstart' in window) {
				touchStartFn = function (e) {
					var menuItem = this.parentNode,
						i;
	
					if (!menuItem.classList.contains('focus')) {
						e.preventDefault();
						for (i = 0; i < menuItem.parentNode.children.length; ++i) {
							if (menuItem === menuItem.parentNode.children[i]) {
								continue;
							}
							menuItem.parentNode.children[i].classList.remove('focus');
						}
						menuItem.classList.add('focus');
					} else {
						menuItem.classList.remove('focus');
					}
				};
	
				for (i = 0; i < parentLink.length; ++i) {
					parentLink[i].addEventListener('touchstart', touchStartFn, false);
				}
			}
		}(container));
	})();