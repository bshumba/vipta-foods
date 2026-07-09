<?php

namespace App\Support;

use Illuminate\Support\Arr;

final class ViptaContent
{
    /**
     * @return array<string, mixed>
     */
    public static function all(): array
    {
        $content = config('vipta', []);

        return is_array($content) ? $content : [];
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return Arr::get(self::all(), $key, $default);
    }

    /**
     * @return array<string, mixed>
     */
    public static function brand(): array
    {
        return self::arrayValue('brand');
    }

    /**
     * @return list<array{label: string, route: string}>
     */
    public static function navigation(): array
    {
        return self::arrayValue('navigation');
    }

    /**
     * @return array<string, mixed>
     */
    public static function cta(string $key): array
    {
        return self::arrayValue("cta.{$key}");
    }

    /**
     * @return array<string, mixed>
     */
    public static function footer(): array
    {
        return self::arrayValue('footer');
    }

    /**
     * @return array<string, string>
     */
    public static function accessibility(): array
    {
        return self::arrayValue('accessibility');
    }

    /**
     * @return array<string, mixed>
     */
    public static function page(string $key): array
    {
        return self::arrayValue("pages.{$key}");
    }

    /**
     * @return list<array<string, string>>
     */
    public static function benefits(): array
    {
        return self::arrayValue('benefits');
    }

    /**
     * @return list<array<string, string>>
     */
    public static function ingredients(): array
    {
        return self::arrayValue('ingredients');
    }

    /**
     * @return list<array<string, string>>
     */
    public static function testimonials(): array
    {
        return self::arrayValue('testimonials');
    }

    /**
     * @return list<array<string, string>>
     */
    public static function faqs(): array
    {
        return self::arrayValue('faqs');
    }

    /**
     * @return array<string, mixed>
     */
    public static function contact(): array
    {
        return self::arrayValue('contact');
    }

    /**
     * @return array<string, mixed>
     */
    public static function seo(): array
    {
        return self::arrayValue('seo');
    }

    /**
     * @return array<string, mixed>
     */
    private static function arrayValue(string $key): array
    {
        $value = self::get($key, []);

        return is_array($value) ? $value : [];
    }
}
