
<?php

use App\Helpers\SeperateThreePosts;

echo view('layout/header');
echo view('layout/navbar');
echo view('layout/flashdata');
?>

<div class="columns">
    <div class="column"></div>
    <div class="column is-two-thirds">


<?php

$posts_count = count($posts);
$separated_posts = SeperateThreePosts::separate($posts);


if($posts_count > 3){
    $counter = 0;
    foreach($separated_posts as $post){
        if($counter % 2){
            //parzyste
            ?>
            <div class="tile is-ancestor">

                <div class="tile is-4 is-vertical is-parent">

                    <div class="tile is-child box">
                        <p class="title">
                            <a href="post/<?=$post[0]->id?>">
                                <?=$post[0]->title?>
                            </a>
                        </p>
                        <p>
                            <span class="tag is-info">Motoryzacja</span>
                        </p>
                        <p>
                            <?=$post[0]->description?>
                        </p>
                        <p class="is-size-7">Dodano: <?= $post[2]->created_at;?></p>
                    </div>

                    <div class="tile is-child box">
                        <p class="title">
                            <a href="post/<?=$post[1]->id?>">
                                <?=$post[1]->title?>
                            </a>
                        </p>
                        <p>
                            <span class="tag is-danger">Programowanie</span>
                        </p>
                        <p>
                            <?=$post[1]->description?>
                        </p>
                        <p class="is-size-7">Dodano: <?= $post[2]->created_at;?></p>
                    </div>

                </div>

                <div class="tile is-parent">

                    <div class="tile is-child box">
                        <p class="title">
                            <a href="post/<?=$post[2]->id?>">
                                <?=$post[2]->title?>
                            </a>
                        </p>
                        <p>
                            <span class="tag is-primary">Świat</span>
                            <span class="tag is-success">Humor</span>
                        </p>
                        <p>
                            <?=$post[2]->description?>
                        </p>
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/640x480.png">
                        </figure>
                        <p class="is-size-7">Dodano: <?= $post[2]->created_at;?></p>
                    </div>

                </div>

            </div>

            <?php
        }else{
            //nieparzyste
            ?>

            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <p class="title">
                            <a href="post/<?=$post[0]->id?>">
                                <?=$post[0]->title?>
                            </a>
                        </p>
                        <p>
                            <span class="tag is-link">Biologia</span>
                        </p>
                        <p>
                            <?=$post[0]->description?>
                        </p>
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/640x480.png">
                        </figure>
                        <p class="is-size-7">Dodano: <?= $post[2]->created_at;?></p>

                    </div>
                </div>

                <div class="tile is-4 is-vertical is-parent">

                    <div class="tile is-child box">
                        <p class="title">
                            <a href="post/<?=$post[1]->id?>">
                                <?=$post[1]->title?>
                            </a>
                        </p>
                        <p>
                            <span class="tag is-light">Fizyka</span>
                        </p>

                        <p>
                            <?=$post[1]->description?>
                        </p>
                        <p class="is-size-7">Dodano: <?= $post[2]->created_at;?></p>
                    </div>

                    <div class="tile is-child box">
                        <p class="title">
                            <a href="post/<?=$post[2]->id?>">
                                <?=$post[2]->title?>
                            </a>
                        </p>
                        <p>
                            <span class="tag is-warning">Chemia</span>
                        </p>
                        <p>
                            <?=$post[2]->description?>
                        </p>
                        <p class="is-size-7">Dodano: <?= $post[2]->created_at;?></p>
                    </div>
                </div>



            </div>

            <?php
        }




        $counter++;
    }





}else{
    echo "Obecnie brak postów.";
}


?>





    </div>
    <div class="column"></div>

</div>



<?php

echo view('layout/footer');
?>