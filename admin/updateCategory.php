<?php 
include "header.php"; 
session_start() ;
include_once "../core/functions.php";
if(!isset($_SESSION['auth']))
{
  reDirect("auth/login.php");
}
 ?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <?php
            if(isset($_SESSION['succes'])):
              $succesMassege = $_SESSION["succes"];
            ?>
            <div class="alert alert-success" role="alert">
              <?php
                echo "$succesMassege"; 
                
              ?> 
            </div>
              
              <?php unset($_SESSION["succes"])?>
           
            <?php
              elseif(isset($_SESSION["errors"])):
                foreach($_SESSION["errors"] as $error):
            ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $error?>
                  </div>
                  <?php
                    endforeach;
                    unset($_SESSION["errors"]);
                    endif;

                  ?>
        <form method="POST" action="../core/handelers/handelUpdateCategory.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input name="category" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter the new Category Name">
                  </div>
                  </div>
                  <input type="hidden" name="id" value="<?=$_GET['id']?>" >
                  
                <!-- /.card-body -->

                <div class="card-body">
                  <input type="submit" value="Save" class="btn btn-primary" name="submit" >
                </div>
              </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    <?php include "footer.php"; ?>
