<div id="min-height" class="container-fluid" style="padding:30px">

        <div class="card-header">
          <h2 style="padding-top:20px; text-align:center; ">Notices </h2>
        </div>

<?php

//prePrint($notices);
//exit();
foreach($notices as $notice){
    
    $img = base_url()."uploads/".$notice['IMAGE_PATH'];
    
    ?>
    
    <ul class="list-group">
        <li class="list-group-item"><a href= '<?=$img?>' target='_new'><?=$notice['DESCRIPTION']?></li>
    </ul>


<?php } ?>


</div>


