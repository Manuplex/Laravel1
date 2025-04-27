<section data-bs-version="5.1" class="list02 coolm5" group="List" mbr-class="{
    'mbr-fullscreen': fullScreen,
    'mbr-parallax-background': bg.parallax}">
    <mbr-parameters>
        <header>Size</header>
        <input type="checkbox" title="Full Screen" name="fullScreen">
        <input type="checkbox" title="Full Width" name="fullWidth" checked>
        <input type="range" inline title="Top" name="paddingTop" min="0" max="12" step="1" value="5" condition="fullScreen == false">
        <input type="range" inline title="Bottom" name="paddingBottom" min="0" max="12" step="1" value="5" condition="fullScreen == false">
        <input type="checkbox" title="Reverse" name="reverseContent">
        <header>Show/Hide</header>
        <input type="checkbox" title="Number" name="showNumber" checked>
        <input type="checkbox" title="Title" name="showTitle" checked>
        <input type="checkbox" title="Border" name="showBorder" checked>
        <input type="color" title="Border Color" value="#000000" name="border" condition="showBorder" selected>
        <header>Background</header>
        <fieldset type="background" name="bg" parallax>
            <input type="image" title="Image" value="../_images/background1.jpg">
            <input type="color" title="Color" value="#ffffff" selected>
        </fieldset>
        <input type="checkbox" title="Transparent" name="transparentBg" condition="bg.type === 'color'" checked>
        <header condition="bg.type === 'video'">Fallback Image</header>
        <input type="image" title="Fallback Image" value="../_images/background1.jpg" name="fallBackImage" condition="bg.type === 'video'">
        <input type="checkbox" title="Overlay" name="overlay" condition="bg.type !== 'color'">
        <input type="color" title="Overlay Color" name="overlayColor" value="#ffffff" condition="overlay && bg.type !== 'color'">
        <input type="range" inline title="Opacity" name="overlayOpacity" min="0" max="1" step="0.1" value="0.8" condition="overlay && bg.type !== 'color'">
    </mbr-parameters>

    <div class="mbr-fallback-image disabled" mbr-if="bg.type == 'video'"></div>
    <div class="mbr-overlay" mbr-if="overlay && bg.type !== 'color'" opacity="{{overlayOpacity}}" bg-color="{{overlayColor}}"></div>

    <div mbr-class="{'container': !fullWidth, 'container-fluid': fullWidth}">
        <div class="row" mbr-class="{'flex-row-reverse' : reverseContent}">
            <div class="col-12">
                <div class="border-wrap" mbr-if="showBorder"></div>
            </div>
            <div class="col-12 col-lg-6 card">
                <div class="number-wrapper">
                    <p class="mbr-number mbr-fonts-style" data-app-selector=".mbr-number" mbr-theme-style="display-2" mbr-if="showNumber">Élégance</p>
                </div>
            </div>
            <div class="col-12 col-lg-6 card">
                <div class="list-wrapper">
                    <h3 class="mbr-section-title mbr-fonts-style" data-app-selector=".mbr-section-title" mbr-theme-style="display-7" mbr-if="showTitle">Plongez dans un monde où le style rencontre la qualité. Découvrez nos produits qui redéfinissent le luxe.</h3>
                    <ul class="list mbr-fonts-style" mbr-theme-style="display-4" data-app-selector=".list, .item-wrap" data-multiline="" mbr-article="">
                        <li class="item-wrap">Montres intemporelles</li>
                        <li class="item-wrap">Lunettes chic</li>
                        <li class="item-wrap">Accessoires tendance</li>
                        <li class="item-wrap">Service exceptionnel</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>