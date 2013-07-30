<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

class ImageTitleContentLinkPackage extends Package {

     protected $pkgHandle = 'image_title_content_link';
     protected $appVersionRequired = '5.3.3.1';
     protected $pkgVersion = '0.01';

     public function getPackageDescription() {
          return t("A block for an image, title, content, and link.");
     }

     public function getPackageName() {
          return t("Image Title Content Link");
     }
     
     public function install() {
        $pkg = parent::install();      
		  
		$block = BlockType::getByHandle('image_title_content_link');
		if(!$block) {		
			BlockType::installBlockTypeFromPackage('image_title_content_link', $pkg);
		}           
     }
     
}