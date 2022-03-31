<?php
/*put this at the bottom of the page so any templates
 populate the flash variable and then display at the proper timing*/
?>
<div class="container" id="flash">
    <?php $messages = getMessages(); ?>
    <?php if ($messages) : ?>
        <?php foreach ($messages as $msg) : ?>
            <div class="row justify-content-center">
                <div class="alert alert-<?php se($msg, 'color', 'info'); ?>" role="alert"><?php se($msg, "text", ""); ?></div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<script>
    //used to pretend the flash messages are below the first nav element
    function moveMeUp(ele) {
        let target = document.getElementsByTagName("nav")[0];
        if (target) {
            target.after(ele);
        }
    }

    moveMeUp(document.getElementById("flash"));
</script>

<style>
 
    .alert-info, .alert-success, .alert-warning, .alert-danger {
        margin: 10px 0px;
        padding:12px;
    }

    .alert-info, {
        color: #00529B;
        background-color: #BDE5F8;
    }
    .alert-success {
        color: #4F8A10;
        background-color: #DFF2BF;
    }
    .alert-warning {
        color: #9F6000;
        background-color: #FEEFB3;
    }
    .alert-danger {
        color: #D8000C;
        background-color: #FFD2D2;
    }


</style>