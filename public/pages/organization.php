<div class="block-content">
	<table>
		<thead>
			<tr>
				<th>№</th>
				<th>id</th>
				<th>Название организации</th>
				<th class="edit-column" colspan="2"></th>
			</tr>
		</thead>
		<tbody>
			<?php require_once("model/m_allOrganizations.php");

			$number = 1; //порядковый номер для таблицы
			foreach ($organizations as $organization): ?>
				<tr>
					<td><?= $number ?></td>
					<?php foreach ($organization as $item): ?>

						<td><?= $item ?></td>

					<?php endforeach; ?>
					<!-- Добавляем формы для редактирования и удаления -->
					<td class="edit-sell">
						<form method="POST" action="">
							<input type="hidden" name="organization_id" value="<?= $organization['id_organization']; ?>"> <!-- Скрытое поле с id -->
							<button class="admin-btn" type="submit" name="edit_entry" value="edit"><img src="template/icon/edit.png" alt="Редактировать"></button>
						</form>
					</td>
					<td class="edit-sell">
						<form method="POST" action="">
							<input type="hidden" name="organization_id" value="<?= $organization['id_organization']; ?>"> <!-- Скрытое поле с id -->
							<button class="admin-btn" type="submit" name="delete_entry" value="delete"><img src="template/icon/delete.png" alt="Удалить"></button>
						</form>
					</td>
				</tr>
				<?php $number++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<div class="footer">

	<div class="footer-content">

		<div class="footer-count-entries">

			<div class="form">Записей на странице</div>

			<form method="POST" action="">

				<ul class="content-selection">

					<?php foreach ($countPage as $item): ?>

						<li class="selection-item"><button type="submit" name="recordsCount" value="<?= $item; ?>"><?= $item; ?></button></li>

					<?php endforeach; ?>

				</ul>

		</div>

		<div class="information">

			<p>Записей на странице <?= $count; ?> из <?= $countAllOrganization; ?> </p>

			<p><?php var_dump($_POST) ?></p>

		</div>

		<div class="footer-navigation">

			<div class="nav-content">

				<div class="item-nav"><button type="submit" name="arrow" value="fullprew"><img src="template/icon/footer/full-left.png" alt=""></button></div>
				<div class="item-nav"><button type="submit" name="arrow" value="prew"><img src="template/icon/footer/left.png" alt=""></button></div>
				<div class="item-nav">
					<div class="nav-page">
						<?php for ($i = 1, $limit = 0, $j = 1; $i <= $countAllOrganization; $i++, $limit++) {
							if ($limit == $finish) {
								echo "<button type=\"submit\" name=\"pageGroup\" value=\"$j\">$j</button>";
								$j++;
								$limit = 1;
							} elseif ($i == $countAllOrganization) {
								echo "<button type=\"submit\" name=\"pageGroup\" value=\"$j\">$j</button>";
							}
						}
						?>
					</div>
				</div>
				<div class="item-nav"><button type="submit" name="arrow" value="next"><img src="template/icon/footer/right.png" alt=""></button></div>
				<div class="item-nav"><button type="submit" name="arrow" value="fullnext"><img src="template/icon/footer/full-right.png" alt=""></button></div>
				</form>
			</div>
		</div>
	</div>