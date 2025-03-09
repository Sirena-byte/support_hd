// Получаем модальное окно
var modal = document.querySelector('.modal');

// Получаем кнопку открытия модального окна
var openButtons = document.querySelectorAll('.openModal');

// Получаем кнопку закрытия модального окна
var closeButton = document.querySelector('.close');

// Добавляем обработчик клика для кнопок открытия
openButtons.forEach(function(button) {
    button.onclick = function(event) {
        event.preventDefault(); // Предотвращаем переход по ссылке
        modal.style.display = "block"; // Показываем модальное окно
    }
});

// Добавляем обработчик клика для кнопки закрытия
closeButton.onclick = function() {
    modal.style.display = "none"; // Скрываем модальное окно
}

// Закрытие модального окна при клике вне его
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none"; // Скрываем модальное окно
    }
}
/*---------------------------------------------------------------------*/

//для плавного отображения списков
document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll('.item-menu');

    menuItems.forEach(item => {
        const subItem = item.querySelector('.sub-item');

        item.addEventListener('mouseenter', () => {
            if (subItem) {
                subItem.classList.add('show'); // Показываем подменю
            }
        });

        item.addEventListener('mouseleave', () => {
            if (subItem) {
                subItem.classList.remove('show'); // Скрываем подменю
            }
        });

        const subItems = item.querySelectorAll('.sub-sub-item');

        subItems.forEach(sub => {
            sub.parentElement.addEventListener('mouseenter', () => {
                sub.style.display = "block"; // Показываем подпункты
            });
            sub.parentElement.addEventListener('mouseleave', () => {
                sub.style.display = "none"; // Скрываем подпункты
            });
        });
    });
});