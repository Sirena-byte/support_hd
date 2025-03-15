<div class="footer-content">
    <div class="footer-content-selection">
        <label for="content-select">Строк на странице: </label>
        <select name="footer_selection_quantity" id="content-select">
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div class="footer-information">
        <?php require_once("model/set_rows.php"); ?>
        <p id="display-rows">Отображаются строки с <?= $rowPageStart ?> по <?= $rowPageFinish ?></p> <!-- Установим начальное значение 25 -->
    </div>
    <?php require_once("model/m_footer.php"); ?>
    <div class="footer-navigation">
        <div class="nav-content">
            <div class="item-nav"><img src="template/icon/footer/full-left.png" alt=""></div>
            <div class="item-nav"><img src="template/icon/footer/left.png" alt=""></div>
            <div class="item-nav">
                <div class="nav-page">
                <?php foreach($page as $item): ?>
                    <div class="item"><a href="#"><?= $item; ?></a></div>
                <? endforeach;?>
                </div>
            </div>
            <div class="item-nav"><img src="template/icon/footer/right.png" alt=""></div>
            <div class="item-nav"><img src="template/icon/footer/full-right.png" alt=""></div>
        </div>
    </div>
</div>
<script src="js/footer_script.js"></script>
