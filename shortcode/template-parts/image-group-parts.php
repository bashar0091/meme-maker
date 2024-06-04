<div class="w-full p-[15px] xl:p-12 xl:border-l-2 border-solid border-[#48D1FF] overflow-x-hidden">
    <h2 class="font-extrabold text-[#fff]  text-[35px] ff_bebas">CREATE YOUR CAPY</h2>

    <?php 
    $terms = get_terms( array(
        'taxonomy' => 'meme-image-group',
        'hide_empty' => true,
    ) );
    $i = 0;
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
            $i++;

            $term_id = $term->term_id;
            $bg_group_id = get_term_meta($term_id,'is_this_background_image_group',true);

            $image_group = "meme_image_group_$i";
            if($bg_group_id == true){
                $image_group = "";
            }
            ?>
            <div class="mt-8 <?= $image_group;?>">
                <h3 class="font-bold text-[#fff] uppercase text-[25px] ff_bebas"><?= $term->name;?></h3>
                <div class="flex overflow-x-hidden">

                    <button class="prev-btn w-[42px] h-[84px] rounded-xl flex justify-center items-center border-2 border-[#48D1FF] transition-all hover:bg-white bg-[#FDF6E7] mr-4">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" class="w-5 h-5 text-[#000]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>
                    </button>

                    <div class="menu-container flex w-full gap-3 overflow-x-hidden relative">

                        <?php 
                        if($i > 1 && $bg_group_id != true) {
                            ?>
                            <button data-group="meme_image_group_<?= $i;?>" class="meme_acitve removeButton bg-[#fff] w-[84px] h-[84px] border border-solid border-[#48D1FF] rounded-xl flex justify-center items-center cursor-pointer">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="text-[#000] w-7 h-7" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372 0-89 31.3-170.8 83.5-234.8l523.3 523.3C682.8 852.7 601 884 512 884zm288.5-137.2L277.2 223.5C341.2 171.3 423 140 512 140c205.4 0 372 166.6 372 372 0 89-31.3 170.8-83.5 234.8z"></path></svg>
                            </button>
                            <?php
                        }
                        ?>
                        
                        <?php 
                        $args = array(
                            'post_type' => 'meme-images',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'meme-image-group',
                                    'field'    => 'slug',
                                    'terms'    => $term->slug,
                                ),
                            ),
                            'order' => 'ASC',
                        );
                        $query = new WP_Query($args);
                        if($query->have_posts()) {
                            while($query->have_posts()){
                                $query->the_post();

                                $active_image_id = get_field('is_this_active_image_');

                                $is_active = 'border';
                                if($active_image_id == true){
                                    $is_active = 'border-4';
                                }
                                ?>
                                <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#48D1FF] rounded-xl overflow-hidden transition-all flex-none <?= $is_active;?>">
                                    <img src="<?= get_the_post_thumbnail_url();?>" alt="">
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <button class="next-btn w-[42px] h-[84px] rounded-xl flex justify-center items-center border-2 border-[#48D1FF] transition-all hover:bg-white bg-[#FDF6E7] ml-4">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" class="w-5 h-5 text-[#000]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
                    </button>

                </div>
            </div>
            <?php
        }
    }
    ?>
</div>