<?php
require_once 'header.php';
require_once 'navigation.php';
require_once 'helpers.php';
require_once 'processs.php';

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
            <h2>Add a new document</h2>
        </div>
    </div>
</section>

<!--================Forum Content Area =================-->
<div class="row m-5">
    <div class="p-5">

        <div class="col-lg-12 doc-middle-content">

            <form action="addDocument.php" class="row login_form" method="post" enctype="multipart/form-data">
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="title">Title</label>
                    <input type="text" class="form-control" required name="title" id="title" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="contributor_author">Author</label>
                    <input type="text" class="form-control" required name="contributor_author" id="contributor_author" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="date_accessioned">Date Accessioned</label>
                    <input type="datetime-local" class="form-control" required name="date_accessioned" id="date_accessioned" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="committeemember">Date Available</label>
                    <input type="datetime-local" class="form-control" required name="date_available" id="date_available" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="date_issued">Date Issued</label>
                    <input type="date" class="form-control" required name="date_issued" id="date_issued" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="identifier_other">Other Identifier</label>
                    <input type="text" class="form-control" required name="identifier_other" id="department" identifier_other="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="identifier_uri">Identifier URI</label>
                    <input type="text" class="form-control" required name="identifier_uri" id="identifier_uri" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="identifier_sourceurl">Identifier Source URL</label>
                    <input type="text" class="form-control" required name="identifier_sourceurl" id="identifier_sourceurl" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="identifier_oclc">Identifier OCLC</label>
                    <input type="text" class="form-control" required name="identifier_oclc" id="identifier_oclc" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="description">Description</label>
                    <input type="text" class="form-control" required name="description" id="description" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="description_abstract">Description abstract</label>
                    <textarea class="form-control" required name="description_abstract" id="description_abstract" placeholder="" autocomplete="off"></textarea>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="description_provenance">Description Provenance</label>
                    <input type="text" class="form-control" required name="description_provenance" id="description_provenance" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="description_sponsorship">Description Sponsorship</label>
                    <input type="text" class="form-control" required name="description_sponsorship" id="description_sponsorship" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="publisher">Publisher</label>
                    <input type="text" class="form-control" required name="publisher" id="publisher" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="rights">Rights</label>
                    <input type="text" class="form-control" required name="rights" id="rights" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="subject">Subject</label>
                    <input type="text" class="form-control" required name="subject" id="subject" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="subject_lcc">Subject LCC</label>
                    <input type="text" class="form-control" required name="subject_lcc" id="subject_lcc" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="subject_lcsh">Subject LCSH</label>
                    <input type="text" class="form-control" required name="subject_lcsh" id="subject_lcsh" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="type">Type</label>
                    <input type="text" class="form-control" required name="type" id="type" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="language_iso">Language</label>
                    <input type="text" class="form-control" required name="language_iso" id="language_iso" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="contributor_department">Department</label>
                    <input type="text" class="form-control" required name="contributor_department" id="contributor_department" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="description_degree">Degree Description</label>
                    <input type="text" class="form-control" required name="description_degree" id="description_degree" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="contributor_committeechair">Committee Chair</label>
                    <input type="text" class="form-control" required name="contributor_committeechair" id="contributor_committeechair" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="contributor_committeecochair">Committee Co-Chair</label>
                    <input type="text" class="form-control" required name="contributor_committeecochair" id="contributor_committeecochair" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="contributor_committeemember">Committee Member</label>
                    <input type="text" class="form-control" required name="contributor_committeemember" id="contributor_committeemember" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="degree_name">Degree Name</label>
                    <input type="text" class="form-control" required name="degree_name" id="degree_name" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="degree_level">Degree Level</label>
                    <input type="text" class="form-control" required name="degree_level" id="degree_level" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="degree_grantor">Degree Grantor</label>
                    <input type="text" class="form-control" required name="degree_grantor" id="degree_grantor" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="degree_discipline">Degree Discipline</label>
                    <input type="text" class="form-control" required name="degree_discipline" id="degree_discipline" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="date_adate">Date ADate</label>
                    <input type="date" class="form-control" required name="date_adate" id="date_adate" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="date_sdate">Date SDate</label>
                    <input type="date" class="form-control" required name="date_sdate" id="date_sdate" placeholder="" autocomplete="off">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="small_text" for="date_rdate">Date RDate</label>
                    <input type="date" class="form-control" required name="date_rdate" id="date_rdate" placeholder="" autocomplete="off">
                </div>

                <div class="col-sm-6 form-group">
                    <label class="small_text" for="document">Upload Document</label>
                    <input type="file" class="form-control" required name="document" id="document" placeholder="" autocomplete="off">
                </div>
                <div class="col-lg-12 text-center">
                    <input type="submit" class="btn action_btn thm_btn" name="addDocument" id="addDocument" value="Submit"/>
                </div>
            </form>

        </div>
    </div>
</div>
<!--================End Forum Content Area =================-->

<?php
require_once 'footer.php';
?>


