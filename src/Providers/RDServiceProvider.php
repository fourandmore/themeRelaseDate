    <?php
     
    namespace RD\Providers;
     
use Ceres\Caching\NavigationCacheSettings;
use Ceres\Caching\SideNavigationCacheSettings;
use Ceres\Config\CeresConfig;
use Ceres\Contexts\CategoryContext;
use Ceres\Contexts\CategoryItemContext;
use Ceres\Contexts\GlobalContext;
use Ceres\Contexts\ItemSearchContext;
use Ceres\Contexts\ItemWishListContext;
use Ceres\Contexts\OrderConfirmationContext;
use Ceres\Contexts\OrderReturnContext;
use Ceres\Contexts\PasswordResetContext;
use Ceres\Contexts\SingleItemContext;
use Ceres\Extensions\TwigStyleScriptTagFilter;
use Ceres\Hooks\CeresAfterBuildPlugins;
use IO\Extensions\Functions\Partial;
use IO\Helper\CategoryKey;
use IO\Helper\CategoryMap;
use IO\Helper\TemplateContainer;
use IO\Services\ContentCaching\Services\Container;
use IO\Services\ItemSearch\Helper\ResultFieldTemplate;
use Plenty\Modules\Plugin\Events\AfterBuildPlugins;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ConfigRepository;
     
    class RDServiceProvider extends ServiceProvider
    {
      const PRIORITY = 0;
     
    	/**
    	 * Register the service provider.
    	 */
    	public function register()
    	{
     
    	}
     
        /**
    	 * Boot a template for the basket that will be displayed in the template plugin instead of the original basket.
    	 */
    	public function boot(Twig $twig, Dispatcher $eventDispatcher)
        {
            $eventDispatcher->listen('IO.Component.Import', function (ComponentContainer $container)
            {
                if ($container->getOriginComponentTemplate()=='Ceres::Item.Components.SingleItem')
                {
                    $container->setNewComponentTemplate('RD::content.SingleItem');
                }
            }, self::PRIORITY);
        }
    }