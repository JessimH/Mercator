<!DOCTYPE html>
<html lang="en">

<?php 
    require ('partials/meta.php');
?>

<body id="body" class="orders">
   <?php
   require ('partials/nav.php');
   ?>

    <section class=" all-v col center orders">
      <table>
            <tr>
                <td style="text-align: center;">
                    <h3 style="margin: 20px;">#</h3>
                </td>
                <td style="text-align: center;">
                    <h3 style="margin: 20px;">client</h3>
                </td>
                <td style="text-align: center;">
                    <h3 style="margin: 20px;">date</h3>
                </td>
                <td style="text-align: center;">
                    <h3 style="margin: 20px;">club</h3>
                </td>
            </tr>
            <?php foreach($orders as $order) :?>
                <tr>
                    <td style="text-align: center;">
                        <?= $order['id'] ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $order['username'] ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $order['date'] ?>
                    </td>
                    <?php foreach($clubs as $club) :?>
                        <?php if($club['id'] == $order['club_id']) :?>
                            <td style="text-align: center;">
                                <?= $club['name'] ?>
                            </td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td style="text-align: center;">
                       <a href="index.php?p=details&id=<?= $order['id'] ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                   </td>
                </tr>
            <?php endforeach; ?>
      </table>
    </section>
    
</body>

</html>