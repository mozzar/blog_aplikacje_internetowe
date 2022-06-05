<?php
echo view('layout/header');
echo view('layout/navbar');
echo view('layout/flashdata');
?>


<div class="columns">
    <div class="column"></div>
    <div class="column is-two-thirds">


        <div class="tabs is-centered">
            <ul>
                <li><a href="/panel/">Lista postów</a></li>
                <li class="is-active"><a href="/panel/post/">Dodaj post</a></li>
                <li><a>Kategorie</a></li>
                <li><a>Dodaj kategorie</a></li>
            </ul>
        </div>

        <div class="content">
        <h1 class="is-centered">Dodaj post</h1>
        </div>

        <form method="post" id="post_form">

            <div class="field">
                <label class="label">Tytuł posta</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-danger" type="text" name="title" placeholder="Wpisz tutaj tytuł posta"
                           value="<?=old('title')?>">
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
                           value="<?=old('slug')?>">
                    <span class="icon is-small is-left"><i class="fas fa-file-word"></i>
                    </span>

                </div>
                <p class="help is-danger">Popraw błędy</p>
            </div>

            <div class="field">
                <label class="label">Opis</label>
                <div class="control has-icons-left has-icons-right">
                    <textarea class="textarea is-danger" name="description" rows="2">
                        <?=old('description')?>
                    </textarea>

                </div>
                <p class="help is-danger">Popraw błędy</p>
            </div>

            <div class="field">
                <label class="label">Treść</label>
                <div class="control">
                    <div id="post_content" class="post_content">
                        <?=old('content')?>
                    </div>
                </div>
            </div>

            <input name="content" type="hidden" id="hiddenquill">

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <button class="button is-link">Dodaj nowy post</button>
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

</script>



<?php

echo view('layout/footer');
?>

