<html>
<head>
    <link href="style.css" rel="stylesheet" type="text/css"/>
	<title>TipC</title>
</head>
<body>
	<h1>Tip Calculator</h1>
	<div id="out">
        <form action="calc.php" method="post">
            <table border="0">
                <tr>
                    
                    <?php
                        if(!isset($_POST['bill']) || !is_numeric($_POST['bill']) || $_POST['bill'] < 1) {
                    ?>
                    <td class="red">Bill subtotal: $</td>
                    <?php
                        } else {
                    ?>
                    <td>Bill subtotal: $</td>
                    <?php
                        }
                    ?>
                    <td><input type="text" name="bill" value="<?php echo htmlspecialchars($_POST['bill']); ?>" /></td>
                </tr>
                
                <tr>
                    <?php
                        if(!isset($_POST['tip_percent'])) {
                    ?>
                    <td class="red">Tip percentage:</td>
                    <?php
                        } else {
                    ?>
                    <td>Tip percentage:</td>
                    <?php
                        }
                    ?>
                    <td>
                        <?php
                            for($i = 10; $i <= 20; $i += 5) {
                                if($_POST['tip_percent'] == $i) {
                                    echo "<input type=\"radio\" name=\"tip_percent\" value=\"$i\" checked />$i%";
                                } else {
                                    echo "<input type=\"radio\" name=\"tip_percent\" value=\"$i\"/>$i%";
                                }
                            }
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" name="calculate" value="Submit" /></td>
                </tr>
            </table>
        </form>
        
        <?php
            if(isset($_POST['bill'], $_POST['tip_percent'])) {
                //Checks if the data is numeric as it should be
                if(is_numeric($_POST['bill']) && is_numeric($_POST['tip_percent'])) {
                    if($_POST['bill'] > 0) {
                        echo "<div id=\"in\">";
                        $tip = number_format($_POST['bill'] * $_POST['tip_percent'] / 100, 2);
                        echo "Tip: $".$tip;
                        echo "<br/>Total: $".$total = $tip+$_POST['bill'];
                        echo "</div>";
                    }
                }
            }
        ?>
        
    </div>
</body>
</html>
