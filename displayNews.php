<div id="min-height" class="container-fluid" style="padding:30px">
    <div class="card-header">
          <h2 style="padding-top:20px; text-align:center; ">Latest News</h2>
    </div>


<?php

//prePrint($notices);
//exit();
foreach($news as $notice){
    
    $img = base_url()."uploads/".$notice['IMAGE'];
    
    ?>
    
    <ul class="list-group">
        <li class="list-group-item"><a href= '<?=$img?>' target='_blank'><?=$notice['DESCRIPTION']?></li>
    </ul>


<?php } ?>


</div>

