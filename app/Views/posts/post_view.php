<?php

echo view('layout/header');
echo view('layout/navbar');

foreach($post as $pd){
    $title = $pd->title;
    $description = $pd->description;
    $content = $pd->content;
}

?>


<div class="columns">
    <div class="column"></div>
    <div class="column is-two-thirds column-border">
        <br/>
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
                <li><a href="/">Strona główna</a></li>
                <li class="is-active"><a href="<?=current_url();?>" aria-current="page">Podgląd postu</a></li>
            </ul>
        </nav>
        <br/>
        <div class="content">
            <figure>
                <img src="
                data:image/jpeg;base64,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">
                <h1 class="is-vcentered"><?=$title?></h1>
                <p><?= $description?></p>
                <p><?= $content ?></p>

        </div>



    </div>
    <div class="column"></div>

</div>



    <?php
echo view('layout/footer')
?>
