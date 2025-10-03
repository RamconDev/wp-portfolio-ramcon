<?php
    /**
     * Template Name: Home Template
     */
?>
<?php get_header(); ?>


<div id="home">
    <?php /*********** 🧩 HERO SECTION ***********/ ?>
    <?php $f_hero = get_field('hero'); ?>
    <section class="hero" style="background-image: url(<?php echo !isset($f_hero['bg_image']) || !$f_hero['bg_image'] ? get_template_directory_uri() . "/assets/images/default-img/bghero.png" : $f_hero['bg_image']; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if (isset($f_hero['title']) & $f_hero['title'] != ''): ?>
                        <h1 class="text-center"><?php echo $f_hero['title']; ?></h1>
                    <?php endif; ?>
                    <?php if (isset($f_hero['subtitle']) & $f_hero['subtitle'] != ''): ?>
                        <h2 class="text-center"><?php echo $f_hero['subtitle']; ?></h2>
                    <?php endif; ?>
                    <?php if (isset($f_hero['download_cv']['title']) || isset($f_hero['download_cv']['url'])): ?>
                        <div class="c-button mt-3">
                            <a class="btn_primary text-center" href="<?php echo $f_hero['download_cv']['url'] ?>"><?php echo $f_hero['download_cv']['title'] ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php /*********** 🧩 ABOUT ME SECTION ***********/ ?>
    <?php $f_about = get_field('about'); ?>
    <section class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if (isset($f_about['title']) & $f_about['title'] != ''): ?>
                        <h2 class="text-left"><?php echo $f_about['title']; ?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="about-items">
                        <?php foreach( $f_about["gallery"] as $item ): ?>
                            <?php if( $item["bg_image"] ): ?>
                                <div class="item" style="background-image: url(<?php echo $item["bg_image"];?>">
                                    <?php if( $item["content"] ): ?>
                                        <p><?php echo $item["content"]?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php /*********** 🧩 PROJECTS SECTION ***********/ ?>
    <?php $f_projects = get_field('projects'); ?>

    <?php
        $args = [
            'post_type' => 'portafolios',
            'posts_per_page' => -1,
        ];

        $loop = new WP_Query($args);
    ?>

    <section class="projects py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if (isset($f_projects['title']) & $f_projects['title'] != ''): ?>
                        <h2 class="text-center"><?php echo $f_projects['title']; ?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div id="slick-projects" class="project-items">
                        <?php
                            if ($loop->have_posts()) :
                                while($loop->have_posts()) : $loop->the_post(); ?>
                                    <div class="item" style="background-image: linear-gradient(180deg, rgba(26, 26, 26, 0.2)), url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . "/assets/images/default-img/bghero.png"; ?>);">
                                        <h3><?php echo get_the_title(); ?></h3>
                                        <div class="c-button">
                                            <a class="btn_primary" href="<?php echo get_the_permalink(); ?>">View More</a>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata();
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php /*********** 🧩 MY SKILLS SECTION ***********/ ?>
    <?php $f_skills = get_field('skills'); ?>
    <?php if (isset($f_skills['slider_shortcode']) & $f_skills['slider_shortcode'] != ''): ?>
        <section class="skills py-5">
            <div class="container-fluid overflow-hidden">
                <?php if (isset($f_skills['title']) & $f_skills['title'] != ''): ?>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center"><?php echo $f_skills['title']; ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row mt-5">
                    <div class="col-12">
                        <?php echo do_shortcode($f_skills['slider_shortcode']); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php /*********** 🧩 WORK EXPERIENCE SECTION ***********/ ?>
    <?php $f_experience = get_field('experience'); ?>
    <?php
        $args = [
            'post_type' => 'experiencia',
            'posts_per_page' => -1,
        ];

        $loop = new WP_Query($args);
    ?>
    <section class="experience py-5">
        <div class="container">
            <div class="row">
                <?php if (isset($f_experience['title']) & $f_experience['title'] != ''): ?>
                    <h2 class="text-center"><?php echo $f_experience['title']; ?></h2>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="experience-items">
                    <?php if ($loop->have_posts()) : ?>
                        <?php while($loop->have_posts()) : $loop->the_post() ?>
                            <?php $experience = get_field('experience'); ?>
                            <div class="item mt-5">
                                <div class="header">
                                    <div class="c-logo">
                                        <?php $image = has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/images/technologies/github.svg' ; ?>
                                        <?php if ( $experience['company_url'] ) : ?>
                                            <a href="<?php echo $experience['company_url']; ?>" target="_blank"><img src="<?php echo $image; ?>" alt="<?php echo get_the_title(); ?>"></a>
                                        <?php else: ?>
                                            <img src="<?php echo $image ; ?>" alt="<?php echo get_the_title(); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="description">
                                        <h3><?php echo get_the_title(); ?> (<span><?php echo $experience['rol']; ?></span>)</h3>
                                        <?php if ( $experience['start_date'] ) : ?>
                                            <h4><?php echo $experience['start_date']; ?> to <?php echo $experience['end_date'] ? $experience['end_date'] : 'Actuality'; ?></h4>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="content">
                                    <p><?php the_content(); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
                
    <?php /*********** 🧩 CERTIFICATIONS SECTION ***********/ ?>
    <?php $f_certifications = get_field('certifications'); ?>
    <?php
        $args = [
            'post_type' => 'estudios',
            'posts_per_page' => -1,
        ];

        $loop = new WP_Query($args);
    ?>
    <section class="certifications py-5">
        <div class="container">
            <div class="row">
                <?php if (isset($f_certifications['title']) & $f_certifications['title'] != ''): ?>
                    <h2 class="text-center"><?php echo $f_certifications['title']; ?></h2>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="certification-items">
                    <?php if ( $loop->have_posts() ) : ?>
                        <?php while( $loop->have_posts() ) : $loop->the_post(); ?>
                            <?php $item = get_field('estudio'); ?>
                            <?php // var_dump($item); ?>
                            <div class="item mt-5">
                                <h5><?php echo $item['instituto'];  ?></h5>
                                <h3><span><?php echo $item['tipo'];  ?>: </span><?php echo get_the_title();  ?></h3>
                                <?php $certificated = $item['certificado'] ? "<a href='". $item['certificado'] ."' target='_blank'>Certificate</a>" : '' ?>
                                <span><?php echo $item['estado'];  ?> <?php echo $certificated; ?></span>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
</div>
        

<?php get_footer(); ?>