<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<title><?php echo $title; if (isset($_GET['page'])) { echo " - ". ((int) $_GET['page'])." ".$text_page;} ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; if (isset($_GET['page'])) { echo " - ". ((int) $_GET['page'])." ".$text_page;} ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content= "<?php echo $keywords; ?>" />
<?php } ?>
<meta property="og:title" content="<?php echo $title; if (isset($_GET['page'])) { echo " - ". ((int) $_GET['page'])." ".$text_page;} ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $og_url; ?>" />
<?php if ($og_image) { ?>
<meta property="og:image" content="<?php echo $og_image; ?>" />
<?php } else { ?>
<meta property="og:image" content="<?php echo $logo; ?>" />
<?php } ?>
<meta property="og:site_name" content="<?php echo $name; ?>" />
<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="catalog/view/slick/slick.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="catalog/view/slick/slick-theme.css" rel="stylesheet" type="text/css" />
<link href="catalog/view/slick/slick.css" rel="stylesheet" type="text/css" />
<link href="catalog/view/theme/default/stylesheet/stylesheet.css" rel="stylesheet">
<?php foreach ($styles as $style) { ?>
<link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script src="catalog/view/javascript/common.js" type="text/javascript"></script>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<?php foreach ($scripts as $script) { ?>
<script src="<?php echo $script; ?>" type="text/javascript"></script>
<?php } ?>
<?php foreach ($analytics as $analytic) { ?>
<?php echo $analytic; ?>
<?php } ?>
</head>
<body class="<?php echo $class; ?>">
    <div class="back_int hide"></div>
    <div class='return_call hide'>
        <form class='call_act_back text-center' action='<?php echo $formaction; ?>'>
            <span class='close btn'><i class='fa fa-times'></i></span>
            <div class="form-group required">
                <label class="col-sm-12 text-center control-label" for="input-fio">ФИО</label>
                <div class="col-sm-12">
                  <input type="text" name="fio" value="" placeholder="ФИО" id="input-fio" class="form-control">
                </div>
                <div class='clear'></div>
              </div>
            
            <div class="form-group required">
                <label class="col-sm-12 text-center control-label" for="input-tel">Телефон</label>
                <div class="col-sm-12">
                  <input type="text" name="tel" value="" placeholder="Телефон" id="input-tel" class="form-control">
                </div>
                        <div class='clear'></div>
              </div>
            <div class="form-group required">
                <label class="col-sm-12 text-center control-label" for="input-message">Комментарий</label>
                <div class="col-sm-12">
                    <textarea rows='5' name="message" value='' placeholder="Содержание" id="input-message" class="form-control"> </textarea>
                </div>
                        <div class='clear'></div>
              </div>
            <button type='button' class='top_r_links'>Отправить</button>
        </form>
        
    </div>
    
    <header>
        <div class='top_line_m'>
            <div class="top_lime_in">
                <?php echo $language; ?>
                <div class='pull-left'><a class='dost_link' href='<?php echo $dostavka['url']; ?>'><?php echo $dostavka['title']; ?></a></div>
                <div class='pull-right'>
                     <?php if ($logged) { ?>
                        <a class='top_r_links' href="<?php echo $link_lc; ?>"><?php echo $text_lc; ?></a>
                        <a class='top_r_links' href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a>
                         <?php }else{ ?>
                         <a class='top_r_links' href="<?php echo $login; ?>"><?php echo $text_login; ?></a>
                      <?php } ?>
                </div>
                <div class='pull-right'>
                    <button class='top_r_links recall'><?php echo $recall; ?></button>
                </div>
            </div>
        </div>
        
        <div class='un_top_m'>
           <div class='un_top_in'>
               <a href='<?php echo $home; ?>' class="logo_m">
                    <img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" />
               </a>
               <div class="pull-left">
                   <ul class="socs_t">
                       <?php if($face_link !=''){ ?> <li><a href='<?php echo $face_link; ?>'><img src='/image/catalog/fb.png' /></a></li> <?php } ?>
                       <?php if($inst_link !=''){ ?> <li><a href='<?php echo $inst_link; ?>'><img src='/image/catalog/inst.png' /></a></li> <?php } ?>
                       <?php if($pint_link !=''){ ?> <li><a href='<?php echo $pint_link; ?>'><img src='/image/catalog/pint.png' /></a></li> <?php } ?>
                       <?php if($twit_link !=''){ ?> <li><a href='<?php echo $twit_link; ?>'><img src='/image/catalog/twit.png' /></a></li> <?php } ?>
                       <?php if($vk_link !=''){ ?> <li><a href='<?php echo $vk_link; ?>'><img src='/image/catalog/vk.png' /></a></li> <?php } ?>
                    </ul>
               </div>
               <div class="pull-left mail_ad">
                   <a href='mailto:<?php echo $header_email; ?>'><?php echo $header_email; ?></a>
               </div>
               
               <div class="pull-right t_cart">
                   <a href='<?php echo $shopping_cart; ?>'><?php echo $cart_total; ?></a>
               </div>
               <div class="pull-right phone-ic"><?php echo $header_phone1; ?>&nbsp;&nbsp;<?php echo $header_phone2; ?></div>
               <div class="clear"></div>
            </div> 
        </div>
        <div class='phome_menu'><span></span><span></span><span></span></div>
        <div class="top_menu">
            <ul class="main_menu">
                <?php foreach($main_menu as $elem){
                    echo "<li><a ";
                    if($elem['active']){
                        echo "class='active_l'";
                    }
                    echo " href='".$elem['href']."'>".$elem['name']."</a></li>";
                } ?>
            </ul>
        </div>
        
        <div class="main_slider">
            <?php if(isset($main_slider)){ 
                    foreach ($main_slider as $img){
                ?>
                <div>
                    <img src='<?php echo '/image/'.$img[0]; ?>'/>
                    <div class='preus'><img src='<?php echo '/image/'.$img[1]; ?>'/></div>
                </div>
            <?php } } ?>
        </div>
    </header>
    
 