# Plates for Wordpress

A Wordpress Plugin allowing the usage of PlatesPHP in themes. I got frustrated with WordPress' use of `get_header()` and `get_footer()` and having my IDE tell me I had unclosed / extraneous html tags. I prefer nesting my templates rather than progressively building the template, like how Wordpress does.

This plugin works fine with normal themes and will not disrupt those themes. However, it really shines when writing themes because it allows for conventional type code, such as what you find in most MVC frameworks.

## Basic Example:

__layouts/application.php__

    <!DOCTYPE html>
    <html>
    <head>
        <title><?php wp_title() ?></title>
        
        <?php wp_head() ?>
    </head>
    <body>
        <?= $this->section("content") ?>
        
        <?php wp_footer() ?>
    </body>
    </html>

__single.php__

    <?php // this replaces 'get_header();' and 'get_footer();' ?>
    <?php $this->layout("layouts/application") ?>
    
    <!-- content body -->
    <!-- the following replaces `<?= $this->section("content") ?>` when rendered -->
    <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
    
        <h2><?php the_title() ?></h2>
        <?php the_content() ?>
    
    <?php endwhile; endif; ?>
 

## TODO

* I eventually plan to add more providers for common templating libraries, such as Twig
* Testcases to make sure it doesn't interfere with default themes

## Miscellaneous

Huge shoutout to [@reinink](https://twitter.com/reinink) for the [league/plates](http://platesphp.com) package, and to [@philipobenito](https://twitter.com/philipobenito) for the [league/container](http://container.thephpleague.com/) package.

Use those packages. :) Seriously. The League is Awesome.