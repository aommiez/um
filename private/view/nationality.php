<?php


use Main\ThirdParty\Xcrud\Xcrud;
use Main\Helper;


$this->import("/layout/header");
?>
    <div class="container">
        <div><h2>สัญชาติ</h2></div>
        <div>
            <?php
            $x = Xcrud::get_instance();
            $x->table('nationality');
            $x->unset_title();
            $x->columns('id,nationality_name');
            echo $x->render();
            ?>
        </div>
    </div>
<?php
$this->import("/layout/footer");