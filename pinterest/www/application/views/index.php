<div class="container div_500px">
<?php
if(isset($keywords))
{
?>
<div class="row">
<center><h2>Search result by: <?=$keywords?></h2></center>
</div>
<?php
}
?>
<div class="row">
<?php
    $row_num = 4;
    $counter= 0;
    $result_array = $result->result_array();
    $size = count($result_array);
    if($size == 0)
    {
      echo "<center><H1>Don't have any pins, click <a href='".base_url()."welcome/stream/-1'>here </a>to discover more</h1></center>";
    }
    for($i= 0; $i < $row_num; $i++)
    {
      $j = 0;
      ?>      
      <div class="col-sm-3">

      <?php
      while(true)
      {
        if($i+$j*$row_num >= $size)
        {
          break;
        }
        $row = $result_array[$i+$j*$row_num];
      ?>
         <div class="thumbnail">
          <img class="user_img" data-src="holder.js/300x200" alt="300x200" src="<?=$row['store_url']?>" onclick="showpic('<?=$row['pid']?>','<?=$row['bid']?>')">
          
          <div class="caption">
            <h4><?=$row['pdesc']?></h4>
            <h5>owned by:<a href='<?=base_url()."user/id/".$row['uid']?>'> <?=$row['first_name']?></a>
            in <a href='<?=base_url()."board/id/".$row['bid']?>'><?=$row['bname']?></a>
            </h5>
            <p class="my_divide"></p>
            <p class="h5">
            <span class="board_span glyphicon glyphicon-heart"></span>
            <a href="<?=base_url()."like/add/".$row['pid']."/".$row['bid']."/".$GLOBALS['USER']['id']?>">like</a>
            <span class="glyphicon glyphicon-pushpin"></span>
            <a href="#" data-toggle="modal" data-target="#pin_url" onclick="pin_url('<?=$row['pid']?>')">pin</a>
            </p>
          </div>
        </div>

    <?php
        $j++;
      }
    ?>
      </div>
    <?php
    }
?>
</div>
</div>
