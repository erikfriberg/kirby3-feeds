<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd1d152f6e9699c17c2e26eeace97e30d
{
    public static $prefixLengthsPsr4 = array (
        'o' => 
        array (
            'omz13\\' => 6,
        ),
        'L' => 
        array (
            'League\\HTMLToMarkdown\\' => 22,
        ),
        'K' => 
        array (
            'Kirby\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'omz13\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'League\\HTMLToMarkdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/html-to-markdown/src',
        ),
        'Kirby\\' => 
        array (
            0 => __DIR__ . '/..' . '/getkirby/composer-installer/src',
        ),
    );

    public static $classMap = array (
        'Kirby\\ComposerInstaller\\CmsInstaller' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/CmsInstaller.php',
        'Kirby\\ComposerInstaller\\Installer' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/Installer.php',
        'Kirby\\ComposerInstaller\\Plugin' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/Plugin.php',
        'Kirby\\ComposerInstaller\\PluginInstaller' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/PluginInstaller.php',
        'League\\HTMLToMarkdown\\Configuration' => __DIR__ . '/..' . '/league/html-to-markdown/src/Configuration.php',
        'League\\HTMLToMarkdown\\ConfigurationAwareInterface' => __DIR__ . '/..' . '/league/html-to-markdown/src/ConfigurationAwareInterface.php',
        'League\\HTMLToMarkdown\\Converter\\BlockquoteConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/BlockquoteConverter.php',
        'League\\HTMLToMarkdown\\Converter\\CodeConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/CodeConverter.php',
        'League\\HTMLToMarkdown\\Converter\\CommentConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/CommentConverter.php',
        'League\\HTMLToMarkdown\\Converter\\ConverterInterface' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/ConverterInterface.php',
        'League\\HTMLToMarkdown\\Converter\\DefaultConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/DefaultConverter.php',
        'League\\HTMLToMarkdown\\Converter\\DivConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/DivConverter.php',
        'League\\HTMLToMarkdown\\Converter\\EmphasisConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/EmphasisConverter.php',
        'League\\HTMLToMarkdown\\Converter\\HardBreakConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/HardBreakConverter.php',
        'League\\HTMLToMarkdown\\Converter\\HeaderConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/HeaderConverter.php',
        'League\\HTMLToMarkdown\\Converter\\HorizontalRuleConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/HorizontalRuleConverter.php',
        'League\\HTMLToMarkdown\\Converter\\ImageConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/ImageConverter.php',
        'League\\HTMLToMarkdown\\Converter\\LinkConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/LinkConverter.php',
        'League\\HTMLToMarkdown\\Converter\\ListBlockConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/ListBlockConverter.php',
        'League\\HTMLToMarkdown\\Converter\\ListItemConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/ListItemConverter.php',
        'League\\HTMLToMarkdown\\Converter\\ParagraphConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/ParagraphConverter.php',
        'League\\HTMLToMarkdown\\Converter\\PreformattedConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/PreformattedConverter.php',
        'League\\HTMLToMarkdown\\Converter\\TextConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/TextConverter.php',
        'League\\HTMLToMarkdown\\Element' => __DIR__ . '/..' . '/league/html-to-markdown/src/Element.php',
        'League\\HTMLToMarkdown\\ElementInterface' => __DIR__ . '/..' . '/league/html-to-markdown/src/ElementInterface.php',
        'League\\HTMLToMarkdown\\Environment' => __DIR__ . '/..' . '/league/html-to-markdown/src/Environment.php',
        'League\\HTMLToMarkdown\\HtmlConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/HtmlConverter.php',
        'League\\HTMLToMarkdown\\HtmlConverterInterface' => __DIR__ . '/..' . '/league/html-to-markdown/src/HtmlConverterInterface.php',
        'omz13\\Feeds' => __DIR__ . '/../..' . '/src/feeds.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd1d152f6e9699c17c2e26eeace97e30d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd1d152f6e9699c17c2e26eeace97e30d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd1d152f6e9699c17c2e26eeace97e30d::$classMap;

        }, null, ClassLoader::class);
    }
}
