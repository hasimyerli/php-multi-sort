### Php Multi Sort / PHP Çoklu Dizi Sorgulama

<p>
  <img src="https://hasimyerli.com/projects/images/project-img/mas1.png">
</p>

**Not:** Projede bazı geliştirmeler daha sonra tekrar düzenlenecek (refactoring).


[Demo](https://hasimyerli.com/projects/dev/php-multi-sort/)


**Nasıl kullanılır?**

**data_list** ve **sort_list** değişkenlerinin kullanımı index.php içinde mevcut. Temel olarak **data_list**  bizim hali hazırdaki verimiz, **sort_list** ise sırala şartları için kısıtılarımız. multiSort sınıfı verilerinizi belirlediğiniz şartlara göre kendi içinde tekrar sıralar.

**sort_list** seçenekleri
- name
- sort: "desc, asc"
- type: "numeric,string,regular"

**Not:** Buradaki name alanı dizimiz içerisindeki sıralama kısıtı olacak indis değeridir.

```php
<?php
include "multi-sort.php";
$sorting = new multiSort();
$sorting->setDataList($data_list);
$sorting->setSortList($sort_list);
$sorting->sort();
$new_data_list = $sorting->getDataList();
?>
```
