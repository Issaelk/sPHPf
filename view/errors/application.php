<?php include('view/templates/header.php');?>
<h2>Application error</h2>
Some kind of error has occured in the application. Maybe the page
you are looking for does not exists.
<br /><br />
Error message:
<div style="background-color: beige">
    <span style="color: red">#<?php echo $vars['error']['code'];?></span> ---- 
    <span style="color: red"><?php echo $vars['error']['message'];?></span> ----- file:
    <span style="color: red"><?php echo $vars['error']['file'];?></span> ---- line:
    <span style="color: red"><?php echo $vars['error']['line'];?></span>
</div>
<?php include('view/templates/footer.php');?>