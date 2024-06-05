<script>

    <?php 
    $terms = get_terms( array(
        'taxonomy' => 'meme-image-group',
        'hide_empty' => true,
    ) );
    ?>

    // meme generator
    jQuery(document).ready(function($) {
        const mainCanvas = document.getElementById('mainCanvas');
        const ctxMain = mainCanvas.getContext('2d');

        const imageGroups = [
            <?php 
            $i = 1;
            $master_image_url = '';
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                ?>
                { id: 'meme_image_group_1', defaultImage: '' },
                <?php
                foreach ( $terms as $term ) {
                $i++;

                $term_id = $term->term_id;;
                $default_image_id = get_term_meta($term_id,'upload_default_image_of_this_group',true);
                $bg_group_id = get_term_meta($term_id,'is_this_background_image_group',true);
                $default_image_url = 'null';
                if(!empty($default_image_id) && $bg_group_id != true ){
                    $default_image_url = wp_get_attachment_image_url( $default_image_id, 'full' );
                }
                
                if($bg_group_id == true){
                    $master_image_url = wp_get_attachment_image_url( $default_image_id, 'full' );
                    continue;
                }
                ?>
                { id: 'meme_image_group_<?= $i;?>', defaultImage: '<?= $default_image_url;?>' },
                <?php
                }
            }    
            ?>
        ];

        const canvases = {};
        const imagesLoaded = {};

        function createCanvasLayer(id) {
            const canvas = document.createElement('canvas');
            canvas.id = id;
            canvas.width = 500;
            canvas.height = 500;
            canvas.className = 'canvasLayer';
            document.getElementById('canvasContainer').appendChild(canvas);
            return canvas;
        }

        function initCanvases() {
            imageGroups.forEach(group => {
                const canvas = createCanvasLayer(group.id);
                canvases[group.id] = canvas.getContext('2d');
            });
        }

        function loadMainImage() {
            const mainImage = new Image();
            mainImage.src = '<?= $master_image_url;?>';
            mainImage.onload = function() {
                imagesLoaded['main'] = mainImage;

                imageGroups.forEach(group => {
                    if (group.defaultImage && group.defaultImage !== 'null') {
                        overlayImage(group.id, group.defaultImage);
                    }
                });
            };
        }

        function overlayImage(groupId, src) {
            const overlay = new Image();
            overlay.src = src;
            overlay.onload = function() {
                imagesLoaded[groupId] = overlay;
                drawCanvas();
            };
        }

        function drawCanvas() {
            ctxMain.clearRect(0, 0, mainCanvas.width, mainCanvas.height);

            // Draw main image
            if (imagesLoaded['main']) {
                ctxMain.drawImage(imagesLoaded['main'], 0, 0, mainCanvas.width, mainCanvas.height);
            }

            // Draw overlay images
            imageGroups.forEach(group => {
                if (imagesLoaded[group.id]) {
                    ctxMain.drawImage(imagesLoaded[group.id], 0, 0, mainCanvas.width, mainCanvas.height);
                }
            });

            // Draw text
            drawText(ctxMain);
        }

        function drawText(ctx) {
            const topText = $('#topText').val().toUpperCase();
            const bottomText = $('#bottomText').val().toUpperCase(); 
            ctx.font = '700 40px Arial';
            ctx.textAlign = 'center';
            ctx.fillStyle = 'white';

            const shadowOffset = 2.5;
            ctx.fillStyle = 'black';

            for (let x = -shadowOffset; x <= shadowOffset; x++) {
                for (let y = -shadowOffset; y <= shadowOffset; y++) {
                    if (topText) {
                        ctx.fillText(topText, mainCanvas.width / 2 + x, 40 + y);
                    }
                    if (bottomText) {
                        ctx.fillText(bottomText, mainCanvas.width / 2 + x, mainCanvas.height - 20 + y);
                    }
                }
            }

            ctx.fillStyle = 'white';
            if (topText) {
                ctx.fillText(topText, mainCanvas.width / 2, 40);
            }
            if (bottomText) {
                ctx.fillText(bottomText, mainCanvas.width / 2, mainCanvas.height - 20);
            }
        }


        function handleImageClick(event) {
            const group = event.data.group;
            const src = $(this).attr('src');
            overlayImage(group.id, src);
        }

        function handleRemoveButtonClick(event) {
            const group = event.data.group;
            delete imagesLoaded[group.id];
            drawCanvas();
        }

        function handleReset() {
            Object.keys(imagesLoaded).forEach(key => {
                if (key !== 'main') {
                    delete imagesLoaded[key];
                }
            });
            imageGroups.forEach(group => {
                if (group.defaultImage) {
                    overlayImage(group.id, group.defaultImage);
                }
            });
            drawCanvas();
            $('.image_parts').removeClass('border-4');
            $('.removeButton, .marked_active').addClass('border-4');
        }

        function handleRandomGenerate() {
            imageGroups.forEach(group => {
                const images = $(`.meme_image_group_${group.id.slice(-1)} .image_parts img`);
                const randomImage = images[Math.floor(Math.random() * images.length)];
                const parent = $(randomImage).parent();

                $(`.meme_image_group_${group.id.slice(-1)} .image_parts`).removeClass('border-4');

                parent.addClass('border-4');
                
                const removeButton = $(`.removeButton[data-group="meme_image_group_${group.id.slice(-1)}"]`);
                removeButton.removeClass('border-4 meme_acitve');
                
                overlayImage(group.id, randomImage.src);
            });
        }


        function handleDownload() {
            const downloadCanvas = document.createElement('canvas');
            downloadCanvas.width = mainCanvas.width;
            downloadCanvas.height = mainCanvas.height;
            const downloadCtx = downloadCanvas.getContext('2d');

            drawCanvas();

            downloadCtx.drawImage(mainCanvas, 0, 0);
            Object.values(canvases).forEach(ctx => downloadCtx.drawImage(ctx.canvas, 0, 0));
            drawText(downloadCtx);

            const link = document.createElement('a');
            link.download = 'canvas_image.png';
            link.href = downloadCanvas.toDataURL();
            link.click();
        }

        $('#topText, #bottomText').on('input', drawCanvas);

        initCanvases();
        loadMainImage();

        imageGroups.forEach(group => {
            $(`.meme_image_group_${group.id.slice(-1)} img`).click({ group }, handleImageClick);
            $(`.removeButton[data-group=${group.id}]`).click({ group }, handleRemoveButtonClick);
        });

        $('#resetButton').click(handleReset);
        $('#randomButton').click(handleRandomGenerate);
        $('#downloadButton').click(handleDownload);
    });
    
    // for slider items 
    jQuery(document).ready(function($) {
        const slideStep = 100;

        const menuContainer = $('.menu-container');
        updateButtonVisibility(menuContainer);

        $('.prev-btn').click(function() {
            const $menuContainer = $(this).siblings('.menu-container');
            $menuContainer.animate({scrollLeft: '-=' + slideStep}, 'fast');
            updateButtonVisibility($menuContainer);
        });

        $('.next-btn').click(function() {
            const $menuContainer = $(this).siblings('.menu-container');
            $menuContainer.animate({scrollLeft: '+=' + slideStep}, 'fast');
            updateButtonVisibility($menuContainer);
        });

        $('.menu-container').scroll(function() {
            const $menuContainer = $(this);
            updateButtonVisibility($menuContainer);
        });

        function updateButtonVisibility($menuContainer) {
            const $prevBtn = $menuContainer.siblings('.prev-btn');
            const $nextBtn = $menuContainer.siblings('.next-btn');

            if ($menuContainer.scrollLeft() === 0) {
                $prevBtn.addClass('btn_fade_out');
            } else {
                $prevBtn.removeClass('btn_fade_out');
            }

            if ($menuContainer.scrollLeft() + $menuContainer.innerWidth() >= $menuContainer[0].scrollWidth) {
                $nextBtn.addClass('btn_fade_out');
            } else {
                $nextBtn.removeClass('btn_fade_out');
            }
        }
    });
</script>