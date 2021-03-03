<?php
    $categoryController = new Category();
    $allCategories = $categoryController->getCategories();
    if (isset($_GET['id'])) {
        $product = new Product();
        $getProduct = $product->getProductById($_GET['id']);
    }
?>
<!doctype html>
<html ⚡>
    <head>
        <title>Webjump | Backend Test | Add Product</title>
        <meta charset="utf-8">
        <?php
            include('./views/link.php');
        ?>
    </head>
    <!-- Header -->
    <?php
        include('./views/header.php');
    ?>
    <!-- Header -->
<body>
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">New Product</h1>

    <!-- <form action="" method="post">-->
      <div class="input-field">
          <div class="container">
              <div class="row">
                  <div class="col-sm-2 imgUp">
                      <?php
                            if (isset($getProduct)) {
                                echo '<div class="imagePreview" id="img" style="background-image: url('.$getProduct[0]['image'].')"></div>';
                            } else {
                                echo '<div class="imagePreview" id="img"></div>';
                            }
                      ?>
                      <label class="btn btn-primary">
                          Upload<input type="file" class="uploadFile img " value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                      </label>
                  </div><!-- col-2 -->
                  <i class="fa fa-plus imgAdd"></i>
              </div><!-- row -->
          </div><!-- container -->
      </div>
      <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input type="text" id="sku" onkeyup="cancelValidation(this.id)" class="input-text" value="<?php echo isset($getProduct[0]['sku']) ? $getProduct[0]['sku'] : '' ; ?>" />
      </div>
      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" id="name" onkeyup="cancelValidation(this.id)" class="input-text" value="<?php echo isset($getProduct[0]['nome']) ? $getProduct[0]['nome'] : '' ; ?>" />
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type="text" id="price" onkeyup="formatPrice(this.value);cancelValidation(this.id);" class="input-text" value="<?php echo isset($getProduct[0]['preco']) ? $getProduct[0]['preco'] : '0,00' ; ?>" />
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="number" id="quantity" onkeyup="cancelValidation(this.id)" class="input-text" value="<?php echo isset($getProduct[0]['quantidade']) ? $getProduct[0]['quantidade'] : '' ; ?>" />
      </div>
      <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select id="category" onchange="cancelValidation(this.id)" class="input-text">
            <?php
                echo '<option selected> Selecione uma categoria </option>';
                foreach ($allCategories as $category) {
                    if (isset($getProduct[0]['id_categoria']) && $category['id'] == $getProduct[0]['id_categoria']) {
                        echo '<option selected value="' . $category['id']  . '">' . $category['nome'] . '</option>';
                    } else {
                        echo '<option value="' . $category['id']  . '">' . $category['nome'] . '</option>';
                    }
                }
            ?>
        </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" onkeyup="cancelValidation(this.id)" class="input-text" ><?php echo isset($getProduct[0]['descricao']) ? $getProduct[0]['descricao'] : '' ; ?></textarea>
      </div>
      <div class="actions-form">
        <a href="/assessment-backend-xp?page=products" class="action back">Back</a>
          <?php
            if (isset($getProduct)) {
                echo '<input type="hidden" id="id" class="input-text" value="' . $getProduct[0]['id'] . '" />';
                echo  '<button class="btn-submit btn-action cursor-pointer" onclick="edit()" type="submit" > Update Product </button>';
            } else {
                echo  '<button class="btn-submit btn-action cursor-pointer" onclick="add()" type="submit" > Save Product </button>';
            }
          ?>
      </div>
      <!--</form>-->
      </main>
      <!-- Main Content -->
      <?php
        include("./views/script.php");
      ?>
      <!-- Footer -->
      <?php
        include('./views/footer.php');
      ?>
      <!-- Footer -->
</body>
</html>
