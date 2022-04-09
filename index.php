<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Detect website visits with cookies</title>

    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center px-5 py-3">
                <h1>Enter Your Name</h1>
                <h5>We will record your every visit to this website</h5>
            </div>
            <div class="card-body px-5 py-3">
                <center>
                    <?php
                        if(isset($_POST["submit"])) {
                            // Baca data dari form
                            $username = $_POST['nama'];
                            $tgl = date("d/m/Y");
                            $counter = 1;

                            // SET COOKIE
                            setcookie('username', $username, time()+3*30*24*60*60);
                            setcookie('tgl', $tgl, time()+3*30*24*60*60);
                            setcookie('counter', $counter, time()+3*30*24*60*60);
                            header("Location:index.php");
                        }
                        if(!isset($_COOKIE['username'])) {
                            // Muncul Form
                            // echo "Belum ada cookie";
                    ?>
                    <form action="" method="POST">
                        <input type="text" name="nama" class="form-control w-50 mb-3 mt-5">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
                    <?php
                        } else {
                            if($_COOKIE['counter'] == 1) {
                                echo "<h3>Selamat datang, ".$_COOKIE['username']. ". Ini adalah kunjungan anda yang ke-". $_COOKIE['counter'].". Yaitu pada tanggal ".$_COOKIE['tgl']."</h3>";
                            } else {
                                // Kunjungan kedua
                                echo "<h3>Selamat datang, ". $_COOKIE['username']. ". Ini adalah kunjungan anda yang ke-".$_COOKIE['counter'].". Kunjungan anda sebelumnya adalah tanggal ".$_COOKIE['tgl']."</h3>";
                            }
                            setcookie('tgl', date("d/m/Y"), time()+3*30*24*60*60);
                            setcookie('counter', $_COOKIE['counter']+1, time()+3*30*24*60*60);
                            
                        }
                    ?>
                </center>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP BUNDLE JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>