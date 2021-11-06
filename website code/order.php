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
    
    $query = "SELECT * FROM ordem WHERE estado_r=1 OR estado_r=4;";
    $result = pg_exec($query);
    $row = pg_fetch_assoc($result);

    $query = "SELECT * FROM ordem WHERE estado_l=1 OR estado_l=4;";
    $result1 = pg_exec($query);
    $row1 = pg_fetch_assoc($result1);

    $query = "SELECT * FROM storage";
    $result2 = pg_exec($query);
    $row2 = pg_fetch_assoc($result2);
?>

<body>

    <header>
        <div class="left">
            <a href="index.html">STATISTICS</a>
        </div>
        <div class="right">
            <p> <a href="machines.php"> Machines </a></p>
            <p> <a href="unload.php"> Unload </a></p>
            <p> <span style="color:white;"> <a href="order.php"> Orders </a></span></p>
        </div>
    </header>
    
    <div class="title" style="position:relative;">Orders</div>

    <div class="unload_body" style="width:100%">

        <div class="order_body">
            <div class="order_ind" style="padding-right:20%">
                WAREHOUSE
            </div>
            <div class="grid_container2">
                <div class="p11">P1: <?php echo $row2['p1'] ?></div>
                <div class="p21">P2: <?php echo $row2['p2'] ?></div>
                <div class="p31">P3: <?php echo $row2['p3'] ?></div>
                <div class="p41">P4: <?php echo $row2['p4'] ?></div>
                <div class="p51">P5: <?php echo $row2['p5'] ?></div>
                <div class="p61">P6: <?php echo $row2['p6'] ?></div>
                <div class="p71">P7: <?php echo $row2['p7'] ?></div>
                <div class="p81">P8: <?php echo $row2['p8'] ?></div>
                <div class="p91">P9: <?php echo $row2['p9'] ?></div>
            </div>
        </div>
        

        <div class="order_body">

            <div class="order_ind">
                RIGHT SIDE
            </div>
            <?php 
            while(isset($row['id'])) {
                echo "<div class=\"order_ind\">";

                if($row['tipo']==1) {
                    echo "Transformation: " .$row['id']. " | From= " .$row['de']. " | To= " .$row['para']. " | Qt=" .$row['qt']. " | Qt3=" .$row['qt3']. " | Qt2=" .$row['qt2_r']. " | Qt1=" .$row['qt1'];
                } else if($row['tipo']==2) {
                    echo "Unload: " .$row['id']. " | Piece= " .$row['piece']. " | Dest= " .$row['dest']. " | Qt=" .$row['qt']. " | Qt3=" .$row['qt3']. " | Qt2=" .$row['qt2']. " | Qt1=" .$row['qt1'];
                }
                echo "</div>";
                $row = pg_fetch_assoc($result); 
            }?>

            <div class="order_ind">
            LEFT SIDE
            </div>

            <?php
            while(isset($row1['id'])) {
                echo "<div class=\"order_ind\">";

                if($row1['tipo']==1) {
                    echo "Transformation: " .$row1['id']. " | From= " .$row1['de']. " | To= " .$row1['para']. " | Qt=" .$row1['qt']. " | Qt3=" .$row1['qt3']. " | Qt2=" .$row1['qt2_l']. " | Qt1=" .$row1['qt1'];
                } else if($row1['tipo']==2) {
                    echo "Unload: " .$row1['id']. " | Piece= " .$row1['piece']. " | Dest= " .$row1['dest']. " | Qt=" .$row1['qt']. " | Qt3=" .$row1['qt3']. " | Qt2=" .$row1['qt2']. " | Qt1=" .$row1['qt1'];
                }
                echo "</div>";
                $row1 = pg_fetch_assoc($result1); 
            }?>

        </div>

    </div>

    <div class="button_div" style="width:30%">
        <a href="order.php"><div class="machine_button_L" style="margin:0px;">REFRESH</div></a>
    </div>

   
</body>



</html>