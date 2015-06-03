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
        <div>
            <?php
                if ($_SESSION['level'] == 2 ) {
                    $x = Xcrud::get_instance();
                    $x->table('employee');
                    $x->relation('emp_type', 'emp_type', 'id', 'name');
                    $x->relation('user_id', 'user', 'id', 'username');
                    $x->columns('id,user_id,first_name,last_name,emp_type,create_date');
                    echo $x->render();
                } else {
                    $x = Xcrud::get_instance();
                    $x->table('employee');
                    $x->where('user_id =', $_SESSION['user_id']);
                    $x->relation('emp_type', 'emp_type', 'id', 'name');
                    $x->relation('user_id', 'user', 'id', 'username');
                    $x->columns('id,first_name,last_name,emp_type,create_date');
                    $x->unset_add();
                    $x->unset_edit();
                    echo $x->render();
                }
            ?>
        </div>
    </div>
<?php
$this->import("/layout/footer");