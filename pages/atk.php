<?php
require("../client/connect.php");

date_default_timezone_set("Asia/Bangkok");

function formatDate($dateTH, $mountTH, $yearTH)
{
    switch ($dateTH[1]) {
        case '01':
            $mountTH = "มกราคม";
            break;
        case '02':
            $mountTH = "กุมภาพันธ์";
            break;
        case '03':
            $mountTH = "มีนาคม";
            break;
        case '04':
            $mountTH = "เมษายน";
            break;
        case '05':
            $mountTH = "พฤษภาคม";
            break;
        case '06':
            $mountTH = "มิถุนายน";
            break;
        case '07':
            $mountTH = "กรกฎาคม";
            break;
        case '08':
            $mountTH = "สิงหาคม";
            break;
        case '09':
            $mountTH = "กันยายน";
            break;
        case '10':
            $mountTH = "ตุลาคม";
            break;
        case '11':
            $mountTH = "พฤศจิกายน";
            break;
        case '12':
            $mountTH = "ธันวาคม";
            break;
    }

    return $dateTH[2] . ' ' . $mountTH . ' ' .  $yearTH;
}


$queryATK = "SELECT * FROM vaccine as a 
             INNER JOIN detail_std as b ON a.id_std = b.id_std
             WHERE a.id_std = '" . $user . "'";

$result = $conn->query($queryATK);
$row = $result->fetch_assoc();
// 2022-07-29 05:55:17.74698
$formatDate = explode(" ", $row['time'])[0];
$dateTH = explode("-", $formatDate);
$yearTH = $dateTH[0] + 543;
$mountTH = "";
$dateTHFormat = formatDate($dateTH, $mountTH, $yearTH);

$limit = date('Y/m/d', strtotime($dateTH[0] . '/' . $dateTH[1] . '/' . $dateTH[2] . "+14 days"));
$limitFormat = explode(' ', $limit)[0];
$limitTH = explode("/", $limitFormat);
$limitYearTH = $limitTH[0] + 543;
$limitMountTH = "";
$limitDate = formatDate($limitTH, $limitMountTH, $limitYearTH);

$startTimeStamp = strtotime($dateTH[0] . '/' . $dateTH[1] . '/' . $dateTH[2]);
$endTimeStamp = strtotime("2022/08/11");
$timeDiff = abs($endTimeStamp - $startTimeStamp);
$numberDays = $timeDiff / 86400;
$numberDays = intval($numberDays);
?>
<section class="vh-100" style="background-color: #9de2ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-md-9 col-lg-7 col-xl-5">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-12">
                                <img src="<?php echo $row["img"]; ?>" alt="Generic placeholder image" class="img-fluid mb-3">
                            </div>
                            <div class="row col-12">
                                <h5 class="mb-1"><?php echo $row["fname"] . '   ' . $row["lname"]; ?></h5>
                                <p class="mb-2 pb-1" style="color: #2b2a2a;"><?php echo $row["id_std"]; ?></p>
                                <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                    <div class="col-4">
                                        <p class="small text-muted mb-1">วันที่อัพโหลด</p>
                                        <p class="mb-0"><?php echo $dateTHFormat; ?></p>
                                    </div>
                                    <div class="col-4">
                                        <p class="small text-muted mb-1">วันที่หมดอายุ</p>
                                        <p class="mb-0"><?php echo $limitDate; ?></p>
                                    </div>
                                    <div class="col-4">
                                        <p class="small text-muted mb-1">เหลือเวลาอีก</p>
                                        <p class="mb-0"><?php echo $numberDays; ?> วัน</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>