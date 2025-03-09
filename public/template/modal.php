<?php require_once("../employees/employee.php") ?>

	
<div class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Заполнить поля</h2>
        <form method="POST">
            <input type="text" name="surname" value="<?= htmlspecialchars($employee['surname']) ?>" placeholder="Фамилия">
            <input type="text" name="firstname" value="<?= htmlspecialchars($employee['firstname']) ?>" placeholder="Имя">
            <input type="text" name="lastname" value="<?= htmlspecialchars($employee['lastname']) ?>" placeholder="Отчество">

            <!-- Выпадающий список для организаций -->
            <select name="id_organization">
                <?php foreach ($organizations as $org): ?>
                    <option value="<?= htmlspecialchars($org['id_organization']) ?>"><?= htmlspecialchars($org['name'])??'1' ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Выпадающий список для отделов -->
            <select name="id_dep">
                <?php foreach ($departments as $dept): ?>
                    <option value="<?= htmlspecialchars($dept['id_dep']) ?>"><?= htmlspecialchars($dept['name'])??'2' ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Выпадающий список для должностей -->
            <select name="id_pos">
                <?php foreach ($positions as $pos): ?>
                    <option value="<?= htmlspecialchars($pos['id_pos']) ?>"><?= htmlspecialchars($pos['name']) ??'3'?></option>
                <?php endforeach; ?>
            </select>

            <input type="text" name="login" value="<?= htmlspecialchars($employee['login']) ?>" placeholder="Логин">
            <input type="text" name="pass" placeholder="Пароль"> <!-- Убираем value для пароля -->
<?php echo $this->getError();  ?>
            <button type="submit">Отправить</button>
        </form>
    </div>
</div>