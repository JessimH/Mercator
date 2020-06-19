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
        <a class="btn-see" style="margin-bottom: 20px; margin-left: 20px;" href="index.php?p=orders">Toutes les commandes</a>

        <?php $total=0 ?>
        <table>
            <tr>
                <td style="text-align: center;">
                    <h3 style="margin: 20px;">#</h3>
                </td>
                <td style="text-align: center;">
                    <h3 style="margin: 20px;">name</h3>
                </td>
                <td style="text-align: center;">
                    <h3 style="margin: 20px;">quantity</h3>
                </td>
                <td style="text-align: center;">
                    <h3 style="margin: 20px;">price</h3>
                </td>
            </tr>
            <?php foreach($orderD as $detail) :?>
                <tr>
                    <td style="text-align: center;"> 
                        <?= $detail['id'] ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $detail['name'] ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $detail['quantity'] ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $totalrow =  $detail['quantity']*$detail['price']?> M€
                    </td>
                </tr>
                <?php $total += $totalrow ?>
            <?php endforeach; ?>
            <tr>
                <td style="text-align: center;">
                    <h3 style="margin: 20px;">TOTAL :</h3>
                </td>
                <td style="text-align: center;">
                    <h3 style="margin: 20px;"><?= $total ?> M€</h3>
                </td>
            </tr>
      </table>
    </section>
    
</body>

</html>