<?php
$array;
try {
        // $dbh = new PDO('mysql:host=mysql;port=3306;dbname=surveydb', 'root', 'root', array( PDO::ATTR_PERSISTENT => false));
        $dbh = new PDO("mysql:host=mysql;port=3306;dbname=surveydb", 'root', 'root');
        $stmt = $dbh->prepare("select * from places");
        // $stmt->ec

        // call the stored procedure
        //$stmt->execute();

        // echo "<B>outputting...</B><BR>";
        // while (PDO::FETCH_OBJ)) {
        //     echo "output: ".$rs->name."<BR>";
        // }
        // echo "<BR><B>".date("r")."</B>";
        //json_encode($rs = $stmt->fetch(PDO::FETCH_ASSOC));
        $array = $stmt->fetchAll( PDO::FETCH_ASSOC );
        // echo json_encode($stmt->fetchAll( PDO::FETCH_ASSOC() ));
        echo json_encode($array);
        
        // echo "ksdjkdjfhiushflwahgfgi;usfh;ushver;ihf;iwyry;fR";
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
?>