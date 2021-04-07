<?php
require_once 'header.php';
require_once 'navigation.php';
require_once 'helpers.php';
require_once 'processs.php';
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
        <a href="javascript:history.back()"><- Back to Search Results</a>
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
            <strong>Degree Grantor: </strong><span><?php  echo printArrayValue($doc['_source']['degree_grantor']);?></span><br>
            <strong>Provenance: </strong><span><?php  echo printArrayValue($doc['_source']['description_provenance']);?></span><br>
            <strong>Abstract : </strong><span><?php  echo printArrayValue($doc['_source']['description_abstract']);?></span><br>
            <strong>Publisher : </strong><span><?php  echo printArrayValue($doc['_source']['publisher']);?></span><br>
            <strong>Subject(s) : </strong><span><?php  echo printArrayValue($doc['_source']['subject']);?></span><br/>
            <?php
            if(isset($doc['_source']['relation_haspart'])){
                if(is_array($doc['_source']['relation_haspart'])){
                    foreach ($doc['_source']['relation_haspart'] as $document){
                        echo '<a href="resources/'.$doc['_id'].'/'.$document.'" class="btn btn-dark mt-2">Download '.$document.'</a><br>';
                    }
                }else{
                    echo '<a href="resources/'.$doc['_id'].'/'.$doc['_source']['relation_haspart'].'" class="btn btn-dark mt-2">Download '.$doc['_source']['relation_haspart'].'</a><br>';
                }
            }

            //echo json_encode($doc['_source']);
            ?>
            <h4 class="text-center p-2 mt-2" >Claims</h4>
            <?php
            $claims = getclaims($searchstring);
            $i = 1;
            if($claims!=null){
                foreach($claims as $claim){
                    ?>
                    <div class="form-group">
                        <label class="small_text">Claim by <em><?php echo $claim['fname'] .' ' . $claim['lname']?></em></label><br>
                        <label class="text-body"><em>Claim: </em><?php echo$claim['claim'];?></label><br>
                        <label class="text-body"><em>Claim can be reproduced: </em><?php echo$claim['can_reproduce'];?></label><br>
                        <label class="text-body"><em>Source code: </em><?php echo$claim['source_code'];?></label><br>
                        <label class="text-body"><em>Datasets: </em><?php echo$claim['datasets'];?></label><br>
                        <label class="text-body"><em>Experiments and results: </em><?php echo$claim['experiments_and_results'];?></label><br>
                    </div>

                    <?php
                    $i++;
                }

            }else{
            ?>
                <em>No Claims</em><br>
            <?php
            }
            ?>
            <?php
            if(isset($_SESSION['uname'])){
                echo '<br><button type="button" name="makeclaim" id="makeclaim" class="btn mt-2 btn-success">Make Claim(s)</button>';
            ?>
                <div id="claims" style="display: none">
                    <h4 class="text-center p-2 mt-2" >Submit Claims</h4>
                    <form action="document.php" method="post" class="p-2">
                        <input type="hidden" name="document" value="<?php echo $searchstring;?>">
                        <div class="form-group">
                            <label class="small_text" for="claim1">Claim #1 by <em><?php echo $_SESSION['nickname'] .' ' . $_SESSION['lname']?></em></label>
                            <input type="text" name="claim[]" id="claim1" class="form-control rounded-0" placeholder="Enter your claim here.." required>
                        </div>
                        <div class="form-group">
                            <label class="small_text" for="reproduce1">Can you reproduce this claim?</label>
                            <select name="reproduce[]" id="reproduce1">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Partially">Partially</option>
                            </select>

                        </div>
                        <strong>Proof or experiments:</strong>
                        <div class="form-group">
                            <label class="small_text" for="sourcecode1">Source code</label>
                            <input name="sourcecode[]" id="sourcecode1" class="form-control rounded-0" >
                        </div>
                        <div class="form-group">
                            <label class="small_text" for="datasets1">Datasets</label>
                            <input name="datasets[]" id="datasets1" class="form-control rounded-0" >
                        </div>
                        <div class="form-group">
                            <label class="small_text" for="results1">Experiments and results</label>
                            <input name="results[]" id="results1" class="form-control rounded-0" >
                        </div>
                        <div id="dynamic_field"></div>
                        <div class="form-group">
                            <button type="button" name="add" id="add" class="btn btn-primary rounded-0" ><i class="icon_plus_alt mr-1"></i> Add another claim</button>
                            <button type="submit" name="claims" id="claims" class="btn btn-success rounded-0" ><i class="icon_floppy mr-1"></i> Submit</button>
                        </div>
                    </form>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</div>
<!--================End Forum Content Area =================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var i = 1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('' +
                '<div id="row'+i+'"><div class="form-group"><label class="small_text" for="claim'+i+'">Claim #'+i+' by <em><?php echo $_SESSION['nickname'] .' ' . $_SESSION['lname']?></em></label><input type="text" name="claim[]" id="claim'+i+'" class="form-control rounded-0" placeholder="Enter your claim here.." required></div><div class="form-group"><label class="small_text" for="reproduce'+i+'">Can you reproduce this claim?</label><select name="reproduce[]" id="reproduce'+i+'"><option value="Yes">Yes</option><option value="No">No</option><option value="Partially">Partially</option></select></div><strong>Proof or experiments:</strong><div class="form-group"><label class="small_text" for="sourcecode'+i+'">Source code</label><input name="sourcecode[]" id="sourcecode'+i+'" class="form-control rounded-0" ></div><div class="form-group"><label class="small_text" for="datasets'+i+'">Datasets</label><input name="datasets[]" id="datasets'+i+'" class="form-control rounded-0" ></div><div class="form-group"><label class="small_text" for="results'+i+'">Experiments and results</label><input name="results[]" id="results'+i+'" class="form-control rounded-0" ></div><div class="form-group"><button name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="icon_minus_alt mr-2"></i>Remove claim</button></div></div>');
        });

        $(document).on('click','.btn_remove', function(){
            var button_id = $(this).attr("id");
            $("#row"+button_id+"").remove();
        });

        $('#submit').click(function(){
            $.ajax({
                async: true,
                url: "internship_details.php",
                method: "POST",
                data: $('#internship_details').serialize(),
                success:function(rt)
                {
                    alert(rt);
                    $('#internship_details')[0].reset();
                }
            });
        });
    });
</script>
<?php
require_once 'footer.php';
?>


