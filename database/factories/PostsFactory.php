<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    $body = collect([
        $faker->text,
        sprintf('<img src="%s"/>', $faker->imageUrl(640, 480)),
        $faker->text,
        '<iframe width="560" height="315" src="https://www.youtube.com/embed/9xwazD5SyVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        $faker->text,
        sprintf('<img src="%s"/>', $faker->imageUrl(640, 480)),
        $faker->text,
    ])->map(function ($element) {
        return sprintf('<p>%s</p>', $element);
    })->join('');

    return [
        'title'         => $faker->sentence(),
        'snippet'       => $faker->text(150),
        'body'          => $body,
        'is_sticky'     => 0,
        'is_visible'    => 0,
        'is_video'      => 1,
        'published_at'  => date('Y-m-d H:i:s'),
        'unpublished_at'=> date('Y-m-d H:i:s'),
        'permalink'     => '',
        'image_src'     => $faker->imageUrl(640, 480),
    ];
});
