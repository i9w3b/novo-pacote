<?php

namespace I9w3b\NovoPacote;

use I9w3b\NovoPacote\Console\NovoPacoteCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class NovoPacoteServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViews();
        $this->loadTranslations();
        // $this->loadMigrations();

        if ($this->app->runningInConsole()) {
            $this->publishConfig();
            $this->publishViews();
            $this->publishTranslations();
            $this->publishAssets();
            $this->publishCommands();
        }

        $this->registerBladeDirectives();
    }

    /**
     * Registrar os serviços da aplicação.
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerFacade();
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Paths NovoPacote
     *
     * @var object
     */
    private function path()
    {
        $path = [];
        $path['package'] = __DIR__;
        $path['config'] = $path['package'] . '/../config/config.php';
        $path['views'] = $path['package'] . '/Resources/views';
        $path['lang'] = $path['package'] . '/Resources/lang';
        $path['assets'] = $path['package'] . '/Resources/assets';
        $path['migrations'] = $path['package'] . '/Database/migrations';
        return (object) $path;
    }

    /**
     * Aplicar automaticamente as configurações
     *
     * @return void
     */
    private function publishConfig()
    {
        $this->publishes([
            $this->path()->config => config_path('novopacote.php'),
        ], 'config');
    }

    /**
     * Registrar as configurações
     *
     * @return void
     */
    private function registerConfig()
    {
        $this->mergeConfigFrom($this->path()->config, 'novopacote');
    }

    /**
     * Registrar classe principal Facade
     *
     * @return void
     */
    private function registerFacade()
    {
        $this->app->singleton('novo-pacote', function () {
            return new NovoPacote;
        });
    }

    /**
     * Carregar views do pacote
     *
     * @return void
     */
    private function loadViews()
    {
        $this->loadViewsFrom($this->path()->views, 'novopacote');
    }

    /**
     * Publicando as visualizações do pacote
     *
     * @return void
     */
    private function publishViews()
    {
        $this->publishes([
            $this->path()->views => resource_path('views/vendor/novopacote'),
        ], 'views');
    }

    /**
     * Publicando arquivos assets do pacote
     *
     * @return void
     */
    private function publishAssets()
    {
        $this->publishes([
            $this->path()->assets => public_path('vendor/novopacote'),
        ], 'assets');
    }

    /**
     * Carregar as traduções do pacote
     *
     * @return void
     */
    private function loadTranslations()
    {
        $this->loadTranslationsFrom($this->path()->lang, 'novopacote');
    }

    /**
     * Publicando os arquivos de tradução.
     *
     * @return void
     */
    private function publishTranslations()
    {
        $this->publishes([
            $this->path()->lang => resource_path('lang/vendor/novopacote'),
        ], 'lang');
    }

    /**
     * Registrando os comandos do pacote.
     *
     * @return void
     */
    private function publishCommands()
    {
        $this->commands([
            NovoPacoteCommand::class,
        ]);
    }

    /**
     * Carregar as Migrations do pacote
     *
     * @return void
     */
    private function loadMigrations()
    {
        $this->loadMigrationsFrom($this->path()->migrations);
    }

    public function registerBladeDirectives()
    {
        Blade::directive('novopacote', function () {
            return "<?php echo app('novo-pacote')->blade(); ?>";
        });
    }
}
