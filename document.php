<?php
require_once 'header.php';
require_once 'navigation.php';
require_once 'helpers.php';

require_once 'vendor/autoload.php';
$client = Elasticsearch\ClientBuilder::create()->build();
if(isset($_REQUEST['id'])){
    $searchstring = strip_tags($_REQUEST['id']);
    //echo $searchstring;
    $params = [
        'index' => 'dissertation',
        'body'  => [
            'query' => [
                'match' => [
                  '_id' => $searchstring
                ]
            ]
        ]
    ];

    $results = $client->search($params);
    $doc = $results['hits']['hits'][0];
}
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
                <li><a class="active" href="#">Document</a></li>
            </ul>
            <h2><?php echo $doc['_source']['title'];?></h2>
        </div>
    </div>
</section>

<!--================Forum Content Area =================-->
<div class="row m-5">
    <div class="p-5">

        <div class="col-lg-12 doc-middle-content">

            <strong>Title : </strong><span><?php  echo printArrayValue($doc['_source']['title']);?></span><br>
            <strong>Author : </strong><span><?php  echo printArrayValue($doc['_source']['contributor_author']);?></span><br>
            <strong>Committee Chair(s) : </strong><span><?php
                if(isset($doc['_source']['contributor_committeechair'])){
                    echo printArrayValue($doc['_source']['contributor_committeechair']);
                }else if (isset($doc['_source']['contributor_committeecochair'])){
                    echo printArrayValue($doc['_source']['contributor_committeecochair']);
                }

            ?></span><br>
            <strong>Committee Member(s) : </strong><span><?php  echo printArrayValue($doc['_source']['contributor_committeemember']);?></span><br>
            <strong>Department : </strong><span><?php  echo printArrayValue($doc['_source']['contributor_department']);?></span><br>
            <strong>Date Issued : </strong><span><?php  echo printArrayValue($doc['_source']['date_issued']);?></span><br>
            <strong>Degree : </strong><span><?php  echo printArrayValue($doc['_source']['degree_name']);?></span><br>
            <strong>Abstract : </strong><span><?php  echo printArrayValue($doc['_source']['description_abstract']);?></span><br>
            <strong>Publisher : </strong><span><?php  echo printArrayValue($doc['_source']['publisher']);?></span><br>
            <strong>Subject(s) : </strong><span><?php  echo printArrayValue($doc['_source']['subject']);?></span>

        </div>
    </div>
</div>
<!--================End Forum Content Area =================-->

<?php
require_once 'footer.php';
?>


