<?php

require '../../config/Functions.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
	echo "
            <script>
                alert('Data berhasil dihapus !');
                document.location.href = 'ReqDatabuku.php';
            </script>
        ";
} else {
	echo "
            <script>
                alert('Data berhasil dihapus !');
                document.location.href = 'ReqDatabuku.php';
            </script>
        ";
}


?>