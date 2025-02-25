<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
$menu_horizontal=TRUE;
$bootstrap_theme = 'themes/'.$this->template->theme();

$data=array();
//side menu
$data['menus']= $this->Menu_model->select_all();
$sidebar=$this->load->view('default_menu', $data,true);

//default page content wrapper class
$content_wrap_class="container";

if (isset($body_class)){
    $content_wrap_class=$body_class;
}

$use_cdn=false;

?>
<!DOCTYPE html>
<html>

<head>    
<?php require_once 'head.php';?>
</head>
<body>

<!-- site header -->
<?php include_once 'header.php';?>

<!-- page body -->
<div class="<?php echo $content_wrap_class;?>">
    
        <?php if ($menu_horizontal===TRUE):?>
            <?php if (isset($search_filters) && $search_filters!==false):?>
              <div class="row">            
                <div class="col-sm-12">
                    <?php include 'share.php';?>
                    <!--breadcrumbs -->
                    <?php $breadcrumbs_str= $this->breadcrumb->to_string();?>
                    <?php if ($breadcrumbs_str!=''):?>
                        <ol class="breadcrumb wb-breadcrumb">
                            <?php echo $breadcrumbs_str;?>
                        </ol>
                    <?php endif;?>
                </div>
                <?php echo $search_filters;?>
                <?php echo isset($content) ? $content : '';?>
              </div>
            <?php else:?>
                <div class="body-content-wrap">
                    
                    <?php //include 'share.php';?>
                    <!--breadcrumbs -->
                    <div class="container">
                    <?php $breadcrumbs_str= $this->breadcrumb->to_string();?>
                    <?php if ($breadcrumbs_str!=''):?>
                        <ol class="breadcrumb wb-breadcrumb">
                            <?php echo $breadcrumbs_str;?>
                        </ol>
                    <?php endif;?>
                    </div>
                    <!-- /breadcrumbs -->

                    <?php echo isset($content) ? $content : '';?>
                </div>
            <?php endif;?>
        <?php else:?>
            <?php echo isset($content) ? $content : '';?>
        <?php endif;?>

    

</div>

<!-- page footer -->
<?php include_once 'footer.php';?>

<script src="<?php echo base_url().$bootstrap_theme ?>/js/custom.js"></script>
</body>

</html>
