<?php
include('../backend/config.php'); 
include('../backend/db.php'); 

$scan_id = $_GET['scan_id'];

$sql_requestjson=mysqli_query($conn,"SELECT * from result_scanjson where scanID='$scan_id' ;");
if ($result=mysqli_fetch_all($sql_requestjson)){


$json1=json_decode($result[0][3],true);

foreach ($json1['scannedDocument'] as $key => $value) {
    if(is_array($value)==1){
        echo "<br>$key: ";
        foreach ($value as $subkey => $subvalue){
            if($subvalue==True && gettype($subvalue)=="boolean"){
                echo "<br>&nbsp;&nbsp; $subkey : True "; 
            }elseif($subvalue==FALSE && gettype($subvalue)=="boolean"){
                echo "<br>&nbsp;&nbsp; $subkey : False "; 
            }else{
                echo "<br>&nbsp;&nbsp; $subkey : $subvalue ";
            }
        }
    }else{
        echo "<br> $key : $value ";
    }
}
echo "<br> <br>";

foreach ($json1['results']['score'] as $key => $value) {
    echo "<br> $key : $value ";
}
echo "<br> <br>";

foreach ($json1['results']['internet'] as $key => $value) {
    echo "<br> <br>";
    echo "<br>Internet result: " . ($key + 1);
    foreach ($value as $subkey => $subvalue) {
        if (is_array($subvalue)) {
            echo "<br>$subkey: ";
            foreach ($subvalue as $exsubkey => $exsubvalue) {
                echo "<br>&nbsp;&nbsp;$exsubkey: $exsubvalue ";
            }
        } else {
            echo "<br>$subkey: $subvalue";
        }
    }
}
echo "<br> <br>";

echo "<br> database";
foreach ($json1['results']['database'] as $key => $value) {
    if (is_array($value)) {
        echo "<br>$key: ";
        foreach ($value as $subkey => $subvalue) {
            echo "<br>&nbsp;&nbsp;$subkey: $subvalue ";
        }
    } else {
        echo "<br>$key: $value";
    }

}
echo "<br> batch";
foreach ($json1['results']['batch'] as $key => $value) {
    if (is_array($value)) {
        echo "<br>$key: ";
        foreach ($value as $subkey => $subvalue) {
            echo "<br>&nbsp;&nbsp;$subkey: $subvalue ";
        }
    } else {
        echo "<br>$key: $value";
    }

}
echo "<br> repositories";
foreach ($json1['results']['repositories'] as $key => $value) {
    if (is_array($value)) {
        echo "<br>$key: ";
        foreach ($value as $subkey => $subvalue) {
            echo "<br>&nbsp;&nbsp;$subkey: $subvalue ";
        }
    } else {
        echo "<br>$key: $value";
    }

}

echo "<br> notifications";
foreach ($json1['notifications']as $key => $value) {
    if (is_array($value)) {
        echo "<br>$key: ";
        foreach ($value as $subkey => $subvalue) {
            echo "<br>&nbsp;&nbsp;$subkey: $subvalue ";
        }
    } else {
        echo "<br>$key: $value";
    }
}

echo "<br> status";
if($json1['status']){
foreach ($json1['status']as $key => $value) {
    if (is_array($value)) {
        echo "<br>$key: ";
        foreach ($value as $subkey => $subvalue) {
            echo "<br>&nbsp;&nbsp;$subkey: $subvalue ";
        }
    } else {
        echo "<br>$key: $value";
    }

}
}

echo "<br> developerPayload";
if($json1['developerPayload']){
foreach ($json1['developerPayload']as $key => $value) {
    if (is_array($value)) {
        echo "<br>$key: ";
        foreach ($value as $subkey => $subvalue) {
            echo "<br>&nbsp;&nbsp;$subkey: $subvalue ";
        }
    } else {
        echo "<br>$key: $value";
    }

}
}


    // if ($status === 'completed') {
    //     echo "<p>View the report: <a href='$report_link' target='_blank'>Report Link</a></p>";
    //     if ($export_link !== 'Pending') {
    //         echo "<p>Download the export: <a href='$export_link' target='_blank'>Export Link</a></p>";
    //     } else {
    //         echo "<p>Export is still processing.</p>";
    //     }
    // } else {
    //     echo "<p>Your scan is still processing or the report link is not available yet.</p>";
    // }

} else {
    echo "No results found for this scan.";
}
?>

