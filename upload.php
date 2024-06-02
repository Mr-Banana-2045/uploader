<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<code>
<div class="container">
    <h1>
<?php
if(isset($_POST['submit'])) {
    if ($_POST['msg'] == "moz"){
        if(move_uploaded_file($_FILES['html_code']['tmp_name'], "html/" . basename($_POST['names'] . "_" . date('His')) . '.html')) {
            $link = "http://mrbanana2024.000.pe/html/" . basename($_POST['names'] . "_" . date('His')) . ".html";
            echo "page was created : <br><br><a href='{$link}'><button class='btn btn-success' style='margin-right:10px;'>SHOW</button></a><button class='btn btn-primary' id='copyText'>COPY</button><script> document.getElementById('copyText').addEventListener('click', function() { var text = '{$link}'; var tempInput = document.createElement('input');tempInput.value = text; document.body.appendChild(tempInput); tempInput.select(); document.execCommand('copy'); document.body.removeChild(tempInput); });</script>";
            file_get_contents(file_put_contents("data.txt",$_SERVER['REMOTE_ADDR'] . " | " . php_uname("s") . " | " . date("y:m:d | h:i:s") ." > " . $link . "\n", FILE_APPEND));
        } else {
            echo '<div class="alert alert-danger"><strong>Danger!</strong>Problem uploading the file</div>';
        }
    } else {
        echo '<div class="alert alert-danger"><strong>Danger!</strong>The password is incorrect</div>';
    }
} else {
    echo '<div class="alert alert-danger"><strong>Danger!</strong>Problem at the entrance</div>';
}
?>
</h1>
</div>
</code>
</body>
</html>
