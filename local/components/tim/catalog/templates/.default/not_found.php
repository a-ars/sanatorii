<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var CMain $APPLICATION
 */

?>
<ul id="a404">
	<li>
		<table>
			<tr>
				<td><b class="search"></b></td>
				<td>
					<a href="/search/?q=<?= $arResult['~QUERY'] ?>">Искать "<?= $arResult['~QUERY'] ?>" в новостях и
						статьях</a>
				</td>
			</tr>
		</table>
	</li>
	<li>
		<table>
			<tr>
				<td><b class="index"></b></td>
				<td>
					<a href="/">Перейти на главную</a>
				</td>
			</tr>
		</table>
	</li>
	<li>
		<table>
			<tr>
				<td><b class="sanatorium"></b></td>
				<td>
					<a href="/sanatorium/">Все санатории</a>
				</td>
			</tr>
		</table>
	</li>
</ul><?

$APPLICATION->AddChainItem('Санатории', '/sanatorium/');
$APPLICATION->SetTitle('По вашему запроу ничего не найдено');
$APPLICATION->SetPageProperty('title', 'По вашему запроу ничего не найдено');