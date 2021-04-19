<?php
require_once 'header.php';
require_once 'navigation.php';
require_once 'helpers.php';
require_once 'processs.php';
require_once 'vendor/autoload.php';
$client = Elasticsearch\ClientBuilder::create()->build();
$searchstring = strip_tags($_REQUEST['id']);
$params = [
    'index' => 'dissertation',
    'body' => ['ids' => getFavorites()]
];
$results = $client->mget($params);

?>
<section class="doc_banner_area single_breadcrumb">
    <ul class="list-unstyled banner_shap_img">
        <li><img src="img/new/banner_shap1.png" alt=""></li>
        <li><img src="img/new/banner_shap4.png" alt=""></li>
        <li><img src="img/new/banner_shap3.png" alt=""></li>
        <li><img src="img/new/banner_shap2.png" alt=""></li>
        <li><img data-parallax='{"x": -180, "y": 80, "rotateY":2000}' src="img/new/plus1.png" alt=""></li>
        <li><img data-parallax='{"x": -50, "y": -160, "rotateZ":200}' src="img/new/plus2.png" alt=""></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="doc_banner_content">
            <ul class="nav justify-content-center">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="#">Favorites</a></li>
            </ul>
            <h2>My Favorites</h2>
        </div>
    </div>
</section>

<!--================Forum Content Area =================-->
<div class="row m-5">
    <div class="p-5">

        <div class="col-lg-12 doc-middle-content">

            <table id="searchresults" class="table table-responsive" style="table-layout: fixed; width: 100%">
                <thead>

                </thead>
                <tbody>
                <?php
                foreach ($results['docs'] as $hit){
                    ?>
                    <tr>
                        <td class="text-wrap" id="cell-<?php echo $hit['_id'];?>">
                            <div id="fav-<?php echo $hit['_id'];?>">
                                <a href="document.php?id=<?php  echo $hit['_id'] ?>"><?php  echo $hit['_source']['title']; ?></a>
                                <p><?php  echo $hit['_source']['contributor_author'] ?>, <?php  echo $hit['_source']['date_issued'] ?>, <?php  echo $hit['_source']['contributor_department'] ?></p>
                                <p><strong>Document ID: </strong><?php  echo  $hit['_id']; ?></p>
                                <p><strong>Abstract: </strong><?php  echo  mb_strimwidth($hit['_source']['description_abstract'],0,300,"..."); ?></p>
                                <button class="btn delfav" data-id="<?php echo $hit['_id'];?>" id="rem-fav-<?php echo $hit['_id'];?>"> <i class="icon_heart_alt"></i> Remove from Favorites</button>

                            </div>

                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<!--================End Forum Content Area =================-->

<?php
require_once 'footer.php';
?>


