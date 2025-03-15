<div class="block-content">
<table>
	<thead>
		<tr>
			<th>№</th>
			<th>Название организации</th>
			<th>Адрес организации</th>
			<th>Статус активности</th>
		</tr>
	</thead>
	<tbody>
		<?php
		require_once("model/m_organization.php");
		$number = 1;//порядковый номер для таблицы
		foreach ($organizations as $organization): ?>
			<tr>
				<td><?=$number?></td>
				<?php foreach ($organization as $item): ?>
					<?php if($item === $organization['isActive']): 
						$item = replaceStatus($item);?>
					<? endif; ?>
					<td><?=$item?></td>
				<? endforeach; ?>
				<?php $number++; ?>
			<? endforeach; ?>
			</tr>
	</tbody>
</table>
</div>

