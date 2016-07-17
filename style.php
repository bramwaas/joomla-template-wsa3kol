<?php
/**
 * @copyright  Copyright (C) 2014 - 2019 a.h.c. waasdorp. All rights reserved.
 * @license    GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 * Bram Waasdorp Eerste versie 10/08/2014 afgeleid van asha-s_front 
   style.php nu uit index.php gehaald om code eenvoudiger te kunnen onderscheiden
   groottes nu met  toevoeging van % maar gerelateerd aan breedte body die in px of % kan zijn 
   dit maakt berekeningen wel lastiger
   16-12-2014
 * 15-02-2015 bij breedte < breakpointMobile stijl van sommige elementen aanpassen voor betere weergave op smal (mobiel) scherm
 *            eerst alleen voor icons
   14-8-2015 -- uit commentaar vervangen door - - vanwege error gezien in validation tool
  */

// no direct access
/* defined( '_JEXEC' ) or die( 'Restricted access' ); */
 defined( '_JEXEC' ) or die;


// get params
$app = JFactory::getApplication();    
$doc      = JFactory::getDocument();
$templateparams  = $app->getTemplate(true)->params;

$gplusProfile    = htmlspecialchars($this->params->get('gplusProfile'));
$bodyWidth    = htmlspecialchars($this->params->get('bodyWidth'));
$bodyWidthMin    = htmlspecialchars($this->params->get('bodyWidthMin'));
$breakpointMobile = htmlspecialchars($this->params->get('breakpointMobile'));
$bgImage    = htmlspecialchars($this->params->get('bgImage'));
$bgWidth    = htmlspecialchars($this->params->get('bgWidth'));
$bgTop      = htmlspecialchars($this->params->get('bgTop'));
$bgLeft      = htmlspecialchars($this->params->get('bgLeft'));
$bgColor    = htmlspecialchars($this->params->get('bgColor'));
$fgColor    = htmlspecialchars($this->params->get('fgColor'));
$heightHeader  = htmlspecialchars($this->params->get('heightHeader'));
$headerWidth    = htmlspecialchars($this->params->get('headerWidth'));
$headerPosTop    = htmlspecialchars($this->params->get('headerPosTop'));
$headerPosLeft    = htmlspecialchars($this->params->get('headerPosLeft'));
$iconsWidth    = htmlspecialchars($this->params->get('iconsWidth'));
$iconsPosLeft    = htmlspecialchars($this->params->get('iconsPosLeft'));
$iconsPosTop    = htmlspecialchars($this->params->get('iconsPosTop'));
$logo      = htmlspecialchars($this->params->get('logo'));
$logoWidth    = htmlspecialchars($this->params->get('logoWidth'));
$logoPosTop    = htmlspecialchars($this->params->get('logoPosTop'));
$logoPosLeft    = htmlspecialchars($this->params->get('logoPosLeft'));
$areaPosTop		= htmlspecialchars($this->params->get('areaPosTop'));
if ($areaPosTop > " ") { $areaPosTop = 10 * $areaPosTop;} ;
$leftColumnWidth    = htmlspecialchars($this->params->get('leftColumnWidth'));
$leftColumnPosLeft    = htmlspecialchars($this->params->get('leftColumnPosLeft'));
$mainColumnPosLeft    = htmlspecialchars($this->params->get('mainColumnPosLeft'));
$mainColumnWidth    = htmlspecialchars($this->params->get('mainColumnWidth'));
$rightColumnWidth    = htmlspecialchars($this->params->get('rightColumnWidth'));
$rightColumnPosLeft    = htmlspecialchars($this->params->get('rightColumnPosLeft'));
$footerWidth    = htmlspecialchars($this->params->get('footerWidth'));
$footerPosLeft    = htmlspecialchars($this->params->get('footerPosLeft'));
$footerPosBottom    = htmlspecialchars($this->params->get('footerPosBottom'));
$linkColor    = htmlspecialchars($this->params->get('linkColor'));
$linkDecoration    = htmlspecialchars($this->params->get('linkDecoration'));
$linkHvColor    = htmlspecialchars($this->params->get('linkHvColor'));
$menuColor    = htmlspecialchars($this->params->get('menuColor'));
$menuFontSize = htmlspecialchars($this->params->get('menuFontSize')); 
$menuDisplay = htmlspecialchars($this->params->get('menuDisplay'));
$menuLineHeight = htmlspecialchars($this->params->get('menuLineHeight'));
$menuItemWidth = htmlspecialchars($this->params->get('menuItemWidth'));
$menuItemLeftMargin = htmlspecialchars($this->params->get('menuItemLeftMargin'));
$menuDecoration    = htmlspecialchars($this->params->get('menuDecoration'));
$menuHvColor    = htmlspecialchars($this->params->get('menuHvColor'));
$menuHvDecoration  = htmlspecialchars($this->params->get('menuHvDecoration'));
$menuActiveColor  = htmlspecialchars($this->params->get('menuActiveColor'));
$menuActiveDecoration  = htmlspecialchars($this->params->get('menuActiveDecoration'));




