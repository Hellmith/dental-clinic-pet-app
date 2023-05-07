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
})
