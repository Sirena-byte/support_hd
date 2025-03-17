document.addEventListener('DOMContentLoaded', function() {
	const contentSelect = document.getElementById('content-select');
	contentSelect.value = 25; // Устанавливаем значение по умолчанию

	contentSelect.addEventListener('change', function() {
		 const selectedValue = this.value;
		 let rowsPerPage = parseInt(selectedValue);

		 console.log("Количество строк на странице: " + rowsPerPage);

		 fetch('model/set_rows.php?rows=' + rowsPerPage)
			  .then(response => response.json())
			  .then(data => {
					if (data.status === 'success') {
						 console.log('Данные успешно получены:', data);
						 document.getElementById('display-rows').innerText = 
							  'Отображаются строки с 1 по ' + data.finish; // Обновляем текст
						 
						 // Получаем обновленные данные для таблицы
						 return fetch('C:/OSPanel/home/support-hd/public/pages/organization.php?rows=' + rowsPerPage);
					} else {
						 console.error('Ошибка:', data.message);
					}
			  })
			  .then(response => response.text())
			  .then(html => {
					// Обновляем содержимое таблицы
					document.querySelector('.block-content').innerHTML = html;
			  })
			  .catch(error => console.error('Ошибка:', error));
	});

	// Вызываем событие для установки начального значения
	contentSelect.dispatchEvent(new Event('change'));
});