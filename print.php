<?php
    ob_start();
    include "connect.php";

    $sql = "SELECT * FROM flights 
            JOIN planes ON flights.plane_id = planes.id
            JOIN ref_arrivals ON flights.arrival_id = ref_arrivals.id";
    
    $datas = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            padding: 3px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nomor Penerbangan</th>
            <th>Pesawat</th>
            <th>Keberangkatan</th>
            <th>Kedatangan</th>
            <th>Tanggal</th>
            <th>Waktu keberangkatan</th>
            <th>Waktu kedatangan</th>
            <th>Harga</th>
        </tr>
        <?php foreach($datas as $data): ?>
            <?php
                $date = date_create($data['date']);
                $timeout = date_create($data['timeout']);
                $timein = date_create($data['timein']);
            ?>
            <tr>
                <td><?php echo $data['flight_no']; ?></td>
                <td><?php echo $data['plane_id']; ?></td>
                <td><?php echo $data['departure']; ?></td>
                <td><?php echo $data['arrival']; ?></td>
                <td><?php echo date_format($date, "d M Y"); ?></td>
                <td><?php echo date_format($timeout, "H:i"); ?></td>
                <td><?php echo date_format($timein, "H:i"); ?></td>
                <td><?php echo number_format($data['price'], 0, ",", "."); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>

<?php
    require './mpdf/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'margin_top' => 25,
        'margin_bottom' => 25,
        'margin_left' => 25,
        'margin_right' => 25,
    ]);

    $html = ob_get_contents();

    ob_end_clean();
    $mpdf->WriteHTML(utf8_encode($html));

    $content = $mpdf->Output("cetak.pdf", "D");
?>