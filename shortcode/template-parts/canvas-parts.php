<div class="xl:w-[500px] p-[30px]">

        <style>
            input::placeholder {
                color: #000000;
            }
        </style>

        <div class="ff_gooddp learn-more mb-5">
            <input type="text" class="w-full bg-[transparent] focus-visible:outline-none" id="topText" placeholder="Top Text">
        </div>

        <div id="canvasContainer" class="relative w-[100%] xl:w-[440px] h-[440px] border-[8px] border-solid border-[#48D1FF] rounded-[16px] overflow-hidden">
            <canvas id="mainCanvas" class="canvasLayer" width="500" height="500"></canvas>
        </div>

        <div class="ff_gooddp learn-more mt-5">
            <input type="text" class="w-full bg-[transparent] focus-visible:outline-none" id="bottomText" placeholder="Bottom Text">
        </div>

        <div class="mx-[10px] mt-4">
            <button id="resetButton" class="ff_gooddp learn-more  mt-[30px]">
                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-[#000]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M10 2h4"></path><path d="M12 14v-4"></path><path d="M4 13a8 8 0 0 1 8-7 8 8 0 1 1-5.3 14L4 17.6"></path><path d="M9 17H4v5"></path></svg>

                <span class="text-center font-medium pl-4 text-[#000] text-100 text-[25px]">RESET CAPY</span>
            </button>
        </div>

        <div class="mx-[10px] mt-4">
            <button id="randomButton" class="ff_gooddp learn-more  mt-[30px]">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="w-5 h-5 text-[#000]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M504.971 359.029c9.373 9.373 9.373 24.569 0 33.941l-80 79.984c-15.01 15.01-40.971 4.49-40.971-16.971V416h-58.785a12.004 12.004 0 0 1-8.773-3.812l-70.556-75.596 53.333-57.143L352 336h32v-39.981c0-21.438 25.943-31.998 40.971-16.971l80 79.981zM12 176h84l52.781 56.551 53.333-57.143-70.556-75.596A11.999 11.999 0 0 0 122.785 96H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12zm372 0v39.984c0 21.46 25.961 31.98 40.971 16.971l80-79.984c9.373-9.373 9.373-24.569 0-33.941l-80-79.981C409.943 24.021 384 34.582 384 56.019V96h-58.785a12.004 12.004 0 0 0-8.773 3.812L96 336H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h110.785c3.326 0 6.503-1.381 8.773-3.812L352 176h32z"></path></svg>

                <span class="text-center font-medium pl-4 text-[#000] text-100 text-[25px]">GENERATE RANDOM</span>
            </button>
        </div>
        
        <div class="mx-[10px] mt-4">
            <button id="downloadButton" class="ff_gooddp learn-more  mt-[30px]">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="w-5 h-5 text-[#000]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"></path></svg>

                <span class="text-center font-medium pl-4 text-[#000] text-100 text-[25px]">DOWNLOAD</span>
            </button>
        </div>
    </div>