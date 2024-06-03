<?php
/**
* Shortcode for meme maker
*/

function meme_maker_template() {
    ob_start();
    ?>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .btn_fade_out {
            opacity: 0.5;
            cursor: not-allowed;
        }
        .canvasLayer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .image-list img {
            cursor: pointer;
            margin: 10px;
            width: 100px;
            height: 100px;
        }
        .menu-container img {
            background: #fff;
        }
    </style>

    <div class="bg-[#000]">
        <div class="flex flex-col xl:flex-row">
            <?php require('template-parts/canvas-parts.php');?>
                
            <?php require('template-parts/image-group-parts.php');?>
        </div>
    </div>

    <?php
    require('template-parts/script.php');
    return ob_get_clean();
}

add_shortcode( 'meme_maker', 'meme_maker_template' );