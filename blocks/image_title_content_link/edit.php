<?php  defined('C5_EXECUTE') or die("Access Denied.");
$al = Loader::helper('concrete/asset_library');
$ps = Loader::helper('form/page_selector');
Loader::element('editor_config');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
	
	#ccm-imagetitlecontentlinkblock-edit {padding:1em 0 0;}
	#ccm-imagetitlecontentlinkblock-edit .ccm-dialog-tabs {margin:0 0 1em;}
	
	#ccm-imagetitlecontentlinkblock-edit > div {display:none; clear:both; float:left; width:100%; box-sizing:border-box;}
	#ccm-imagetitlecontentlinkblock-edit > div.ccm-nav-active {display:block;}
	
	#ccm-imagetitlecontentlinkblock-edit .control-group {margin-bottom:1em;}
	#ccm-imagetitlecontentlinkblock-edit .control-group label {width:18%; margin:0;}
	#ccm-imagetitlecontentlinkblock-edit .control-group .controls {width:80%; margin-left:20%;}
</style>

<div class="ccm-ui" id="ccm-imagetitlecontentlinkblock-edit">

	<ul class="ccm-dialog-tabs">    	
        <li><a href="#ccm-imagetitlecontentlinkblock-content">Content</a></li>
        <li><a href="#ccm-imagetitlecontentlinkblock-image">Image</a></li>
        <li><a href="#ccm-imagetitlecontentlinkblock-link">Link</a></li>
        <li><a href="#ccm-imagetitlecontentlinkblock-options">Options</a></li>
    </ul>
    
    <div id="ccm-imagetitlecontentlinkblock-content">
        <div class="control-group">
            <?php  echo $form->label('title_text', t('Title')); ?>
            <div class="controls">
            <?php  echo $form->text('title_text', $title_text, array('style'=>'width:98%;')); ?>
            </div>
        </div>
        
        <div class="control-group">
            <?php  echo $form->label('content', t('Content')); ?>
            
            <div class="controls">
            <?php  Loader::element('editor_controls'); ?>
            <textarea id="content" name="content" class="ccm-advanced-editor" style="width:98%;"><?php  echo $content; ?></textarea>
            </div>
        </div>
        
    </div>
    
    <div id="ccm-imagetitlecontentlinkblock-image">
        <div class="control-group">
            <?php  echo $form->label('image_fID', t('Image')); ?>
            <div class="controls">
            <?php  echo $al->image('image_fID', 'image_fID', 'Choose Image',  $image_file); ?>
            </div>
        </div>
        
        <div class="control-group">
            <?php  echo $form->label('image_altText', t('Alt Text')); ?>
            <div class="controls">
            <?php  echo $form->text('image_altText', $image_altText, array('style'=>'width:98%;')); ?>
            </div>
        </div> 
        <div class="control-group">
            <?php  echo $form->label('bgimage_fID', t('Background Image')); ?>
            <div class="controls">
            <?php  echo $al->image('bgimage_fID', 'bgimage_fID', 'Choose Image', $bgimage_file); ?>
            </div>
        </div>   
    </div>

	<div id="ccm-imagetitlecontentlinkblock-link" class="ccm-formBlockPane">
        <div class="control-group">
        <?php  echo $form->label('link_text', t('Link Text')); ?>
            <div class="controls">
            <?php  echo $form->text('link_text', $link_text, array('style'=>'width:98%;')); ?>
            </div>
        </div>
        
        <div class="control-group">
        <?php  echo $form->label('link_cID', t('Link to Page')); ?>
            <div class="controls">
            <?php  echo $ps->selectPage('link_cID', $link_cID); ?>
            </div>
        </div>
        
        <div class="control-group">
        <?php  echo $form->label('link_url', t('Link to URL')); ?>
            <div class="controls">
            <?php  echo $form->text('link_url', $link_url, array('style'=>'width:98%;')); ?>
            </div>
        </div>
        
        <div class="control-group">
        <?php  echo $form->label('file_fID', t('Link to File')); ?>
            <div class="controls">
            <?php  echo $al->file('file_fID', 'file_fID', 'Choose File', $file); ?>
            </div>
        </div>
	</div>
    
    
    <div id="ccm-imagetitlecontentlinkblock-options" class="ccm-formBlockPane">
        
        
        <?php	
		echo '<!--'; 
		print_r($this);
		echo '-->';
			$blockObj = $this->blockObj;
			if($blockObj instanceof BlockType){
				$templates = $blockObj->getBlockTypeCustomTemplates();
				$currentTpl = '';
			}else{
				$templates = $blockObj->getBlockTypeObject()->getBlockTypeCustomTemplates();
				$currentTpl = $blockObj->getBlockFilename();
			}
			
			$txt = Loader::helper('text');
		?>
        <div class="control-group">
        <?php  echo $form->label('template', t('Template')); ?>
            <div class="controls">
                <select name="template" id="template">
                	<option value=""></option>
                    <?php  foreach($templates as $template){ ?>
                    <option value="<?php echo $template ?>" <?php if($template == $currentTpl) echo 'selected' ?>>
                        <?php if (strpos($template, '.') !== false) {
                            print substr($txt->unhandle($template), 0, strrpos($template, '.'));
                        } else {
                            print $txt->unhandle($template);
                        }
                        ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        
        <!--
        <div class="control-group">
        <?php  echo $form->label('style', t('Style')); ?>
            <div class="controls">
            <?php  echo $form->select('style', array(''=>'','style1'=>'Style 1', 'style2'=>'Style 2', 'style3'=>'Style 3', 'style4'=>'Style 4', 'style5'=>'Style 5'),  $style); ?>
            </div>
        </div>
        -->
        
        <div class="control-group">
        <?php  echo $form->label('css_class', t('CSS Class')); ?>
            <div class="controls">
            <?php  echo $form->text('css_class', $css_class,  array('class'=>'typeahead')); ?>
            </div>
        </div>
        
        
    </div>

</div>

<script type="text/javascript">
$(function(){
	$('#ccm-imagetitlecontentlinkblock-edit').ccmImageTitleContentLinkBlockEditor({
		cssClassHints: <?php echo !empty($css_class_hints) ? json_encode(array_values($css_class_hints)) : '[]' ?>
	});
});
</script>