<?php
require_once("tcpdf/tcpdf.php");
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// barcode
$style_barcode = array(
    'position' => 'S',
    'border' => true,
    'padding' => 1,
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => array(255, 255, 255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 6,
    'stretchtext' => 4
);

// qrcode
$style_qrcode = array(
    'border' => 0,
    'vpadding' => '1',
    'hpadding' => '1',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => array(255, 255, 255), //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetDisplayMode('real');
$pdf->SetMargins(1, 2, 1, true);
$pdf->SetAutoPageBreak(false, 0);
// page front
$pdf->AddPage('P', array(62, 97));
$pdf->SetFont('helvetica', '', '8');
// warna
$detail['warna_kode'] = 'KUNING';
if ($detail['warna_kode'] == 'MERAH') {
    $line = 'white-line.jpg';
    $text = '#fff';
    $pdf->Rect(0, 0, 62, 97, 'DF', "", array(255, 0, 0));
} elseif ($detail['warna_kode'] == 'KUNING') {
    $line = 'black-line.jpg';
    $text = '#000';
    $pdf->Rect(0, 0, 62, 97, 'DF', "", array(255, 255, 0));
} elseif ($detail['warna_kode'] == 'BIRU') {
    $line = 'white-line.jpg';
    $text = '#fff';
    $pdf->Rect(0, 0, 62, 97, 'DF', "", array(0, 0, 255));
} else {
    $line = 'black-line.jpg';
    $text = '#000';
    $pdf->Rect(0, 0, 62, 97, 'DF', "", array(255, 255, 255));
}
// QR
$data_code = 'https://otban3.web.id/coba/';
$params_qrcode = $pdf->serializeTCPDFtagParameters(array($data_code, 'QRCODE,H', '', '', 15, 15, $style_qrcode, 'N'));

// create pdf
$html = '';
$kd = '';
$kd_1 = '';
$kd_2 = '';
$kd_3 = '';
$kd_4 = '';
$kd_5 = '';
$kd_6 = '';
$detail['kode_area'] = 'A P L';
$arr_area = explode(" ", $detail['kode_area']);
$ttl_area = count($arr_area);
if ($ttl_area == 1) {
    $kd_1 = '<td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[0] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
}
if ($ttl_area == 2) {
    $kd_1 = '<td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[0] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[1] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
}
if ($ttl_area == 3) {
    $kd_1 = '<td align="center" style="font-size: 12px;color: ' . $text . ';font-weight: bold;">' . $arr_area[0] . '</td>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[1] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[2] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
}
if ($ttl_area == 4) {
    $kd_1 = '<td align="center" style="font-size: 12px;color: ' . $text . ';font-weight: bold;">' . $arr_area[0] . '</td>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[1] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[2] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[3] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
}
if ($ttl_area == 5) {
    $kd_1 = '<td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[0] . '</td>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[1] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[2] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[3] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[4] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 0px;color: ' . $text . ';font-weight: bold;"></td></tr>';
}
if ($ttl_area == 6) {
    $kd_1 = '<td align="center" style="font-size: 12px;color: ' . $text . ';font-weight: bold;">' . $arr_area[0] . '</td>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[1] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[2] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[3] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[4] . '</td></tr>';
    $kd .= '<tr><td align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">' . $arr_area[5] . '</td></tr>';
}

$pas_name = 'PAS ORANG';
/*if ($detail['kode_pas_jabatan'] == 'OJT') {
    $pas_name = 'PAS ' . $detail['kode_pas_jabatan'];
}
*/
// parse data
$html .= '<table width="100%" cellspacing="4" border="0" >
        <tr>
            <td width="20%" align="center" rowspan="2"><img src="perhub.png" width="24px" style="vertical-align: middle;"></td>
            <td width="80%" align="center" style="color: ' . $text . ';font-weight: bold;">OTORITAS BANDAR UDARA<br>WILAYAH III</td>
        </tr>
    </table>
    <table width="100%" cellspacing="0" border="0">
        <tr>
            <td width="100%" align="center"><img src="' . $line . '" width="200px" height="2px"></td>
        </tr>
        <tr>
            
            <td width="100%" align="center" style="color: ' . $text . ';font-weight: bold;height: 1px;line-height:1px;margin-top:5px">BANDAR UDARA INTERNASIONAL JUANDA
            </td>
        </tr>
        <tr>
            <td width="100%" align="center" ><img src="' . $line . '" width="200px" height="2px"></td>
        </tr>
    </table>
    ';
$pas_foto = 'image.jpeg';
$html .= '<table width="100%" cellspacing="2" border="0">
        <tr>
            <td width="65%" align="center" style="font-size: 15px;color: ' . $text . ';font-weight: bold;">20-06-2023</td>
            <td width="35%" align="center" style="color: ' . $text . ';font-weight: bold;">Terminal<br>1, 2<br>Area</td>
        </tr>
        <tr>
            <td align="center" rowspan="7">
                <img src="' . $pas_foto . '" width="100px" height="120px">
            </td>
            ' . $kd_1 . '
        </tr>
        ' . $kd . '
    </table>
    <table width="100%" cellspacing="0" border="0">
        <tr>
            
            <td width="30%" align="center" rowspan="4">&nbsp;<tcpdf method="write2DBarcode" params="' . $params_qrcode . '" /></td>
            <td width="70%" align="left" style="color: ' . $text . ';font-weight: bold;">BAMBANG PURNOMO</td>
        </tr>
        <tr>
            <td align="left" style="color: ' . $text . ';font-weight: bold;">PT. ANGKASA PURA</td>
        </tr>
        <tr>
            <td align="left" style="color: ' . $text . ';font-weight: bold;">I.OBU.03.SUB.10001</td>
        </tr>
        <tr>
            <td align="left" style="color: ' . $text . ';font-weight: bold;"></td>
        </tr>
    </table>';
// parse download
$pdf->writeHTML($html, true, false, true, false, '');

// set the starting point for the page content
$pdf->setPageMark();
// output (D : download, I : view)
$detail['pas_number'] = 'OTBAN3';
$filename = "PAS_BARU_" . $detail['pas_number'];
$pdf->Output($filename . ".pdf", 'I');
