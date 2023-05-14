$('document').ready(function () {
	/**
	 * ВЫХОД ИЗ АККАУНТА
	 */
	$('#logout-button').click(function () {
		console.log('click')
		$.ajax({
			url: '/services/logout.service.php',
			type: 'POST',
			success: function (data) {
				if (data == 'success') {
					setTimeout(() => (window.location.href = '/#'), 5000)
				}
			}
		})
	})

	$.ajax({
		type: 'GET',
		url: '/services/getAllFillialsByCity.service.php',
		dataType: 'json'
	}).done(function (data) {
		$('#filial').html(
			$('<option>', {
				text: 'Выберите филиал города...',
				value: ''
			})
		)
		$.each(data, function (index, f) {
			$('#filial').append(
				$('<option>', {
					text: f.filial_title + ', ул. ' + f.street_name + ', д.' + f.house_number,
					value: f.id
				})
			)
		})
	})

	// Обработка выбора филиала
	$('#booking_form #filial').change(function (e) {
		if (this.value == '') {
			$('#booking_form #service')
				.attr('disabled', true)
				.html(
					$('<option>', {
						text: 'Сначало выберите филиал...',
						value: '',
						selected: true
					})
				)
		} else {
			$('#booking_form #service')
				.attr('disabled', false)
				.html(
					$('<option>', {
						text: 'Выберите услугу...',
						value: '',
						selected: true
					})
				)

			// Подгрузка услуг
			$.ajax({
				type: 'GET',
				url: functions_url + '/services/services_get_all.php',
				dataType: 'json'
			}).done(function (data) {
				$.each(data, function (index, service) {
					$('#booking_form #service').append(
						$('<option>', {
							text: service.service_title,
							value: service.id
						})
					)
				})
			})
		}
	})
	// Обработка выбора услуги
	$('#booking_form #service').change(function (e) {
		if (this.value == '') {
			$('#booking_form #doctor')
				.attr('disabled', true)
				.html(
					$('<option>', {
						text: 'Сначало выберите услугу...',
						value: '',
						selected: true
					})
				)
		} else {
			$('#booking_form #doctor')
				.attr('disabled', false)
				.html(
					$('<option>', {
						text: 'Выберите доктора...',
						value: '',
						selected: true
					})
				)

			// Подгрузка докторов из филиала
			$.ajax({
				type: 'POST',
				url: functions_url + '/doctors/doctors_get_all_by_filial.php',
				data: { filial_id: $('#booking_form #filial').val() },
				dataType: 'json'
			}).done(function (data) {
				doctor
				$.each(data, function (index, doctor) {
					$('#booking_form #doctor').append(
						$('<option>', {
							text: doctor.staff_surname + ' ' + doctor.staff_name + ' ' + doctor.staff_patronymic,
							value: doctor.id
						})
					)
				})
			})
		}
	})
	// Обработка выбора доктора
	$('#booking_form #doctor').change(function (e) {
		if (this.value == '') {
			$('#booking_form #date')
				.attr('disabled', true)
				.html(
					$('<option>', {
						text: 'Сначало выберите доктора...',
						value: '',
						selected: true
					})
				)
		} else {
			$('#booking_form #date')
				.attr('disabled', false)
				.html(
					$('<option>', {
						text: 'Выберите дату...',
						value: '',
						selected: true
					})
				)
		}
	})

	// Обработка выбора даты
	$('#booking_form #date').change(function (e) {
		if (this.value == '') {
			$('#booking_form #time')
				.attr('disabled', true)
				.html(
					$('<option>', {
						text: 'Сначало выберите время...',
						value: '',
						selected: true
					})
				)
		} else {
			$('#booking_form #time')
				.attr('disabled', false)
				.html(
					$('<option>', {
						text: 'Выберите время...',
						value: '',
						selected: true
					})
				)
		}
	})
	$('#booking_form #date').click(function (e) {
		let now = new Date(),
			minDate = now.toISOString().substring(0, 10)

		$('#booking_form #date').prop('min', minDate)
	})

	$.ajax({
		url: '/services/getAllRegions.service.php',
		type: 'GET',
		dataType: 'json'
	}).done(function (data) {
		// $('#region').empty()
		$.each(data, function (i, region) {
			$('#region').append(
				$('<option>', {
					text: region.region_code + ': ' + region.region_title,
					value: region.id
				})
			)
		})
	})

	$('#region').change(function (e) {
		$('#city')
			.attr('disabled', false)
			.html(
				$('<option>', {
					text: 'Выберите из списка',
					value: '',
					selected: true
				})
			)
		$.ajax({
			type: 'GET',
			url: '/services/getAllCitiesByRegion.service.php',
			data: { region_id: this.value },
			dataType: 'json'
		}).done(function (data) {
			$.each(data, function (index, city) {
				$('#city').append(
					$('<option>', {
						text: city.city_title,
						value: city.id
					})
				)
			})
		})
	})
	$('#city-set-form').submit(function (event) {
		event.preventDefault()
		$.ajax({
			url: '/services/setCity.service.php',
			type: 'POST',
			data: { city_id: $('#city').val() },
			success: function () {
				window.location.href = '/dashboard/bookings'
			}
		})
	})
})
