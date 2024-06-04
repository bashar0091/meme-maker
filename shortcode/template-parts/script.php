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
                ctxMain.drawImage(mainImage, 0, 0, mainCanvas.width, mainCanvas.height);
                // Load default images for each group
                imageGroups.forEach(group => {
                    if (group.defaultImage) {
                        overlayImage(canvases[group.id], group.defaultImage);
                    }
                });
            };
        }

        function overlayImage(ctx, src) {
            const overlay = new Image();
            overlay.src = src;
            overlay.onload = function() {
                ctx.clearRect(0, 0, mainCanvas.width, mainCanvas.height);
                ctx.drawImage(overlay, 0, 0, mainCanvas.width, mainCanvas.height);
            };
        }

        function handleImageClick(event) {
            const group = event.data.group;
            const src = $(this).attr('src');
            overlayImage(canvases[group.id], src);
        }

        function handleRemoveButtonClick(event) {
            const group = event.data.group;
            canvases[group.id].clearRect(0, 0, mainCanvas.width, mainCanvas.height);
        }

        function handleReset() {
            Object.values(canvases).forEach(ctx => ctx.clearRect(0, 0, mainCanvas.width, mainCanvas.height));
            imageGroups.forEach(group => {
                if (group.defaultImage) {
                    overlayImage(canvases[group.id], group.defaultImage);
                }
            });
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
                
                overlayImage(canvases[group.id], randomImage.src);
            });
        }


        function handleDownload() {
            const downloadCanvas = document.createElement('canvas');
            downloadCanvas.width = mainCanvas.width;
            downloadCanvas.height = mainCanvas.height;
            const downloadCtx = downloadCanvas.getContext('2d');

            downloadCtx.drawImage(mainCanvas, 0, 0);
            Object.values(canvases).forEach(ctx => downloadCtx.drawImage(ctx.canvas, 0, 0));

            const link = document.createElement('a');
            link.download = 'canvas_image.png';
            link.href = downloadCanvas.toDataURL();
            link.click();
        }

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