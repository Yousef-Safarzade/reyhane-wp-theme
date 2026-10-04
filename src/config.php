<?php

namespace Reyhane;

class config
{
    public static string $websiteUrl;
    public static string $generateOrderPdfUrl;
    public static string $themePath;
    public static string $themeUrl;
    public static string $childThemePath;
    public static string $childThemeUrl;
    public static string $widgetsPath;
    public static string $widgetsUrl;
    public static string $assetsPath;
    public static string $assetsUrl;
    public static string $cssPath;
    public static string $cssUrl;
    public static string $jsPath;
    public static string $jsUrl;
    public static string $imgPath;
    public static string $imgUrl;
    public static string $fontPath;
    public static string $fontUrl;
    public static string $iconPath;
    public static string $iconUrl;
    public static string $incPath;
    public static string $templatePath;
    public static string $langPath;
    public static string $themeVersion;

    public static string $elementorWidgetPath;

    public static function init(): void
    {

        $theme = wp_get_theme();

        self::$websiteUrl = get_site_url();

        self::$generateOrderPdfUrl = self::$websiteUrl . '?generate_order_pdf';

        self::$themePath = get_template_directory();

        self::$themeUrl = get_template_directory_uri();

        self::$childThemePath = get_stylesheet_directory();

        self::$childThemeUrl = get_stylesheet_directory_uri();

        self::$widgetsPath = self::$childThemePath . '/elementor-widgets';

        self::$widgetsUrl = self::$childThemeUrl . '/elementor-widgets';

        self::$assetsPath = self::$childThemePath . '/assets';

        self::$assetsUrl = self::$childThemeUrl . '/assets';

        self::$cssPath = self::$assetsPath . '/css';

        self::$cssUrl = self::$assetsUrl . '/css';

        self::$jsPath = self::$assetsPath . '/js';

        self::$jsUrl = self::$assetsUrl . '/js';

        self::$imgPath = self::$assetsPath . '/media';

        self::$imgUrl = self::$assetsUrl . '/media';

        self::$fontPath = self::$assetsPath . '/fonts';

        self::$fontUrl = self::$assetsUrl . '/fonts';

        self::$iconPath = self::$assetsPath . '/icons';

        self::$iconUrl = self::$assetsUrl . '/icons';

        self::$incPath = self::$childThemePath . '/inc';

        self::$templatePath = self::$childThemePath . '/templates';

        self::$langPath = self::$childThemePath . '/languages';

        self::$themeVersion = $theme->get('Version');

        self::$elementorWidgetPath = self::$childThemePath . "/elementor-widgets";

    }

}