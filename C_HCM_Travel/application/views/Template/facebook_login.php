<?php
if(!empty($authUrl)) {
	echo '<a href="'.$authUrl.'"><img src="'.base_url().'public/map_libs/img/flogin.png" alt="" 
	width="150" height="50"/></a>';
}else{

?>
    <?php

    echo '<p class="image"><img src="'.$userData['picture_url'].'" alt="" width="100" height="50"/></p>';
    echo '<p><b>Name : </b>' . $userData['first_name'].' '.$userData['last_name'].'</p>';
    echo '<p><a href="'.base_url().'/Map_HCM_C/logout">Logout</a></p>';
    ?>

<?php } ?>


