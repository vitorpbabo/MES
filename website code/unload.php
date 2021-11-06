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
    
    $query = "SELECT * FROM stats_unload WHERE id=1;";
    $result = pg_exec($query);
    $row1 = pg_fetch_assoc($result);

    $query = "SELECT p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9 AS total  FROM stats_unload WHERE id=1;";
    $result = pg_exec($query);
    $total1 = pg_fetch_assoc($result);

    $query = "SELECT * FROM stats_unload WHERE id=2;";
    $result = pg_exec($query);
    $row2 = pg_fetch_assoc($result);

    $query = "SELECT p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9 AS total  FROM stats_unload WHERE id=2;";
    $result = pg_exec($query);
    $total2 = pg_fetch_assoc($result);

    $query = "SELECT * FROM stats_unload WHERE id=3;";
    $result = pg_exec($query);
    $row3 = pg_fetch_assoc($result);

    $query = "SELECT p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9 AS total  FROM stats_unload WHERE id=3;";
    $result = pg_exec($query);
    $total3 = pg_fetch_assoc($result);
?>

<body>

    <header>
        <div class="left">
            <a href="index.html">STATISTICS</a>
        </div>
        <div class="right">
            <p> <a href="machines.php"> Machines </a></p>
            <p> <span style="color:white;"> <a href="unload.php"> Unload </a></span></p>
            <p> <a href="order.php"> Orders </a></p>
        </div>
    </header>
    
    <div class="title" style="position:relative;">Unload</div>

    <div class="unload_body">
        <div class="unload_col">
            <div class="col_title">Zone 1</div>
            <div class="grid-container1">
                <div class="p1">P1: <?php echo $row1['p1']?></div>
                <div class="p2">P2: <?php echo $row1['p2']?></div>
                <div class="p3">P3: <?php echo $row1['p3']?></div>
                <div class="p4">P4: <?php echo $row1['p4']?></div>
                <div class="p5">P5: <?php echo $row1['p5']?></div>
                <div class="p6">P6: <?php echo $row1['p6']?></div>
                <div class="p7">P7: <?php echo $row1['p7']?></div>
                <div class="p8">P8: <?php echo $row1['p8']?></div>
                <div class="p9">P9: <?php echo $row1['p9']?></div>
                <div class="total1">Total: <?php echo $total1['total']?></div>
            </div>
        </div>

        <div class="unload_col">
            <div class="col_title">Zone 2</div>
            <div class="grid-container1">
                <div class="p1">P1: <?php echo $row2['p1']?></div>
                <div class="p2">P2: <?php echo $row2['p2']?></div>
                <div class="p3">P3: <?php echo $row2['p3']?></div>
                <div class="p4">P4: <?php echo $row2['p4']?></div>
                <div class="p5">P5: <?php echo $row2['p5']?></div>
                <div class="p6">P6: <?php echo $row2['p6']?></div>
                <div class="p7">P7: <?php echo $row2['p7']?></div>
                <div class="p8">P8: <?php echo $row2['p8']?></div>
                <div class="p9">P9: <?php echo $row2['p9']?></div>
                <div class="total1">Total: <?php echo $total2['total']?></div>
            </div>
        </div>

        <div class="unload_col">
            <div class="col_title">Zone 3</div>
            <div class="grid-container1">
                <div class="p1">P1: <?php echo $row3['p1']?></div>
                <div class="p2">P2: <?php echo $row3['p2']?></div>
                <div class="p3">P3: <?php echo $row3['p3']?></div>
                <div class="p4">P4: <?php echo $row3['p4']?></div>
                <div class="p5">P5: <?php echo $row3['p5']?></div>
                <div class="p6">P6: <?php echo $row3['p6']?></div>
                <div class="p7">P7: <?php echo $row3['p7']?></div>
                <div class="p8">P8: <?php echo $row3['p8']?></div>
                <div class="p9">P9: <?php echo $row3['p9']?></div>
                <div class="total1">Total: <?php echo $total3['total']?></div>
            </div>
        </div>
    </div>

    <div class="button_div" style="top:40vh">
        <a href="unload.php"><div class="machine_button_L" style="margin:0px;">REFRESH</div></a>
    </div>

   
</body>



</html>