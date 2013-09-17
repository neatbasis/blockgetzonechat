{*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!-- GetZone.fi chat upotuskoodi -->
<script type="text/javascript">
    var getzoneUser="{$getzoneUser|escape:html:'UTF-8'}";
    function loadVC() {
      var vcjs = document.createElement('script'); vcjs.type = 'text/javascript';
      vcjs.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'getzone.fi/'+getzoneUser+'/chat ';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vcjs, s);
    };
    if (window.addEventListener) window.addEventListener('load', loadVC, false);
    else if (window.attachEvent) window.attachEvent('onload', loadVC);
</script>
<!-- /GetZone.fi chat upotuskoodi -->
