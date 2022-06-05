<?php

echo view('layout/header');
echo view('layout/navbar');
echo view('layout/flashdata');

?>

<div class="columns">
    <div class="column"></div>
    <div class="column is-6">


        <form method="POST" action="<?= base_url() ?>/login" accept-charset="UTF-8">
            <div class="field">
                <label class="label">E-mail</label>
                <div class="control">
                    <input required class="input" name="email" value="<?= old('email') ?>" type="email" placeholder="np. darth_vader@gmail.com">
                </div>
            </div>

            <div class="field">
                <label class="label">Hasło</label>
                <div class="control">
                    <input class="input" required minlength="5" type="password" name="password" placeholder="Twoje hasło">
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Zaloguj się</button>
                </div>

            </div>

        </form>


    </div>
    <div class="column"></div>


</div>


<?php

echo view('layout/footer');

?>
