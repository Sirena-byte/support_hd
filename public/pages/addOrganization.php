<?php require_once("./model/m_organization.php");?>

<div class="addata">
	<h2>Добавить организацию</h2>
	<form method="POST">
		<input type="text" name="name" value="<?= htmlspecialchars($organization['name']) ?>" placeholder="Название организации">
		<input type="text" name="addres" value="<?= htmlspecialchars($organization['addres']) ?>" placeholder="Адрес организации">
		<?php if ($isError === true): ?>
			<div class="err">Заполните все поля</div>
		<?php endif; ?>
		<button type="submit">Отправить</button>
	</form>
</div>