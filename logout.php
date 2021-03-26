<!--START LOGOUT CODE-->
<?php
session_start();
session_destroy();
echo'<script>location.href="index.php"</script>';
?>
<!--END LOGOUT CODE-->