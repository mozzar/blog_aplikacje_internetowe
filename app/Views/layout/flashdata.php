<div class="columns" style="margin-top:20px;">
    <div class="column"></div>
    <div class="column is-two-thirds">

<?php
if(!empty(session()->getFlashdata('error'))){
    ?>
    <div class="notification is-danger">
        <button class="delete"></button>
        <?=session()->getFlashdata('error');?>
    </div>

    <?php
}
if(!empty(session()->getFlashdata('message'))){

    ?>
    <div class="notification is-primary">
        <button class="delete"></button>
        <?=session()->getFlashdata('message');?>
    </div>

    <?php
}
if(!empty(session()->getFlashdata('info'))){

    ?>
    <div class="notification is-info">
        <button class="delete"></button>
        <?=session()->getFlashdata('info');?>
    </div>

    <?php

}

if(!empty(session()->getFlashdata('success'))){

    ?>
    <div class="notification is-success">
        <button class="delete"></button>
        <?=session()->getFlashdata('success');?>
    </div>

    <?php

}

?>

    </div>
    <div class="column"></div>
</div>