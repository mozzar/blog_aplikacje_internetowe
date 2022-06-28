<?php

echo view('layout/header');
echo view('layout/navbar');
#print_r($categories);
?>

<br/>
<div class="columns">
    <div class="column"></div>
    <div class="column is-two-thirds">
        <?php
        foreach($categories as $category){

            ?>
        <div class="columns is-vcentered">
            <div class="column is-12">
                <div class="is-vcentered">
                    <div class="mt-6">

                        <span class="tag <?=$category['color']?> is-large"><?=$category['category_name']?></span>
                        <div class="is-size-6">
                            <?= $category['category_description']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="columns">
                <?php
                if(count($category['posts'])>0){
                    foreach($category['posts'] as $post){
                    //print_r($post->);
                    ?>
                    <div class="column is-3">

                        <div class="card" style="height: 100%;">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <!--https://bulma.io/images/placeholders/1280x960.png-->
                                    <img src="<?=base_url()?>/img/<?=$post->image_name?>" alt="<?=base_url()?>">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">

                                    <div class="media-content">
                                        <p class="title is-6"><?=$post->title?></p>
                                        <p class="subtitle is-7">Autor: <?=$post->author?></p>
                                        <p class="subtitle is-7">Dodano: <?=$post->created_at?></p>
                                    </div>
                                </div>

                                <div class="content">
                                    <?= substr($post->description, 0,100)?>
                                    <a href="<?=base_url()?>/post/<?=$post->post_id?>">Czytaj dalej</a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <?php
                    }
                }else{
                    ?>
                <div class="column is-12">
                    <div class="notification is-info is-light">
                        Ta kategoria nie zawiera obecnie postów :(
                    </div>
                </div>

                    <?php
                }
                ?>





            </div>



        <?php
        }


        ?>



    </div>
    <div class="column"></div>

</div>



<?php
echo view('layout/footer')
?>
