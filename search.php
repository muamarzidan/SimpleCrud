<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
                     
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>


<?php
$search=$_POST['search'];
$link = mysqli_connect("localhost", "root","","buku2");
$result = mysqli_query($link, "select * from tabel_buku where judul_buku = '$search'");
$jumlah = mysqli_num_rows($result);
   echo 
    
    "
    <div class='container'>
        <div class='row'>
            <nav class='navbar navbar-expand-lg navbar-light bg-white'>
                <div class='container-fluid'>
                    <h1>Cari Data Buku</h1>                   
                    <a href='tampil.php'>
                    </a>
                    <form class='d-flex' role='search' method='post' action='search.php'>
                        <input type='text' name='search' class='form-control' placeholder='Cari Data Buku'>
                        &nbsp
                        <button class='btn btn-outline-success' type='submit' value'search'>Search</button>
                    <form>
                </div>
            </nav>
        </div>
    </div>";

echo " <div class='container'>
           Data buku: $jumlah
        </div>";

while($para = mysqli_fetch_array($result))
{
    echo 
        "<br>
        <div class='container'>
            <div class='card' style='width: 100%;'>
                <ul class='list-group list-group-flush'>
                    <li class='list-group-item'><h6>Judul Buku :</h6>  $para[1]</li>
                    <li class='list-group-item'><h6>Penulis :</h6> $para[2]</li>
                    <li class='list-group-item'><h6>Jenis Buku :</h6> $para[3]</li>
                    <li class='list-group-item'><h6>Gambar Buku :</h6><img src='gambar/".$para[4]."'></li>
                    <li class='list-group-item'><h6><a href='ubah_data.php?id_buku=$para[0]' class='btn btn-warning btn-sm'>Ubah</a>&nbsp&nbsp&nbsp<a href='hapus.php?id_buku=$para[0]' class='btn btn-warning btn-sm'>Hapus</a></li>
                    <button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal'>
                    Lihat Data
                    </button>
                </ul>
            </div>    
        </div>  
        ";
}
?>
