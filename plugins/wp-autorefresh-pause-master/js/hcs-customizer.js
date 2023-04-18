/**
 * Disables the customizer preview refresh.
 * @type {Boolean}
 */
var hcsRefreshDisabled = false;

/**
 * Check to see the preview window is ready before proceeding.
 * @type {Boolean}
 */
var hcsPreviewReady = false;

/**
 * Stores the customizer's refresh function so we can restore it later.
 * @type {function}
 */
var hcsRefresh;

/**
 * Checks to see if the preview iframe is ready before proceeding.
 * 
 * @returns 
 */
function hcsCheckPreviewReady() {

    // Customizer takes a while to be ready, just keep checking
    if (wp.customize.previewer.targetWindow() !== null) {
        hcsOnReady();
        return;
    }
    window.setTimeout(hcsCheckPreviewReady, 2000);

}

/**
 * Called when the preview iframe is ready.
 */
function hcsOnReady() {

    // Preview is ready, can now manually refresh
    if (hcsRefreshDisabled) {
        wp.customize.previewer.refresh = function () { }
        jQuery(".customize-controls-refresh").show();
    }
    hcsPreviewReady = true;

}

/**
 * Toggles the customizer preview refresh.
 */
function hcsToggleRefresh() {

    if (hcsRefreshDisabled) hcsEnableRefresh();
    else hcsDisableRefresh();

}

/**
 * Enables the customizer preview refresh.
 */
function hcsEnableRefresh() {
    hcsRefreshDisabled = false;
    wp.customize.previewer.refresh = hcsRefresh;
    wp.customize.previewer.refresh();
    jQuery(".customize-controls-refresh").hide();
}

/**
 * Disables the customizer preview refresh.
 */
function hcsDisableRefresh() {
    hcsRefreshDisabled = true;
    wp.customize.previewer.refresh = function () { }
    jQuery(".customize-controls-refresh").show();
}

/**
 * Checks to see if the preview iframe is ready before proceeding.
 * 
 * @returns 
 */
function hcsUpdatePreview() {
    wp.customize.previewer.refresh = hcsRefresh;
    wp.customize.previewer.refresh();
    wp.customize.previewer.refresh = function () { }
}

/**
 * Wait for page to load before running code
 */
jQuery(document).ready(function ($) {

    // For restoring the preview iframe window.
    hcsRefresh = wp.customize.previewer.refresh;
   
    // Add refresh button
    $(`<style>.customize-controls-refresh { display: none; } .customize-controls-refresh:before {content: "\\f531";}</style>
    <a href="http://wordpress.test/" style="left: 48px;" onclick="event.preventDefault(); jQuery(this).blur(); hcsUpdatePreview();" class="customize-controls-close customize-controls-refresh">
        <span class="screen-reader-text">Refresh</span>
    </a>
    `).insertAfter('.customize-controls-close');

    // Check preview is ready
    hcsCheckPreviewReady();

    // Toggle refresh
    hcsRefreshDisabled = wp.customize.control('custom_hcs_refresh_toggle').setting();
    jQuery('#_customize-input-custom_hcs_refresh_toggle').change(function () {
        if (hcsRefreshDisabled) hcsEnableRefresh();
        else hcsDisableRefresh();
    });
    
});