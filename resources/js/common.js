$(document).ready(function () {
	/**
	 * МАСКИ
	 */
	$('#phone').mask('+7 (000) 000-00-00')

	/**
	 * АКТИВНЫЕ ССЫЛКИ
	 */
	;(function () {
		const $collapseEl = document.querySelector('#navbar-collapse')
		const $scrollSpyEl = document.querySelector('[data-hs-scrollspy="#scrollspy"]')
		$scrollSpyEl.addEventListener('scroll.hs.scrollspy', () => {
			if (window.outerWidth <= 639 && $collapseEl.classList.contains('open')) {
				HSCollapse.hide($collapseEl)
			}
		})
	})()
})
