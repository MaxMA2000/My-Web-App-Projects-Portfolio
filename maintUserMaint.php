<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <!-- Title Page-->
        <title>maintUserMaint</title>

        <!-- Icons font CSS-->
        <link href="back/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="back/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="back/vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="back/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="back/css/main.css" rel="stylesheet" media="all">
    </head>

    <body>
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <h2 class="title"><center>Result</center></h2>
                        <?php
                            $action = $_POST["action"];
                            $employeeID = $_POST["employeeID"];
                            $employeePassword = $_POST["employeePassword"];
                            $employeeLevel = $_POST["employeeLevel"];
                            
                            // Create connection to Database
                            $servername = "localhost";
                            $username   = "root";
                            $password   = "";
                            $dbname     = "myDB";
                            $conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed");

                            // Action == Add
                            if  ($action == "A")
                            {
                                $sql = "INSERT INTO maintuser(employeeID, employeePassword, employeeLevel)
                                VALUES ('".$employeeID."', '".$employeePassword."', ".$employeeLevel.")";
                                // echo $sql . "<BR>";

                                $result = $conn->query($sql);
                                
                                if  ($result == TRUE){
                                    echo "Insert Succesful <BR>";
                                }else{
                                    echo "Insert Failure! Please Call IT Staff!<BR>";
                                }
                            }

                            // Action == Change
                            if  ($action == "C")
                            {
                                $sql =        "UPDATE maintuser ";
                                $sql = $sql . " SET employeePassword        = " . "'" . $employeePassword    . "'" . ","  ;
                                $sql = $sql . "     employeeLevel       = "       . $employeeLevel;
                                $sql = $sql . " WHERE employeeID        = " . "'" . $employeeID    . "'"        ;
                                // echo $sql . "<BR>";

                                $result = $conn->query($sql);

                                if  ($result == TRUE){
                                    echo "Update Succesful <BR>";
                                }else{
                                    echo "Update Failure! Please Call IT Staff!<BR>";
                                }
                            }

                            // Action == Delete
                            if  ($action == "D")
                            {
                                $sql = "DELETE FROM maintuser WHERE employeeID= '".$employeeID."'";
                                // echo $sql."<BR>";

                                $result = $conn->query($sql);

                                if  ($result == TRUE){
                                    echo "Delete Succesful <BR>";
                                }else{
                                    echo "Delete Failure! Please Call IT Staff!<BR>";
                                }
                            }

                            // Action == Review
                            if  ($action == "R")
                            {
                                $sql  = 'select * from maintuser';
                                $rtn  = $conn->query($sql);
                                $cnt  = $rtn->num_rows;
                                
                                echo  "There are " . $cnt . " rows of records in the maintuser table <BR><BR>";

                                echo  '<table border="1">';
                                echo "<TR>";
                                    echo "<TH>Employee ID   </TH>";
                                    echo "<TH>Employee Password   </TH>";
                                    echo "<TH>Employee Level   </TH>";
                                echo "</TR>";

                                $k = 0;
                                while ( $k < $cnt )
                                {
                                $myRow = $rtn->fetch_assoc();

                                echo "<TR>";
                                    echo "<TD>"    . $myRow["employeeID"]          . "   </TD>";
                                    echo "<TD>"    . $myRow["employeePassword"]        . "   </TD>"; 
                                    echo "<TD>"    . $myRow["employeeLevel"]       . "   </TD>";
                                echo "</TR>";

                                $k = $k + 1;
                                }
                                echo  '</table>';
                            }

                        ?>
                    </div>
                </div>
            </div>
            <BR>
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <h2 class="title"><center>Maint User Maintance</center></h2>
                        <form method="POST" action="maintUserMaint.php">
                            <div class="row row-space">
                                <div class="col-4">
                                    <div class="input-group">
                                        <label class="label">Action</label>
                                        <div class="p-t-10">
                                            <label class="radio-container m-r-45">Add
                                                <input type="radio" checked="checked" name="action" value="A">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container m-r-45">Change
                                                <input type="radio" name="action" value="C">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container m-r-45">Delete
                                                <input type="radio" name="action" value="D">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container m-r-45">Review
                                                <input type="radio" name="action" value="R">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-space">
                                <div class="col-4">
                                    <div class="input-group">
                                        <label class="label">Employee ID</label>
                                        <input class="input--style-4" type="text" name="employeeID">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-4">
                                    <div class="input-group">
                                        <label class="label">Employee Password</label>
                                        <input class="input--style-4" type="text" name="employeePassword">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-4">
                                    <div class="input-group">
                                        <label class="label">Employee Level</label>
                                        <input class="input--style-4" type="text" name="employeeLevel">
                                    </div>
                                </div>
                            </div>

                            <div class="p-t-15">
                                <center><button class="btn btn--radius-2 btn--green" type="submit">Submit</button></center>
                            </div>
                            <BR>
                            <div class="p-t-15">
                                <center><button class="btn btn--radius-2 btn--blue" onclick='history.back()'>Go Back</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Jquery JS-->
        <script src="back/vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="back/vendor/select2/select2.min.js"></script>
        <script src="back/vendor/datepicker/moment.min.js"></script>
        <script src="back/vendor/datepicker/daterangepicker.js"></script>

        <!-- Main JS-->
        <script src="back/js/global.js"></script>

    </body>

</html>