<?php
/**
 *  index.php
 *  Project : um
 *
 *  Created by Issarapong Wongyai on 23/3/2558 14:58
 *  Copyright 2015 Issarapong Wongyai. All rights reserved.
 *
 *
 */

use Main\ThirdParty\Xcrud\Xcrud;
use Main\Helper;


$this->import("/layout/header");
?>
    <div class="container">
        <div><h2>นายจ้าง</h2></div>
        <div>
            <?php
            if ($_SESSION['level'] == 2 ) {
                $x = Xcrud::get_instance();
                $x->table('employer');
                $x->unset_title();
                //$x->relation('emp_type', 'emp_type', 'id', 'name');
                $x->relation('user_id', 'user', 'id', 'username');
                $x->columns('id,user_id,first_name,last_name,blacklist,update_time');
                $x->highlight_row('blacklist', '=', 1, '#F6CECE');
                echo $x->render();
            } else {
                $x = Xcrud::get_instance();
                $x->table('employer');
                $x->unset_title();
                //$x->where('user_id =', $_SESSION['user_id']);
                //$x->relation('emp_type', 'emp_type', 'id', 'name');
                $x->relation('user_id', 'user', 'id', 'username');
                $x->columns('id,first_name,last_name,blacklist,update_time');
                //$x->unset_add();
                $x->highlight_row('blacklist', '=', 1, '#F6CECE');
                //$x->unset_edit();
                echo $x->render();
            }
            ?>
        </div>
    </div>
<?php
$this->import("/layout/footer");