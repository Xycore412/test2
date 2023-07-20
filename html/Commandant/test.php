<?php

header('Content-Type: text/html; charset=UTF-8');
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $userId = "";
            if (isset($column[0])) {
                $userId = mysqli_real_escape_string($conn, $column[0]);
            }
            $nom = "";
            if (isset($column[1])) {
                $nom = mysqli_real_escape_string($conn, $column[1]);
            }
            $prenom = "";
            if (isset($column[2])) {
                $prenom = mysqli_real_escape_string($conn, $column[2]);
            }
            $DDN = "";
            if (isset($column[3])) {
                $DDN = mysqli_real_escape_string($conn, $column[3]);
            }
            $num_passeport = "";
            if (isset($column[4])) {
                $num_passeport = mysqli_real_escape_string($conn, $column[4]);
            }
            
            $sqlInsert = "INSERT into ressortissant (userId,nom,prenom,DDN,num_passeport)
                   values (?,?,?,?,?)";
            $paramType = "issss";
            $paramArray = array(
                $userId,   
                $nom,
                $prenom,
                $DDN,
                $num_passeport
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "Les données du CSV ont bien été importer";
            } else {
                $type = "error";
                $message = "Un problème est détecté";
            }
        }
    } //header("Refresh: 2; url=test.php");
}
?>
<!DOCTYPE html>
<html>

<head>
<script src="jquery-3.2.1.min.js"></script>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>

<style>
body {
    font-family: Arial;
    width: 700px;
}

.outer-scontainer {
/*    background: #red;
    border: #e0dfdf 1px solid;*/
    padding: 10px;
    border-radius: 2px;
}

.input-row {
    margin-top: 0px;
    margin-bottom: 20px;
}

.btn-submit {
    background: #333;
    border: #1d1d1d 1px solid;
    color: #f0f0f0;
    font-size: 0.9em;
    width: 100px;
    border-radius: 2px;
    cursor: pointer;
}

.outer-scontainer table {
    border-collapse: collapse;
    width: 100%;
}

.outer-scontainer th {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

.outer-scontainer td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display: none;
}

.success {
    background: #green;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
</head>

<body>


    <center>
    <h2>Import fichier CSV en PHP</h2>

    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
        </div>
    <div class="outer-scontainer">
        <div class="row">

            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choix fichier CSV
                        </label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                    <br />

                </div>

            </form>
            <br>
<br><br>
        </div>
               <?php
            $sqlSelect = "SELECT * FROM ressortissant";
            $result = $db->select($sqlSelect);
            if (! empty($result)) {
                ?>
            <table id='userTable'>
            <thead>
                <tr>

                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Numéro de passeport</th>
<!--                     <th>Position du ressortissant</th>
                    <th>Position dans la navette</th> -->

                </tr>
            </thead>
<?php
                
                foreach ($result as $row) {
                    ?>
                    
                <tbody>
                <tr>

                    <td><?php  echo $row['nom']; ?></td>
                    <td><?php  echo $row['prenom']; ?></td>
                    <td><?php  echo $row['DDN']; ?></td>
                    <td><?php  echo $row['num_passeport']; ?></td>
<!--                     <td><?php  echo $row['index_pr']; ?></td>
                    <td><?php  echo $row['index_nav']; ?></td> -->
                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>
        <?php } ?>
    </div>
</center>
</body>

</html>