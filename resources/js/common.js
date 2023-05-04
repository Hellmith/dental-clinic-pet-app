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

	/**
	 * ГАЛЕРЕЯ
	 */
	$('.fancybox').fancybox({
		hideOnContentClick: true,
		protect: true, //защита изображения от загрузки, щелкнув правой кнопкой мыши.
		loop: true, // Бесконечная навигация по галерее
		arrows: true, // Отображение навигационные стрелки
		infobar: true, // Отображение инфобара (счетчик и стрелки вверху)
		toolbar: true, // Отображение панели инструментов (кнопки вверху)
		buttons: [
			// Отображение панели инструментов по отдельности (кнопки вверху)
			'slideShow',
			// 'fullScreen',
			// 'thumbs',
			'share',
			'download',
			'zoom',
			'close'
		],
		touch: false,
		animationEffect: 'zoom-in-out', // анимация открытия слайдов "zoom" "fade" "zoom-in-out"
		transitionEffect: 'slide', // анимация переключения слайдов "fade" "slide" "circular" "tube" "zoom-in-out" "rotate'
		animationDuration: 500, // Длительность в мс для анимации открытия / закрытия
		transitionDuration: 1366, // Длительность переключения слайдов
		slideClass: '', // Добавить свой класс слайдам
		hideScrollbar: true,
		parentEl: 'body',
		baseClass: ''
	})

	/**
	 * КАРТЫ
	 */
	ymaps.ready(() => {
		let myMap = new ymaps.Map('map-page', {
			center: [54.900316, 52.275428],
			zoom: 15,
			controls: ['routePanelControl']
		})
		let control = myMap.controls.get('routePanelControl')
		control.options.set({
			autofocus: false
		})
		control.routePanel.state.set({
			type: 'masstransit',
			fromEnabled: true,
			toEnabled: true,
			from: '',
			to: 'улица Мира, 10, Альметьевск'
		})
		control.routePanel.options.set({
			types: {
				masstransit: true,
				pedestrian: true,
				taxi: true
			}
		})
	})

	/**
	 * КУКИ ПОДТВЕРЖДЕНИЕ
	 */
	$('#cookie-accept').click(function (e) {
		e.preventDefault()
		window.localStorage.setItem('ACCEPT', true)
	})

	if (window.localStorage.getItem('ACCEPT')) {
		$('#cookie').remove()
	}

	/**
	 * АВТОРИЗАЦИЯ
	 */
	$('#login-form').submit(function (e) {
		e.preventDefault()
		$.ajax({
			type: 'POST',
			url: '/services/login.service.php',
			data: $('#login-form').serialize(),
			success: function (data) {
				if (data === 'success') {
					$('#error-message').remove()
					$('#success-message').removeClass('hidden').html('Успешная авторизация')
					setTimeout(() => {
						window.location.href = '/dashboard'
					}, 1000)
				} else $('#error-message').removeClass('hidden').html(data)
			},
			error: function (error) {
				console.error('Возникла ошибка: ' + error)
			}
		})
	})

	/**
	 * РЕГИСТРАЦИЯ
	 */
	$('#registration-form').submit(function (e) {
		e.preventDefault()
		$.ajax({
			type: 'POST',
			url: '/services/registration.service.php',
			data: $('#registration-form').serialize(),
			success: function (data) {
				if (data === 'success') {
					$('#error-message2').remove()
					$('#success-message2').removeClass('hidden').html('Успешная регистрация')
					setTimeout(() => {
						window.location.href = '/dashboard'
					}, 1000)
				} else $('#error-message2').removeClass('hidden').html(data)
			},
			error: function (error) {
				console.error('Возникла ошибка: ' + error)
			}
		})
	})

	/**
	 * ВЫХОД ИЗ АККАУНТА
	 */
	$('#logout-button').click(function () {
		$.ajax({
			type: 'GET',
			url: '/services/logout.service.php',
			data: { action: 'logout' },
			success: function (data) {
				console.log(data)
				if (data === 'success') {
					window.location.href = '/'
				} else {
					alert('error')
				}
			},
			error: function (error) {
				console.error('Возникла ошибка: ' + error)
			}
		})
	})
})
