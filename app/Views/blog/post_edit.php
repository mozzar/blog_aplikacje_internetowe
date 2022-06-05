<?php
echo view('layout/header');
echo view('layout/navbar');
echo view('layout/flashdata');


$title = $post->title;
$description = trim($post->description);
$slug = $post->slug;
$content = $post->content;
$edited_at = $post->edited_at;
if(!empty(old('title'))){
    $title = old('title');
}

if(!empty(old('description'))){
    $description = trim(old('description'));
}

if(!empty(old('slug'))){
    $slug = old('slug');
}
if(!empty(old('content'))){
    $content = old('content');
}

?>


<div class="columns">
    <div class="column"></div>
    <div class="column is-two-thirds">


        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
                <li><a href="/panel">Panel</a></li>
                <li class="is-active"><a href="<?=current_url();?>" aria-current="page">Edycja posta</a></li>
            </ul>
        </nav>

        <div class="content">
            <h1 class="is-centered">Edytuj post</h1>
            <small>Ostatnia edycja: <?=empty($edited_at)? "Brak" : $edited_at ?></small>

        </div>

        <form method="post" id="post_form">

            <div class="field">
                <label class="label">Tytuł posta</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-danger" type="text" name="title" placeholder="Wpisz tutaj tytuł posta"
                           value="<?=$title?>">
                    <span class="icon is-small is-left"><i class="fas fa-file-lines"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                </div>
                <p class="help is-danger">Popraw błędy</p>
            </div>

            <div class="field">
                <label class="label">Slug (wyświetlany w tytule strony) max. 50 znaków</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-danger" type="text" name="slug" maxlength="50" placeholder="Wpisz tutaj slug"
                           value="<?=$slug?>">
                    <span class="icon is-small is-left"><i class="fas fa-file-word"></i>
                    </span>

                </div>
                <p class="help is-danger">Popraw błędy</p>
            </div>

            <div class="field">
                <label class="label">Opis</label>
                <div class="control has-icons-left has-icons-right">
                    <textarea class="textarea is-danger" name="description" rows="2"><?=$description?></textarea>

                </div>
                <p class="help is-danger">Popraw błędy</p>
            </div>

            <div class="field">
                <label class="label">Treść</label>
                <div class="control">
                    <div id="post_content" class="post_content">

                    </div>
                </div>
            </div>

            <input name="content" type="hidden" id="hiddenquill">

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <button class="button is-link">Edytuj post</button>
                </div>
            </div>

        </form>



    </div>
    <div class="column"></div>
</div>

<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script type="text/javascript">
    let quill = new Quill('.post_content', {
        modules: { toolbar: true },
        theme: 'snow'
    });
    Quill.prototype.getCont = function(){
        return this.container.querySelector('.ql-editor').innerHTML;
    }
    Quill.prototype.setCont = function(content){
        this.container.querySelector('.ql-editor').innerHTML = content;
    }

    quill.on('text-change', function (){
        document.getElementById("hiddenquill").value = quill.getCont();
    })

   $(function(){
        quill.setCont(`<?php echo ($content);?>`);
    });

</script>



<?php

echo view('layout/footer');
?>