?>

<!-- styles declared here to make them easier to parametrize and overrule some template.css declarations -->
<!-- Versie 14-8-2015 -->
<!-- <?php echo $menuDisplay; ?> - - <?php echo stripos($menuDisplay,"inline") ; ?>- - <?php echo stripos($menuDisplay,"left") ; ?> - - <?php echo (stripos($menuDisplay,"inline") == 0); ?> - - <?php echo (stripos($menuDisplay,"left") == 13 ) ; ?> --> 
<style type="text/css">
body
{
/* position: relative; gaat verkeerd in safari */
position: absolute;
<?php if ($bodyWidth > " ") : ?>width: <?php echo $bodyWidth; ?>; <?php endif; ?> 
<?php if ($bodyWidthMin > " ") : ?>min-width: <?php echo $bodyWidthMin; ?>px; <?php endif; ?> 
}

body,
#page_bg
{ 
<?php if ($bgColor > " ") : ?>background-color: <?php echo $bgColor ?>; <?php endif; ?>/* #080810 */
<?php if ($fgColor > " ") : ?>color: <?php echo $fgColor ?>; <?php endif; ?>
}

a,
a:link,
a:visited
{
<?php if ($linkColor > " ") : ?>color: <?php echo $linkColor ?>; <?php endif; ?>
<?php if ($linkDecoration > " ") : ?>text-decoration: <?php echo $linkDecoration ?>; <?php endif; ?>

}

a,
a:hover
{
<?php if ($linkHvColor > " ") : ?>color: <?php echo $linkHvColor ?>; <?php endif; ?>
text-decoration:underline;
}

#bg_img 
{ 
position: absolute ;
<?php if ($bgTop > " ") : ?>padding-top: <?php echo $bgTop ?>%; <?php endif; ?>
<?php if ($bgLeft > " ") : ?>left: <?php echo $bgLeft ?>%; <?php endif; ?> 
<?php if ($bgWidth > " ") : ?>width: <?php echo $bgWidth; ?>%; <?php endif; ?> /* 100% bgTop */
}

#header
{
width: 100%;
<?php if ($heightHeader > " ") : ?>margin-bottom: <?php echo $heightHeader; ?>%;  <?php endif; ?>    
}
#headerblock
{   /* header block website  */ 
position: absolute;
<?php if ($headerPosTop > " ") : ?>padding-top: <?php echo $headerPosTop; ?>%;  <?php endif; ?>
<?php if ($headerPosLeft > " ") : ?>left: <?php echo $headerPosLeft; ?>%; <?php endif; ?>
<?php if ($headerWidth > " ") : ?>width: <?php echo $headerWidth; ?>%; <?php endif; ?> 
}
#logo
{   /* logo website rechts van het midden transparant, 480x96 bij breedte 1280px */ 
position: absolute;
<?php if ($logoPosTop > " ") : ?>padding-top: <?php echo $logoPosTop; ?>%;  <?php endif; ?>
<?php if ($logoPosLeft > " ") : ?>left: <?php echo $logoPosLeft; ?>%; <?php endif; ?>
<?php if ($logoWidth > " ") : ?>width: <?php echo $logoWidth; ?>%; <?php endif; ?> 
}
#icons
{   /* icons fb etc  */ 
position: absolute;
<?php if ($iconsPosTop > " ") : ?>top: <?php echo $iconsPosTop; ?>%;  <?php endif; ?>    
<?php if ($iconsPosLeft > " ") : ?>left: <?php echo $iconsPosLeft; ?>%; <?php endif; ?>
<?php if ($iconsWidth > " ") : ?>width: <?php echo $iconsWidth; ?>%; <?php endif; ?> 
}
#wrapper
{
}
#area
{
position: absolute;
<?php if ($areaPosTop > " ") : ?>top: <?php echo $areaPosTop; ?>%;  <?php endif; ?>
overflow: visible; 
}
#leftcolumn
{   /* leftColumn menu, icons fb etc boven logo */ 
position: absolute;
<?php if ($leftColumnPosLeft > " ") : ?>left: <?php echo $leftColumnPosLeft; ?>%; <?php endif; ?>
<?php if ($leftColumnWidth > " ") : ?>width: <?php echo $leftColumnWidth; ?>%; <?php endif; ?> 
}
#maincolumn
{ /* gemeenschappelijke positionering ed van main */
position: absolute;
<?php if ($mainColumnPosLeft > " ") : ?>left: <?php echo $mainColumnPosLeft; ?>%;   <?php endif; ?>
<?php if ($mainColumnWidth > " ") : ?>width: <?php echo $mainColumnWidth; ?>%;    <?php endif; ?>
}
#rightcolumn
{   /* leftColumn menu, icons fb etc boven logo */ 
position: absolute;
<?php if ($rightColumnPosLeft > " ") : ?>left: <?php echo $rightColumnPosLeft; ?>%; <?php endif; ?>
<?php if ($rightColumnWidth > " ") : ?>width: <?php echo $rightColumnWidth; ?>%; <?php endif; ?> 
}  
#footer
{   /* footer onder aan de pagina */
position: fixed;
<?php if ($footerPosBottom > " ") : ?>bottom: <?php echo $footerPosBottom; ?>%;<?php endif; ?>    
<?php if ($footerPosLeft > " ") : ?>left: <?php echo $footerPosLeft; ?>%; <?php endif; ?>
<?php if ($footerWidth > " ") : ?>width: <?php echo $footerWidth; ?>%; <?php endif; ?> /* 93% * 40% = 37.2% */
}

