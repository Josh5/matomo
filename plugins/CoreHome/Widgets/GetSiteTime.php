<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Plugins\CoreHome\Widgets;

use Piwik\Common;
use Piwik\Site;
use Piwik\Widget\Widget;
use Piwik\Widget\WidgetConfig;

/**
 * Widget for displaying the Site's time and timezone.
 */
class GetSiteTime extends Widget
{
    public static function configure(WidgetConfig $config)
    {

        $config->setCategoryId('About Matomo');

        $config->setName('CoreHome_SiteTime');

        $config->setOrder(99);
    }

    public function render()
    {
        $idSite   = Common::getRequestVar('idSite', false);
        $timezone = Site::getTimezoneFor($idSite);

        return $this->renderTemplate('getSiteTime', ['timezone' => $timezone]);
    }
}