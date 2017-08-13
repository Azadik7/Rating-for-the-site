<?php
require ('db.php');
$like = $conn->query("SELECT * FROM  DATA WHERE news_id='5'");
$row = $like->fetch_assoc();

?>

<div style="width: 500px; margin: 20px auto;">

    <div>
        Like: <span class="video_like"><?=$row['likes']?></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Unlike: <span class="video_unlike"><?=$row['unlike']?></span>
    </div>


    <hr>
    <button class="secondary-button" onclick="getLike()">Like</button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button class="secondary-button" onclick="getUnLike()">Unlike</button>

</div>


<script type="text/javascript">
    var news_id = 5;
    function getLike() {
        $.ajax({
            type: "POST",
            url: "render.php",
            data: { likes: news_id},
            cache: false,
            success: function(data){
                console.log(data);
                $a = JSON.parse(data);

                $(".video_like").html($a.likes);
                $(".video_unlike").html($a.unlike);
            }
        });
        return false;
    }

    function getUnLike() {
        $.ajax({
            type: "POST",
            url: "render.php",
            data: { unlike: news_id},
            cache: false,
            success: function(data){
                    console.log(data);
                    $a = JSON.parse(data);
                    $(".video_like").html($a.likes);
                    $(".video_unlike").html($a.unlike);
        }
        });
        return false;
    }
</script>


<script src="jquery-3.2.1.min.js"></script>
