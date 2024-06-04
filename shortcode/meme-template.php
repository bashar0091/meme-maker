<?php
/**
* Shortcode for meme maker
*/

function meme_maker_template() {
    ob_start();
    ?>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @font-face {
            font-family: 'GOODDP';
            src: url('<?= plugin_dir_url(__FILE__) ?>../assets/font/GOODDP__.woff2') format('truetype');
        }

        .ff_gooddp {
            font-family: 'GOODDP', sans-serif;
        }
        .ff_bebas{
            font-family: "Bebas Neue", sans-serif;
        }
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
        .meme_acitve {
            border-width: 4px;
        }
        .learn-more {
            font-weight: 600;
            color: #382b22;
            text-transform: uppercase;
            
            background:#49D3FE;
            border: 2px solid #fff;
            border-radius: 0.75em;
            transform-style: preserve-3d;
            transition: transform 150ms cubic-bezier(0, 0, 0.58, 1), background 150ms cubic-bezier(0, 0, 0.58, 1);
            display: flex;
            align-items: center;
            padding: 10px;
            width: 100%;
            justify-content: center;
            }
            .learn-more::before {
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:#48D1FF;
            border-radius: inherit;
            
            transform: translate3d(0, 0.75em, -1em);
            transition: transform 150ms cubic-bezier(0, 0, 0.58, 1), box-shadow 150ms cubic-bezier(0, 0, 0.58, 1);
            }
            .learn-more:hover {
            background: #fff;
            transform: translate(0, 0.25em);
            }
            .learn-more:hover::before {
            
            transform: translate3d(0, 0.5em, -1em);
            }
            .learn-more:active {
            background: #ffe9e9;
            transform: translate(0em, 0.75em);
            }
    </style>

    <div class="bg-[#369DD1]">
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