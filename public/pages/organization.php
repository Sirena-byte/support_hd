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
<?php require_once("model/m_allOrganizations.php");

$number = 1; //порядковый номер для таблицы
			foreach ($organizations as $organization): ?>
				<tr>
					<td><?= $number ?></td>
					<?php foreach ($organization as $item): ?>
						<?php if ($item === $organization['isActive']): // Заменяем статус 
						?>
							<td><?= replaceStatus($item); ?></td>
						<?php else: ?>
							<td><?= $item ?></td>
						<?php endif; ?>
					<?php endforeach; ?>
				</tr>
				<?php $number++; ?>
			<?php endforeach; ?>
			</tr>
		</tbody>
	</table>
</div>

<div class="footer">
	<div class="footer-content">
		<div class="footer-count-entries">
			<div class="form">Записей на странице</div>
		<form method="POST" action="">
        <ul class="content-selection">
            <li class="selection-item start"><button type="submit" name="myButton" value="10">10</button></li>
            <li class="selection-item"><button type="submit" name="myButton" value="20">20</button></li>
            <li class="selection-item"><button type="submit" name="myButton" value="30">30</button></li>
            <li class="selection-item"><button type="submit" name="myButton" value="40">40</button></li>
        </ul>
    </form>
		</div>
		<div class="information">
			<p>Записей на странице <?= $count; ?> из <?= $countAllOrganization; ?> </p>
		</div>
		<div class="footer-navigation">
			<div class="nav-content">
				<div class="item-nav"><img src="template/icon/footer/full-left.png" alt=""></div>
				<div class="item-nav"><img src="template/icon/footer/left.png" alt=""></div>
				<div class="item-nav">
					<div class="nav-page">
					.....
					</div>
				</div>
				<div class="item-nav"><img src="template/icon/footer/right.png" alt=""></div>
				<div class="item-nav"><img src="template/icon/footer/full-right.png" alt=""></div>
			</div>
		</div>
	</div>

</div>
<?php

?>