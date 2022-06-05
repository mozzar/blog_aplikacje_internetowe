<nav class="pagination" role="navigation" aria-label="pagination">




    <?php
    if($page < $max_page-1){
        ?>
        <a class="pagination-next" href="?page=<?=$page+1?>">Następna strona</a>
    <?php
    }
    ?>
    <?php
    if($page >= 1){
    ?>
    <a class="pagination-previous" href="?page=<?=$page-1?>">Poprzednia strona</a>
    <?php
    }
    ?>


    <ul class="pagination-list">
        <?php
        #$max_page = 10;
        #$page = 7;
        if($max_page>5){
            if($page <= 3){
                ?>
                <li>
                    <a class="pagination-link <?= ($page == 1)? "is-current" : ""?>" aria-label="Goto page 1" href="?page=1">1</a>
                </li>

                <li>
                    <a class="pagination-link <?= ($page == 2)? "is-current" : ""?>" aria-label="Goto page 2" href="?page=2">2</a>
                </li>
                <li>
                    <a class="pagination-link <?= ($page == 3)? "is-current" : ""?>" aria-label="Goto page 3" href="?page=3">3</a>
                </li>
                <li>
                    <a class="pagination-link <?= ($page == 4)? "is-current" : ""?>" aria-label="Goto page 4" href="?page=4">4</a>
                </li>
                <li>
                    <span class="pagination-ellipsis">&hellip;</span>
                </li>
                <li>
                    <a class="pagination-link" aria-label="Goto page <?=$max_page-1?>" href="?page=<?=$max_page-1?>"><?=$max_page-1?></a>
                </li>


                <?php
            }
            else if($page > 3 && $max_page-3 > $page){
                ?>
                <li>
                    <a class="pagination-link" aria-label="Goto page 1" href="?page=1">1</a>
                </li>
                <li>
                    <span class="pagination-ellipsis">&hellip;</span>
                </li>
                <li>
                    <a class="pagination-link" aria-label="Goto page <?=$page-1?>" href="?page=<?=$page-1?>"><?=$page-1?></a>
                </li>
                <li>
                    <a class="pagination-link is-current" aria-label="Goto page <?=$page?>" href="?page=<?=$page?>"><?=$page?></a>
                </li>
                <li>
                    <a class="pagination-link" aria-label="Goto page <?=$page+1?>" href="?page=<?=$page+1?>"><?=$page+1?></a>
                </li>
                <li>
                    <span class="pagination-ellipsis">&hellip;</span>
                </li>
                <li>
                    <a class="pagination-link" aria-label="Goto page <?=$max_page-1?>" href="?page=<?=$max_page-1?>"><?=$max_page-1?></a>
                </li>


                <?php
            }else if($max_page-3 <= $page){
                ?>
                <li>
                    <a class="pagination-link <?= ($page == 1)? "is-current" : ""?>" aria-label="Goto page 1" href="?page=1">1</a>
                </li>
                <li>
                    <span class="pagination-ellipsis">&hellip;</span>
                </li>
                <li>
                    <a class="pagination-link<?= ($max_page-4 == $page)?" is-current": "" ?>" aria-label="Goto page <?=$max_page-4?>" href="?page=<?=$max_page-4?>"><?=$max_page-4?></a>
                </li>
                <li>
                    <a class="pagination-link<?= ($max_page-3 == $page)?" is-current": "" ?>" aria-label="Goto page <?=$max_page-3?>" href="?page=<?=$max_page-3?>"><?=$max_page-3?></a>
                </li>
                <li>
                    <a class="pagination-link<?= ($max_page-2 == $page)?" is-current": "" ?>" aria-label="Goto page <?=$max_page-2?>" href="?page=<?=$max_page-2?>"><?=$max_page-2?></a>
                </li>

                <li>
                    <a class="pagination-link<?= ($max_page-1 == $page)?" is-current": "" ?>" aria-label="Goto page <?=$max_page-1?>" href="?page=<?=$max_page-1?>"><?=$max_page-1?></a>
                </li>


                <?php
            }
        }
        else if($max_page <= 5 && $max_page > 1){
            for($i=0; $i<$max_page; $i++){
                ?>
                <li>
                    <a class="pagination-link <?= ($i == $page)? "is-current" : ""?>" aria-label="Goto page <?=$i+1?>" href="?page=<?=$i?>"><?=$i+1?></a>
                </li>
                <?php
            }
        }

        ?>

    </ul>
</nav>