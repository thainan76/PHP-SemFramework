<?php
    if (isset($_GET['id'])) {
        $category = new Category();
        $getCategory = $category->getCategoriesById($_GET['id']);
    }
?>
<!doctype html>
<html ⚡>
    <head>
      <title>Webjump | Backend Test | Add Category</title>
      <meta charset="utf-8">
        <?php
            include("./views/link.php");
        ?>
    </head>
    <!-- Header -->
        <?php
            include("./views/header.php");
        ?>
    <!-- Header -->
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">New Category</h1>

<!--    <form>-->
      <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input type="text" id="category-name" class="input-text" onkeyup="cancelValidation(this.id)" value="<?php echo isset($getCategory[0]) ? $getCategory[0]['nome'] : '' ?>"/>
      </div>
<!--      <div class="input-field">-->
<!--        <label for="category-code" class="label">Category Code</label>-->
<!--        <input type="text" id="category-code" class="input-text" />-->
<!--      </div>-->
      <div class="actions-form">
        <a href="/assessment-backend-xp?page=categories" class="action back">Back</a>
          <?php
              if (isset($getCategory)) {
                  echo '<input type="hidden" id="id" class="input-text" value="' . $getCategory[0]['id'] . '" />';
                  echo  '<button class="btn-submit btn-action cursor-pointer" onclick="edit()" type="submit" > Update Category </button>';
              } else {
                  echo  '<button class="btn-submit btn-action cursor-pointer" onclick="add()" type="submit" > Save Category </button>';
              }
          ?>
      </div>
<!--    </form>-->
  </main>
  <!-- Main Content -->
    <?php
        include("./views/script.php");
    ?>
  <!-- Footer -->
    <?php
        include("./views/footer.php");
    ?>
 <!-- Footer --></body>
</html>
