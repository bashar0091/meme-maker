<?php
/**
* Shortcode for meme maker
*/

function meme_maker_template() {
    ?>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .btn_fade_out {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>

    <div class="bg-[#fbeccf]">
        <div class="grid grid-cols-[1fr_2fr]">
            <div class="">
                <div class="border-[8px] border-solid border-[#764824] rounded-[16px] overflow-hidden">
                    <img class="w-full h-full" src="http://localhost/meme-maker/wp-content/uploads/2024/06/meme854109.png" alt="">
                </div>

                <div class="mt-4">
                    <button class="select-none flex justify-center items-center w-full rounded-full py-4 bg-[#FDF6E7] border-4 border-[#764824] cursor-pointer hover:scale-95 transition-all">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-[#764824]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M10 2h4"></path><path d="M12 14v-4"></path><path d="M4 13a8 8 0 0 1 8-7 8 8 0 1 1-5.3 14L4 17.6"></path><path d="M9 17H4v5"></path></svg>

                        <span class="text-center font-extrabold pl-4 text-[#764824] text-100 text-[20px]">RESET MICHI</span>
                    </button>
                </div>

                <div class="mt-4">
                    <button class="select-none flex justify-center items-center w-full rounded-full py-4 bg-[#FDF6E7] border-4 border-[#764824] cursor-pointer hover:scale-95 transition-all">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="w-5 h-5 text-[#764824]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M504.971 359.029c9.373 9.373 9.373 24.569 0 33.941l-80 79.984c-15.01 15.01-40.971 4.49-40.971-16.971V416h-58.785a12.004 12.004 0 0 1-8.773-3.812l-70.556-75.596 53.333-57.143L352 336h32v-39.981c0-21.438 25.943-31.998 40.971-16.971l80 79.981zM12 176h84l52.781 56.551 53.333-57.143-70.556-75.596A11.999 11.999 0 0 0 122.785 96H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12zm372 0v39.984c0 21.46 25.961 31.98 40.971 16.971l80-79.984c9.373-9.373 9.373-24.569 0-33.941l-80-79.981C409.943 24.021 384 34.582 384 56.019V96h-58.785a12.004 12.004 0 0 0-8.773 3.812L96 336H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h110.785c3.326 0 6.503-1.381 8.773-3.812L352 176h32z"></path></svg>

                        <span class="text-center font-extrabold pl-4 text-[#764824] text-100 text-[20px]">GENERATE RANDOM</span>
                    </button>
                </div>
                
                <div class="mt-4">
                    <button class="select-none flex justify-center items-center w-full rounded-full py-4 bg-[#764824] border-4 border-[#FDF6E7] cursor-pointer hover:scale-95 transition-all">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="w-5 h-5 text-[#FDF6E7]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"></path></svg>

                        <span class="text-center font-extrabold pl-4 text-[#FDF6E7]  text-[20px]">GENERATE RANDOM</span>
                    </button>
                </div>
            </div>
                
            <div class="p-12 ml-16 border-l-2 border-solid border-[#764824] overflow-x-hidden">
                <h2 class="font-extrabold text-[#764824]  text-[24px]">CREATE YOUR MICHI</h2>

                <div class="mt-8">
                    <h3 class="font-bold text-[#764824]  uppercase  text-[18px]">Cat</h3>
                    <div class="flex overflow-x-hidden">
                        <button class="prev-btn w-[42px] h-[84px] rounded-xl flex justify-center items-center border-2 border-[#764824] transition-all hover:bg-white bg-[#FDF6E7] mr-4">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" class="w-5 h-5 text-[#764824]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>
                        </button>

                        <div class="menu-container flex w-full gap-3 overflow-x-hidden relative">
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                            <div class="flex justify-center items-center cursor-pointer w-[84px] h-[84px] border-[#764824] rounded-xl overflow-hidden transition-all border flex-none">
                                <img src="https://michimaker.vercel.app/_next/image?url=%2Fassets%2Fcat%2Fcat_a.png%3Findex%3D1&w=96&q=75" alt="">
                            </div>
                        </div>

                        <button class="next-btn w-[42px] h-[84px] rounded-xl flex justify-center items-center border-2 border-[#764824] transition-all hover:bg-white bg-[#FDF6E7] ml-4">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" class="w-5 h-5 text-[#764824]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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

    <?php
}

add_shortcode( 'meme_maker', 'meme_maker_template' );