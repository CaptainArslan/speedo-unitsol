<!DOCTYPE html>
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" lang="en-US"
  class=" yui3-js-enabled js flexbox canvas canvastext webgl no-touch hashchange history draganddrop rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms no-csstransforms3d csstransitions video audio svg inlinesvg svgclippaths js flexbox canvas canvastext webgl no-touch hashchange history draganddrop rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms no-csstransforms3d csstransitions video audio svg inlinesvg svgclippaths"
  style="">

<head>
  <style type="text/css">
    .disable-hover:not(.sqs-layout-editing),
    .disable-hover:not(.sqs-layout-editing) * {
      pointer-events: none;
    }
  </style>
  <style type="text/css">
    div.eapps-widget {
      position: relative
    }

    div.eapps-widget.eapps-widget-show-toolbar:before {
      position: absolute;
      content: "";
      display: block;
      bottom: 0;
      top: 0;
      left: 0;
      right: 0;
      pointer-events: none;
      border: 1px solid transparent;
      transition: border .3s ease;
      z-index: 1
    }

    .eapps-widget-toolbar {
      position: absolute;
      top: -32px;
      left: 0;
      right: 0;
      display: block;
      z-index: 99999;
      padding-bottom: 4px;
      transition: all .3s ease;
      pointer-events: none;
      opacity: 0
    }

    .eapps-widget:hover .eapps-widget-toolbar {
      opacity: 1;
      pointer-events: auto
    }

    .eapps-widget-toolbar a {
      text-decoration: none;
      box-shadow: none !important
    }

    .eapps-widget-toolbar-panel {
      border-radius: 6px;
      background-color: #222;
      color: #fff;
      display: -ms-inline-flexbox;
      display: inline-flex;
      -ms-flex-align: center;
      align-items: center;
      top: 0;
      position: relative;
      transition: all .3s ease;
      opacity: 0;
      overflow: hidden;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .2);
      height: 28px
    }

    .eapps-widget:hover .eapps-widget-toolbar-panel {
      opacity: 1
    }

    .eapps-widget-toolbar-panel-wrapper {
      width: 100%;
      position: relative
    }

    .eapps-widget-toolbar-panel-only-you {
      position: absolute;
      top: -24px;
      font-size: 11px;
      line-height: 14px;
      color: #9c9c9c;
      padding: 5px 4px
    }

    .eapps-widget-toolbar-panel-logo {
      width: 28px;
      height: 28px;
      border-right: 1px solid hsla(0, 0%, 100%, .2);
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      -ms-flex-pack: center;
      justify-content: center
    }

    .eapps-widget-toolbar-panel-logo svg {
      display: block;
      width: 15px;
      height: 15px;
      fill: #f93262
    }

    .eapps-widget-toolbar-panel-edit {
      font-size: 12px;
      font-weight: 400;
      line-height: 14px;
      display: -ms-inline-flexbox;
      display: inline-flex;
      -ms-flex-align: center;
      align-items: center;
      padding: 9px;
      border-right: 1px solid hsla(0, 0%, 100%, .2);
      color: #fff;
      text-decoration: none
    }

    .eapps-widget-toolbar-panel-edit-icon {
      width: 14px;
      height: 14px;
      margin-right: 8px
    }

    .eapps-widget-toolbar-panel-edit-icon svg {
      display: block;
      width: 100%;
      height: 100%;
      fill: #fff
    }

    .eapps-widget-toolbar-panel-views {
      display: -ms-inline-flexbox;
      display: inline-flex;
      -ms-flex-pack: center;
      justify-content: center;
      -ms-flex-align: center;
      align-items: center
    }

    .eapps-widget-toolbar-panel-views-label {
      font-size: 12px;
      font-weight: 400;
      line-height: 14px;
      margin-left: 8px
    }

    .eapps-widget-toolbar-panel-views-bar {
      display: -ms-inline-flexbox;
      display: inline-flex;
      width: 70px;
      height: 3px;
      border-radius: 2px;
      margin-left: 8px;
      background-color: hsla(0, 0%, 100%, .3)
    }

    .eapps-widget-toolbar-panel-views-bar-inner {
      border-radius: 2px;
      background-color: #4ad504
    }

    .eapps-widget-toolbar-panel-views-green .eapps-widget-toolbar-panel-views-bar-inner {
      background-color: #4ad504
    }

    .eapps-widget-toolbar-panel-views-red .eapps-widget-toolbar-panel-views-bar-inner {
      background-color: #ff4734
    }

    .eapps-widget-toolbar-panel-views-orange .eapps-widget-toolbar-panel-views-bar-inner {
      background-color: #ffb400
    }

    .eapps-widget-toolbar-panel-views-percent {
      display: -ms-inline-flexbox;
      display: inline-flex;
      margin-left: 8px;
      margin-right: 8px;
      font-size: 12px;
      font-weight: 400;
      line-height: 14px
    }

    .eapps-widget-toolbar-panel-views-get-more {
      padding: 9px 16px;
      background-color: #f93262;
      color: #fff;
      font-size: 12px;
      font-weight: 400;
      border-radius: 0 6px 6px 0
    }

    .eapps-widget-toolbar-panel-share {
      position: absolute;
      top: 0;
      display: inline-block;
      margin-left: 8px;
      width: 83px;
      height: 28px;
      padding-bottom: 4px;
      box-sizing: content-box !important
    }

    .eapps-widget-toolbar-panel-share:hover .eapps-widget-toolbar-panel-share-block {
      opacity: 1;
      pointer-events: all
    }

    .eapps-widget-toolbar-panel-share-button {
      padding: 0 18px;
      height: 28px;
      background-color: #1c91ff;
      color: #fff;
      font-size: 12px;
      font-weight: 400;
      border-radius: 6px;
      position: absolute;
      top: 0;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: row;
      flex-direction: row;
      cursor: default;
      -ms-flex-align: center;
      align-items: center
    }

    .eapps-widget-toolbar-panel-share-button svg {
      display: inline-block;
      margin-right: 6px;
      fill: #fff;
      position: relative;
      top: -1px
    }

    .eapps-widget-toolbar-panel-share-block {
      position: absolute;
      background: #fff;
      border: 1px solid hsla(0, 0%, 7%, .1);
      border-radius: 10px;
      width: 209px;
      top: 32px;
      transform: translateX(-63px);
      opacity: 0;
      pointer-events: none;
      transition: all .3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, .05)
    }

    .eapps-widget-toolbar-panel-share-block:hover {
      opacity: 1;
      pointer-events: all
    }

    .eapps-widget-toolbar-panel-share-block-text {
      color: #111;
      font-size: 15px;
      font-weight: 400;
      padding: 12px 0;
      text-align: center
    }

    .eapps-widget-toolbar-panel-share-block-text-icon {
      padding-bottom: 4px
    }

    .eapps-widget-toolbar-panel-share-block-actions {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: row;
      flex-direction: row;
      border-top: 1px solid hsla(0, 0%, 7%, .1)
    }

    .eapps-widget-toolbar-panel-share-block-actions-item {
      width: 33.333333%;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-pack: center;
      justify-content: center;
      -ms-flex-align: center;
      align-items: center;
      height: 39px;
      transition: all .3s ease;
      background-color: transparent
    }

    .eapps-widget-toolbar-panel-share-block-actions-item:hover {
      background-color: #fafafa
    }

    .eapps-widget-toolbar-panel-share-block-actions-item a {
      width: 100%;
      height: 100%;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-pack: center;
      justify-content: center;
      -ms-flex-align: center;
      align-items: center
    }

    .eapps-widget-toolbar-panel-share-block-actions-item-icon {
      width: 16px;
      height: 16px;
      display: block
    }

    .eapps-widget-toolbar-panel-share-block-actions-item-facebook .eapps-widget-toolbar-panel-share-block-actions-item-icon {
      fill: #3c5a9b
    }

    .eapps-widget-toolbar-panel-share-block-actions-item-twitter .eapps-widget-toolbar-panel-share-block-actions-item-icon {
      fill: #1ab2e8
    }

    .eapps-widget-toolbar-panel-share-block-actions-item-google .eapps-widget-toolbar-panel-share-block-actions-item-icon {
      fill: #dd4b39
    }

    .eapps-widget-toolbar-panel-share-block-actions-item:not(:last-child) {
      border-right: 1px solid hsla(0, 0%, 7%, .1)
    }
  </style>
  <link href="https://apps.elfsight.com" rel="preconnect" crossorigin="">
  <link href="https://static.elfsight.com" rel="preconnect" crossorigin="">
  <link href="https://service-reviews-ultimate.elfsight.com" rel="preconnect" crossorigin="">
  <link href="https://storage.elfsight.com" rel="preconnect" crossorigin="">
