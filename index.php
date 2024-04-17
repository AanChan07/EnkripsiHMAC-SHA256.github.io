<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hello, world</title>
</head>
<body>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">Text Terenskripsi</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="teks" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                        <br>
                        <button type="submit" name="decrypt" class="btn btn-primary">Decrypt</button>
                    </div>
                </form>
            </div>
            <hr>
            <div class="modal-header">
                <h6 class="modal-title">Hasil =
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST["decrypt"])) {
                            echo stringEncryption('decrypt', $_POST['teks']);
                        }
                    }

                    function stringEncryption($action, $string) {
                        $output = false;
                        $encrypt_method = 'AES-256-CBC';
                        $secret_key = 'Some#Random_key!';
                        $secret_iv = '!IV@_$2';
                        $skey = hash('sha256', $secret_key);
                        $siv = substr(hash('sha256', $secret_iv), 0, 16);
                        
                        if ($action == 'decrypt') {
                            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $skey, 0, $siv);
                        }

                        return $output;
                    }
                    ?>
                </h6>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Tx/xjE0FqYhBSskxmoKpAIb+uA5p0U7kPR5r+LvX7k9sS+4+5B0cLqz2A0suW7Mk" crossorigin="anonymous"></script>

</body>
</html>
