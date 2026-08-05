(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var toggle = document.querySelector('.pf-nav-toggle');
		var menu = document.querySelector('.pf-nav-menu');
		var overlay = document.querySelector('.pf-nav-overlay');

		if (!toggle || !menu) {
			return;
		}

		function closeMenu() {
			toggle.classList.remove('is-active');
			menu.classList.remove('is-open');
			if (overlay) {
				overlay.classList.remove('is-open');
			}
			toggle.setAttribute('aria-expanded', 'false');
		}

		function openMenu() {
			toggle.classList.add('is-active');
			menu.classList.add('is-open');
			if (overlay) {
				overlay.classList.add('is-open');
			}
			toggle.setAttribute('aria-expanded', 'true');
		}

		toggle.addEventListener('click', function () {
			var isOpen = menu.classList.contains('is-open');
			isOpen ? closeMenu() : openMenu();
		});

		if (overlay) {
			overlay.addEventListener('click', closeMenu);
		}

		menu.querySelectorAll('a').forEach(function (link) {
			link.addEventListener('click', closeMenu);
		});

		window.addEventListener('resize', function () {
			if (window.innerWidth > 880) {
				closeMenu();
			}
		});

		initFloatingPhotos();
		initHeaderScroll();
	});

	/**
	 * O header começa transparente para dar destaque ao sankofa no hero;
	 * ganha fundo apenas depois que o usuário rola a página.
	 */
	function initHeaderScroll() {
		var header = document.querySelector('.pf-header');

		if (!header) {
			return;
		}

		function toggleHeaderBg() {
			if (window.scrollY > 40) {
				header.classList.add('pf-header-scrolled');
			} else {
				header.classList.remove('pf-header-scrolled');
			}
		}

		toggleHeaderBg();
		window.addEventListener('scroll', toggleHeaderBg, { passive: true });
	}

	/**
	 * Flutuação sutil das fotos, seguindo a posição do mouse na janela.
	 * Cada elemento .pf-float usa data-depth para controlar a intensidade.
	 */
	function initFloatingPhotos() {
		var items = document.querySelectorAll('.pf-float');

		if (!items.length) {
			return;
		}

		var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		var isCoarsePointer = window.matchMedia && window.matchMedia('(pointer: coarse)').matches;

		if (reduceMotion || isCoarsePointer) {
			return;
		}

		window.addEventListener('mousemove', function (e) {
			var relX = (e.clientX / window.innerWidth) - 0.5;
			var relY = (e.clientY / window.innerHeight) - 0.5;

			items.forEach(function (item) {
				var depth = parseFloat(item.getAttribute('data-depth')) || 14;
				var tx = relX * depth;
				var ty = relY * depth;
				var rot = relX * (depth / 8);

				item.style.transform = 'translate3d(' + tx.toFixed(2) + 'px, ' + ty.toFixed(2) + 'px, 0) rotate(' + rot.toFixed(2) + 'deg)';
			});
		});

		window.addEventListener('mouseleave', function () {
			items.forEach(function (item) {
				item.style.transform = 'translate3d(0, 0, 0) rotate(0deg)';
			});
		});
	}
})();
