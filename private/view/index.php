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
                    $x->table('user');
                    $x->relation('level', 'level', 'id', 'level_name');
                    $x->columns('id,username,email,level,first_name,last_name,tel_number,branch');
                    echo $x->render();
                } else if ( $_SESSION['level'] == 1 ) {
                    header( "location: ".Helper\URL::absolute('/employee'));
                    exit(0);
                }
            ?>
        </div>
    </div>
<?php
$this->import("/layout/footer");