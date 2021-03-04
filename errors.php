<?php
if (count($errors)>0):
    ?>
    <div class= "text-left error_content_two error">
        <?php foreach ($errors as $error):?>
            <p> <?php echo $error; ?></p>
        <?php endforeach ?>
    </div>
<?php endif;?>
