<?php 
session_start();
include_once "../core/functions.php";
include_once "../lib/content.php";
if(!isset($_SESSION['auth']))
{
  reDirect("auth/login.php");
}
include "header.php";
$content=new Content();
$contentList=$content->getContentList();
?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div>
            <a class="btn btn-success" href="addContent.php">Add Content</a>
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
                    
                      <th>ID</th>
                      <th>Name</th>
                      <th>Category_ID</th>
                      <th>Cover</th>
                      <th>Description</th>
                      <th>Progress</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($contentList as $content): ?>
                    <tr>
                      <td><?php echo $content['id']; ?></td>
                      <td><?php echo $content['name']; ?></td>
                      <td><?php echo $content['category_id']; ?></td>
                      <td><?php echo $content['cover']; ?></td>
                      <td><?php echo $content['description']; ?></td>
                      <td>
                        <div>
                            <a href="updateContent.php?id=<?= $content['id']  ?>" class="btn btn-info" >Update</a>
                            <a href="deleteContent.php?id=<?= $content['id']; ?>" class="btn btn-danger" >Delete</a>
                        </div>
                      </td>

                      
                    </tr>
                    <?php endforeach; ?>
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
