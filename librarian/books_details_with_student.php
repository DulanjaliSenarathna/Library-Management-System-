<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
    ?> 
    <script type="text/javascript">
window.location="login.php";
</script>
    <?php
}
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
                                <h2>Books with Details</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                            $i=0;
                                $res=mysqli_query($link,"select * from add_books");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                while ($row=mysqli_fetch_array($res))
                                {
                                    $i=$i+1;
                                    echo "<td>";
                                    ?> <img src="../librarian/<?php echo $row["books_image"]; ?>" height="100" width="100"> <?php
                                    echo "<br>";
                                    echo "<b>".$row["books_name"]."<b>";
                                    echo "<br>";
                                    echo "<b>"."Total Books: ".$row["books_qty"]."<b>";
                                    echo "<br>";
                                    echo "<b>"."Available: ".$row["available_qty"]."<b>";
                                    echo "<br>";
                                    ?> <a href="all_students_of_this_books.php?books_name=<?php echo $row["books_name"]; ?>" style="color:red">Student Record If this book</a><?php
                                    echo "</td>";

                                    if($i==5)
                                    {
                                        echo"<tr>";
                                        echo"</tr>";
                                        $i=0;
                                    }
                                }
                                echo "</tr>";
                                "</table>";
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
