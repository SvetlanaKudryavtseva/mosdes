<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(empty($arResult))
	return "";

$strReturn = '<ul class="breadcrumb" id="navigation" itemscope itemtype="http://schema.org/BreadcrumbList">';

$position = 1;
for($index = 0, $itemSize = count($arResult); $index < $itemSize; ++$index){
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if(strlen($arResult[$index]["LINK"]) && $arResult[$index]['LINK'] != GetPagePath() && $arResult[$index]['LINK']."index.php" != GetPagePath())
		$strReturn .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" id="bx_breadcrumb_'.$index.'"><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item"><span itemprop="name">'.$title.'</span></a><meta itemprop="position" content="'.$position.'" /></li>';
	else{
		if(empty($arResult[$index]["LINK"]))
		    $arResult[$index]["LINK"] = "#bx_breadcrumb_".$index;
		$strReturn .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" id="bx_breadcrumb_'.$index.'" class="active"><link href="'.$arResult[$index]["LINK"].'" itemprop="item" /><a href="'.GetPagePath().'"><span><span itemprop="name">'.$title.'</span></span></a><meta itemprop="position" content="'.$position.'" /></li>';
		break;
	}
	++$position;
}

$strReturn .= '</ul>';
return $strReturn;?>