h2,
#page_heading h1,
div.moduletable_menu h3,
div.module_menu h3,
#maincolumn div.blog h1, /* titel blog */
#maincolumn div.blog h2, /* sub-titel blog */
div.items-leading, /* hoofd artikelen van voorpagina en blog 1.6 */
div.items-more, /* geeft aan, dat er nog meer items zijn */
div.item /* vervolgartikel blog */
 {
<?php if ($fgColor > " ") : ?>color: <?php echo $fgColor ?>; <?php endif; ?> /* voorlopig de standaard pagina kleur */
}

div.newsfeed, /* rss newsfeed algemeen */
 .wrapper   /* iframe */
{
}
/* module_menu Default in template.css (verticale lijst) hier afwijkingen voor inline */
/* optie menu display =<?php echo $menuDisplay ?> */
div.moduletable_menu,
div.module_menu
{ /* */
}
#maincolumn div.module_menu,
#maincolumn div.module_menu_img,
#maincolumn div.module_img_menu
{
position: static;
left: 0;
width: auto;
}

div.moduletable_menu ul,
div.module_menu ul,
ul.menu_img,
ul.menu_menu
{ 
<?php if ($menuLineHeight > " ") : ?>line-height: <?php echo $menuLineHeight ?>em; <?php endif; ?>
<?php if ($menuColor > " ") : ?>color: <?php echo $menuColor ?>; <?php endif; ?>
<?php if ($menuFontSize > " ") : ?>font-size: <?php echo $menuFontSize ?>px; <?php endif; ?>      
<?php if ($menuDecoration > " ") : ?>text-decoration: <?php echo $menuDecoration ?>; <?php endif; ?>
<?php if (stripos($menuDisplay, "inline") == 0 ) : ?>
  padding-left: 0;
  margin-left: 0;  
<?php endif; ?>
}
ul.menu_menu li,
ul.menu_menu li ul li,
ul.menu_img li,
ul.menu_img li ul li,
div.module_menu ul li,
div.module_menu ul li ul li,
div.moduletable_menu ul li,
div.moduletable_menu ul li ul li
{

<?php if (stripos($menuDisplay,"inline-block") == 0 ) : ?>
    display: inline-block; 
<?php elseif (stripos($menuDisplay,"inline") == 0 ) : ?>
    display: inline; 
<?php else : ?>
 /* default: display: block; */
<?php endif; ?>

/* background-color: #ccc; */
  }
