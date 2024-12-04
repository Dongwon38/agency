<div class="ws-testimonial-section">
    <button class="slider-button prev" aria-label="Previous slide">&#10094;</button>
    <button class="slider-button next" aria-label="Next slide">&#10095;</button>

    <div class="testimonial-slider">
        <div class="testimonial-container">

        <?php 
        // ===== Testimonial Loop START ===== //
        
        // Custom query for testimonials
        $args = array(
            'post_type'      => 'ws-testimonial',
            'posts_per_page' => -1, 
        );

        $testimonial_query = new WP_Query($args);

        if ($testimonial_query->have_posts()) :
            while ($testimonial_query->have_posts()) :
                $testimonial_query->the_post();
        
                // Get ACF fields
                $name = get_field('name');
                $photo_id = get_field('photo');
                $photo_url = $photo_id ? wp_get_attachment_image_url($photo_id, 'medium') : null; // Get image URL
                $email = get_field('email');
                $company = get_field('company');
                $company_website = get_field('company_website'); // echo esc_url($company_website); with a tag
                $excerpt = get_field('excerpt');
                $comment = get_field('comment');
                ?>
                
                <div class="testimonial">
                    <div class="bio">
                        <div class="bio-innerbox">
                            <?php if ($photo_url) : ?>
                                <img src="<?php echo esc_url($photo_url); ?>" alt="<?php echo esc_attr($name); ?>" class="headshot">
                            <?php endif; ?>
                            <div class="right-column">
                                <div class="name"><?php echo esc_html($name); ?></div>
                                <div class="company"><?php echo esc_html($company); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="comment"><?php echo esc_html($excerpt); ?></div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata(); 
        else :
            echo '<p>No testimonials found.</p>';
        endif;      
        // ===== Testimonial Loop END ===== //
        ?>
        </div><!-- testimonial-container end -->
    </div><!-- testimonial-slider end -->
</div><!-- testimonial-section end -->
