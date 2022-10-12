<?php

    use yii\helpers\Html;
    
    $this->title = 'View Post';
    /* @var $this yii\web\View */
    /* @var $model app\models\Post */


    ?>
    <div class="post-view">

    
        <div class="p-2" style='border:1px solid black;background-color:bisque' >
            <p class='mt-sm5' >

                <h5 ><?php print_r($post_data->title);?></h5><hr><br>
                <img src="upload/<?=$post_data['image']?>" width="100%" height="230px"><br><hr> 
                <?php print_r($post_data->description);?><hr><br>

                <div style="text-align:right">
                <?php print_r($post_data->updated_at);?><br>
                </div>


            </p>
        </div>

        <p>       
            <br>
            <?= Html::a('Edit', ['edit', 'id' => $post_data->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $post_data->id], [
                'class' => 'btn btn-secondary',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Back', ['site/index'], ['class' => 'btn btn-success']) ?>
            
            

            <span>
                <?php $baseUrl="http://google.com"; ?>
                <button class="btn btn-primary" ><a style="text-decoration-line:none;color:white;" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo $baseUrl?>">share on facebook</a></button>
            </span>

           
          <!--  <iframe  class="btn btn-primary" src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button&size=large&width=100&height=40&appId" width="100" height="40" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
              
            <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flocalhost%2Fgurunath-assignment%2Fweb%2Findex.php%3Fr%3Dpost%252Fview%26id%3D14&layout=button_count&size=small&width=77&height=20&appId" width="77" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>-->
        </p>
        
    </div>
    