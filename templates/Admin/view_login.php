<form action="http://localhost/cakephp4_shop_cosmetic/process-login" method="post">
    <?php if(!empty($err)){
        echo $err;
    } ?><br>
    <?= $this->Flash->render('positive') ?>
    email<br>
    <input type="email" name="email"><br>
    passsword<br>
    <input type="password" name="password"><br>
    <button>Dang Nhap</button>
</form>
