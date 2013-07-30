<?php  defined('C5_EXECUTE') or die("Access Denied.");
$nh = Loader::helper('navigation');
?>

<?php  if (!empty($image)): ?>
	<div class="image">
	<img src="<?php  echo $image->src; ?>" width="<?php  echo $image->width; ?>" height="<?php  echo $image->height; ?>" alt="<?php  echo $image_altText; ?>" />
	</div>
<?php  endif; ?>

<?php  if (!empty($title_text)): ?>
	<h2 class="title"><?php  echo htmlentities($title_text, ENT_QUOTES, APP_CHARSET); ?></h2>
<?php  endif; ?>

<?php  if (!empty($content)): ?>
	<div class="content">
	<?php  echo $content; ?>
	</div>
<?php  endif; ?>

<?php if(!empty($link_url)): ?>
	<div class="link">
    	<a href="<?php  echo $link_url; ?>" class="<?php  echo $link_class; ?>"><?php  echo $link_text; ?></a>
    </div>
<?php endif; ?>
