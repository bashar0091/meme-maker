<script>
    // meme generator
    jQuery(document).ready(function($) {
        const mainCanvas = document.getElementById('mainCanvas');
        const ctxMain = mainCanvas.getContext('2d');

        const imageGroups = [
            { id: 'meme_image_group_1', defaultImage: 'https://michimaker.vercel.app/assets/cat/cat_a.png' },
            { id: 'meme_image_group_2', defaultImage: null },
            { id: 'meme_image_group_3', defaultImage: null },
            // Add more groups as needed
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
            mainImage.src = 'https://michimaker.vercel.app/assets/backgrounds/classic.png';
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
                const images = $(`.meme_image_group_${group.id.slice(-1)} img`);
                const randomImage = images[Math.floor(Math.random() * images.length)].src;
                overlayImage(canvases[group.id], randomImage);
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