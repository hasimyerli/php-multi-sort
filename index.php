<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Çoklu Dizi Sorgulama</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <?php

      $data_list = array(
        array('product_name' => 'Php','page_count' => '455','price' => 20,'discount' => 5,'currency' => 'TL'),
        array('product_name' => 'Java','page_count' => '455','price' => 22,'discount' => 7,'currency' => 'TL'),
        array('product_name' => 'C#','page_count' => '455','price' => 21,'currency' => 'TL')
      );

      $sort_list = array(
        array('name' => 'discount','sort' => 'desc','type' => 'numeric'),
        array('name' => 'price','sort' => 'asc','type' => 'numeric')
      );

      include "multi-sort.php";
      $sorting = new multiSort();

      $sorting->setDataList($data_list);

      $sorting->setSortList($sort_list);

      $sorting->sort();

      $new_data_list = $sorting->getDataList();
    ?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>
            Çoklu Dizi Sorgulama -
            İndirime gore azalan -
            Fiyata göre gore artan
          </h3>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h3>Normal Veri</h3>
          <pre>
            <?=print_r($data_list);?>
          </pre>
        </div>
        <div class="col-md6">
          <h3>Sıralı Veri</h3>
          <pre>
            <?=print_r($new_data_list);?>
          </pre>
        </div>
      </div>
    </div>

  </body>
</html>
