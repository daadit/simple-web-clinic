<html>
<head>
    <title>Invoice Transaksi</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Plus Jakarta Sans'
        }
        #tabel
        {
            font-size:15px;
            border-collapse:collapse;
        }
        #tabel  td
        {
            padding-left:5px;
            border: 1px solid black;
        }
    </style>
</head>

<?php foreach ($transaksi as $data) : ?>
    <body style='font-family:tahoma; font-size:8pt;'>
        <center>
            <table style='width:800px; font-size:11pt; font-family:calibri; border-collapse: collapse;' border = '0'>
                <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'><b>TEST NEOSOFT</b></span></br>
                Jl. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque perspiciatis, dolores natus vitae quasi sapiente possimus modi totam! Blanditiis, quo!
                </td>
                <td style='vertical-align:top' width='30%' align='right'>
                <b><span style='font-size:12pt'>INVOICE TRANSAKSI</span></b></br>
                </td>
            </table>
            <br>
            <table style='width:800px; font-size:11pt; font-family:calibri; border-collapse: collapse;' border = '0'>
                <td width='50%' align='left' style='padding-right:80px; vertical-align:top'>
                Invoice : {{ $data->tnoinvoice }}</br>
                Tanggal : {{ $data->ttanggal }}</br>
                </td>
                <td width='50%' align='right' style='vertical-align:top'>
                ID Pasien : {{ $data->pasienkode }} <br>
                Nama Pasien : {{ $data->pasiennama }}
                </td>
            </table>
            <br>
            <table cellspacing='0' style='width:800px; font-size:11pt; font-family:calibri;  border-collapse: collapse;' border='1'>
                <tr align='center'>
                    <td width='21%'>Item yang dibeli</td>
                    <td width='20%'>Harga</td>
                    <td width='13%'>Jumlah</td>
                    <td width='13%'>SubTotal</td>
                </tr>
                <?php foreach ($detailtransaksi as $rowData) : ?>
                <tr>
                    <td style='text-align:center; vertical-align: top;'>{{ $rowData->barangnama }}</td>
                    <td style='text-align:center; vertical-align: top;'>@currency($rowData->barangharga)</td>
                    <td style='text-align:center; vertical-align: top;'>{{ $rowData->dtjumlah }}</td>
                    <td style='text-align:center; vertical-align: top;'>@currency($rowData->dttotal)</td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan = '3'><div style='text-align:right'>Total Item : </div></td>
                    <td style='text-align:center'>{{ $data->ttotalitem }}</td>
                </tr>
                <tr>
                    <td colspan = '3'><div style='text-align:right'>Total Harga : </div></td>
                    <td style='text-align:center'>@currency($data->ttotalharga)</td>
                </tr>
            </table>
            <br>
            <table width="800px" style="margin-top: 30px;">
                <tr>
                    <td style='border:1px solid black; padding:5px; text-align:left; width:50%'></td>
                    <td align='center'>Kasir,</br></br><br>(............)</td>
                </tr>
            </table>
        </center>
    </body>
<?php endforeach; ?>

<script>
    window.print();
</script>

</html>