<div class="block-content">
	<table>
		<thead>
			<tr>
				<th>№</th>
				<th>id</th>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Отчество</th>
				<th>Организация</th>
				<th>Отдел</th>
				<th>Должность</th>
				<th>Логин</th>
				<th>Пароль</th>
				<th class="edit-column" colspan="2"></th>
			</tr>
		</thead>
		<tbody>
			<?php require_once("model/m_allEmployees.php");

			$number = 1; //порядковый номер для таблицы
			foreach ($employees as $employee): ?>
				<tr>
					<td><?= $number ?></td>
					<?php foreach ($employee as $item): ?>

							<td><?= $item ?></td>

					<?php endforeach; ?>
					<!-- Добавляем формы для редактирования и удаления -->
					<td class="edit-sell">
						<form method="POST" action="">
							<input type="hidden" name="employee_id" value="<?= $employee['id_employee']; ?>"> <!-- Скрытое поле с id -->
							<button class="admin-btn" type="submit" name="edit_entry" value="edit"><img src="template/icon/edit.png" alt="Редактировать"></button>
						</form>
					</td>
					<td class="edit-sell">
						<form method="POST" action="">
							<input type="hidden" name="employee_id" value="<?= $employee['id_employee']; ?>"> <!-- Скрытое поле с id -->
							<button class="admin-btn" type="submit" name="delete_entry" value="delete"><img src="template/icon/delete.png" alt="Удалить"></button>
						</form>
					</td>
				</tr>
				<?php $number++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
