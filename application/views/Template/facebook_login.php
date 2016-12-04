<style>
.image img {
    border-radius:50%;
    vertical-align:top;
  }
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
<?php
if(!empty($authUrl)) {

	echo '<a href="'.$authUrl.'"><input class="btn btn-primary" type="button" id="sign-in-google" value="Facebook"></a>';
}else{

?>
<div class="dropdown">
  <span>   <?php
    echo '<p class="image"><img src="'.$userData['picture_url'].'" alt="" width="30px" height="30px"/></p>';
    ?></span>
  <div class="dropdown-content">
    <p><?php
      echo '<p><b>Name : </b>' . $userData['first_name'].' '.$userData['last_name'].'</p>';?>
      <p>Nhật ký hành trình</p>
       <p>Tư vấn hành trình du lịch</p>
    <?php echo '<p><a href="'.base_url().'/Map_HCM_C/logout">Logout</a></p>';?>

</p>
  </div>
</div>

<?php } ?>



