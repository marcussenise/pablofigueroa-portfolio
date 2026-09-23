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
		initPortfolioTabs();
		document.querySelectorAll('[data-pf-gallery]').forEach(initGallery);
	});

	/**
	 * Galeria (ilustrações, textos...): ao clicar numa miniatura abre um carrossel
	 * em tela cheia com navegação (botões, setas do teclado e swipe).
	 * Cada [data-pf-gallery] ganha seu próprio carrossel.
	 */
	function initGallery(gallery) {
		var items = gallery.querySelectorAll('.pf-gallery-item');
		var sources = Array.prototype.map.call(items, function (item) {
			var img = item.querySelector('img');
			return { src: img.getAttribute('src'), alt: img.getAttribute('alt') };
		});
		var current = 0;
		var lastFocus = null;

		var lightbox = document.createElement('div');
		lightbox.className = 'pf-lightbox';
		lightbox.hidden = true;
		lightbox.setAttribute('role', 'dialog');
		lightbox.setAttribute('aria-modal', 'true');
		lightbox.setAttribute('aria-label', gallery.getAttribute('data-pf-gallery') || 'Galeria');
		lightbox.innerHTML =
			'<button type="button" class="pf-lightbox-close" aria-label="Fechar">&times;</button>' +
			'<button type="button" class="pf-lightbox-nav pf-lightbox-prev" aria-label="Anterior">&#8249;</button>' +
			'<figure class="pf-lightbox-figure"><img class="pf-lightbox-img" alt=""></figure>' +
			'<button type="button" class="pf-lightbox-nav pf-lightbox-next" aria-label="Próxima">&#8250;</button>' +
			'<span class="pf-lightbox-counter"></span>';
		document.body.appendChild(lightbox);

		var imgEl = lightbox.querySelector('.pf-lightbox-img');
		var counter = lightbox.querySelector('.pf-lightbox-counter');
		var closeBtn = lightbox.querySelector('.pf-lightbox-close');

		// Com uma única imagem não há o que navegar.
		if (sources.length < 2) {
			lightbox.classList.add('is-single');
		}

		function show(index) {
			current = (index + sources.length) % sources.length;
			imgEl.src = sources[current].src;
			imgEl.alt = sources[current].alt;
			counter.textContent = (current + 1) + ' / ' + sources.length;
		}

		function open(index) {
			lastFocus = document.activeElement;
			show(index);
			lightbox.hidden = false;
			document.body.style.overflow = 'hidden';
			closeBtn.focus();
		}

		function close() {
			lightbox.hidden = true;
			document.body.style.overflow = '';
			if (lastFocus) {
				lastFocus.focus();
			}
		}

		items.forEach(function (item, i) {
			item.addEventListener('click', function () {
				open(i);
			});
		});

		closeBtn.addEventListener('click', close);
		lightbox.querySelector('.pf-lightbox-prev').addEventListener('click', function () {
			show(current - 1);
		});
		lightbox.querySelector('.pf-lightbox-next').addEventListener('click', function () {
			show(current + 1);
		});

		// Clicar fora da imagem fecha.
		lightbox.addEventListener('click', function (e) {
			if (e.target === lightbox || e.target.classList.contains('pf-lightbox-figure')) {
				close();
			}
		});

		document.addEventListener('keydown', function (e) {
			if (lightbox.hidden) {
				return;
			}
			if (e.key === 'Escape') {
				close();
			} else if (e.key === 'ArrowLeft') {
				show(current - 1);
			} else if (e.key === 'ArrowRight') {
				show(current + 1);
			}
		});

		var touchX = null;
		lightbox.addEventListener('touchstart', function (e) {
			touchX = e.touches[0].clientX;
		}, { passive: true });
		lightbox.addEventListener('touchend', function (e) {
			if (touchX === null) {
				return;
			}
			var dx = e.changedTouches[0].clientX - touchX;
			if (Math.abs(dx) > 50) {
				show(current + (dx < 0 ? 1 : -1));
			}
			touchX = null;
		});
	}

	/**
	 * Abas clicáveis do Portfólio Arte (Livros, Textos, Ilustrações, Zines).
	 */
	function initPortfolioTabs() {
		var wrapper = document.querySelector('[data-pf-tabs]');

		if (!wrapper) {
			return;
		}

		var buttons = wrapper.querySelectorAll('.pf-tab-btn');

		buttons.forEach(function (btn) {
			btn.addEventListener('click', function () {
				var target = btn.getAttribute('data-tab-target');
				var panel = wrapper.querySelector('#tab-' + target);

				if (!panel) {
					return;
				}

				buttons.forEach(function (b) {
					b.classList.remove('is-active');
					b.setAttribute('aria-selected', 'false');
				});
				wrapper.querySelectorAll('.pf-tab-panel').forEach(function (p) {
					p.classList.remove('is-active');
					p.hidden = true;
				});

				btn.classList.add('is-active');
				btn.setAttribute('aria-selected', 'true');
				panel.classList.add('is-active');
				panel.hidden = false;
			});
		});
	}

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
