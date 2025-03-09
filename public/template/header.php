
<div class="header">
<div class="logo">
				<p>HelpDesk</p>
				<span>support</span>
			</div>
			
			<ul class="menu">
				<li class="item-menu dropdown">
					<div class="menu-item">
						<img src="template/icon/settings.gif" alt="">
					   <p>Администрирование</p>
					</div>
					<ul class="sub-item">
						<li class="item">Пользователи
							 <ul class="sub-sub-item">
								  <li><a href="?page=employees">Список</a></li>
								  <li><a href="#" class="openModal">Создать</a></li>
								  <li><a href="?page=test2">пункт 1-3</a></li>
							 </ul>
						</li>
						<li class="item">Группы
							 <ul class="sub-sub-item">
								  <li><a href="#">Список</a></li>
								  <li><a href="#">Создать</a></li>
								  <li>пункт 2-3</li>
							 </ul>
						</li>
						<li class="item">Организации
							 <ul class="sub-sub-item">
								  <li><a href="#">Список</a></li>
								  <li><a href="#">Создать</a></li>
								  <li>пункт 3-3</li>
							 </ul>
						</li>
				  </ul>
					</li>
					<li class="item-menu dropdown">
						<div class="menu-item">
							<img src="template/icon/support.gif" alt="">
							<p>Поддержка</p>
						</div>
						<ul class="sub-item">
							<li class="item">пункт 1
								 <ul class="sub-sub-item">
									  <li><a href="#">пункт 1-1</a></li>
									  <li>пункт 1-2</li>
									  <li>пункт 1-3</li>
								 </ul>
							</li>
							<li class="item">пункт 2
								 <ul class="sub-sub-item">
									  <li>пункт 2-1</li>
									  <li>пункт 2-2</li>
									  <li>пункт 2-3</li>
								 </ul>
							</li>
							<li class="item">пункт 3
								 <ul class="sub-sub-item">
									  <li>пункт 3-1</li>
									  <li>пункт 3-2</li>
									  <li>пункт 3-3</li>
								 </ul>
							</li>
					  </ul>
						</li>
						<li class="item-menu dropdown">
							<div class="menu-item">
								<img src="template/icon/knowlege.gif" alt="">
								<p>База знаний</p>
							</div>
							<ul class="sub-item">
								<li class="item">пункт 1
									 <ul class="sub-sub-item">
										  <li>пункт 1-1</li>
										  <li>пункт 1-2</li>
										  <li>пункт 1-3</li>
									 </ul>
								</li>
								<li class="item">пункт 2
									 <ul class="sub-sub-item">
										  <li>пункт 2-1</li>
										  <li>пункт 2-2</li>
										  <li>пункт 2-3</li>
									 </ul>
								</li>
								<li class="item">пункт 3
									 <ul class="sub-sub-item">
										  <li>пункт 3-1</li>
										  <li>пункт 3-2</li>
										  <li>пункт 3-3</li>
									 </ul>
								</li>
						  </ul>
							</li>
							<li class="item-menu dropdown">
								<div class="menu-item">
									<img src="template/icon/user_men.gif" alt="">
									<p><?=$login ?? 'Личный кабинет'?></p>
								</div>
								<ul class="sub-item">
									<li class="item"><a href="#" class="openModal">Войти</a>
									</li>
									<li class="item">Настройки
									</li>
							  </ul>
							</li>
			</ul>
		</div>
</div>


		<!-- Модальное окно -->
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
                    <option value="<?= htmlspecialchars($org['id_organization']) ?>"><?= htmlspecialchars($org['name']) ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Выпадающий список для отделов -->
            <select name="id_dep">
                <?php foreach ($departments as $dept): ?>
                    <option value="<?= htmlspecialchars($dept['id_dep']) ?>"><?= htmlspecialchars($dept['name']) ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Выпадающий список для должностей -->
            <select name="id_pos">
                <?php foreach ($positions as $pos): ?>
                    <option value="<?= htmlspecialchars($pos['id_pos']) ?>"><?= htmlspecialchars($pos['name']) ?></option>
                <?php endforeach; ?>
            </select>

            <input type="text" name="login" value="<?= htmlspecialchars($employee['login']) ?>" placeholder="Логин">
            <input type="text" name="pass" placeholder="Пароль"> <!-- Убираем value для пароля -->

            <button type="submit">Отправить</button>
        </form>
    </div>
</div>
<script src="script.js"></script>