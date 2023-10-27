<?php 
session_start();
include_once "../core/functions.php";
if(!isset($_SESSION['auth']))
{
  reDirect("auth/login.php");
}
include "header.php";
require_once "../lib/category.php";
$category=new Category;
$categoryList=$category->getcategorylist();
    
?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div>
            <a class="btn btn-success" href="addCategory.php">Add Category</a>
          </div>

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
        <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Categories</th>
                      <th>Progress</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($categoryList as $category): ?>
                    <tr>
                      <td><?php echo $category['id'] ?></td>
                      <td><?php echo $category['name'] ?></td>
                      <td>
                        <div>
                            <a href="updateCategory.php?id=<?= $category['id']  ?>" class="btn btn-info" >Update</a>
                            <a href="deleteCategory.php?id=<?= $category['id']; ?>" class="btn btn-danger" >Delete</a>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach;?>
                   
                  </tbody>
                </table>
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
