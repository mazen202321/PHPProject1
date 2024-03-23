<?php if(isset($_SESSION['errors'])):
foreach($_SESSION['errors'] as $error):?>
    <div class="alert alert-danger w-50" role="alert">
 <?= $error?>
</div>
<?php endforeach;
unset($_SESSION['errors']);
endif;

?>
<?php if(isset($_SESSION['success'])):?>
                <div class="alert alert-success w-50" role="alert">
  <?=$_SESSION['success']?>
</div>
<?php unset($_SESSION['success']); endif;?>