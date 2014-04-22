<?php  defined('C5_EXECUTE') or die("Access Denied.");
$nh = Loader::helper('navigation');
?>

<div class="itcl <?php echo $css_class ?>">
	<div class="inner">
    
	<?php  if (!empty($image)): ?>
        <?php if(!empty($link_url)): ?>
        <a class="image" href="<?php echo $link_url ?>">
        <?php else: ?>
        <div class="image">
        <?php endif ?>
        
            <div class="inner">
                <img src="<?php  echo $image->src; ?>" width="<?php  echo $image->width; ?>" height="<?php  echo $image->height; ?>" alt="<?php  echo $image_altText; ?>" />
            </div>
        
        <?php if(!empty($link_url)): ?>
        </a>
        <?php else: ?>
        </div>
        <?php endif ?>
        
    <?php  endif; ?>
    
        <div class="info">
        
        <?php  if (!empty($title_text)): ?>
            <h2 class="title"><?php  echo $title_text ?></h2>
        <?php  endif; ?>
        
        <?php  if (!empty($content)): ?>
            <div class="content">
            <?php  echo $content; ?>
            </div>
        <?php  endif; ?>
        
        <?php if (!empty($link_cID)):
            $link_url = $nh->getLinkToCollection(Page::getByID($link_cID), true);
            $link_text = empty($link_text) ? $link_url : htmlentities($link_text, ENT_QUOTES, APP_CHARSET);
            ?>
            <div class="link page">
            <a href="<?php  echo $link_url; ?>"><?php  echo $link_text; ?></a>
            </div>
        
        <?php elseif (!empty($file)):
            $link_url = View::url('/download_file', $file_fID, Page::getCurrentPage()->getCollectionID());
            $link_class = 'file-'.$file->getExtension();
            $link_text = empty($link_text) ? $file->getFileName() : htmlentities($link_text, ENT_QUOTES, APP_CHARSET);
            ?>
            <div class="link file">
                <a href="<?php  echo $link_url; ?>" class="<?php  echo $link_class; ?>"><?php  echo $link_text; ?></a>
            </div>
        
        <?php elseif (!empty($link_url)):
            $link_url = $this->controller->valid_url($link_url);
            $link_text = empty($link_text) ? $link_url : htmlentities($link_text, ENT_QUOTES, APP_CHARSET);
            ?>
            <div class="link external">
                <a href="<?php  echo $link_url; ?>" target="_blank"><?php  echo $link_text; ?></a>
            </div>
        <?php  endif; ?>
        
        </div>
    
    </div>
</div>
