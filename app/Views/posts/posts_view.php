

<?php

echo view('layout/header');
echo view('layout/navbar');
#print_r($categories);
?>

<br/>
<div class="columns">
    <div class="column"></div>
                <div class="column is-two-thirds">
            <div class="table-container is-centered">

                <table class="table is-striped">
                    <thead>
                    <tr>
                        <th>Tytuł</th>
                        <th>Opis</th>
                        <th>Utworzono</th>
                        <th>Autor</th>
                        <th>Akcje</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    if(!empty($posts)){
                        foreach($posts as $post){
                            ?>
                            <tr>
                                <td><?= $post->title ?></td>
                                <td><?= $post->description?></td>
                                <td><?= $post->created_at?></td>
                                <td><?= $post->name?></td>

                                <td>
                                    <div class="field is-grouped is-grouped-right">
                                        <a class="btn btn-danger" href="/post/<?=$post->id?>">
                                                    <span class="icon">
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                    </span>
                                        </a>

                                    </div>


                                </td>
                            </tr>

                            <?php
                            #echo '<p>';
                            #print_r($post);

                            #echo '<form method="post" action="/panel/post"><input type="submit" value="Usuń"/></form></p>';
                            //dodanie jsa do delete
                        }
                    }
                    ?>



                    </tbody>
                </table>

            </div>

            <?= view('layout/pagination')?>

                </div>
    <div class="column"></div>

</div>



<?php
echo view('layout/footer')
?>