ul.menu_menu li a,
ul.menu_menu li ul li a,  
div.module_menu ul li a,
div.module_menu ul li ul li a,
div.moduletable_menu ul li a,
div.moduletable_menu ul li ul li a
{
<?php if (stripos($menuDisplay,"inline") == 0 ) : ?>
 padding-right: 4px;
 padding-left: 8px;
 margin-left: 0;
 background: url("<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/mw_menu_separator.png") no-repeat scroll 0 8px transparent;
<?php endif; ?>
}
ul.moduletable_menu li:first-child a,
ul.menu_menu li:first-child a,
ul.menu_img li:first-child a,
div.moduletable_menu ul li:first-child a,
div.module_menu ul li:first-child a
{
/* background-image: none; */
<?php if (stripos($menuDisplay,"inline") == 0 ) : ?>
/* display: inline; nog even niet */
padding-left: 0;
<?php endif; ?>
}
ul.moduletable_menu li ul,
ul.menu_menu li ul, 
ul.menu_img li ul, 
div.moduletable_menu ul li ul,
div.module_menu ul li ul 
{ /* submenu zonder link */
<?php if (stripos($menuDisplay, "inline") == 0 ) : ?>
 /* position: absolute; /* relateert eaan het eersthogere relatief, of absoluut gepositioneerde element (de ul) */ 
 /* left: 0;
 bottom: -1.3em; */
 /* bodem is regelhoogte onder de bodem van het hoger gepositioneerde element ook als dit smaller
                    en dus hoger wordt en de echte parent (de li) niet meer op de onderste regel is */
 /* z-index: 4;  */
 <?php endif; ?>
}
a.sublevel:link,
a.sublevel:visited, 
ul.menu_menu li a,
ul.menu_menu li a:link, 
ul.menu_menu li a:visited, 
ul.menu_menu li ul li a:link,
ul.menu_menu li ul li a:visited,
ul.moduletable_menu li a,
ul.moduletable_menu li a:link, 
ul.moduletable_menu li a:visited, 
ul.moduletable_menu li ul li a:link,
ul.moduletable_menu li ul li a:visited,
ul.menu_img li a,
ul.menu_img li a:link, 
ul.menu_img li a:visited, 
ul.menu_img li ul li a:link,
ul.menu_img li ul li a:visited
{
<?php if ($menuColor > " ") : ?>color: <?php echo $menuColor ?>; <?php endif; ?>
<?php if ($menuFontSize > " ") : ?>font-size: <?php echo $menuFontSize ?>px; <?php endif; ?>      
<?php if ($menuDecoration > " ") : ?>text-decoration: <?php echo $menuDecoration ?>; <?php endif; ?>
}

.module_menu #current,
div.moduletable_menu #current,
div.module_menu li.current a,
ul.menu_menu li.current a,
ul.menu_img li.current a
{
<?php if ($menuActiveColor > " ") : ?>color: <?php echo $menuActiveColor ?>; <?php endif; ?>
<?php if ($menuActiveDecoration > " ") : ?>text-decoration: <?php echo $menuActiveDecoration ?>; <?php endif; ?>
}
ul.menu_menu li a:hover,
ul.menu_menu li ul li a:hover,
ul.menu_img li a:hover,
ul.menu_img li ul li a:hover,
a.sublevel:hover, 
div.module_menu ul li a:hover,
div.module_menu ul li ul li a:hover,
div.moduletable_menu ul li a:hover,
div.moduletable_menu ul li ul li a:hover
{ 
<?php if ($menuHvColor > " ") : ?>color: <?php echo $menuHvColor ?>; <?php endif; ?>
<?php if ($menuHvDecoration > " ") : ?>text-decoration: <?php echo $menuHvDecoration ?>; <?php endif; ?>
}
ul.menu_img
{
list-style-type: none;
padding: 0;
margin: 0;
  <?php if (stripos($menuDisplay,"center") == 13 ) : ?>
	margin-left: auto;
	margin-right:auto;
	text-align: center;
  <?php if (stripos($menuDisplay,"right") == 13 ) : ?>
	text-align: right;
  <?php endif; ?>
  <?php if (stripos($menuDisplay,"left") == 13 ) : ?>
	text-align: left;
  <?php endif; ?>

  <?php endif; ?>

-webkit-padding-start: 0px;
-webkit-margin-before: 0px;
-webkit-margin-after: 0px;
}

ul.menu_img li,
ul.menu_img li ul li
{
width: 100%;
<?php if ($menuItemLeftMargin > " ") : ?>width: <?php echo 100 - $menuItemLeftMargin ?>%; <?php endif; ?>
<?php if ($menuItemWidth > 0) : ?>width: <?php echo $menuItemWidth ?>%; <?php endif; ?>
<?php if ($menuItemLeftMargin > " ") : ?>margin-left: <?php echo $menuItemLeftMargin ?>%; <?php endif; ?>
}
ul.menu_img li a img,
ul.menu_img li a:link img, 
ul.menu_img li a:visited img 
{ 
width: 100%;
outline-style: none;
}
ul.menu_img li.current a img,
ul.menu_img li.current a:link img, 
ul.menu_img li.current a:visited img 
{ 
width: 98%;
outline-style: solid;
margin-left: 1%;
outline-color: blue;
}
ul.menu_img li a:hover img
{ 
width: 98%;
outline-style: solid;
outline-color: blue;
margin-left: 1%;
}
/* module_menu einde */

<?php if ($breakpointMobile > " ") : ?>
/* begin @media breakpointMobile */
@media (max-width: <?php echo $breakpointMobile ?>px)  {
#icons
{   /* icons fb etc meer naar links en breder  */ 
left: 0%;
width: 100%; 
<?php if ($this->countModules('headerleft') and $hlWidth > " " and $hlWidth < 40) : ?>
left: <?php echo $hlWidth; ?>%;
width: <?php echo 100 - $hlWidth; ?>%;
<?php endif; ?>

}
 }
/* einde @media breakpointMobile */
<?php endif; ?>

</style>
