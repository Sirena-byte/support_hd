<div class="logo">
				<p>HD</p>
				<span>support</span>
			</div>
			<ul class="menu">
				<li class="item-menu dropdown">
					<div class="menu-item">
						<img src="template/icon/setting.png" alt="">
					   <p>Администрирование</p>
					</div>
					<ul class="sub-item">
						<li class="item">Пользователи
							 <ul class="sub-sub-item">
								  <li><a href="?page=employees">Список</a></li>
								  <li><a href="?page=addEmployee" class="">Создать</a></li>
							 </ul>
						</li>
						<li class="item">Группы
							 <ul class="sub-sub-item">
								  <li><a href="#">Список</a></li>
								  <li><a href="#">Создать</a></li>
							 </ul>
						</li>
						<li class="item">Организации
							 <ul class="sub-sub-item">
								  <li><a href="?page=organization">Список</a></li>
								  <li><a href="?page=addOrganization">Создать</a></li>
							 </ul>
						</li>
				  </ul>
					</li>
					<li class="item-menu dropdown">
						<div class="menu-item">
							<img src="template/icon/support.png" alt="">
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
								<img src="template/icon/education.png" alt="">
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
									<img src="template/icon/user_men.png" alt="">
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
<?php ?>