</head>

<body id="collection-547e9f93e4b05ea9bd129fbd"
  class="nav-button-style-solid nav-button-corner-style-square banner-button-style-solid banner-button-corner-style-square banner-slideshow-controls-arrows meta-priority-date hide-entry-author hide-list-entry-footer hide-blog-sidebar center-navigation--info event-thumbnails event-thumbnail-size-32-standard event-date-label event-date-label-time event-list-show-cats event-list-date event-list-time event-list-address event-icalgcal-links event-excerpts event-item-back-link gallery-design-grid aspect-ratio-auto lightbox-style-light gallery-navigation-bullets gallery-info-overlay-show-on-hover gallery-aspect-ratio-32-standard gallery-arrow-style-no-background gallery-transitions-fade gallery-show-arrows gallery-auto-crop product-list-titles-under product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center newsletter-style-light opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-solid medium-button-shape-square large-button-style-solid large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-dynamic-font-sizing image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-dynamic-font-sizing image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-dynamic-font-sizing image-block-stack-text-alignment-left button-style-solid button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light native-currency-code-usd collection-type-page collection-layout-default collection-547e9f93e4b05ea9bd129fbd mobile-style-available force-mobile-nav"
  cz-shortcut-listen="true">
  <div id="yui3-css-stamp" style="position: absolute !important; visibility: hidden !important"></div>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- This is Squarespace. -->
  <!-- james-ellis-i62i -->
  <script charset="utf-8" id="yui_3_17_2_1_1669738308858_137"
    src="//assets.squarespace.com/universal/scripts-compressed/announcement-bar-d477516abab83e8704450-min.en-US.js"></script>
  <script charset="utf-8" id="yui_3_17_2_1_1669738402710_127"
    src="//assets.squarespace.com/universal/scripts-compressed/announcement-bar-d477516abab83e8704450-min.en-US.js"></script>
  <base href="">
  <meta charset="utf-8">
  <title>Contact Us — Speedo Swim Squads Dubai</title>
  <link rel="shortcut icon" type="image/x-icon"
    href="https://images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/1420963432771-YGMS5S46Z713EB9QGBO2/favicon.ico?format=100w">
  <link rel="canonical" href="http://www.speedoswimsquads.com/contact">
  <meta property="og:site_name" content="Speedo Swim Squads Dubai">
  <meta property="og:title" content="Contact Us — Speedo Swim Squads Dubai">
  <meta property="og:url" content="http://www.speedoswimsquads.com/contact">
  <meta property="og:type" content="website">
  <meta property="og:image"
    content="http://static1.squarespace.com/static/5469a994e4b0c0e088bf1895/t/5c309094758d4678746d2cbb/1546686657536/speedo_swimwquads_d01%2B%25281%2529.jpg?format=1500w">
  <meta property="og:image:width" content="1500">
  <meta property="og:image:height" content="1000">
  <meta itemprop="name" content="Contact Us — Speedo Swim Squads Dubai">
  <meta itemprop="url" content="http://www.speedoswimsquads.com/contact">
  <meta itemprop="thumbnailUrl"
    content="http://static1.squarespace.com/static/5469a994e4b0c0e088bf1895/t/5c309094758d4678746d2cbb/1546686657536/speedo_swimwquads_d01%2B%25281%2529.jpg?format=1500w">
  <style>
    .one {
      padding: 0 97px;
    }
  </style>
  <link rel="image_src"
    href="http://static1.squarespace.com/static/5469a994e4b0c0e088bf1895/t/5c309094758d4678746d2cbb/1546686657536/speedo_swimwquads_d01%2B%25281%2529.jpg?format=1500w">
  <meta itemprop="image"
    content="http://static1.squarespace.com/static/5469a994e4b0c0e088bf1895/t/5c309094758d4678746d2cbb/1546686657536/speedo_swimwquads_d01%2B%25281%2529.jpg?format=1500w">
  <meta name="twitter:title" content="Contact Us — Speedo Swim Squads Dubai">
  <meta name="twitter:image"
    content="http://static1.squarespace.com/static/5469a994e4b0c0e088bf1895/t/5c309094758d4678746d2cbb/1546686657536/speedo_swimwquads_d01%2B%25281%2529.jpg?format=1500w">
  <meta name="twitter:url" content="http://www.speedoswimsquads.com/contact">
  <meta name="twitter:card" content="summary">
  <meta name="description" content="">
  <link rel="preconnect" href="https://images.squarespace-cdn.com">
  <script type="text/javascript"
    src="//use.typekit.net/ik/RkX149neIWGdmwIH2G9k1TRTxw-JxBIAQb2WrxJ2t1qfeC9ffFHN4UJLFRbh52jhWD9XFR8y5QqXZQsKwew3ZQMt5e4cwQ6oFs76MPG0-cBlZWwlZAUC-Wwl-Qjk-PoDSWmyScmDSeBRZPoRdhXC-cBlZWwlZAUC-Wwl-Qjk-PoDSWmyScmDSeBRZPoRdhXCdeNRjAUGdaFXOYF3ZAmqdaFa-AuDSWmyZYw0jhNlOYiaiko7jAu8Sku8deUTSkuTFR4TO1FUiABkZWF3jAF8OcFzdPUaiaS0Sag8ZAszSaiTdWFUiABqSkoRdhXKghFydeUudcIKgcmuScN3jPG4f4M3IMMjMkMfH6qJDbvbMg6IJMJ7fbRV2UMMeMS6MKG4fFMVIMMjIPMfH6qJ7WqbMs62JMJ7fbK7psMgeMb6MKG4fHyoIMIjgkMfH6GJoJjgIMIj2KMfH6GJojjgIMIjIPMfqMY-rxVSgb.js"></script>
  <script type="text/javascript">try { Typekit.load(); } catch (e) { }</script>
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700">
  <script type="text/javascript" crossorigin="anonymous" nomodule="nomodule"
    src="//assets.squarespace.com/@sqs/polyfiller/1.2.2/legacy.js"></script>
  <script type="text/javascript" crossorigin="anonymous"
    src="//assets.squarespace.com/@sqs/polyfiller/1.2.2/modern.js"></script>
  <script type="text/javascript">SQUARESPACE_ROLLUPS = {};</script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/extract-css-runtime-0ed6ed412602b5ef03ce6-min.en-US.js"]; })(SQUARESPACE_ROLLUPS, 'squarespace-extract_css_runtime');</script>
  <script crossorigin="anonymous"
    src="//assets.squarespace.com/universal/scripts-compressed/extract-css-runtime-0ed6ed412602b5ef03ce6-min.en-US.js"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/extract-css-moment-js-vendor-5082e2dab696b020ac83a-min.en-US.js"]; })(SQUARESPACE_ROLLUPS, 'squarespace-extract_css_moment_js_vendor');</script>
  <script crossorigin="anonymous"
    src="//assets.squarespace.com/universal/scripts-compressed/extract-css-moment-js-vendor-5082e2dab696b020ac83a-min.en-US.js"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/cldr-resource-pack-33f25cea66c84971c39d6-min.en-US.js"]; })(SQUARESPACE_ROLLUPS, 'squarespace-cldr_resource_pack');</script>
  <script crossorigin="anonymous"
    src="//assets.squarespace.com/universal/scripts-compressed/cldr-resource-pack-33f25cea66c84971c39d6-min.en-US.js"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/common-vendors-stable-ded59447778e1491d87fa-min.en-US.js"]; })(SQUARESPACE_ROLLUPS, 'squarespace-common_vendors_stable');</script>
  <script crossorigin="anonymous"
    src="//assets.squarespace.com/universal/scripts-compressed/common-vendors-stable-ded59447778e1491d87fa-min.en-US.js"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/common-vendors-efcb604347cd0affcf80e-min.en-US.js"]; })(SQUARESPACE_ROLLUPS, 'squarespace-common_vendors');</script>
  <script crossorigin="anonymous"
    src="//assets.squarespace.com/universal/scripts-compressed/common-vendors-efcb604347cd0affcf80e-min.en-US.js"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/common-7eff1f00f7ccf8fae989f-min.en-US.js"]; })(SQUARESPACE_ROLLUPS, 'squarespace-common');</script>
  <script crossorigin="anonymous"
    src="//assets.squarespace.com/universal/scripts-compressed/common-7eff1f00f7ccf8fae989f-min.en-US.js"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/performance-7c2e2a5656405fba2e7db-min.en-US.js"]; })(SQUARESPACE_ROLLUPS, 'squarespace-performance');</script>
  <script crossorigin="anonymous"
    src="//assets.squarespace.com/universal/scripts-compressed/performance-7c2e2a5656405fba2e7db-min.en-US.js"
    defer=""></script>
  <script
    data-name="static-context">Static = window.Static || {}; Static.SQUARESPACE_CONTEXT = { "facebookAppId": "314192535267336", "facebookApiVersion": "v6.0", "rollups": { "squarespace-announcement-bar": { "js": "//assets.squarespace.com/universal/scripts-compressed/announcement-bar-d477516abab83e8704450-min.en-US.js" }, "squarespace-audio-player": { "css": "//assets.squarespace.com/universal/styles-compressed/audio-player-702bf18174efe0acaa8ce-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/audio-player-3f8ef5d9fdd2a52aeebdf-min.en-US.js" }, "squarespace-blog-collection-list": { "css": "//assets.squarespace.com/universal/styles-compressed/blog-collection-list-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/blog-collection-list-a9d6e2a5fc511c5f6dd74-min.en-US.js" }, "squarespace-calendar-block-renderer": { "css": "//assets.squarespace.com/universal/styles-compressed/calendar-block-renderer-49c4a5f3dae67a728e3f4-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/calendar-block-renderer-8e3e0734c85178000cf34-min.en-US.js" }, "squarespace-chartjs-helpers": { "css": "//assets.squarespace.com/universal/styles-compressed/chartjs-helpers-53c004ac7d4bde1c92e38-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/chartjs-helpers-bca157842d796c92d50c9-min.en-US.js" }, "squarespace-comments": { "css": "//assets.squarespace.com/universal/styles-compressed/comments-91e23fb14e407e3111565-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/comments-5d47b578edaadb02aba26-min.en-US.js" }, "squarespace-dialog": { "css": "//assets.squarespace.com/universal/styles-compressed/dialog-89b254b5c87045b9e1360-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/dialog-c687fcda3e43a385e4ab3-min.en-US.js" }, "squarespace-events-collection": { "css": "//assets.squarespace.com/universal/styles-compressed/events-collection-49c4a5f3dae67a728e3f4-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/events-collection-8c3d66ee8b3e79f91ded0-min.en-US.js" }, "squarespace-form-rendering-utils": { "js": "//assets.squarespace.com/universal/scripts-compressed/form-rendering-utils-78808b0eec5e8a3153790-min.en-US.js" }, "squarespace-forms": { "css": "//assets.squarespace.com/universal/styles-compressed/forms-4a16a8a8c965386db2173-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/forms-a9dd557913aa7b8f1136c-min.en-US.js" }, "squarespace-gallery-collection-list": { "css": "//assets.squarespace.com/universal/styles-compressed/gallery-collection-list-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/gallery-collection-list-df911470e9b09f49f1e70-min.en-US.js" }, "squarespace-image-zoom": { "css": "//assets.squarespace.com/universal/styles-compressed/image-zoom-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/image-zoom-0eab58eaec9ee30292230-min.en-US.js" }, "squarespace-pinterest": { "css": "//assets.squarespace.com/universal/styles-compressed/pinterest-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/pinterest-bc7340144689b8d9123cb-min.en-US.js" }, "squarespace-popup-overlay": { "css": "//assets.squarespace.com/universal/styles-compressed/popup-overlay-948192219c3257f767ec5-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/popup-overlay-2e6dfa3e54086d695143e-min.en-US.js" }, "squarespace-product-quick-view": { "css": "//assets.squarespace.com/universal/styles-compressed/product-quick-view-4a16a8a8c965386db2173-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/product-quick-view-460de5483169877bf5383-min.en-US.js" }, "squarespace-products-collection-item-v2": { "css": "//assets.squarespace.com/universal/styles-compressed/products-collection-item-v2-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/products-collection-item-v2-303bca704fff9dc18e45d-min.en-US.js" }, "squarespace-products-collection-list-v2": { "css": "//assets.squarespace.com/universal/styles-compressed/products-collection-list-v2-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/products-collection-list-v2-a9c6ec1696c82409bd013-min.en-US.js" }, "squarespace-search-page": { "css": "//assets.squarespace.com/universal/styles-compressed/search-page-9d0a55de1efafbb9218e1-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/search-page-08f7e8d6217925f6b8874-min.en-US.js" }, "squarespace-search-preview": { "js": "//assets.squarespace.com/universal/scripts-compressed/search-preview-2e1ab29441dc195a8a6fc-min.en-US.js" }, "squarespace-simple-liking": { "css": "//assets.squarespace.com/universal/styles-compressed/simple-liking-ef94529873378652e6e86-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/simple-liking-000ca46b0287522a4ecd4-min.en-US.js" }, "squarespace-social-buttons": { "css": "//assets.squarespace.com/universal/styles-compressed/social-buttons-1f18e025ea682ade6293a-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/social-buttons-4181ec45180418a082544-min.en-US.js" }, "squarespace-tourdates": { "css": "//assets.squarespace.com/universal/styles-compressed/tourdates-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/tourdates-3fc4e93c9d4b655cf609d-min.en-US.js" }, "squarespace-website-overlays-manager": { "css": "//assets.squarespace.com/universal/styles-compressed/website-overlays-manager-7cecc648f858e6f692130-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/website-overlays-manager-2836b9e288275e08ca1c2-min.en-US.js" } }, "pageType": 2, "website": { "id": "5469a994e4b0c0e088bf1895", "identifier": "james-ellis-i62i", "websiteType": 1, "contentModifiedOn": 1668756540887, "cloneable": false, "hasBeenCloneable": false, "siteStatus": {}, "language": "en-US", "timeZone": "Asia/Dubai", "machineTimeZoneOffset": 14400000, "timeZoneOffset": 14400000, "timeZoneAbbr": "GST", "siteTitle": "Speedo Swim Squads Dubai", "fullSiteTitle": "Contact Us \u2014 Speedo Swim Squads Dubai", "siteTagLine": "Welcome to the Home of Speedo Swim Squads Dubai. Our club offers swimming teaching and coaching for all abilities from beginner through to national level.", "siteDescription": "<p>Welcome to the Home of <em>Speedo</em> Swim Squads Dubai. Our swim academy offers comprehensive swimming teaching and coaching programs for all abilities from beginner, advance swim, through to competitions at the national level.</p>", "location": { "mapZoom": 12.0, "mapLat": 25.2048493, "mapLng": 55.270782800000006, "markerLat": 25.2048493, "markerLng": 55.270782800000006, "addressTitle": "Speedo Swim Squads", "addressLine1": "Al Barsha Business Point Building, Office 103", "addressLine2": "Dubai, Dubai, ", "addressCountry": "United Arab Emirates" }, "logoImageId": "5c3090fd0ebbe80a256f8d50", "socialLogoImageId": "5c309094758d4678746d2cbb", "shareButtonOptions": { "2": true, "1": true }, "logoImageUrl": "//images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/1546686770099-IS12A8UQ1ORF0GWSGEXH/speedo_swimwquads_d01%2B%25281%2529.jpg", "socialLogoImageUrl": "//images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/1546686654378-KSQ00U6L1ZF82GVRPJ7P/speedo_swimwquads_d01%2B%25281%2529.jpg", "authenticUrl": "http://www.speedoswimsquads.com", "internalUrl": "http://james-ellis-i62i.squarespace.com", "baseUrl": "http://www.speedoswimsquads.com", "primaryDomain": "www.speedoswimsquads.com", "sslSetting": 1, "isHstsEnabled": false, "socialAccounts": [{ "serviceId": 64, "screenname": "Instagram", "addedOn": 1606283857852, "profileUrl": "https://www.instagram.com/speedoswimsquads_uae/?hl=en", "iconEnabled": true, "serviceName": "instagram-unauth" }], "typekitId": "", "statsMigrated": false, "imageMetadataProcessingEnabled": false, "screenshotId": "b2bc0404d934ab16e12f445da5577127625adcde57b9028104a0ddb2966bc0e6", "captchaSettings": { "enabledForDonations": false }, "showOwnerLogin": false }, "websiteSettings": { "id": "5469a994e4b0c0e088bf1897", "websiteId": "5469a994e4b0c0e088bf1895", "type": "Business", "subjects": [], "country": "AE", "state": "", "simpleLikingEnabled": false, "mobileInfoBarSettings": { "style": 2, "isContactEmailEnabled": true, "isContactPhoneNumberEnabled": true, "isLocationEnabled": true, "isBusinessHoursEnabled": true }, "announcementBarSettings": { "style": 2, "text": "<p class=\"\" style=\"white-space:pre-wrap;\">Term 1 Bookings Now Open - Contact Us now</p>", "clickthroughUrl": { "url": "/contact", "newWindow": false } }, "commentLikesAllowed": false, "commentAnonAllowed": false, "commentThreaded": false, "commentApprovalRequired": false, "commentAvatarsOn": false, "commentSortType": 2, "commentFlagThreshold": 0, "commentFlagsAllowed": false, "commentEnableByDefault": false, "commentDisableAfterDaysDefault": 0, "disqusShortname": "", "commentsEnabled": false, "contactPhoneNumber": "+97143549525", "businessHours": { "monday": { "text": "9am - 5pm", "ranges": [{ "from": 540, "to": 1020 }] }, "tuesday": { "text": "9am - 5pm", "ranges": [{ "from": 540, "to": 1020 }] }, "wednesday": { "text": "9am - 5pm", "ranges": [{ "from": 540, "to": 1020 }] }, "thursday": { "text": "9am - 5pm", "ranges": [{ "from": 540, "to": 1020 }] }, "friday": { "text": "9am - 1pm", "ranges": [{ "from": 540, "to": 780 }] }, "saturday": { "text": "9am - 1pm", "ranges": [{ "from": 540, "to": 780 }] }, "sunday": { "text": "9am - 5pm", "ranges": [{ "from": 540, "to": 1020 }] } }, "contactEmail": "info@speedoswimsquads.com", "storeSettings": { "returnPolicy": null, "termsOfService": null, "privacyPolicy": null, "expressCheckout": false, "continueShoppingLinkUrl": "/", "useLightCart": false, "showNoteField": false, "shippingCountryDefaultValue": "US", "billToShippingDefaultValue": false, "showShippingPhoneNumber": true, "isShippingPhoneRequired": false, "showBillingPhoneNumber": true, "isBillingPhoneRequired": false, "currenciesSupported": ["USD", "ARS", "AUD", "BRL", "CAD", "CHF", "COP", "CZK", "DKK", "EUR", "GBP", "HKD", "IDR", "ILS", "INR", "JPY", "MXN", "MYR", "NOK", "NZD", "PHP", "PLN", "RUB", "SEK", "SGD", "THB", "ZAR"], "defaultCurrency": "USD", "selectedCurrency": "USD", "measurementStandard": 1, "orderConfirmationInjectCode": "", "showCustomCheckoutForm": false, "checkoutPageMarketingOptInEnabled": false, "enableMailingListOptInByDefault": true, "sameAsRetailLocation": false, "merchandisingSettings": { "scarcityEnabledOnProductItems": false, "scarcityEnabledOnProductBlocks": false, "scarcityMessageType": "DEFAULT_SCARCITY_MESSAGE", "scarcityThreshold": 10, "multipleQuantityAllowedForServices": true, "restockNotificationsEnabled": false, "restockNotificationsMailingListSignUpEnabled": false, "relatedProductsEnabled": false, "relatedProductsOrdering": "random", "soldOutVariantsDropdownDisabled": false, "productComposerOptedIn": false, "productComposerABTestOptedOut": false, "productReviewsEnabled": false, "displayImportedProductReviewsEnabled": false, "hasOptedToCollectNativeReviews": false }, "isLive": true, "multipleQuantityAllowedForServices": true }, "useEscapeKeyToLogin": true, "ssBadgeType": 1, "ssBadgePosition": 4, "ssBadgeVisibility": 1, "ssBadgeDevices": 1, "pinterestOverlayOptions": { "mode": "disabled", "size": "small", "shape": "rect", "color": "white" }, "ampEnabled": false }, "cookieSettings": { "isCookieBannerEnabled": false, "isRestrictiveCookiePolicyEnabled": false, "isRestrictiveCookiePolicyAbsolute": false, "cookieBannerText": "", "cookieBannerTheme": "", "cookieBannerVariant": "", "cookieBannerPosition": "", "cookieBannerCtaVariant": "", "cookieBannerCtaText": "", "cookieBannerAcceptType": "OPT_IN", "cookieBannerOptOutCtaText": "" }, "websiteCloneable": false, "collection": { "title": "Contact Us", "id": "547e9f93e4b05ea9bd129fbd", "fullUrl": "/contact", "type": 10, "permissionType": 1 }, "subscribed": false, "appDomain": "squarespace.com", "templateTweakable": true, "tweakJSON": { "aspect-ratio": "Auto", "banner-slideshow-controls": "Arrows", "gallery-arrow-style": "No Background", "gallery-aspect-ratio": "3:2 Standard", "gallery-auto-crop": "true", "gallery-autoplay": "false", "gallery-design": "Grid", "gallery-info-overlay": "Show on Hover", "gallery-loop": "false", "gallery-navigation": "Bullets", "gallery-show-arrows": "true", "gallery-transitions": "Fade", "galleryArrowBackground": "rgba(34,34,34,1)", "galleryArrowColor": "rgba(255,255,255,1)", "galleryAutoplaySpeed": "3", "galleryCircleColor": "rgba(255,255,255,1)", "galleryInfoBackground": "rgba(0, 0, 0, .7)", "galleryThumbnailSize": "100px", "gridSize": "280px", "gridSpacing": "10px", "logoContainerWidth": "140px", "product-gallery-auto-crop": "false", "product-image-auto-crop": "true", "siteTitleContainerWidth": "360px", "tweak-v1-related-products-title-spacing": "50px" }, "templateId": "52a74dafe4b073a80cd253c5", "templateVersion": "7", "pageFeatures": [1, 2, 4], "gmRenderKey": "QUl6YVN5Q0JUUk9xNkx1dkZfSUUxcjQ2LVQ0QWVUU1YtMGQ3bXk4", "templateScriptsRootUrl": "https://static1.squarespace.com/static/ta/52a74d9ae4b0253945d2aee9/1043/scripts/", "betaFeatureFlags": ["crm_default_newsletter_block_to_campaigns", "campaigns_seasonal_inventory_page_banner", "member_areas_schedule_interview", "marketing_landing_page", "campaigns_global_uc_ab", "campaigns_discount_section_in_blasts", "fluid_engine_clean_up_grid_contextual_change", "campaigns_asset_picker", "fluid_engine", "fluid_engine_filtered_catalog_endpoints", "crm_retention_segment", "background_art_onboarding", "product_composer_feedback_form_on_save", "campaigns_new_subscriber_search", "commerce_order_status_access", "customer_accounts_email_verification", "customer_account_creation_recaptcha", "commerce_etsy_product_import", "block_annotations_revamp", "campaigns_content_editing_survey", "viewer-role-contributor-invites", "commerce_etsy_shipping_import", "commerce_clearpay", "campaigns_thumbnail_layout", "commerce_restock_notifications", "asset_uploader_refactor", "member_areas_spanish_interviews", "campaigns_new_image_layout_picker", "nested_categories_migration_enabled", "crm_remove_subscriber", "send_local_pickup_ready_email", "campaigns_show_featured_templates", "scheduling_block_schema_editor", "customer_account_creation_emails", "commerce_site_visitor_metrics"], "videoAssetsFeatureFlags": ["hls-playback", "mux-data-video-collection", "mux-data-video-block"], "impersonatedSession": false, "tzData": { "zones": [[240, null, "GST", null]], "rules": {} }, "showAnnouncementBar": true, "recaptchaEnterpriseContext": { "recaptchaEnterpriseSiteKey": "6LdDFQwjAAAAAPigEvvPgEVbb7QBm-TkVJdDTlAv" } };</script>
  <script>SquarespaceFonts.loadViaContext(); Squarespace.load(window);</script>
  <script
    type="application/ld+json">{"url":"http://www.speedoswimsquads.com","name":"Speedo Swim Squads Dubai","description":"<p>Welcome to the Home of <em>Speedo</em> Swim Squads Dubai. Our swim academy offers comprehensive swimming teaching and coaching programs for all abilities from beginner, advance swim, through to competitions at the national level.</p>","image":"//images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/1546686770099-IS12A8UQ1ORF0GWSGEXH/speedo_swimwquads_d01%2B%25281%2529.jpg","@context":"http://schema.org","@type":"WebSite"}</script>
  <script
    type="application/ld+json">{"legalName":"Speedo Swim Squads","address":"Al Barsha Business Point Building, Office 103\nDubai, Dubai, \nUnited Arab Emirates","email":"info@speedoswimsquads.com","telephone":"+97143549525","sameAs":["https://www.instagram.com/speedoswimsquads_uae/?hl=en"],"@context":"http://schema.org","@type":"Organization"}</script>
  <script
    type="application/ld+json">{"address":"Al Barsha Business Point Building, Office 103\nDubai, Dubai, \nUnited Arab Emirates","image":"https://static1.squarespace.com/static/5469a994e4b0c0e088bf1895/t/5c3090fd0ebbe80a256f8d50/1668756540887/","name":"Speedo Swim Squads","openingHours":"Mo 09:00-17:00, Tu 09:00-17:00, We 09:00-17:00, Th 09:00-17:00, Fr 09:00-13:00, Sa 09:00-13:00, Su 09:00-17:00","@context":"http://schema.org","@type":"LocalBusiness"}</script>
  <link rel="stylesheet" type="text/css"
    href="https://static1.squarespace.com/static/sitecss/5469a994e4b0c0e088bf1895/180/52a74dafe4b073a80cd253c5/547c0dabe4b09b5c213bbe14/1043/site.css">
  <meta name="google-site-verification" content="Bdv5-wXLJmZv7n9ur4KqvuBtB96yz-6yu3iL9CHOGyA">
  <script>Static.COOKIE_BANNER_CAPABLE = true;</script>
  <!-- End of Squarespace Headers -->
  <script>/* Must be below squarespace-headers */(function () { var e = 'ontouchstart' in window || navigator.msMaxTouchPoints; var t = document.documentElement; if (!e && t) { t.className = t.className.replace(/touch-styles/, '') } })()
  </script>
  <style type="text/css">
    .disable-hover:not(.sqs-layout-editing),
    .disable-hover:not(.sqs-layout-editing) * {
      pointer-events: none;
    }
  </style>
  <style type="text/css">
    div.eapps-widget {
      position: relative
    }

    div.eapps-widget.eapps-widget-show-toolbar:before {
      position: absolute;
      content: "";
      display: block;
      bottom: 0;
      top: 0;
      left: 0;
      right: 0;
      pointer-events: none;
      border: 1px solid transparent;
      transition: border .3s ease;
      z-index: 1
    }

    .eapps-widget-toolbar {
      position: absolute;
      top: -32px;
      left: 0;
      right: 0;
      display: block;
      z-index: 99999;
      padding-bottom: 4px;
      transition: all .3s ease;
      pointer-events: none;
      opacity: 0
    }

    .eapps-widget:hover .eapps-widget-toolbar {
      opacity: 1;
      pointer-events: auto
    }

    .eapps-widget-toolbar a {
      text-decoration: none;
      box-shadow: none !important
    }

    .eapps-widget-toolbar-panel {
      border-radius: 6px;
      background-color: #222;
      color: #fff;
      display: -ms-inline-flexbox;
      display: inline-flex;
      -ms-flex-align: center;
      align-items: center;
      top: 0;
      position: relative;
      transition: all .3s ease;
      opacity: 0;
      overflow: hidden;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .2);
      height: 28px
    }

    .eapps-widget:hover .eapps-widget-toolbar-panel {
      opacity: 1
    }

    .eapps-widget-toolbar-panel-wrapper {
      width: 100%;
      position: relative
    }

    .eapps-widget-toolbar-panel-only-you {
      position: absolute;
      top: -24px;
      font-size: 11px;
      line-height: 14px;
      color: #9c9c9c;
      padding: 5px 4px
    }

    .eapps-widget-toolbar-panel-logo {
      width: 28px;
      height: 28px;
      border-right: 1px solid hsla(0, 0%, 100%, .2);
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      -ms-flex-pack: center;
      justify-content: center
    }

    .eapps-widget-toolbar-panel-logo svg {
      display: block;
      width: 15px;
      height: 15px;
      fill: #f93262
    }

    .eapps-widget-toolbar-panel-edit {
      font-size: 12px;
      font-weight: 400;
      line-height: 14px;
      display: -ms-inline-flexbox;
      display: inline-flex;
      -ms-flex-align: center;
      align-items: center;
      padding: 9px;
      border-right: 1px solid hsla(0, 0%, 100%, .2);
      color: #fff;
      text-decoration: none
    }

    .eapps-widget-toolbar-panel-edit-icon {
      width: 14px;
      height: 14px;
      margin-right: 8px
    }

    .eapps-widget-toolbar-panel-edit-icon svg {
      display: block;
      width: 100%;
      height: 100%;
      fill: #fff
    }

    .eapps-widget-toolbar-panel-views {
      display: -ms-inline-flexbox;
      display: inline-flex;
      -ms-flex-pack: center;
      justify-content: center;
      -ms-flex-align: center;
      align-items: center
    }

    .eapps-widget-toolbar-panel-views-label {
      font-size: 12px;
      font-weight: 400;
      line-height: 14px;
      margin-left: 8px
    }

    .eapps-widget-toolbar-panel-views-bar {
      display: -ms-inline-flexbox;
      display: inline-flex;
      width: 70px;
      height: 3px;
      border-radius: 2px;
      margin-left: 8px;
      background-color: hsla(0, 0%, 100%, .3)
    }

    .eapps-widget-toolbar-panel-views-bar-inner {
      border-radius: 2px;
      background-color: #4ad504
    }

    .eapps-widget-toolbar-panel-views-green .eapps-widget-toolbar-panel-views-bar-inner {
      background-color: #4ad504
    }

    .eapps-widget-toolbar-panel-views-red .eapps-widget-toolbar-panel-views-bar-inner {
      background-color: #ff4734
    }

    .eapps-widget-toolbar-panel-views-orange .eapps-widget-toolbar-panel-views-bar-inner {
      background-color: #ffb400
    }

    .eapps-widget-toolbar-panel-views-percent {
      display: -ms-inline-flexbox;
      display: inline-flex;
      margin-left: 8px;
      margin-right: 8px;
      font-size: 12px;
      font-weight: 400;
      line-height: 14px
    }

    .eapps-widget-toolbar-panel-views-get-more {
      padding: 9px 16px;
      background-color: #f93262;
      color: #fff;
      font-size: 12px;
      font-weight: 400;
      border-radius: 0 6px 6px 0
    }

    .eapps-widget-toolbar-panel-share {
      position: absolute;
      top: 0;
      display: inline-block;
      margin-left: 8px;
      width: 83px;
      height: 28px;
      padding-bottom: 4px;
      box-sizing: content-box !important
    }

    .eapps-widget-toolbar-panel-share:hover .eapps-widget-toolbar-panel-share-block {
      opacity: 1;
      pointer-events: all
    }

    .eapps-widget-toolbar-panel-share-button {
      padding: 0 18px;
      height: 28px;
      background-color: #1c91ff;
      color: #fff;
      font-size: 12px;
      font-weight: 400;
      border-radius: 6px;
      position: absolute;
      top: 0;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: row;
      flex-direction: row;
      cursor: default;
      -ms-flex-align: center;
      align-items: center
    }

    .eapps-widget-toolbar-panel-share-button svg {
      display: inline-block;
      margin-right: 6px;
      fill: #fff;
      position: relative;
      top: -1px
    }

    .eapps-widget-toolbar-panel-share-block {
      position: absolute;
      background: #fff;
      border: 1px solid hsla(0, 0%, 7%, .1);
      border-radius: 10px;
      width: 209px;
      top: 32px;
      transform: translateX(-63px);
      opacity: 0;
      pointer-events: none;
      transition: all .3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, .05)
    }

    .eapps-widget-toolbar-panel-share-block:hover {
      opacity: 1;
      pointer-events: all
    }

    .eapps-widget-toolbar-panel-share-block-text {
      color: #111;
      font-size: 15px;
      font-weight: 400;
      padding: 12px 0;
      text-align: center
    }

    .eapps-widget-toolbar-panel-share-block-text-icon {
      padding-bottom: 4px
    }

    .eapps-widget-toolbar-panel-share-block-actions {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: row;
      flex-direction: row;
      border-top: 1px solid hsla(0, 0%, 7%, .1)
    }

    .eapps-widget-toolbar-panel-share-block-actions-item {
      width: 33.333333%;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-pack: center;
      justify-content: center;
      -ms-flex-align: center;
      align-items: center;
      height: 39px;
      transition: all .3s ease;
      background-color: transparent
    }

    .eapps-widget-toolbar-panel-share-block-actions-item:hover {
      background-color: #fafafa
    }

    .eapps-widget-toolbar-panel-share-block-actions-item a {
      width: 100%;
      height: 100%;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-pack: center;
      justify-content: center;
      -ms-flex-align: center;
      align-items: center
    }

    .eapps-widget-toolbar-panel-share-block-actions-item-icon {
      width: 16px;
      height: 16px;
      display: block
    }

    .eapps-widget-toolbar-panel-share-block-actions-item-facebook .eapps-widget-toolbar-panel-share-block-actions-item-icon {
      fill: #3c5a9b
    }

    .eapps-widget-toolbar-panel-share-block-actions-item-twitter .eapps-widget-toolbar-panel-share-block-actions-item-icon {
      fill: #1ab2e8
    }

    .eapps-widget-toolbar-panel-share-block-actions-item-google .eapps-widget-toolbar-panel-share-block-actions-item-icon {
      fill: #dd4b39
    }

    .eapps-widget-toolbar-panel-share-block-actions-item:not(:last-child) {
      border-right: 1px solid hsla(0, 0%, 7%, .1)
    }
  </style>
  <link href="https://apps.elfsight.com" rel="preconnect" crossorigin="">
  <link href="https://static.elfsight.com" rel="preconnect" crossorigin="">
  <link href="https://service-reviews-ultimate.elfsight.com" rel="preconnect" crossorigin="">
  <link href="https://storage.elfsight.com" rel="preconnect" crossorigin="">

  <a href="#" class="body-overlay"></a>
  
  <div id="sidecarNav">


    <div id="mobileNavWrapper" class="nav-wrapper" data-content-field="navigation-mobileNav">
      @include('pages.layout.mobile_nav')
    </div>



  </div>
  <div id="siteWrapper" class="clearfix">

    <div class="sqs-cart-dropzone" style="top: 153px;"></div>

    @include('pages.layout.nav')
    <div id="promotedGalleryWrapper" class="sqs-layout promoted-gallery-wrapper">
      <div class="row">
        <div class="col"></div>
      </div>
    </div>
    <main id="page" role="main">
      <div id="content" class="main-content " data-content-field="main-content "
        data-collection-id="547e9f93e4b05ea9bd129fbd" data-edit-main-image="">
        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1663570364078"
          id="page-547e9f93e4b05ea9bd129fbd">
          <div class="row sqs-row one">
            <div class="col sqs-col-12 span-12">
              <div class="sqs-block code-block sqs-block-code" data-block-type="23"
                id="block-yui_3_17_2_1_1663570323405_3339">
                <div class="sqs-block-content">
                  <script src="https://apps.elfsight.com/p/platform.js" defer=""></script>
                  <div class="elfsight-app-5e20a747-73d6-473c-aaa3-c6b524056582"></div>
                </div>
              </div>
              <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-8e72c3f5a7db6de06dc1">
                <div class="sqs-block-content">

                  <h1 style="white-space:pre-wrap;">Contact Us &amp; Fill Out Form Below:</h1>
                  <p ><strong>Established in 1995, Speedo Swim Squads is the
                      Premiere Swimming Academy in the UAE with over 15,000 alumni.&nbsp; Led by Caroline Potel, our
                      Swim Director &amp; French National Jr. Team Coach, we remain passionately relentless in our
                      pursuit of Swim Excellence.</strong></p>
                  <p >Our swimming academy comprehensively covers all ages &amp;
                    levels from baby swim,&nbsp;learn to swim, early training &amp; development, adult Tri-Swim, to
                    international level competition training.</p>
                  <p >For general inquiries and questions, please contact us:</p>
                  <p style="margin-left:40px;white-space:pre-wrap;" class="">By Email: <strong>info@speedoswimsquads.com
                    </strong></p>
                  <p style="margin-left:40px;white-space:pre-wrap;" class="">By Phone:&nbsp;<strong>+971 4 354
                      9525</strong></p>
                  <p >Speedo Swim Squads Office Hours are: &nbsp;<strong>Monday -
                      Friday between 9:00 and 17:00 </strong></p>
                  <p ><strong>FILL OUT FORM BELOW TO GET THE PROCESS
                      STARTED!</strong></p>


                </div>
              </div>
              <div class="sqs-block button-block sqs-block-button" data-block-type="53"
                id="block-yui_3_17_2_1_1524027508356_8002">
                <div class="sqs-block-content" id="yui_3_17_2_1_1669738308858_117">

                  <div class="sqs-block-button-container sqs-block-button-container--center"
                    data-animation-role="button" data-alignment="center" data-button-size="small"
                    data-button-type="tertiary" id="yui_3_17_2_1_1669738308858_116">
                    <a href="https://www.instagram.com/speedoswimsquads_uae/?hl=en"
                      class="sqs-block-button-element--small sqs-button-element--tertiary sqs-block-button-element"
                      data-initialized="true">
                      Follow Us on Instagram
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--
        -->

    </main>

    <div id="preFooter" class="">
      <div class="pre-footer-inner">
        <div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Pre-Footer Content" data-type="block-field"
          data-updated-on="1649245618601" id="preFooterBlocks">
          <div class="row sqs-row">
            <div class="col sqs-col-6 span-6">
              <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                id="block-yui_3_17_2_1_1410979096848_3228">
                <div class="sqs-block-content">

                  <h2 style="white-space:pre-wrap;"><strong>JOIN US FOR A SWIM.</strong></h2>


                </div>
              </div>
            </div>
            <div class="col sqs-col-6 span-6">
              <div class="sqs-block button-block sqs-block-button" data-block-type="53"
                id="block-yui_3_17_2_1_1410979096848_6610">
                <div class="sqs-block-content" id="yui_3_17_2_1_1669738308858_124">

                  <div class="sqs-block-button-container sqs-block-button-container--right" data-animation-role="button"
                    data-alignment="right" data-button-size="small" data-button-type="tertiary"
                    id="yui_3_17_2_1_1669738308858_123">
                    <a href="/contact"
                      class="sqs-block-button-element--small sqs-button-element--tertiary sqs-block-button-element"
                      data-initialized="true">
                      START THE PROCESS →
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer id="footer" role="contentinfo">
      <div class="footer-inner">
        <div class="nav-wrapper back-to-top-nav">
          <nav>
            <div class="back-to-top"><a href="#header">Back to Top</a></div>
          </nav>
        </div>



        <div id="siteInfo"><span class="site-address">Speedo Swim Squads, Al Barsha Business Point Building, Office 103,
            Dubai, Dubai, , United Arab Emirates</span><span rel="tel" class="site-phone">+97143549525</span><a
            href="mailto:info@speedoswimsquads.com" class="site-email"><span>info@speedoswimsquads.com</span></a></div>
        <div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Footer Content" data-type="block-field"
          data-updated-on="1536992019695" id="footerBlocks">
          <div class="row sqs-row">
            <div class="col sqs-col-12 span-12">
              <div class="sqs-block socialaccountlinks-v2-block sqs-block-socialaccountlinks-v2" data-block-type="54"
                id="block-yui_3_17_2_42_1423131529018_11394">
                <div class="sqs-block-content">



                  <div
                    class="sqs-svg-icon--outer social-icon-alignment-center social-icons-color-white social-icons-size-extra-large social-icons-style-regular ">
                    <style>
                      #block-yui_3_17_2_42_1423131529018_11394 .social-icons-style-border .sqs-svg-icon--wrapper {

                        box-shadow: 0 0 0 2px inset;

                        border: none;
                      }
                    </style>
                    <nav class="sqs-svg-icon--list">
                      <a href="https://www.instagram.com/speedoswimsquads_uae/?hl=en" target="_blank"
                        class="sqs-svg-icon--wrapper instagram-unauth" aria-label="Instagram">
                        <div>
                          <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                            <use class="sqs-use--icon" xlink:href="#instagram-unauth-icon"></use>
                            <use class="sqs-use--mask" xlink:href="#instagram-unauth-mask"></use>
                          </svg>
                        </div>
                      </a>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>

  <script src="https://static1.squarespace.com/static/ta/52a74d9ae4b0253945d2aee9/1043/scripts/site-bundle.js"
    type="text/javascript"></script>
  <script
    data-sqs-type="imageloader-bootstrapper">if (window.ImageLoader) window.ImageLoader.bootstrap({}, document);</script>
  <script>Squarespace.afterBodyLoad(Y);</script><svg xmlns="http://www.w3.org/2000/svg" version="1.1"
    style="display:none" data-usage="social-icons-svg">
    <symbol id="instagram-unauth-icon" viewBox="0 0 64 64">
      <path
        d="M46.91,25.816c-0.073-1.597-0.326-2.687-0.697-3.641c-0.383-0.986-0.896-1.823-1.73-2.657c-0.834-0.834-1.67-1.347-2.657-1.73c-0.954-0.371-2.045-0.624-3.641-0.697C36.585,17.017,36.074,17,32,17s-4.585,0.017-6.184,0.09c-1.597,0.073-2.687,0.326-3.641,0.697c-0.986,0.383-1.823,0.896-2.657,1.73c-0.834,0.834-1.347,1.67-1.73,2.657c-0.371,0.954-0.624,2.045-0.697,3.641C17.017,27.415,17,27.926,17,32c0,4.074,0.017,4.585,0.09,6.184c0.073,1.597,0.326,2.687,0.697,3.641c0.383,0.986,0.896,1.823,1.73,2.657c0.834,0.834,1.67,1.347,2.657,1.73c0.954,0.371,2.045,0.624,3.641,0.697C27.415,46.983,27.926,47,32,47s4.585-0.017,6.184-0.09c1.597-0.073,2.687-0.326,3.641-0.697c0.986-0.383,1.823-0.896,2.657-1.73c0.834-0.834,1.347-1.67,1.73-2.657c0.371-0.954,0.624-2.045,0.697-3.641C46.983,36.585,47,36.074,47,32S46.983,27.415,46.91,25.816z M44.21,38.061c-0.067,1.462-0.311,2.257-0.516,2.785c-0.272,0.7-0.597,1.2-1.122,1.725c-0.525,0.525-1.025,0.85-1.725,1.122c-0.529,0.205-1.323,0.45-2.785,0.516c-1.581,0.072-2.056,0.087-6.061,0.087s-4.48-0.015-6.061-0.087c-1.462-0.067-2.257-0.311-2.785-0.516c-0.7-0.272-1.2-0.597-1.725-1.122c-0.525-0.525-0.85-1.025-1.122-1.725c-0.205-0.529-0.45-1.323-0.516-2.785c-0.072-1.582-0.087-2.056-0.087-6.061s0.015-4.48,0.087-6.061c0.067-1.462,0.311-2.257,0.516-2.785c0.272-0.7,0.597-1.2,1.122-1.725c0.525-0.525,1.025-0.85,1.725-1.122c0.529-0.205,1.323-0.45,2.785-0.516c1.582-0.072,2.056-0.087,6.061-0.087s4.48,0.015,6.061,0.087c1.462,0.067,2.257,0.311,2.785,0.516c0.7,0.272,1.2,0.597,1.725,1.122c0.525,0.525,0.85,1.025,1.122,1.725c0.205,0.529,0.45,1.323,0.516,2.785c0.072,1.582,0.087,2.056,0.087,6.061S44.282,36.48,44.21,38.061z M32,24.297c-4.254,0-7.703,3.449-7.703,7.703c0,4.254,3.449,7.703,7.703,7.703c4.254,0,7.703-3.449,7.703-7.703C39.703,27.746,36.254,24.297,32,24.297z M32,37c-2.761,0-5-2.239-5-5c0-2.761,2.239-5,5-5s5,2.239,5,5C37,34.761,34.761,37,32,37z M40.007,22.193c-0.994,0-1.8,0.806-1.8,1.8c0,0.994,0.806,1.8,1.8,1.8c0.994,0,1.8-0.806,1.8-1.8C41.807,22.999,41.001,22.193,40.007,22.193z">
      </path>
    </symbol>
    <symbol id="instagram-unauth-mask" viewBox="0 0 64 64">
      <path
        d="M43.693,23.153c-0.272-0.7-0.597-1.2-1.122-1.725c-0.525-0.525-1.025-0.85-1.725-1.122c-0.529-0.205-1.323-0.45-2.785-0.517c-1.582-0.072-2.056-0.087-6.061-0.087s-4.48,0.015-6.061,0.087c-1.462,0.067-2.257,0.311-2.785,0.517c-0.7,0.272-1.2,0.597-1.725,1.122c-0.525,0.525-0.85,1.025-1.122,1.725c-0.205,0.529-0.45,1.323-0.516,2.785c-0.072,1.582-0.087,2.056-0.087,6.061s0.015,4.48,0.087,6.061c0.067,1.462,0.311,2.257,0.516,2.785c0.272,0.7,0.597,1.2,1.122,1.725s1.025,0.85,1.725,1.122c0.529,0.205,1.323,0.45,2.785,0.516c1.581,0.072,2.056,0.087,6.061,0.087s4.48-0.015,6.061-0.087c1.462-0.067,2.257-0.311,2.785-0.516c0.7-0.272,1.2-0.597,1.725-1.122s0.85-1.025,1.122-1.725c0.205-0.529,0.45-1.323,0.516-2.785c0.072-1.582,0.087-2.056,0.087-6.061s-0.015-4.48-0.087-6.061C44.143,24.476,43.899,23.682,43.693,23.153z M32,39.703c-4.254,0-7.703-3.449-7.703-7.703s3.449-7.703,7.703-7.703s7.703,3.449,7.703,7.703S36.254,39.703,32,39.703z M40.007,25.793c-0.994,0-1.8-0.806-1.8-1.8c0-0.994,0.806-1.8,1.8-1.8c0.994,0,1.8,0.806,1.8,1.8C41.807,24.987,41.001,25.793,40.007,25.793z M0,0v64h64V0H0z M46.91,38.184c-0.073,1.597-0.326,2.687-0.697,3.641c-0.383,0.986-0.896,1.823-1.73,2.657c-0.834,0.834-1.67,1.347-2.657,1.73c-0.954,0.371-2.044,0.624-3.641,0.697C36.585,46.983,36.074,47,32,47s-4.585-0.017-6.184-0.09c-1.597-0.073-2.687-0.326-3.641-0.697c-0.986-0.383-1.823-0.896-2.657-1.73c-0.834-0.834-1.347-1.67-1.73-2.657c-0.371-0.954-0.624-2.044-0.697-3.641C17.017,36.585,17,36.074,17,32c0-4.074,0.017-4.585,0.09-6.185c0.073-1.597,0.326-2.687,0.697-3.641c0.383-0.986,0.896-1.823,1.73-2.657c0.834-0.834,1.67-1.347,2.657-1.73c0.954-0.371,2.045-0.624,3.641-0.697C27.415,17.017,27.926,17,32,17s4.585,0.017,6.184,0.09c1.597,0.073,2.687,0.326,3.641,0.697c0.986,0.383,1.823,0.896,2.657,1.73c0.834,0.834,1.347,1.67,1.73,2.657c0.371,0.954,0.624,2.044,0.697,3.641C46.983,27.415,47,27.926,47,32C47,36.074,46.983,36.585,46.91,38.184z M32,27c-2.761,0-5,2.239-5,5s2.239,5,5,5s5-2.239,5-5S34.761,27,32,27z">
      </path>
    </symbol>
  </svg>



  <!-- Code injected by live-server -->
  <script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
      (function () {
        function refreshCSS() {
          var sheets = [].slice.call(document.getElementsByTagName("link"));
          var head = document.getElementsByTagName("head")[0];
          for (var i = 0; i < sheets.length; ++i) {
            var elem = sheets[i];
            var parent = elem.parentElement || head;
            parent.removeChild(elem);
            var rel = elem.rel;
            if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
              var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
              elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
            }
            parent.appendChild(elem);
          }
        }
        var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
        var address = protocol + window.location.host + window.location.pathname + '/ws';
        var socket = new WebSocket(address);
        socket.onmessage = function (msg) {
          if (msg.data == 'reload') window.location.reload();
          else if (msg.data == 'refreshcss') refreshCSS();
        };
        if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
          console.log('Live reload enabled.');
          sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
        }
      })();
    }
    else {
      console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
	// ]]>
  </script>
</body>

</html>