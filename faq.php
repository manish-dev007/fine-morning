<!DOCTYPE html>
<html lang="en">
<head>
    <?php $page_name = 'faq';require 'include/header.php'; ?>
<meta name="description" content="<?php echo $meta_descr; ?>">
<meta property="og:title" content="<?php echo $meta_title; ?>">
<meta name="author" content="Fine Morning Pharma">
<title><?php echo $meta_title; ?></title>

<link rel="canonical" href="https://www.finemorningpharma.com/faq" />


</head>
<style>

</style>

<body>


    <!-- Wrap -->
    <div id="wrap">

        <!-- header -->
        <?php require 'include/header_links.php'; ?>
        <section class="sub-bnr">
            <div class="position-center-center">
                <div class="container">
                    <h4>FAQ's</h4>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">FAQ's</li>
                    </ol>
                </div>
            </div>
        </section>
        
        <section class="padding-top-50 padding-bottom-50">
            <div class="container">


                <!--======= PRODUCT ASCRIPTION =========-->
                <div class="item-decribe tab_faq">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs animate fadeInUp" data-wow-delay="0.4s" role="tablist">
                        <li role="presentation" class="active"><a href="#anafine-powder" role="tab"
                                data-toggle="tab">Anafine Powder</a></li>
                        <li role="presentation"><a href="#anafine-cream" role="tab" data-toggle="tab">Anafine Cream</a>
                        </li>
                        <li role="presentation"><a href="#anafine-tablet" role="tab" data-toggle="tab">Bawaseal Tablet</a></li>
                        <li role="presentation"><a href="#vedvigox-capsules" role="tab" data-toggle="tab">VedVigoX Capsules</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content animate fadeInUp" data-wow-delay="0.4s">
                        <!-- ASCRIPTION -->
                        <div role="tabpanel" class="tab-pane fade in active" id="anafine-powder">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <?php

                                            $first_id = 0;
                                            $faq_get_f = $con->query("select * from faq where status = '1' and faq_categ = 'Anafine Powder' order by id ASC LIMIT 1");
                                            if($row_get_f = $faq_get_f->fetch_assoc())
                                            {  
                                            $first_id = $row_get_f['id'];
                                            }
                                            $sel_1 = $sel_2 = $sel_3 = '';
                                            $faq_all = $con->query("select * from faq where status = '1' and faq_categ = 'Anafine Powder' order by id ASC");
                                            while($row_faqs = $faq_all->fetch_assoc())
                                            {  
                                                if($first_id == $row_faqs['id']){
                                                $sel_1 = 'true';
                                                $sel_2 = 'in';
                                                $sel_3 = '';
                                                }else{
                                                $sel_1 = 'false';
                                                $sel_2 = '';
                                                $sel_3 = 'collapsed';
                                                }
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h5 class="panel-title">
                                                    <a role="button" class="<?php echo $sel_3; ?>"
                                                        data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapse<?php echo $row_faqs['id']; ?>"
                                                        aria-expanded="<?php echo $sel_1; ?>"
                                                        aria-controls="collapse<?php echo $row_faqs['id']; ?>">
                                                        <?php echo $row_faqs['faq_question']; ?>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse<?php echo $row_faqs['id']; ?>"
                                                class="panel-collapse collapse <?php echo $sel_2; ?>" role="tabpanel"
                                                aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <?php echo $row_faqs['faq_ans']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>


                                    </div>
                                </div>
                                <!--- END COL -->
                            </div>
                        </div>

                        <!-- REVIEW -->
                        <div role="tabpanel" class="tab-pane fade" id="anafine-cream">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <?php

                                            $first_id = 0;
                                            $faq_get_f = $con->query("select * from faq where status = '1' and faq_categ = 'Anafine Cream' order by id ASC LIMIT 1");
                                            if($row_get_f = $faq_get_f->fetch_assoc())
                                            {  
                                            $first_id = $row_get_f['id'];
                                            }
                                            $sel_1 = $sel_2 = $sel_3 = '';
                                            $faq_all1 = $con->query("select * from faq where status = '1' and faq_categ = 'Anafine Cream' order by id ASC");
                                            while($row_faqs = $faq_all1->fetch_assoc())
                                            {  
                                                if($first_id == $row_faqs['id']){
                                                $sel_1 = 'true';
                                                $sel_2 = 'in';
                                                $sel_3 = '';
                                                }else{
                                                $sel_1 = 'false';
                                                $sel_2 = '';
                                                $sel_3 = 'collapsed';
                                                }
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h5 class="panel-title">
                                                    <a role="button" class="<?php echo $sel_3; ?>"
                                                        data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapse<?php echo $row_faqs['id']; ?>"
                                                        aria-expanded="<?php echo $sel_1; ?>"
                                                        aria-controls="collapse<?php echo $row_faqs['id']; ?>">
                                                        <?php echo $row_faqs['faq_question']; ?>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse<?php echo $row_faqs['id']; ?>"
                                                class="panel-collapse collapse <?php echo $sel_2; ?>" role="tabpanel"
                                                aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <?php echo $row_faqs['faq_ans']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>


                                    </div>
                                </div>
                                <!--- END COL -->
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="anafine-tablet">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <?php

                                            $first_id = 0;
                                            $faq_get_f = $con->query("select * from faq where status = '1' and faq_categ = 'Bawaseal Tablet' order by id ASC LIMIT 1");
                                            if($row_get_f = $faq_get_f->fetch_assoc())
                                            {  
                                            $first_id = $row_get_f['id'];
                                            }
                                            $sel_1 = $sel_2 = $sel_3 = '';
                                            $faq_all = $con->query("select * from faq where status = '1' and faq_categ = 'Bawaseal Tablet' order by id ASC");
                                            while($row_faqs = $faq_all->fetch_assoc())
                                            {  
                                                if($first_id == $row_faqs['id']){
                                                $sel_1 = 'true';
                                                $sel_2 = 'in';
                                                $sel_3 = '';
                                                }else{
                                                $sel_1 = 'false';
                                                $sel_2 = '';
                                                $sel_3 = 'collapsed';
                                                }
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h5 class="panel-title">
                                                    <a role="button" class="<?php echo $sel_3; ?>"
                                                        data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapse<?php echo $row_faqs['id']; ?>"
                                                        aria-expanded="<?php echo $sel_1; ?>"
                                                        aria-controls="collapse<?php echo $row_faqs['id']; ?>">
                                                        <?php echo $row_faqs['faq_question']; ?>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse<?php echo $row_faqs['id']; ?>"
                                                class="panel-collapse collapse <?php echo $sel_2; ?>" role="tabpanel"
                                                aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <?php echo $row_faqs['faq_ans']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>


                                    </div>
                                </div>
                                <!--- END COL -->
                            </div>
                        </div>

                        <!-- TAGS -->
                        <div role="tabpanel" class="tab-pane fade" id="vedvigox-capsules">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <?php

                                            $first_id = 0;
                                            $faq_get_f = $con->query("select * from faq where status = '1' and faq_categ = 'Vedvigox Capsules' order by id ASC LIMIT 1");
                                            if($row_get_f = $faq_get_f->fetch_assoc())
                                            {  
                                            $first_id = $row_get_f['id'];
                                            }
                                            $sel_1 = $sel_2 = $sel_3 = '';
                                            $faq_all = $con->query("select * from faq where status = '1' and faq_categ = 'Vedvigox Capsules' order by id ASC");
                                            while($row_faqs = $faq_all->fetch_assoc())
                                            {  
                                                if($first_id == $row_faqs['id']){
                                                $sel_1 = 'true';
                                                $sel_2 = 'in';
                                                $sel_3 = '';
                                                }else{
                                                $sel_1 = 'false';
                                                $sel_2 = '';
                                                $sel_3 = 'collapsed';
                                                }
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h5 class="panel-title">
                                                    <a role="button" class="<?php echo $sel_3; ?>"
                                                        data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapse<?php echo $row_faqs['id']; ?>"
                                                        aria-expanded="<?php echo $sel_1; ?>"
                                                        aria-controls="collapse<?php echo $row_faqs['id']; ?>">
                                                        <?php echo $row_faqs['faq_question']; ?>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse<?php echo $row_faqs['id']; ?>"
                                                class="panel-collapse collapse <?php echo $sel_2; ?>" role="tabpanel"
                                                aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <?php echo $row_faqs['faq_ans']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>


                                    </div>
                                </div>
                                <!--- END COL -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </div>

    <!--======= FOOTER =========-->
    <?php require 'include/footer.php'; ?>
    <!--======= RIGHTS =========-->

    </div>
    <?php require 'include/js.php'; ?>

</body>

</html>