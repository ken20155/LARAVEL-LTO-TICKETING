<main role="main" class="main-content">


    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-12">

            <div class="row align-items-center mb-2">
                <div class="col">
                    
<h2
class="my-6 text-2xl font-semibold text-gray-700 light:text-gray-200" style="color: #fff !important"
>

<?php
if ($session['session']['user_id'] == 1) {
   echo $title;
}

?>
</h2>
                </div>
            </div>

            <?= $content ?>

        </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->





</main>