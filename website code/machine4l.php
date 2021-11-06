<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>MES STATISTICS</title>
<link rel="stylesheet" href="style.css">
<link rel="icon" href="icon.png">
</head>

<?php
    $conn = pg_connect("host=db.fe.up.pt dbname=siem2031 user=siem2031 password=GXJmRYvk");

    if (!$conn) {
    echo "Ligação não foi estabelecida";
    }

    $query = "SET SCHEMA 'fabrica'";
    pg_exec($query);    
    
    $query = "SELECT * FROM stats_mach WHERE machid=4;";
    $result = pg_exec($query);
    $row = pg_fetch_assoc($result);

    $query = "SELECT p1p2 + p2p3 + p3p4 + p4p5 + p5p6 + p5p9 + p6p7 + p6p8 AS total  FROM stats_mach WHERE machid=4;";
    $result1 = pg_exec($query);
    $total = pg_fetch_assoc($result1);
?>

<body>

    <header>
        <div class="left">
            <a href="index.html">STATISTICS</a>
        </div>
        <div class="right">
            <p> <span style="color:white;"> <a href="machines.php"> Machines </a></span></p>
            <p> <a href="unload.php"> Unload </a></p>
            <p> <a href="order.php"> Orders </a></p>
        </div>
    </header>

    <div class="title">Machine 4 Left Side</div>

    <div class="machine_body">

        <div class="machine_body2">
            <div class="machine_title">Left side</div>
            <a href="machine4l.php"><div class="machine_button_R" style="background-color: green;">Machine 4</div></a>
            <a href="machine3l.php"><div class="machine_button_R">Machine 3</div></a>
            <a href="machine2l.php"><div class="machine_button_R">Machine 2</div></a>
            <a href="machine1l.php"><div class="machine_button_R">Machine 1</div></a>
        </div>

        <div class="machine_body2">
            <div class="machine_title">Right side</div>
            <a href="machine4r.php"><div class="machine_button_R">Machine 4</div></a>
            <a href="machine3r.php"><div class="machine_button_R">Machine 3</div></a>
            <a href="machine2r.php"><div class="machine_button_R">Machine 2</div></a>
            <a href="machine1r.php"><div class="machine_button_R">Machine 1</div></a>
        </div>

        <div class="machine_body2" style="width:50%;justify-content:flex-end;align-items:flex-start">
            <div class="grid-container">
                <div class="p1p2">P1->P2: <?php echo $row['p1p2']?></div>
                <div class="p2p3">P2->P3: <?php echo $row['p2p3']?></div>
                <div class="p3p4">P3->P4: <?php echo $row['p3p4']?></div>
                <div class="p4p5">P4->P5: <?php echo $row['p4p5']?></div>
                <div class="time">Total time: <?php echo $row['machtime']?>s</div>
                <div class="total">Total operations: <?php echo $total['total']?></div>
                <div class="p5p6">P5->P6: <?php echo $row['p5p6']?></div>
                <div class="p5p9">P5->P9: <?php echo $row['p5p9']?></div>
                <div class="p6p7">P6->P7: <?php echo $row['p6p7']?></div>
                <div class="p6p8">P6->P8: <?php echo $row['p6p8']?></div>
            </div>

            <a href="machine4l.php" style="height:15%;width:90%;"><div class="machine_button_L" style="margin:0px;">REFRESH</div></a>
        </div>

    </div>

</body>



</html>