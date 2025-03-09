<div class="">
	<table>
		<tr>
			<td>№ Заявки</td>
			<td>Дата</td>
			<td>Статус</td>
			<td>Заголовок</td>
			<td>Назначен специалист</td>
			<td>Инициатор запроса</td>
			<td>Время выполнения</td>
		</tr>
		<tr>


		<!-- <tr>
					<tr>test</tr>
					<tr>test</tr>
					<tr>test</tr>
					<tr>test</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					</tr> -->

		<?php
		require_once("./employees/employee.php");
		print_r($_POST) . '<br>';
		print_r($_GET) . '<br>';
		print_r($this->getData());
		?>
</tr>
	</table>
</div>