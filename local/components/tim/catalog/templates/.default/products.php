<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

/** @var array $arParams */
/** @var array $arResult */
/** @var array $products */
/** @global CMain $APPLICATION */
/** @var Local\Catalog\TimCatalog $component */

if ($filter['CUR_FILTERS'])
{
	?>
	<div id="current-filters"><?

	foreach ($filter['CUR_FILTERS'] as $item)
	{
		?><span><a href="<?= $item['HREF'] ?>">x</a><?= $item['NAME'] ?></span><?
	}

	?>
	</div><?
}

?>
<div id="sanatorium">

	<?
	if (count($products) <= 0)
	{
		?>
		<p class="empty">Не найдено ни одного подходящего санатория. Попробуйте отключить какой-нибудь фильтр</p><?
	}

	foreach ($products as $id => $item) {

		?>
		<div class="item"><?

			//debugmessage($item);

			?>
			<a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $item['NAME'] ?></a>
		</div><?
	}
	?>
</div><?

//
// Постраничка
//
$iCur = $component->products['NAV']['PAGE'];
$iEnd = ceil($component->products['NAV']['COUNT'] / $component::PAGE_SIZE);

if ($iEnd > 1) {
	$iStart = $iCur - 2;
	$iFinish = $iCur + 2;
	if ($iStart < 1) {
		$iFinish -= $iStart - 1;
		$iStart = 1;
	}
	if ($iFinish > $iEnd) {
		$iStart -= $iFinish - $iEnd;
		if ($iStart < 1) {
			$iStart = 1;
		}
		$iFinish = $iEnd;
	}

	$url = $component->filter['URL'];
	if (strpos($url, '?') !== false)
		$urlPage = $url . '&page=';
	else
		$urlPage = $url . '?page=';

	?>
	<ul class="pagination"><?

		if ($iCur > 1) {
			if ($iCur == 2)
				$href = $url;
			else
				$href = $urlPage . ($iCur-1);
			?>
			<li class="prev">
				<a href="<?= $href ?>" data-page="<?= ($iCur-1) ?>"></a>
			</li><?
		}
		else {
			?>
			<li class="prev">
				<span></span>
			</li><?
		}
		if ($iStart > 1) {
			$href = $url;
			?>
			<li>
				<a href="<?= $href ?>" data-page="1">1</a>
			</li><?

			if ($iStart > 2) {
				?>
				<li>
					<span>...</span>
				</li><?
			}
		}
		for ($i = $iStart; $i <= $iFinish; $i++) {
			if ($i == $iCur) {
				?>
				<li>
					<span class="active"><?= $i ?></span>
				</li><?
			}
			else {
				if ($i == 1)
					$href = $url;
				else
					$href = $urlPage . $i;
				?>
				<li>
					<a href="<?= $href ?>" data-page="<?= $i ?>"><?= $i ?></a>
				</li><?
			}
		}
		if ($iFinish < $iEnd) {
			if ($iFinish < $iEnd - 1) {
				?>
				<li>
					<span>...</span>
				</li><?
			}

			$href = $urlPage . $iEnd;
			?>
			<li>
				<a href="<?= $href ?>" data-page="<?= $iEnd ?>"><?= $iEnd ?></a>
			</li><?
		}
		if ($iCur < $iEnd) {
			$href = $urlPage . ($iCur+1);
			?>
			<li class="next">
				<a href="<?= $href ?>" data-page="<?= ($iCur+1) ?>"></a>
			</li><?
		}
		else {
			?>
			<li class="next">
				<span></span>
			</li><?
		}

		?>
	</ul><?

}

?>
<div class="seo-text"><?
	// Описание выводим только на первой странице.
	if ($component->navParams['iNumPage'] == 1)
	{
		echo $component->seo['TEXT'];
	}
	?>
</div><?