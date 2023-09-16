<?php
date_default_timezone_set('Asia/Manila');

include "../../connection.php";
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: ../../../login.php");
}

$complaint_id = $_GET['ID'];
$random_number = mt_rand(3001, 3523);

$sql = "SELECT * FROM complaints WHERE complaint_id='$complaint_id'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$schedule_str = $row['new_schedule'];
$old_schedule_str = $row['old_schedule'];
$schedule_date = new DateTime($schedule_str);
$old_schedule_date = new DateTime($old_schedule_str);

$schedule_formatted = $schedule_date->format('F j, Y \a\t g:i A');
$old_schedule_formatted = $schedule_date->format('F j, Y \a\t g:i A');

$old_day = $old_schedule_date->format('F j, Y');

$formatted_time = $schedule_date->format('g:i A');
$day = $schedule_date->format('jS');
$month_year = $schedule_date->format('F Y');

if ($schedule_date->format('H:i') < '12:00') {
    $time_period = 'morning';
} elseif ($schedule_date->format('H:i') < '18:00') {
    $time_period = 'afternoon';
} else {
    $time_period = 'evening';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KP18</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.jss"></script>

    <style>
        div.header {
            line-height: 1.2;
        }

        div.statement span {
            line-height: 2;
        }

        div.statement u {
            font-weight: bold;
        }

        div.statement {
            text-align: justify;
        }
    </style>

</head>



<body onload="window.print()" onafterprint="self.close()">


    <div class="container">
        <span class="fw-bold"> <i>KP FORM # 18: NOTICE OF HEARING FOR COMPLAINANT </i> </span>
        <div class="header row mx-5 mt-2 text-center">
            <b>Republic of the Philippines</b>
            <b>Province of Davao Del Sur</b>
            <b>Davao City</b>
            <b>Baranggay Los Amigos</b>
        </div>

        <div class="header row mx-5 mt-4 text-center">
            <b>OFFICE OF THE LUPONG TAGAPAMAYAPA</b>
        </div>

        <div class="row mx-5">
            <div class="col mx-3">
                <p class="fw-bold mb-1 fs-6">
                    <?php
                    echo $row["complainant"]
                    ?>
                </p>
                <p class="fs-6">Complainant/s</p>


                <p class="ms-3 fs-6">-AGAINST-</p>

                <p class="fw-bold mb-1 fs-6">
                    <?php
                    echo $row["against"]
                    ?>
                </p>
                <p class="fs-6">Respondent/s</p>

            </div>
            <div class="col ms-3">Barangay Case No: <span class="fw-bold"><?php echo $random_number ?></span><br>
                For: <span class="fw-bold"><?php echo $row['purpose'] ?></span>
            </div>
        </div>

        <div class="header row mx-5 mt-2 text-center">
            <p class="mb-0 fw-bold">NOTICE OF HEARING
            </p>
            <p class="fw-bold">
                (CONCILIATION PROCEEDINGS)
            </p>
        </div>

        <div class="row mx-5">
            <div class="statement mx-3">
                <p>
                    <span class="ms-5">
                        You are hereby required to appear before the Pangkat on the
                    </span>
                    <span>
                        <u><?php echo $day ?></u>
                    </span>
                    <span>day of</span>
                    <u><?php echo $month_year ?></u>
                    <span>at</span>
                    <span>
                        <u><?php echo $formatted_time ?></u>
                    </span>
                    <span>o’clock in the <u><?php echo $time_period ?></u> to explain why you failed to appear for mediation/
                        conciliation scheduled on <u><?php echo $old_day ?></u> and why your complaint should not be dismissed, a certificate to bar the filing of your action on court/government office should not be issued, and contempt proceedings should not be initiated in court for willful failure or refusal to appear before the Punong Barangay/Pangkat ng Tagapagkasundo. </span>

                <p>
                    <span class="ms-5">
                        This <span> <?php
                                    echo date('jS');
                                    ?></span> day of <span><?php
                                                            echo date('F Y');
                                                            ?></span>.
                    </span>
                </p>
                </p>
            </div>
        </div>

        <div class="row mx-5">
            <div class="mx-3">
                <span class="fs-6">_____________________________ <br>
                    Punong Barangay/Pangkat Chairman <br>
                    (Cross out whichever is not applicable.)
                </span>
            </div>
        </div>

        <div class="row mx-5">
            <div class="statement mx-3">
                <p>
                <p>
                    <span class="ms-5">
                        Notified this <span> <?php
                                                echo date('jS');
                                                ?></span> day of <span><?php
                                                                        echo date('F Y');
                                                                        ?></span>.
                    </span>
                </p>
                </p>
            </div>
        </div>

        <div class="row mx-5">
            <div class="col mx-3">
                <p class="fw-bold mb-1 fs-6">
                    <?php
                    echo $row["complainant"]
                    ?>
                </p>
                <p class="fs-6">Complainant/s</p>

                <p class="fw-bold mb-1 fs-6">
                    <?php
                    echo $row["against"]
                    ?>
                </p>
                <p class="fs-6">Respondent/s</p>

            </div>
        </div>

    </div>



</body>

</html>