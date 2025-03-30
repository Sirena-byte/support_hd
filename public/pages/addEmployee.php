<?php
require_once("model/m_employees.php");
?>

<div class="addata addemployee">
    <h2>Добавить сотрудника</h2>
    <div class="form-content">
        <form method="POST">
            <input type="text" name="surname" value="<?=$surname;?>" placeholder="Фамилия" required>
            <input type="text" name="firstname" value="<?= $firstname; ?>" placeholder="Имя" required>
            <input type="text" name="lastname" value="<?=$lastname; ?>" placeholder="Отчество" required>

            <div class="content-checkbox">
                <label for="organization">Место работы</label>
                <select id="organization" name="organization" required onchange="this.form.submit()">
                    <option value="">Выберите организацию</option>
                    <?php foreach ($organizations as $organization): ?>
                        <option value="<?= $organization['id_organization']; ?>" <?= ($organization['id_organization'] == $selectedOrganizationId) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($organization['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
				
            <div class="content-checkbox">
                <label for="department">Отдел:</label>
                <select id="department" name="department" required  onchange="this.form.submit()">
                    <option value="">Выберите отдел:</option>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?= $department['id_department']; ?>" <?= ($department['id_department'] == $selectedDepartmentId) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($department['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

				<div class="content-checkbox">
                <label for="position">Должность:</label>
                <select id="position" name="position" required>
                    <option value="">Выберите должность</option>
                    <?php foreach ($positions as $position): ?>
                        <option value="<?= $position['id_position']; ?>" <?= ($position['id_position'] == $selectedPositionId) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($position['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="text" name="login" value="<?= $login ?>" placeholder="Логин" required>
            <input type="text" name="pass" value="" placeholder="Пароль" required>

            <!-- Проверка на ошибки и вывод сообщения, если есть ошибка -->
            <?php if ($isError === true): ?>
                <div class="err">Заполните все поля</div>
            <?php endif; ?>

            <button type="submit">Отправить</button>
        </form>
    </div>

</div>