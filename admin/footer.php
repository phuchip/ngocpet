<?php if (!empty($_SESSION['current_user'])) { ?>
    <div class="clear-both"></div>
    </div>
    </div>
    <div id="admin-footer">
        <div class="container">
            <div class="left-panel">
                © Copyright 2020- Ngọc Pet
            </div>
            <div class="right-panel">
                <a target="_blank" href="https://www.facebook.com/Ng%E1%BB%8Dc-Pet-104100647932103/" title="Facebook Ngọc Pet"><img height="48" src="../images/facebook.png" /></a>
                <a target="_blank" href="https://www.youtube.com/embed/xAXa-p2VzBY" title="Youtube Ngọc Pet"><img height="48" src="../images/youtube.png" /></a>
            </div>
            <div class="clear-both"></div>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="box-content">
            Bạn chưa đăng nhập. Mời bạn quay lại đăng nhập quản trị <a href="index.php">tại đây</a>
        </div>
    </div>
<?php } ?>
</body>
</html>