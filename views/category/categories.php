<?php
    $category = new Category();
    $allCategories = $category->getCategories();
?>
<!doctype html>
<html ⚡>
<head>
  <title>Webjump | Backend Test | Categories</title>
  <meta charset="utf-8">
    <?php
        include('./views/link.php');
    ?>
</head>
  <!-- Header -->
    <?php
        include('./views/header.php');
    ?>
<!-- Header --><body>
  <!-- Main Content -->
  <main class="content">
    <div class="header-list-page">
      <h1 class="title">Categories</h1>
      <a href="/assessment-backend-xp?page=addCategory" class="btn-action">Add new Category</a>
    </div>
    <table class="data-grid">
        <tr class="data-row">
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Name</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Actions</span>
            </th>
        </tr>
        <?php
            if (!empty($allCategories)) {
                foreach ($allCategories as $category) {
                    echo '<tr class="data-row">
                            <td class="data-grid-td">
                               <span class="data-grid-cell-content">' . $category['nome'] . '</span>
                            </td>
                            <td class="data-grid-td">
                                <div class="action">
                                    <span>
                                        <a class="buttonEdit" href="/assessment-backend-xp?page=editCategory&id=' . $category['id'] . '">Edit</a>
                                        <a class="buttonDelete cursor-pointer" onclick="del(' . $category['id'] . ')">Delete</a>
                                    </span>
                                </div>
                            </td>
                     </tr>';
                }
            }
        ?>
    </table>
  </main>
  <!-- Main Content -->
  <?php
    include('./views/script.php');
  ?>
  <!-- Footer -->
  <?php
    include('./views/footer.php');
  ?>
 <!-- Footer -->
</body>
</html>
