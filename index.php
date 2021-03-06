<?php
/**
 * @copyright  Copyright (C) 2015 - 2016 AHC Waasdorp. All rights reserved.
 * @license    GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 * Bram Waasdorp Eerste versie 10/08/2014 afgeleeid van asha-s_front 
   groottes nu zonder toevoeging van % zodat ook px groottes kunnen worden opgegeven, 
   dit maakt berekeningen wel lastiger
   14-2-2015 meta tag viewport toegevoegd tbv mobile devices (https://developers.google.com/speed/docs/insights/ConfigureViewport)
   9-8-2015 doctype html (html5)
   14-8-2015 prefixes og en fb aangepast aan html5 (prefix ipv xmlns:)
   14-11-2015 inlude gatracker verwijderd
  26-3-2016 attribute data-wsmodal toegevoeg voor start modal popup
  */

// no direct access
/* defined( '_JEXEC' ) or die( 'Restricted access' ); */
 defined( '_JEXEC' ) or die;
JHtml::_('behavior.framework', true);
// Add modal behavior for links  attribuut data-wsmodal in plaats van class modal, 
// omdat .modal speciale functie heeft in bootstrap 3
// betekent wel wijziging aan alle artikelen daarom eerst beiden toevoegen.
JHTML::_('behavior.modal'); 
JHTML::_('behavior.modal', 'a[data-wsmodal]');
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>"  
 prefix="og: http://ogp.me/ns#  fb: http://www.facebook.com/2008/fbml" lang="<?php echo $this->language; ?>" >
<?php $app = JFactory::getApplication(); ?>
<head>

<jdoc:include type="head" />
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<?php include_once("style.php"); ?>
<?php if ($gplusProfile > " ") : ?><link rel="publisher" href="<?php echo $gplusProfile ?>" /><?php endif; ?>
<?php include("include_link_rel_canonical.php"); ?>


<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ieonly.css" rel="stylesheet" type="text/css" />

<![endif]-->

<!--[if IE 7]> 
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
<![endif]--> 


<?php if($this->direction == 'rtl') : ?>
  <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template_rtl.css" rel="stylesheet" type="text/css" />
<?php endif; ?>


</head>

<body id="page_bg" >
<img id="bg_img" src="<?php echo $this->baseurl ?><?php echo $bgImage; ?>" alt="Background_image" />

<div id="header">
  <?php if ($headerWidth > 0 ) : ?>
  <div id="headerblock">
  <?php if(  $this->countModules('header'))    : ?>
             <jdoc:include type="modules" name="header"  />
  <?php endif; ?>
  </div><!--einde headerblock-->  
  <?php endif; ?> 

      <div id="logo">
        <a href="<?php echo $this->baseurl ?>" title="Home" >
	    <img id="logo_img" src="<?php echo $this->baseurl ?><?php echo $logo; ?>" alt="Logo_image" />
        </a>
  <?php if ($logoWidth > 0 ) : ?>
  <?php if(  $this->countModules('logo'))    : ?>
             <jdoc:include type="modules" name="logo"  />
  <?php endif; ?>
  <?php endif; ?> 
      </div><!-- einde logo -->
   <?php if(  $this->countModules('position-1'))    : ?>
		<!-- position-1 -->
       <jdoc:include type="modules" name="position-1" />
   <?php endif; ?>
   <?php if(  $this->countModules('position-2'))    : ?>
		<!-- position-2 -->
       <jdoc:include type="modules" name="position-2" style="rounded" />
   <?php endif; ?>
</div> <!-- einde header -->
<a name="up" id="up"></a>
  
  <div id="wrapper">
      <div id="area">
  	<?php if ($leftColumnWidth > 0 ) : ?>
        <div id="leftcolumn">
            <?php if(  $this->countModules('position-4'))    : ?>
		<!-- position-4 -->
               <jdoc:include type="modules" name="position-4" />
            <?php endif; ?>
            <?php if(  $this->countModules('position-7'))    : ?>
		<!-- position-7 -->
               <jdoc:include type="modules" name="position-7" style="rounded" />
           <?php endif; ?>
            <?php if(  $this->countModules('position-5'))    : ?>
		<!-- position-5 -->
               <jdoc:include type="modules" name="position-5" />
            <?php endif; ?>

        </div>   <!-- left column --> 
        <?php endif; ?>
            
   	<?php if ($mainColumnWidth > 0 ) : ?>
       <div id="maincolumn"><!-- maincolumn -->
            <?php if(  $this->countModules('position-11'))    : ?>
		<!-- position-11 -->
               <jdoc:include type="modules" name="position-11" />
            <?php endif; ?>
            <?php if(  $this->countModules('position-12'))    : ?>
		<!-- position-12 -->
               <jdoc:include type="modules" name="position-12" style="rounded" />
           <?php endif; ?>
               <jdoc:include type="component" />
                    <div class="clr"></div>
            <?php if(  $this->countModules('position-6'))    : ?>
		<!-- position-6 -->
               <jdoc:include type="modules" name="position-6" />
           <?php endif; ?>
 
       </div><!-- maincolumn einde -->
       <?php endif; ?>

	<?php if ($rightColumnWidth > 0 ) : ?>
        <div id="rightcolumn">
           <?php if(  $this->countModules('position-3'))    : ?>
		<!-- position-3 -->
               <jdoc:include type="modules" name="position-3" />
            <?php endif; ?>
            <?php if(  $this->countModules('position-8'))    : ?>
		<!-- position-8 -->
               <jdoc:include type="modules" name="position-8" style="rounded" />
           <?php endif; ?>
 
        </div>   <!-- right column --> 


        <?php endif; ?>

       <div class="clr"></div>
    </div> <!-- einde area-->
   </div> <!-- einde wrapper -->
   <?php if(  $this->countModules('position-9'))    : ?>
		<!-- position-9 -->
       <jdoc:include type="modules" name="position-9" />
   <?php endif; ?>
   <?php if(  $this->countModules('position-10'))    : ?>
		<!-- position-10 -->
       <jdoc:include type="modules" name="position-10" style="rounded" />
   <?php endif; ?>
   <?php if(  $this->countModules('icons'))    : ?>
   <div id="icons">
       <jdoc:include type="modules" name="icons" />
   </div> 
   <?php endif; ?>  
<?php if(  $this->countModules('footer'))    : ?>
   <div id="footer">
       <jdoc:include type="modules" name="footer"  />
   </div>   
<?php endif; ?>




</body>
</html>
