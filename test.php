<?php

?>

<table width="400" border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td>Ranking</td>
    <td>NIP</td>
    <td>Nama</td>
  
  </tr>
<?php
 include 'lib/db.php';
 $query=mysqli_query($link,"SET @ranking=0;");
 $query=mysqli_query($link,"SELECT @ranking:=@ranking+1 AS ranking, user_id, score from users_score order by users_score.score desc");
 while($data=mysqli_fetch_array($query))
 {
?>
  <tr>
    <td><?php echo $data['ranking']; ?>&nbsp;</td>
    <td><?php echo $data['user_id']; ?>&nbsp;</td>
    <td><?php echo $data['score']; ?>&nbsp;</td>
    
  </tr>
<?php
 }
?>
</table>
