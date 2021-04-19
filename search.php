<?php
require_once 'header.php';
require_once 'navigation.php';
require_once 'helpers.php';

require_once 'vendor/autoload.php';
$client = Elasticsearch\ClientBuilder::create()->build();
$searchstring = "";
$author= "";
$department = "";
$subject = "";
$publisher = "";
$isbasicSearch="true";
$spellcorrected = "false";
if(isset($_REQUEST['basicsearch']) || !isset($_REQUEST['advancedsearch'])){
    $searchstring = strip_tags($_REQUEST['search']);
    $correctionParams = [
        'index' => 'dissertation',
        'body'  => [
            'suggest' => [
                'mytermsuggester' => [
                    'text' => $searchstring,
                    'term' => [
                        'field' => 'title'
                    ]
                ]
            ]
        ]
    ];
    $checkresults = $client->search($correctionParams);
    if(isset($checkresults['suggest']['mytermsuggester'][0]['options'][0])){
        $suggestText = $checkresults['suggest']['mytermsuggester'][0]['options'][0]['text'];
        if($suggestText != $searchstring){
            $searchstring = $suggestText;
        }
    }

    //echo $suggestText;
    $params = [
        'index' => 'dissertation',
        'body'  => [
            'query' => [
                'query_string' => ["query" => $searchstring]
            ],
            'size' => 10000
        ]
    ];

    $results = $client->search($params);
}elseif (isset($_REQUEST['advancedsearch'])){
    $isbasicSearch="false";
    $author = strip_tags($_REQUEST['author']);
    $publisher = strip_tags($_REQUEST['publisher']);
    $department = strip_tags($_REQUEST['department']);
    $subject = strip_tags($_REQUEST['subject']);
    $match = [];
    if($author != ""){
        array_push($match, array('match' => [
            "contributor_author" => $author
        ]));
    }
    if($publisher != ""){
        array_push($match, array('match' => [
            "publisher" => $publisher
        ]));
    }
    if($department != ""){
        array_push($match, array('match' => [
            "contributor_department" => $department
        ]));
    }
    if($subject != ""){
        array_push($match, array('match' => [
            "subject" => $subject
        ]));
    }

    $params = [
        'index' => 'dissertation',
        'body'  => [
            'query' => [
                    'bool'=> [
                           "filter" => [
                                   "bool" => [
                                           "must" => $match
                                   ]
                           ]
                    ]

            ],
            'size' => 10000
        ]
    ];
    $results = $client->search($params);
}else{

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
                <li><a class="active" href="#">Search</a></li>
            </ul>
        </div>
    </div>
    <div class="header_search_form_info">
        <form action="search.php" id="searchform"  class="header_search_form" method="get">
            <div class="form-group">
                <div class="input-wrapper">
                    <label style="display: none" for="searchbox">Search</label>
                    <input type='search' id="searchbox" autocomplete="off" name="search"
                           placeholder="" value="<?php echo $searchstring;?>" />
                    <img onclick="startDictation()" class="search_microphone" src="//i.imgur.com/cHidSVu.gif" />
                </div>
                <button type="submit" name="basicsearch" id="basicsearch" class="submit_btn">Search</button>
            </div>
            <div class="float-right">
                <ul class="nav">
                    <li><a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
                           aria-controls="multiCollapseExample1">Advanced Search</a>
                </ul>
            </div>
        </form>

        <div class="collapse multi-collapse mt-5" style="padding-left: 8px;" id="multiCollapseExample1">
            <div class="card card-body toggle_body">
                <form action="search.php" method="get">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" value="<?php echo $author;?>" id="author" name="author">
                            </div>
                        </div>
                        <!--  col-md-6   -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" value="<?php echo $department;?>" id="department" name="department">
                            </div>
                        </div>
                        <!--  col-md-6   -->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" value="<?php echo $subject;?>" id="subject" name="subject">
                            </div>
                        </div>
                        <!--  col-md-6   -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="publisher">Publisher</label>
                                <input type="tel" class="form-control" id="publisher" value="<?php echo $publisher;?>" name="publisher">
                            </div>
                        </div>
                        <!--  col-md-6   -->
                    </div>

                    <button type="submit" class="btn btn-primary mt-2" name="advancedsearch" id="advancedsearch">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!--================Forum Content Area =================-->
<div class="row m-5">
    <div class="p-5">
        <h2>Search Results for
            <em><?php
                if($isbasicSearch){
                    echo $searchstring;
                }elseif (isset($_REQUEST['advancedsearch'])){
                    $display = "";
                    if(!is_null($author)){
                        $display.=" Author: ".$author;
                    }
                    if(!is_null($department)){
                        $display.=" Department: ".$department;
                    }
                    if(!is_null($subject)){
                        $display.=" Subject: ".$subject;
                    }
                    if(!is_null($author)){
                        $display.=" Publisher: ".$publisher;
                    }
                    echo $display;
                }


                ?></em>
            (<?php  echo $results['hits']['total']['value']?> Records)
        </h2>
        <div class="col-lg-12 doc-middle-content">

            <?php
                if($results['hits']['total']['value']>=1){
            ?>

                <div class="data_table_area table-responsive">
                    <table id="searchresults" class="table table-responsive" style="table-layout: fixed; width: 100%">
                        <thead>
                        <td></td>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($results['hits']['hits'] as $hit){
                        ?>
                            <tr>
                                <td class="text-wrap">
                                    <?php
                                    if($isbasicSearch){
                                    ?>
                                    <a href="document.php?id=<?php  echo $hit['_id'] ?>"><?php  echo highlight($hit['_source']['title'],$searchstring); ?></a>
                                    <p><?php  echo $hit['_source']['contributor_author'] ?>, <?php  echo $hit['_source']['date_issued'] ?>, <?php  echo $hit['_source']['contributor_department'] ?></p>
                                    <p><strong>Abstract: </strong><?php  echo  highlight(mb_strimwidth($hit['_source']['description_abstract'],0,300,"..."),$searchstring); ?></p>
                                    <?php
                                    }else if (isset($_REQUEST['advancedsearch'])){
                                        ?>
                                        <a href="document.php?id=<?php  echo $hit['_id'] ?>"><?php  echo $hit['_source']['title']; ?></a>
                                        <p>
                                            <?php  if(!is_null($author)&& trim($author)!=''){echo highlight($hit['_source']['contributor_author'],$author);} else {echo $hit['_source']['contributor_author'];} ?>,
                                            <?php  echo $hit['_source']['date_issued'] ?>,
                                            <?php  if(!is_null($department) && trim($department)!=''){echo highlight($hit['_source']['contributor_department'],$department);} else {echo $hit['_source']['contributor_department'];} ?>
                                        </p>
                                        <p><strong>Abstract: </strong><?php  echo  mb_strimwidth($hit['_source']['description_abstract'],0,300,"..."); ?></p>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if(isset($_SESSION['uname'])){
                                        ?>
                                        <div id="fav-<?php echo $hit['_id'];?>">
                                            <?php
                                        if(isFavorite($hit['_id'])){
                                            ?>
                                            <button class="btn remfav" data-id="<?php echo $hit['_id'];?>" id="rem-fav-<?php echo $hit['_id'];?>"> <i class="icon_heart_alt"></i> Remove from Favorites</button>
                                            <?php
                                        }else{
                                    ?>
                                            <button class="btn addfav" data-id="<?php echo $hit['_id'];?>" id="add-fav-<?php echo $hit['_id'];?>"> <i class="icon_heart"></i> Add to Favorites</button>
                                    <?php

                                        }
                                        ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            <?php
                }
            ?>

        </div>
    </div>
</div>
<!--================End Forum Content Area =================-->
<script src="js/jquery-3.5.1.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/sl-1.3.1/datatables.min.js"></script>
<script>
    $("#searchresults").DataTable({
        responsive:true,
        searching: false
    });

</script>
<?php
require 'footer.php';
?>


