<?php
session_start();
include "header.php";
include "connection.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Issue Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post">
                            <table>
                            <tr>
                                <td>
                                <select name="enr" class="form-control selectpicker">
                                <?php
                                $res = mysqli_query($link,"select enrollment from student_registration");
                                while($row=mysqli_fetch_array($res))
                                {
                                    echo "<option>";
                                    echo $row["enrollment"];
                                    echo "</option>";
                                }
                                ?>
                                </select>
                                </td>
                                <td>
                                <input type="submit" value="Search" name="submit1" class="form-control btn btn-default" style="margin-top:5px">
                                </td>
                            </tr>
                            </table>
                           
                            <?php 
                            if(isset($_POST["submit1"]))
                            {
                                $res = mysqli_query($link,"select * from student_registration where enrollment='$_POST[enr]'");
                                   while ($row5=mysqli_fetch_array($res))
                                   {
                                       $firstname=$row5["firstname"];
                                       $lastname=$row5["lastname"];
                                       $username=$row5["username"];
                                       $email=$row5["email"];
                                       $contact=$row5["contact"];
                                       $sem=$row5["sem"];
                                       $enrollment=$row5["enrollment"];
                                       $_SESSION["enrollment"]=$enrollment;
                                       $_SESSION["susername"]=$username;
                                   }
                                ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><input type="text" class="form-control" value= "<?php echo $enrollment; ?>" placeholder="enrollmentno" name="enrollment" disabled></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" value= "<?php echo $firstname.' '.$lastname; ?>" placeholder="Student Name" name="studentname" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" value= "<?php echo $sem; ?>" placeholder="Student Sem" name="studentsem" ></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" value= "<?php echo $contact; ?>" placeholder="Student Contact" name="studentcontact" ></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" value= "<?php echo $email; ?>" placeholder="Student Email"  name="studentemail" ></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <select name="booksname" class="form-control select-picker">
                                        <?php
                                        $res = mysqli_query($link,"select books_name from add_books");
                                        while ($row=mysqli_fetch_array($res))
                                        {
                                           echo " <option>";
                                           echo $row["books_name"];
                                           echo "</option>";
                                        }
                                        ?>
                                        
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" value= "<?php echo date("d-m-yy"); ?>" placeholder="Issue Date"  name="booksissuedate" ></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" value= "<?php echo $username; ?>" placeholder="Student Username"  name="studentusername" disabled></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" class="form-control"  name="submit2" class="form-control btn btn-default" value="Issue Books" style="background-color:blue ; color:white ; border-radius:5px"></td>
                                    </tr>
                                </table>
                                <?php
                            }
                            ?>
                             </form>

                             <?php
                              if(isset($_POST["submit2"]))
                              {
                                mysqli_query($link,"insert into issue_books values('','$_SESSION[enrollment]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[booksname]','$_POST[booksissuedate]','',' $_SESSION[susername]')");

                                ?>
                                <script type=text/javascript>
                                alert("Books issues successfully");
                                window.location.href=window.location.href;
                                </script>
                                <?php

                              }
                             ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "footer.php";
?>
