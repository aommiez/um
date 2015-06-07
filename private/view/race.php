<?php


use Main\ThirdParty\Xcrud\Xcrud;
use Main\Helper;


$this->import("/layout/header");
?>
    <div class="container">
        <div><h2>เชื้อชาติ</h2></div>
        <div>
            <?php
            $x = Xcrud::get_instance();
            $x->table('race');
            $x->unset_title();
            $x->columns('id,race_name');
            echo $x->render();
            ?>
        </div>
    </div>
<?php
$this->import("/layout/footer");