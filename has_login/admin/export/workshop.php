<?php
//export.php  
require_once("../../../config/koneksi.php");
$output = '';

$query = mysqli_query($con, "SELECT * FROM workshop");
if (mysqli_num_rows($query) > 0) {
    $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                        
                    <th>No</th>

                    <th>Nama</th>

                    <th>Asal</th>

                    <th>Instansi</th>

                    <th>status</th>

                    <th>Handphone</th>

                    <th>Email</th>

                    <th>Acara</th>

                    </tr>
  ';
    $no = 1;
    while ($data = mysqli_fetch_array($query)) {
        $output .= '
    <tr>  
                         <td>' . $no . '</td>  
                         <td>' . $data['nama'] . '</td>  
                         <td>' . $data['asal'] . '</td>  
                         <td>' . $data['instansi'] . '</td>  
                         <td>' . $data['status'] . '</td>  
                         <td>' . $data['nohp'] . '</td>  
                         <td>' . $data['email'] . '</td>  
                         <td>' . $data['event'] . '</td>  

    </tr>
   ';
        $no++;
    }
    $output .= '</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=workshop.xls');
    echo $output;
}
