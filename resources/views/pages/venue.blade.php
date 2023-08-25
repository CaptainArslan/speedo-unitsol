<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" lang="en-US"
  class="yui3-js-enabled js flexbox canvas canvastext webgl no-touch hashchange history draganddrop rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms no-csstransforms3d csstransitions video audio svg inlinesvg svgclippaths wf-calluna-n3-active wf-calluna-n4-active wf-calluna-n7-active wf-calluna-i7-active wf-europa-n3-active wf-europa-n4-active wf-europa-n7-active wf-europa-i4-active wf-europa-i7-active wf-active js flexbox canvas canvastext webgl no-touch hashchange history draganddrop rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms no-csstransforms3d csstransitions video audio svg inlinesvg svgclippaths"
  style="" id="yui_3_17_2_1_1672764304455_157">

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

<body id="collection-547aca99e4b067a185ed131b"
  class="nav-button-style-solid nav-button-corner-style-square banner-button-style-solid banner-button-corner-style-square banner-slideshow-controls-arrows meta-priority-date hide-entry-author hide-list-entry-footer hide-blog-sidebar center-navigation--info event-thumbnails event-thumbnail-size-32-standard event-date-label event-date-label-time event-list-show-cats event-list-date event-list-time event-list-address event-icalgcal-links event-excerpts event-item-back-link gallery-design-grid aspect-ratio-auto lightbox-style-light gallery-navigation-bullets gallery-info-overlay-show-on-hover gallery-aspect-ratio-32-standard gallery-arrow-style-no-background gallery-transitions-fade gallery-show-arrows gallery-auto-crop product-list-titles-under product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center newsletter-style-light opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-solid medium-button-shape-square large-button-style-solid large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-dynamic-font-sizing image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-dynamic-font-sizing image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-dynamic-font-sizing image-block-stack-text-alignment-left button-style-solid button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light native-currency-code-usd collection-type-page collection-layout-default collection-547aca99e4b067a185ed131b mobile-style-available force-mobile-nav"
  cz-shortcut-listen="true">
  <div id="yui3-css-stamp" style="position: absolute !important; visibility: hidden !important"></div>


  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    html {
      scroll-behavior: smooth;
    }

    .fonti li a {
      font-family: sans-serif;
      word-spacing: -1px;
      letter-spacing: 1px;
    }

    .fixed {
      width: 255px;
      position: sticky;
      left: 0%;
      top: 5%;
      float: left;
    }
  </style>

  <!-- This is Squarespace. -->
  <!-- james-ellis-i62i -->
  <script charset="utf-8" id="yui_3_17_2_1_1669769601720_139"
    src="{{asset("main/javascript/announcement-bar-d477516abab83e8704450-min.en-US.js")}}"></script>
  <script charset="utf-8" id="yui_3_17_2_1_1672764304455_197"
    src="{{asset("main/javascript/announcement-bar-d477516abab83e8704450-min.en-US.js")}}"></script>
  <base href="">
  <meta charset="utf-8">
  <title>Registration &amp; Assessment — Speedo Swim Squads Dubai</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('main/pics/favicon.png')}}">
  <link rel="canonical" href="http://www.speedoswimsquads.com/registration-assessment">
  <meta property="og:site_name" content="Speedo Swim Squads Dubai">
  <meta property="og:title" content="Registration &amp; Assessment — Speedo Swim Squads Dubai">
  <meta property="og:url" content="http://www.speedoswimsquads.com/registration-assessment">
  <meta property="og:type" content="website">
  <meta property="og:image"
    content="http://static1.squarespace.com/static/5469a994e4b0c0e088bf1895/t/5c309094758d4678746d2cbb/1546686657536/speedo_swimwquads_d01%2B%25281%2529.jpg?format=1500w">
  <meta property="og:image:width" content="1500">
  <meta property="og:image:height" content="1000">
  <meta itemprop="name" content="Registration &amp; Assessment — Speedo Swim Squads Dubai">
  <meta itemprop="url" content="http://www.speedoswimsquads.com/registration-assessment">
  <meta itemprop="thumbnailUrl"
    content="http://static1.squarespace.com/static/5469a994e4b0c0e088bf1895/t/5c309094758d4678746d2cbb/1546686657536/speedo_swimwquads_d01%2B%25281%2529.jpg?format=1500w">
  <link rel="image_src" href="\{{asset('main/pics/speedo_swimwquads.jpg')}}">
  <meta itemprop="image"
    content="http://static1.squarespace.com/static/5469a994e4b0c0e088bf1895/t/5c309094758d4678746d2cbb/1546686657536/speedo_swimwquads_d01%2B%25281%2529.jpg?format=1500w">
  <meta name="twitter:title" content="Registration &amp; Assessment — Speedo Swim Squads Dubai">
  <meta name="twitter:image"
    content="http://static1.squarespace.com/static/5469a994e4b0c0e088bf1895/t/5c309094758d4678746d2cbb/1546686657536/speedo_swimwquads_d01%2B%25281%2529.jpg?format=1500w">
  <meta name="twitter:url" content="http://www.speedoswimsquads.com/registration-assessment">
  <meta name="twitter:card" content="summary">
  <meta name="description" content="">
  <link rel="preconnect" href="https://images.squarespace-cdn.com">
  <script type="text/javascript" src="{{asset('main/javascript/use.typekit.net.js')}}"></script>
  <style type="text/css">
    @font-face {
      font-family: calluna;
      src: url(https://use.typekit.net/af/bccc98/000000000000000000014868/27/l?subset_id=2&fvd=n3&v=3) format("woff2"), url(https://use.typekit.net/af/bccc98/000000000000000000014868/27/d?subset_id=2&fvd=n3&v=3) format("woff"), url(https://use.typekit.net/af/bccc98/000000000000000000014868/27/a?subset_id=2&fvd=n3&v=3) format("opentype");
      font-weight: 300;
      font-style: normal;
      font-stretch: normal;
      font-display: auto;
    }

    @font-face {
      font-family: calluna;
      src: url(https://use.typekit.net/af/32f92a/000000000000000000014869/27/l?subset_id=2&fvd=n4&v=3) format("woff2"), url(https://use.typekit.net/af/32f92a/000000000000000000014869/27/d?subset_id=2&fvd=n4&v=3) format("woff"), url(https://use.typekit.net/af/32f92a/000000000000000000014869/27/a?subset_id=2&fvd=n4&v=3) format("opentype");
      font-weight: 400;
      font-style: normal;
      font-stretch: normal;
      font-display: auto;
    }

    @font-face {
      font-family: calluna;
      src: url(https://use.typekit.net/af/9e56a2/00000000000000000001486d/27/l?subset_id=2&fvd=n7&v=3) format("woff2"), url(https://use.typekit.net/af/9e56a2/00000000000000000001486d/27/d?subset_id=2&fvd=n7&v=3) format("woff"), url(https://use.typekit.net/af/9e56a2/00000000000000000001486d/27/a?subset_id=2&fvd=n7&v=3) format("opentype");
      font-weight: 700;
      font-style: normal;
      font-stretch: normal;
      font-display: auto;
    }

    @font-face {
      font-family: calluna;
      src: url(https://use.typekit.net/af/c0faa1/00000000000000000001486e/27/l?subset_id=2&fvd=i7&v=3) format("woff2"), url(https://use.typekit.net/af/c0faa1/00000000000000000001486e/27/d?subset_id=2&fvd=i7&v=3) format("woff"), url(https://use.typekit.net/af/c0faa1/00000000000000000001486e/27/a?subset_id=2&fvd=i7&v=3) format("opentype");
      font-weight: 700;
      font-style: italic;
      font-stretch: normal;
      font-display: auto;
    }

    @font-face {
      font-family: europa;
      src: url(https://use.typekit.net/af/821a05/00000000000000007735a082/30/l?subset_id=2&fvd=n3&v=3) format("woff2"), url(https://use.typekit.net/af/821a05/00000000000000007735a082/30/d?subset_id=2&fvd=n3&v=3) format("woff"), url(https://use.typekit.net/af/821a05/00000000000000007735a082/30/a?subset_id=2&fvd=n3&v=3) format("opentype");
      font-weight: 300;
      font-style: normal;
      font-stretch: normal;
      font-display: auto;
    }

    @font-face {
      font-family: europa;
      src: url(https://use.typekit.net/af/1db03a/00000000000000007735a08e/30/l?subset_id=2&fvd=n4&v=3) format("woff2"), url(https://use.typekit.net/af/1db03a/00000000000000007735a08e/30/d?subset_id=2&fvd=n4&v=3) format("woff"), url(https://use.typekit.net/af/1db03a/00000000000000007735a08e/30/a?subset_id=2&fvd=n4&v=3) format("opentype");
      font-weight: 400;
      font-style: normal;
      font-stretch: normal;
      font-display: auto;
    }

    @font-face {
      font-family: europa;
      src: url(https://use.typekit.net/af/ebcd51/00000000000000007735a081/30/l?subset_id=2&fvd=n7&v=3) format("woff2"), url(https://use.typekit.net/af/ebcd51/00000000000000007735a081/30/d?subset_id=2&fvd=n7&v=3) format("woff"), url(https://use.typekit.net/af/ebcd51/00000000000000007735a081/30/a?subset_id=2&fvd=n7&v=3) format("opentype");
      font-weight: 700;
      font-style: normal;
      font-stretch: normal;
      font-display: auto;
    }

    @font-face {
      font-family: europa;
      src: url(https://use.typekit.net/af/40cfbf/00000000000000007735a08f/30/l?subset_id=2&fvd=i4&v=3) format("woff2"), url(https://use.typekit.net/af/40cfbf/00000000000000007735a08f/30/d?subset_id=2&fvd=i4&v=3) format("woff"), url(https://use.typekit.net/af/40cfbf/00000000000000007735a08f/30/a?subset_id=2&fvd=i4&v=3) format("opentype");
      font-weight: 400;
      font-style: italic;
      font-stretch: normal;
      font-display: auto;
    }

    @font-face {
      font-family: europa;
      src: url(https://use.typekit.net/af/2a1b80/00000000000000007735a09e/30/l?subset_id=2&fvd=i7&v=3) format("woff2"), url(https://use.typekit.net/af/2a1b80/00000000000000007735a09e/30/d?subset_id=2&fvd=i7&v=3) format("woff"), url(https://use.typekit.net/af/2a1b80/00000000000000007735a09e/30/a?subset_id=2&fvd=i7&v=3) format("opentype");
      font-weight: 700;
      font-style: italic;
      font-stretch: normal;
      font-display: auto;
    }
  </style>
  <script type="text/javascript">try { Typekit.load(); } catch (e) { }</script>
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700">
  <script type="text/javascript" crossorigin="anonymous" nomodule="nomodule"
    src="{{asset('main/javascript/polyfiller 1.2.2 legacy.js')}}"></script>
  <script type="text/javascript" crossorigin="anonymous"
    src="{{asset('main/javascript/modern.js')}}"></script>
  <script type="text/javascript">SQUARESPACE_ROLLUPS = {};</script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = [{{asset('main/javascript/extract-css-runtime-min.en-US.js')}}]; })(SQUARESPACE_ROLLUPS, 'squarespace-extract_css_runtime');</script>
  <script crossorigin="anonymous"
    src="{{asset('main/javascript/extract-css-runtime-min.en-US.js')}}"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = [{{asset('main/javascript/extract-css-moment-js-vendor-min.en-US.js')}}]; })(SQUARESPACE_ROLLUPS, 'squarespace-extract_css_moment_js_vendor');</script>
  <script crossorigin="anonymous"
    src="{{asset("main/javascript/extract-css-moment-js-vendor-min.en-US.js")}}"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = [{{asset("main/javascript/cldr-resource-pack-min.en-US.js")}}]; })(SQUARESPACE_ROLLUPS, 'squarespace-cldr_resource_pack');</script>
  <script crossorigin="anonymous"
    src="{{asset("main/javascript/cldr-resource-pack-min.en-US.js")}}"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = [{{asset('main/javascript/common-vendors-stable-min.en-US.js')}}]; })(SQUARESPACE_ROLLUPS, 'squarespace-common_vendors_stable');</script>
  <script crossorigin="anonymous"
    src="{{asset('main/javascript/common-vendors-stable-min.en-US.js')}}"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = [{{asset("main/javascript/common-vendors-min.en-US.js")}}]; })(SQUARESPACE_ROLLUPS, 'squarespace-common_vendors');</script>
  <script crossorigin="anonymous" src="{{asset("main/javascript/common-vendors-min.en-US.js")}}"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = [{{asset("main/javascript/common-min.en-US.js")}}]; })(SQUARESPACE_ROLLUPS, 'squarespace-common');</script>
  <script crossorigin="anonymous" src="{{asset("main/javascript/common-min.en-US.js")}}"></script>
  <script>(function (rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = [{{asset('main/javascript/performance-min.en-US.js')}}]; })(SQUARESPACE_ROLLUPS, 'squarespace-performance');</script>
  <script crossorigin="anonymous" src="{{asset('main/javascript/performance-min.en-US.js')}}"
    defer=""></script>
  <script
    data-name="static-context">Static = window.Static || {}; Static.SQUARESPACE_CONTEXT = { "facebookAppId": "314192535267336", "facebookApiVersion": "v6.0", "rollups": { "squarespace-announcement-bar": { "js": "//assets.squarespace.com/universal/scripts-compressed/announcement-bar-d477516abab83e8704450-min.en-US.js" }, "squarespace-audio-player": { "css": "//assets.squarespace.com/universal/styles-compressed/audio-player-702bf18174efe0acaa8ce-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/audio-player-3f8ef5d9fdd2a52aeebdf-min.en-US.js" }, "squarespace-blog-collection-list": { "css": "//assets.squarespace.com/universal/styles-compressed/blog-collection-list-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/blog-collection-list-a9d6e2a5fc511c5f6dd74-min.en-US.js" }, "squarespace-calendar-block-renderer": { "css": "//assets.squarespace.com/universal/styles-compressed/calendar-block-renderer-49c4a5f3dae67a728e3f4-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/calendar-block-renderer-8e3e0734c85178000cf34-min.en-US.js" }, "squarespace-chartjs-helpers": { "css": "//assets.squarespace.com/universal/styles-compressed/chartjs-helpers-53c004ac7d4bde1c92e38-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/chartjs-helpers-bca157842d796c92d50c9-min.en-US.js" }, "squarespace-comments": { "css": "//assets.squarespace.com/universal/styles-compressed/comments-91e23fb14e407e3111565-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/comments-5d47b578edaadb02aba26-min.en-US.js" }, "squarespace-dialog": { "css": "//assets.squarespace.com/universal/styles-compressed/dialog-89b254b5c87045b9e1360-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/dialog-c687fcda3e43a385e4ab3-min.en-US.js" }, "squarespace-events-collection": { "css": "//assets.squarespace.com/universal/styles-compressed/events-collection-49c4a5f3dae67a728e3f4-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/events-collection-8c3d66ee8b3e79f91ded0-min.en-US.js" }, "squarespace-form-rendering-utils": { "js": "//assets.squarespace.com/universal/scripts-compressed/form-rendering-utils-78808b0eec5e8a3153790-min.en-US.js" }, "squarespace-forms": { "css": "//assets.squarespace.com/universal/styles-compressed/forms-4a16a8a8c965386db2173-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/forms-a9dd557913aa7b8f1136c-min.en-US.js" }, "squarespace-gallery-collection-list": { "css": "//assets.squarespace.com/universal/styles-compressed/gallery-collection-list-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/gallery-collection-list-df911470e9b09f49f1e70-min.en-US.js" }, "squarespace-image-zoom": { "css": "//assets.squarespace.com/universal/styles-compressed/image-zoom-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/image-zoom-0eab58eaec9ee30292230-min.en-US.js" }, "squarespace-pinterest": { "css": "//assets.squarespace.com/universal/styles-compressed/pinterest-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/pinterest-bc7340144689b8d9123cb-min.en-US.js" }, "squarespace-popup-overlay": { "css": "//assets.squarespace.com/universal/styles-compressed/popup-overlay-948192219c3257f767ec5-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/popup-overlay-2e6dfa3e54086d695143e-min.en-US.js" }, "squarespace-product-quick-view": { "css": "//assets.squarespace.com/universal/styles-compressed/product-quick-view-4a16a8a8c965386db2173-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/product-quick-view-460de5483169877bf5383-min.en-US.js" }, "squarespace-products-collection-item-v2": { "css": "//assets.squarespace.com/universal/styles-compressed/products-collection-item-v2-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/products-collection-item-v2-303bca704fff9dc18e45d-min.en-US.js" }, "squarespace-products-collection-list-v2": { "css": "//assets.squarespace.com/universal/styles-compressed/products-collection-list-v2-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/products-collection-list-v2-a9c6ec1696c82409bd013-min.en-US.js" }, "squarespace-search-page": { "css": "//assets.squarespace.com/universal/styles-compressed/search-page-9d0a55de1efafbb9218e1-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/search-page-08f7e8d6217925f6b8874-min.en-US.js" }, "squarespace-search-preview": { "js": "//assets.squarespace.com/universal/scripts-compressed/search-preview-2e1ab29441dc195a8a6fc-min.en-US.js" }, "squarespace-simple-liking": { "css": "//assets.squarespace.com/universal/styles-compressed/simple-liking-ef94529873378652e6e86-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/simple-liking-000ca46b0287522a4ecd4-min.en-US.js" }, "squarespace-social-buttons": { "css": "//assets.squarespace.com/universal/styles-compressed/social-buttons-1f18e025ea682ade6293a-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/social-buttons-4181ec45180418a082544-min.en-US.js" }, "squarespace-tourdates": { "css": "//assets.squarespace.com/universal/styles-compressed/tourdates-3d55c64c25996c7633fc2-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/tourdates-3fc4e93c9d4b655cf609d-min.en-US.js" }, "squarespace-website-overlays-manager": { "css": "//assets.squarespace.com/universal/styles-compressed/website-overlays-manager-7cecc648f858e6f692130-min.en-US.css", "js": "//assets.squarespace.com/universal/scripts-compressed/website-overlays-manager-2836b9e288275e08ca1c2-min.en-US.js" } }, "pageType": 2, "website": { "id": "5469a994e4b0c0e088bf1895", "identifier": "james-ellis-i62i", "websiteType": 1, "contentModifiedOn": 1668756540887, "cloneable": false, "hasBeenCloneable": false, "siteStatus": {}, "language": "en-US", "timeZone": "Asia/Dubai", "machineTimeZoneOffset": 14400000, "timeZoneOffset": 14400000, "timeZoneAbbr": "GST", "siteTitle": "Speedo Swim Squads Dubai", "fullSiteTitle": "Registration & Assessment \u2014 Speedo Swim Squads Dubai", "siteTagLine": "Welcome to the Home of Speedo Swim Squads Dubai. Our club offers swimming teaching and coaching for all abilities from beginner through to national level.", "siteDescription": "<p>Welcome to the Home of <em>Speedo</em> Swim Squads Dubai. Our swim academy offers comprehensive swimming teaching and coaching programs for all abilities from beginner, advance swim, through to competitions at the national level.</p>", "location": { "mapZoom": 12.0, "mapLat": 25.2048493, "mapLng": 55.270782800000006, "markerLat": 25.2048493, "markerLng": 55.270782800000006, "addressTitle": "Speedo Swim Squads", "addressLine1": "Al Barsha Business Point Building, Office 103", "addressLine2": "Dubai, Dubai, ", "addressCountry": "United Arab Emirates" }, "logoImageId": "5c3090fd0ebbe80a256f8d50", "socialLogoImageId": "5c309094758d4678746d2cbb", "shareButtonOptions": { "1": true, "2": true }, "logoImageUrl": "//images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/1546686770099-IS12A8UQ1ORF0GWSGEXH/speedo_swimwquads_d01%2B%25281%2529.jpg", "socialLogoImageUrl": "//images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/1546686654378-KSQ00U6L1ZF82GVRPJ7P/speedo_swimwquads_d01%2B%25281%2529.jpg", "authenticUrl": "http://www.speedoswimsquads.com", "internalUrl": "http://james-ellis-i62i.squarespace.com", "baseUrl": "http://www.speedoswimsquads.com", "primaryDomain": "www.speedoswimsquads.com", "sslSetting": 1, "isHstsEnabled": false, "socialAccounts": [{ "serviceId": 64, "screenname": "Instagram", "addedOn": 1606283857852, "profileUrl": "https://www.instagram.com/speedoswimsquads_uae/?hl=en", "iconEnabled": true, "serviceName": "instagram-unauth" }], "typekitId": "", "statsMigrated": false, "imageMetadataProcessingEnabled": false, "screenshotId": "b2bc0404d934ab16e12f445da5577127625adcde57b9028104a0ddb2966bc0e6", "captchaSettings": { "enabledForDonations": false }, "showOwnerLogin": false }, "websiteSettings": { "id": "5469a994e4b0c0e088bf1897", "websiteId": "5469a994e4b0c0e088bf1895", "type": "Business", "subjects": [], "country": "AE", "state": "", "simpleLikingEnabled": false, "mobileInfoBarSettings": { "style": 2, "isContactEmailEnabled": true, "isContactPhoneNumberEnabled": true, "isLocationEnabled": true, "isBusinessHoursEnabled": true }, "announcementBarSettings": { "style": 2, "text": "<p class=\"\" style=\"white-space:pre-wrap;\">Term 1 Bookings Now Open - Contact Us now</p>", "clickthroughUrl": { "url": "/contact", "newWindow": false } }, "commentLikesAllowed": false, "commentAnonAllowed": false, "commentThreaded": false, "commentApprovalRequired": false, "commentAvatarsOn": false, "commentSortType": 2, "commentFlagThreshold": 0, "commentFlagsAllowed": false, "commentEnableByDefault": false, "commentDisableAfterDaysDefault": 0, "disqusShortname": "", "commentsEnabled": false, "contactPhoneNumber": "+97143549525", "businessHours": { "monday": { "text": "9am - 5pm", "ranges": [{ "from": 540, "to": 1020 }] }, "tuesday": { "text": "9am - 5pm", "ranges": [{ "from": 540, "to": 1020 }] }, "wednesday": { "text": "9am - 5pm", "ranges": [{ "from": 540, "to": 1020 }] }, "thursday": { "text": "9am - 5pm", "ranges": [{ "from": 540, "to": 1020 }] }, "friday": { "text": "9am - 1pm", "ranges": [{ "from": 540, "to": 780 }] }, "saturday": { "text": "9am - 1pm", "ranges": [{ "from": 540, "to": 780 }] }, "sunday": { "text": "9am - 5pm", "ranges": [{ "from": 540, "to": 1020 }] } }, "contactEmail": "info@speedoswimsquads.com", "storeSettings": { "returnPolicy": null, "termsOfService": null, "privacyPolicy": null, "expressCheckout": false, "continueShoppingLinkUrl": "/", "useLightCart": false, "showNoteField": false, "shippingCountryDefaultValue": "US", "billToShippingDefaultValue": false, "showShippingPhoneNumber": true, "isShippingPhoneRequired": false, "showBillingPhoneNumber": true, "isBillingPhoneRequired": false, "currenciesSupported": ["USD", "ARS", "AUD", "BRL", "CAD", "CHF", "COP", "CZK", "DKK", "EUR", "GBP", "HKD", "IDR", "ILS", "INR", "JPY", "MXN", "MYR", "NOK", "NZD", "PHP", "PLN", "RUB", "SEK", "SGD", "THB", "ZAR"], "defaultCurrency": "USD", "selectedCurrency": "USD", "measurementStandard": 1, "orderConfirmationInjectCode": "", "showCustomCheckoutForm": false, "checkoutPageMarketingOptInEnabled": false, "enableMailingListOptInByDefault": true, "sameAsRetailLocation": false, "merchandisingSettings": { "scarcityEnabledOnProductItems": false, "scarcityEnabledOnProductBlocks": false, "scarcityMessageType": "DEFAULT_SCARCITY_MESSAGE", "scarcityThreshold": 10, "multipleQuantityAllowedForServices": true, "restockNotificationsEnabled": false, "restockNotificationsMailingListSignUpEnabled": false, "relatedProductsEnabled": false, "relatedProductsOrdering": "random", "soldOutVariantsDropdownDisabled": false, "productComposerOptedIn": false, "productComposerABTestOptedOut": false, "productReviewsEnabled": false, "displayImportedProductReviewsEnabled": false, "hasOptedToCollectNativeReviews": false }, "isLive": true, "multipleQuantityAllowedForServices": true }, "useEscapeKeyToLogin": true, "ssBadgeType": 1, "ssBadgePosition": 4, "ssBadgeVisibility": 1, "ssBadgeDevices": 1, "pinterestOverlayOptions": { "mode": "disabled", "size": "small", "shape": "rect", "color": "white" }, "ampEnabled": false }, "cookieSettings": { "isCookieBannerEnabled": false, "isRestrictiveCookiePolicyEnabled": false, "isRestrictiveCookiePolicyAbsolute": false, "cookieBannerText": "", "cookieBannerTheme": "", "cookieBannerVariant": "", "cookieBannerPosition": "", "cookieBannerCtaVariant": "", "cookieBannerCtaText": "", "cookieBannerAcceptType": "OPT_IN", "cookieBannerOptOutCtaText": "" }, "websiteCloneable": false, "collection": { "title": "Registration & Assessment", "id": "547aca99e4b067a185ed131b", "fullUrl": "/registration-assessment", "type": 10, "permissionType": 1 }, "subscribed": false, "appDomain": "squarespace.com", "templateTweakable": true, "tweakJSON": { "aspect-ratio": "Auto", "banner-slideshow-controls": "Arrows", "gallery-arrow-style": "No Background", "gallery-aspect-ratio": "3:2 Standard", "gallery-auto-crop": "true", "gallery-autoplay": "false", "gallery-design": "Grid", "gallery-info-overlay": "Show on Hover", "gallery-loop": "false", "gallery-navigation": "Bullets", "gallery-show-arrows": "true", "gallery-transitions": "Fade", "galleryArrowBackground": "rgba(34,34,34,1)", "galleryArrowColor": "rgba(255,255,255,1)", "galleryAutoplaySpeed": "3", "galleryCircleColor": "rgba(255,255,255,1)", "galleryInfoBackground": "rgba(0, 0, 0, .7)", "galleryThumbnailSize": "100px", "gridSize": "280px", "gridSpacing": "10px", "logoContainerWidth": "140px", "product-gallery-auto-crop": "false", "product-image-auto-crop": "true", "siteTitleContainerWidth": "360px", "tweak-v1-related-products-title-spacing": "50px" }, "templateId": "52a74dafe4b073a80cd253c5", "templateVersion": "7", "pageFeatures": [1, 2, 4], "gmRenderKey": "QUl6YVN5Q0JUUk9xNkx1dkZfSUUxcjQ2LVQ0QWVUU1YtMGQ3bXk4", "templateScriptsRootUrl": "https://static1.squarespace.com/static/ta/52a74d9ae4b0253945d2aee9/1043/scripts/", "betaFeatureFlags": ["campaigns_content_editing_survey", "scheduling_block_schema_editor", "campaigns_global_uc_ab", "block_annotations_revamp", "marketing_landing_page", "asset_uploader_refactor", "send_local_pickup_ready_email", "customer_account_creation_emails", "customer_account_creation_recaptcha", "campaigns_discount_section_in_blasts", "crm_retention_segment", "crm_remove_subscriber", "fluid_engine_filtered_catalog_endpoints", "fluid_engine", "fluid_engine_clean_up_grid_contextual_change", "campaigns_new_subscriber_search", "campaigns_asset_picker", "member_areas_spanish_interviews", "member_areas_schedule_interview", "commerce_order_status_access", "crm_default_newsletter_block_to_campaigns", "commerce_site_visitor_metrics", "product_composer_feedback_form_on_save", "nested_categories_migration_enabled", "campaigns_seasonal_inventory_page_banner", "campaigns_show_featured_templates", "viewer-role-contributor-invites", "customer_accounts_email_verification", "commerce_etsy_product_import", "campaigns_new_image_layout_picker", "commerce_clearpay", "commerce_restock_notifications", "background_art_onboarding", "commerce_etsy_shipping_import", "campaigns_thumbnail_layout"], "videoAssetsFeatureFlags": ["hls-playback", "mux-data-video-collection"], "impersonatedSession": false, "tzData": { "zones": [[240, null, "GST", null]], "rules": {} }, "showAnnouncementBar": true, "recaptchaEnterpriseContext": { "recaptchaEnterpriseSiteKey": "6LdDFQwjAAAAAPigEvvPgEVbb7QBm-TkVJdDTlAv" } };</script>
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
    @include('pages.layout.mobile_nav')
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
        <div id="folderNav" data-content-field="navigation-folderNav" class="fixed">
          <div class="folder-nav-toggle"></div>
          <nav class="folder-nav" role="navigation">
            <ul class="fonti">
              <li class="nav-section-label">Swimming Programs</li>
              <li class="page-collection active-link"><a href="#" onclick="openCity(event, 'register')">Registration &amp;
                  Assessment</a></li>
              <li class="page-collection"><a href="#baby">Baby Swim</a></li>
              <li class="page-collection"><a href="#swim">Learn To Swim</a></li>
              <li class="page-collection"><a href="#train">Early Training</a></li>
              <li class="page-collection"><a href="#squad">Development Squad</a></li>
              <li class="page-collection"><a href="#future">Futuras</a></li>
              <li class="page-collection"><a href="#hotshot">Hotshots</a></li>
              <li class="page-collection"><a href="#next">Next Gen</a></li>
              <li class="page-collection"><a href="#select">Select Squad</a></li>
              <li class="page-collection"><a href="#adult">Adult Swimming</a></li>
              <li class="page-collection"><a href="#camp">Summer Camp</a></li>
              <li class="page-collection"><a href="#swiming">Synchronized Swimming</a></li>
            </ul>
          </nav>
        </div>
        <div id="content" class="main-content register" data-content-field="main-content"
         data-collection-id="547aca99e4b067a185ed131b" data-edit-main-image="">
          <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1663569977421"
            id="page-547aca99e4b067a185ed131b">
            <div class="row sqs-row">
              <div class="col sqs-col-12 span-12">
                <div class="sqs-block code-block sqs-block-code" data-block-type="23"
                  id="block-yui_3_17_2_1_1663569963435_2457">
                  <div class="sqs-block-content">
                    <script src="{{asset('main/javascript/static.elfsight.platform.js')}}" defer="">

                    </script>
                    <div class="elfsight-app-5e20a747-73d6-473c-aaa3-c6b524056582">

                    </div>
                  </div>
                </div>
                <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-52cf06c46d3e2059d3cd">
                  <div class="sqs-block-content">

                    <h1 >Swimming with Speedo Swim Squads</h1>
                    <p >We offer swimming lessons to any age and ability across
                      Dubai, U.A.E.</p>
                    <p >Our program is in line with the SEQ (UK) National Plan for
                      Teaching Swimming and Long Term Athletic Development Plan.&nbsp;For further details about each level
                      please navigate through the side menu.</p>
                    <h1 >Registration and Swimming Assessments</h1>
                    <p >New swimmers will need to be assessed before they are
                      allocated a place on our program. </p>


                  </div>
                </div>
                <div class="sqs-block button-block sqs-block-button" data-block-type="53"
                  id="block-yui_3_17_2_1_1546090397701_5810">
                  <div class="sqs-block-content" id="yui_3_17_2_1_1669769601720_119">

                    <div class="sqs-block-button-container sqs-block-button-container--center"
                      data-animation-role="button" data-alignment="center" data-button-size="medium"
                      data-button-type="primary" id="yui_3_17_2_1_1669769601720_118">
                      <a href="/contact"
                        class="sqs-block-button-element--medium sqs-button-element--primary sqs-block-button-element"
                        data-initialized="true">
                        Book a free assessment
                      </a>
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="baby">
            <div id="content" class="main-content" data-content-field="main-content"
              data-collection-id="547acaeae4b05e2320dae542" data-edit-main-image="">
              <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1566898507554"
                id="page-547acaeae4b05e2320dae542">
                <div class="row sqs-row">
                  <div class="col sqs-col-12 span-12">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-11cf205503ca88a3442a">
                      <div class="sqs-block-content">
                        <h1 style="white-space:pre-wrap;">Baby Swim</h1>
                        <p >Our Baby Ducks programme introduces children to activity
                          in the water. These Adult &amp; Child lessons are suitable for children from 6 months to 3 years
                          old, accompanied by an adult. The lessons are teacher lead and incorporate lots of fun
                          activities in the water while in a safe environment with a parent or guardian.</p>
                      </div>
                    </div>
                    <div class="sqs-block video-block sqs-block-video"
                      data-block-json="{&quot;blockAnimation&quot;:&quot;none&quot;,&quot;layout&quot;:&quot;caption-hidden&quot;,&quot;overlay&quot;:false,&quot;description&quot;:{&quot;html&quot;:&quot;Speedo Swim Squad trainer Poppy tells us how to get little ones water confident&quot;},&quot;hSize&quot;:null,&quot;floatDir&quot;:null,&quot;html&quot;:&quot;<iframe src=\&quot;//www.youtube.com/embed/3lxSMsXdaDE?wmode=opaque&amp;amp;enablejsapi=1\&quot; height=\&quot;480\&quot; width=\&quot;854\&quot; scrolling=\&quot;no\&quot; frameborder=\&quot;0\&quot; allowfullscreen=\&quot;\&quot;>\n</iframe>&quot;,&quot;url&quot;:&quot;https://www.youtube.com/watch?v=3lxSMsXdaDE&quot;,&quot;thumbnailUrl&quot;:&quot;https://i.ytimg.com/vi/3lxSMsXdaDE/hqdefault.jpg&quot;,&quot;resolvedBy&quot;:&quot;youtube&quot;}"
                      data-block-type="32" id="block-yui_3_17_2_26_1485926403897_5359">
                      <div class="sqs-block-content" id="yui_3_17_2_1_1669773261337_117">
                        <div class="sqs-video-wrapper video-none" data-provider-name=""
                          data-html="<iframe src=&quot;//www.youtube.com/embed/3lxSMsXdaDE?wmode=opaque&amp;enablejsapi=1&quot; height=&quot;480&quot; width=&quot;854&quot; scrolling=&quot;no&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;><br/></iframe>"
                          id="yui_3_17_2_1_1669773261337_124">
                          <div class="intrinsic">
                            <div class="intrinsic-inner" style="padding-bottom: 56.2061%;"><iframe
                                src="//www.youtube.com/embed/3lxSMsXdaDE?wmode=opaque&amp;enablejsapi=1" height="480"
                                width="854" scrolling="no" frameborder="0" allowfullscreen=""
                                id="yui_3_17_2_1_1669773261337_129"><br /></iframe></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="swim">
            <div id="content" class="main-content" data-content-field="main-content"
              data-collection-id="547acb00e4b05e2320dae554" data-edit-main-image="">
              <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1617513768733"
                id="page-547acb00e4b05e2320dae554">
                <div class="row sqs-row">
                  <div class="col sqs-col-12 span-12">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-93b20ab867231383d060">
                      <div class="sqs-block-content">
        
                        <h1 style="white-space:pre-wrap;">Learn To Swim</h1>
                        <p >Teaching is our swim programme for 3 year olds +</p>
                        <p >&nbsp;There are five levels of Teaching:</p>
                        <ul data-rte-list="default">
                          <li>
                            <p ><strong>Ducklings and Dolphins</strong> - Ducklings
                              and Dolphins is our swim programme for 3-5 year olds. There are two levels of Ducklings 1
                              and 2. After this the swimmers progress to, two dolphin classes also titled 1 and 2. Our
                              priority is water confidence, water safety and introduction to basic strokes. These skills
                              are taught through our FUNdamental principles, incorporating specific tasks with fun
                              elements. Each Ducklings class has 4 swimmers per teacher. Dolphin groups have a maximum of
                              6 swimmers per teacher depending on ages and level.</p>
                          </li>
                          <li>
                            <p ><strong>Improver 1</strong> - improving swimmers
                              with progression through the basic skills of water confidence and stroke technique, in
                              particular the gross motor skills involved in basic kicking and pulling movements in all 4
                              strokes and the development of aquatic breathing.</p>
                          </li>
                          <li>
                            <p ><strong>Improver 2</strong> - improving swimmers
                              while refining the movements and breathing involved in the 4 basic strokes, while building
                              strength and co-ordination.</p>
                          </li>
                          <li>
                            <p ><strong>Bronze</strong> - Refining the movements and
                              breathing involved in the 4 strokes, while building strength and co-ordination.</p>
                          </li>
                          <li>
                            <p ><strong>Silver</strong> - improving the 4 strokes,
                              developing stamina in kick and increasing the range of aquatic skills. Consolidation of dive
                              entries, legal starts and touch turns.</p>
                          </li>
                        </ul>
                        <p >Each class will have a maximum of 10 swimmers to one
                          teacher. Once the swimmer has completed Silver they will move into our Early Training group.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="train">
            <div id="content" class="main-content" data-content-field="main-content"
              data-collection-id="547acb03e4b0b93ff70360ff" data-edit-main-image="">
              <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1617513842735"
                id="page-547acb03e4b0b93ff70360ff">
                <div class="row sqs-row">
                  <div class="col sqs-col-12 span-12">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-e173cd92f517c2687933">
                      <div class="sqs-block-content">
        
                        <h1 style="white-space:pre-wrap;">Early Training</h1>
                        <p >Early training is for swimmers emerging from our
                          teaching program and extending their strokes and distances. All our training swimmers pay an
                          annual membership fee which includes team swim suit and clothing.</p>
                        <p >There are 2 levels of Early Training;</p>
                        <ul data-rte-list="default">
                          <li>
                            <p ><strong>Gold </strong>- the development of all four
                              strokes over 25m and introduce 1/2 length individual medleys over 50m. An introduction to
                              lane discipline through different types of organization and to increase the range of aquatic
                              skills in preparation for the next level. We also introduce speed and competition work.</p>
                          </li>
                          <li>
                            <p ><strong>Platinum </strong>- the development and
                              refining of all four strokes over 50m and individual medley over 100m.&nbsp; Development of
                              core strength and stamina. introduction to speed and competition work.</p>
                          </li>
                        </ul>
                        <p >All Early Training swimmers have the opportunity to swim
                          up to three times per week.</p>
                        <p >Once the swimmers have completed the two levels they
                          progress into Development Squad.</p>
        
        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="squad">
            <div id="content" class="main-content" data-content-field="main-content"
              data-collection-id="547acb06e4b05e2320dae567" data-edit-main-image="">
              <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1417934881091"
                id="page-547acb06e4b05e2320dae567">
                <div class="row sqs-row">
                  <div class="col sqs-col-12 span-12">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-e8aa2b4147c937d79f82">
                      <div class="sqs-block-content">
        
                        <h1>Development Squad</h1>
                        <p>Development Squad is for our swimmers emerging from Platinum. All our swimmers in Development
                          Squad are required to pay an annual membership fee which includes a team swim suit and clothing.
                        </p>
                        <p>The aims within the Development Squad are to continue to develop and refine the four strokes
                          and individual medley over 100m. Build on Platinum skills and complete all competitive turns
                          while preparing the swimmer to progress to our Junior and Senior Squads.</p>
                        <p>All swimmers are encouraged to participate in development galas throughout the year. This gives
                          them a tangible result for their continued training.</p>
                        <p>&nbsp;</p>
        
        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="future">
            <div id="content" class="main-content" data-content-field="main-content"
              data-collection-id="5889eacbb8a79bfc15bda32d" data-edit-main-image="">
              <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1619506596476"
                id="page-5889eacbb8a79bfc15bda32d">
                <div class="row sqs-row">
                  <div class="col sqs-col-12 span-12">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                      id="block-yui_3_17_2_1_1542535705124_4134">
                      <div class="sqs-block-content">
        
                        <h1 style="white-space:pre-wrap;">Futuras </h1>
                        <p >Futuras is a group comprised of those who have been
                          selected for their swim talent, enthusiasm and potential to succeed in our sport. They are our
                          'Fast Track ' young swimmers who are choosing swimming as their main sport. These swimmers are
                          chosen from from Silver and Gold groups and may continue in both Futuras and their regular venue
                          group until moving fully to Futuras. &nbsp; If there is an issue with timetabling or transport
                          then swimmers may swim once at the 'home' venue and twice at Futuras. Futuras will continue to
                          work on the syllabus for our Gold, Platinum and Development squads and we incorporate early
                          competition training and preparation to ensure the smoothest transition into our fully
                          competitive squads Hotshots. </p>
                        <p >The Futuras will take part in Novice and Development
                          galas throughout the year in order to better prepare them for the higher level meets required as
                          part of later competitive training. Futuras is the First step in a long path towards the top
                          level of swimming and those selected will be carefully nurtured in order to succeed.</p>
                        <p >Those Swimmers who are selected will begin with training
                          between 2 and 3 sessions a week to ensure all early training levels are passed before moving
                          onto a full 3 times a week training program in order to make Hotshot selection.</p>
                        <p >Swimmers are required to have full kit in order to
                          maximise effectiveness of their session and a filled water bottle is essential to all sessions.
                        </p>
                        <p >Kick board</p>
                        <p >Pull buoy</p>
                        <p >Training fins</p>
                        <p >Central snorkel,</p>
                        <p >Mesh bag to contain all kit.</p>
                        <p >Water bottle</p>
                        <p >Skipping rope</p>
                        <p >Swim Squads hat, t-shirt, shorts and swimwear</p>
                        <p >Any questions regarding kit order please speak to the
                          coach on poolside. For any information about this squad please contact your venue head or email
                          <a href="mailto:uros@speedoswimsquads.com">uros@speedoswimsqauds.com</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="hotshot">
            <div id="content" class="main-content" data-content-field="main-content"
              data-collection-id="547bfa3be4b05a09c65f67d4" data-edit-main-image="">
              <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1648014725379"
                id="page-547bfa3be4b05a09c65f67d4">
                <div class="row sqs-row">
                  <div class="col sqs-col-12 span-12">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-fb1f568496af6041d7fb">
                      <div class="sqs-block-content">
        
                        <h1 style="white-space:pre-wrap;">Hotshots</h1>
                        <p >This Squad is for our 10 years to 12 years and is the
                          first Major stepping stone into the competitive side of swimming. On joining Hotshot's the
                          swimmers should attend between 4 - 6 sessions per week, depending on the group they are placed
                          in, as well as competing in a number of competitions with the team. There are entry requirements
                          to join these squads and swimmers will need a trial sessions(s).</p>
                        <p >Each swimmer is required to pay an annual membership fee
                          which includes a team swim suit and clothing. It is essential that all swimmer have the
                          following items for each training session;</p>
                        <ul data-rte-list="default">
                          <li>
                            <p >Kick board</p>
                          </li>
                          <li>
                            <p >Alignment Board</p>
                          </li>
                          <li>
                            <p >Pull buoy</p>
                          </li>
                          <li>
                            <p >Training fins</p>
                          </li>
                          <li>
                            <p >Thera Band</p>
                          </li>
                          <li>
                            <p >Training paddles</p>
                          </li>
                          <li>
                            <p >Water bottle</p>
                          </li>
                          <li>
                            <p >Goggles</p>
                          </li>
                          <li>
                            <p >Skipping rope</p>
                          </li>
                          <li>
                            <p >Roller</p>
                          </li>
                          <li>
                            <p >Swim cap (included in membership fee)</p>
                          </li>
                          <li>
                            <p >A5 note pad</p>
                          </li>
                        </ul>
                        <p >For details on joining the Hotshots squad please email
                          Tom Wykes at <strong>tom@speedoswimsquads.com</strong></p>
                        <p class="" data-rte-preserve-empty="true" style="white-space:pre-wrap;"></p>
        
        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="next">
            <div id="content" class="main-content" data-content-field="main-content"
              data-collection-id="5de750d8c7c12921b52906ec" data-edit-main-image="">
              <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1584863352414"
                id="page-5de750d8c7c12921b52906ec">
                <div class="row sqs-row">
                  <div class="col sqs-col-12 span-12">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                      id="block-5de750d8c7c12921b52906ed">
                      <div class="sqs-block-content">
        
                        <h1 style="white-space:pre-wrap;">Next Gen</h1>
                        <p >Each swimmer is required to pay an annual membership fee
                          which includes a team swim suit and clothing. It is essential that all swimmer have the
                          following items for each training session;</p>
                        <ul data-rte-list="default">
                          <li>
                            <p >Kick board</p>
                          </li>
                          <li>
                            <p >Alignment Board</p>
                          </li>
                          <li>
                            <p >Pull buoy</p>
                          </li>
                          <li>
                            <p >Training fins</p>
                          </li>
                          <li>
                            <p >Thera Band</p>
                          </li>
                          <li>
                            <p >Training paddles</p>
                          </li>
                          <li>
                            <p >Water bottle</p>
                          </li>
                          <li>
                            <p >Goggles</p>
                          </li>
                          <li>
                            <p >Skipping rope</p>
                          </li>
                          <li>
                            <p >Roller</p>
                          </li>
                          <li>
                            <p >Swim cap (included in membership fee)</p>
                          </li>
                          <li>
                            <p >Yoga Mat</p>
                          </li>
                        </ul>
                        <p >For details on joining the Next Gen squad please don’t
                          hesitate to get in with Chris via <strong>chris.dove@speedoswimsquads.com</strong></p>
                        <p ><br></p>
        
        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="select">
            <div id="content" class="main-content" data-content-field="main-content"
              data-collection-id="547acb0ae4b05e2320dae569" data-edit-main-image="">
              <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1618896630306"
                id="page-547acb0ae4b05e2320dae569">
                <div class="row sqs-row">
                  <div class="col sqs-col-12 span-12">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-a7ad0bf579cf6a542132">
                      <div class="sqs-block-content">
        
                        <h1 style="white-space:pre-wrap;">Select Squad</h1>
                        <p >This squad is our top level competitive group. On
                          joining this group swimmers must be training a minimum of 8 x sessions during the week. As well
                          as competing regularly with the team.</p>
                        <p >Each swimmer is required to pay an annual membership fee
                          which includes a team swim suit and clothing. It is essential that all swimmer have the
                          following items for each training session;</p>
                        <ul data-rte-list="default">
                          <li>
                            <p >Kick board</p>
                          </li>
                          <li>
                            <p >Alignment Board</p>
                          </li>
                          <li>
                            <p >Pull buoy</p>
                          </li>
                          <li>
                            <p >Training fins</p>
                          </li>
                          <li>
                            <p >Thera Band</p>
                          </li>
                          <li>
                            <p >Training paddles</p>
                          </li>
                          <li>
                            <p >Water bottle</p>
                          </li>
                          <li>
                            <p >Goggles</p>
                          </li>
                          <li>
                            <p >Skipping rope</p>
                          </li>
                          <li>
                            <p >Roller</p>
                          </li>
                          <li>
                            <p >Swim cap (included in membership fee)</p>
                          </li>
                          <li>
                            <p >Yoga Mat</p>
                          </li>
                          <li>
                            <p >Foam Roller</p>
                          </li>
                        </ul>
                        <p >For details on joining this squad please email Caroline
                          Potel at <a href="mailto:caroline@speedoswimsquads.com"
                            target="_blank">caroline@speedoswimsquads.com</a></p>
                        <h1 style="white-space:pre-wrap;">&nbsp;</h1>
        
        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="adult">
            <div id="content" class="main-content" data-content-field="main-content"
              data-collection-id="547acb0de4b00987aee63ad9" data-edit-main-image="">
              <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1566898189693"
                id="page-547acb0de4b00987aee63ad9">
                <div class="row sqs-row">
                  <div class="col sqs-col-12 span-12">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-e190c93e20a852d50921">
                      <div class="sqs-block-content">
        
                        <h1 style="white-space:pre-wrap;">Adult Swim</h1>
                        <p >Our adult program is split into Three separate groups.
                          Adult Beginner, Improver and Training. Please see below for the descriptions of each level. </p>
                        <h3 style="white-space:pre-wrap;">Adult Beginner 1&amp;2</h3>
                        <p >Teaching basic front and pack paddle through in-water,
                          hands on assistance, giving that extra confidence boost. Focus on water confidence, safety and
                          body position. Roughly 15m of front &amp; back work &amp; 15m of submerging practices, aquatic
                          breathing and progressive games linked to the skills below.</p>
                        <h3 style="white-space:pre-wrap;">Adult Improver 1&amp;2</h3>
                        <p >In this level we are building front crawl, backstroke
                          and breaststroke to full stroke over a 10m distance. The emphasis will be on a good body
                          position, strong kick and smooth, efficient arm pulls. By the end of the Improver levels you
                          will be able to swim 25m of Frontcrawl, Backstroke and Breaststroke. </p>
                        <h3 style="white-space:pre-wrap;">Adult Training 1&amp;2</h3>
                        <p >Perfect technique from the dive, under water phase to
                          the swim and finish for front crawl, backstroke and breaststroke for a distance of 50M. Turns
                          will be introduced ready to include in 50m distances. For training preparation, the swimmers
                          will be able to dive from the blocks as well as swim 15m of butterfly. Time will be spent
                          explaining and ‘teaching’ new skills or techniques. Turns will be practiced ready to include in
                          100m distances and larger more intense sets. </p>
                        <p class="" data-rte-preserve-empty="true" style="white-space:pre-wrap;"></p>
        
        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="camp">
            <div id="content" class="main-content" data-content-field="main-content"
              data-collection-id="547acb15e4b00987aee63af1" data-edit-main-image="">
              <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1657784949861"
                id="page-547acb15e4b00987aee63af1">
                <div class="row sqs-row" id="yui_3_17_2_1_1669775718603_122">
                  <div class="col sqs-col-12 span-12" id="yui_3_17_2_1_1669775718603_121">
                    <div class="sqs-block image-block sqs-block-image sqs-text-ready" data-block-type="5"
                      id="block-yui_3_17_2_1_1622524326379_3365">
                      <div class="sqs-block-content" id="yui_3_17_2_1_1669775718603_120">
                        <div class="image-block-outer-wrapper
                        layout-caption-below
                        design-layout-inline
                        combination-animation-none
                        individual-animation-none
                        individual-text-animation-none"
                        data-test="image-block-inline-outer-wrapper" id="yui_3_17_2_1_1669775718603_119">
                          <figure class="
                            sqs-block-image-figureintrinsic"
                            style="max-width:1024px;" id="yui_3_17_2_1_1669775718603_118">
                            <div class="image-block-wrapper" data-animation-role="image"
                              id="yui_3_17_2_1_1669775718603_117">
                              <div class="sqs-image-shape-container-element
                                has-aspect-ratio
                                " style="
                                position: relative;
               
                                padding-bottom:70.01953125%;
               
                                   overflow: hidden;
                                    " id="yui_3_17_2_1_1669775718603_116">
                                    <noscript><img
                                    src="https://images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/caf53409-4e74-4c95-8fa8-542c55587622/IMG-20220714-WA0000.jpg"
                                    alt="" /></noscript><img class="thumb-image loaded"
                                  data-src="https://images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/caf53409-4e74-4c95-8fa8-542c55587622/IMG-20220714-WA0000.jpg"
                                  data-image="https://images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/caf53409-4e74-4c95-8fa8-542c55587622/IMG-20220714-WA0000.jpg"
                                  data-image-dimensions="1024x717" data-image-focal-point="0.5,0.5" alt=""
                                  data-load="false" data-image-id="62cfca2b8afb6775a42c6bbe" data-type="image"
                                  style="left: -0.0123062%; top: 0%; width: 100.025%; height: 100%; position: absolute;"
                                  data-image-resolution="1000w"
                                  src="https://images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/caf53409-4e74-4c95-8fa8-542c55587622/IMG-20220714-WA0000.jpg?format=1000w">
                              </div>
                            </div>
                          </figure>
                        </div>
                      </div>
                    </div>
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-bcfe8d501b74f7b34ba2">
                      <div class="sqs-block-content">
        
                        <h1 style="white-space:pre-wrap;">Summer Swim </h1>
                        <p >Our Summer Camp will run from 9am -11am every weekday.
                          It has been designed to provide progressive, fun and educational classes. At all times we will
                          be following the strict social distancing rules in and out of the water. </p>
                        <p >&nbsp;Five sessions over five days per week will be
                          delivered for the following ages and ability levels:</p>
                        <ul data-rte-list="default">
                          <li>
                            <p ><strong>Ducklings and Dolphins</strong> (3yrs to
                              5yrs): Water confidence, basic strokes &amp; water safety.</p>
                          </li>
                          <li>
                            <p ><strong>Teaching</strong> (5yrs plus) - Improver 1
                              through to Silver swimmers: Building water confidence, safety, introducing and refining
                              strokes. Aquatic skills through formal lessons and fun activities.</p>
                          </li>
                          <li>
                            <p ><strong>Early Training </strong>- Gold &amp;
                              Platinum: Developing strength, stroke skills &amp; technique over distance.</p>
                          </li>
                        </ul>
                        <p >We will be running our summer camp at 4 different
                          locations across Dubai </p>
                        <ul data-rte-list="default">
                          <li>
                            <p >Nord Anglia School - Al Barsha 3</p>
                          </li>
                          <li>
                            <p >The Burj Club - Downtown </p>
                          </li>
                          <li>
                            <p >Al Areesh Club - Festival City </p>
                          </li>
                          <li>
                            <p >Horizon English School - Al Safa </p>
                          </li>
                        </ul>
                        <p >Please contact us if you have any questions about our
                          summer camp. </p>
                        <p ><a
                            href="mailto:info@speedoswimsquads.com?subject=Summer%20Swim%20">info@speedoswimsquads.com</a>
                        </p>
                        <p class="" data-rte-preserve-empty="true" style="white-space:pre-wrap;"></p>
        
        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="swiming">
            <div id="content" class="main-content" data-content-field="main-content"
              data-collection-id="612f3c6424c6577db48f15c7" data-edit-main-image="">
              <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1641970850137"
                id="page-612f3c6424c6577db48f15c7">
                <div class="row sqs-row" id="yui_3_17_2_1_1669775959917_122">
                  <div class="col sqs-col-12 span-12" id="yui_3_17_2_1_1669775959917_121">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                      id="block-yui_3_17_2_1_1630485620042_2975">
                      <div class="sqs-block-content">
        
                        <h1 style="white-space:pre-wrap;">Synchronized Swimming </h1>
                        <h2 style="white-space:pre-wrap;">Term 2 Starts on the 3rd January</h2>
        
        
                      </div>
                    </div>
                    <div class="sqs-block image-block sqs-block-image sqs-text-ready" data-block-type="5"
                      id="block-yui_3_17_2_1_1641970685999_3941">
                      <div class="sqs-block-content" id="yui_3_17_2_1_1669775959917_120">
                        <div class="
                        image-block-outer-wrapper
                        layout-caption-below
                        design-layout-inline
                        combination-animation-none
                        individual-animation-none
                        individual-text-animation-none
                        " data-test="image-block-inline-outer-wrapper" id="yui_3_17_2_1_1669775959917_119">
                          <figure class="
                            sqs-block-image-figure
                            intrinsic
                            " style="max-width:1920px;" id="yui_3_17_2_1_1669775959917_118">
                            <div class="image-block-wrapper" data-animation-role="image"
                              id="yui_3_17_2_1_1669775959917_117">
                              <div class="sqs-image-shape-container-element
                                has-aspect-ratio
                            " style="
                                position: relative;
                                
                                    padding-bottom:56.25%;
                                
                                overflow: hidden;
                                " id="yui_3_17_2_1_1669775959917_116">
                                <noscript><img src="{{asset("main/pics/summer-swim.jpg")}}"
                                    alt="" /></noscript><img class="thumb-image loaded"
                                  data-src="https://images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/ac30a0f0-b798-42f8-878d-c92fbc612166/Synchro+T2.jpg"
                                  data-image="https://images.squarespace-cdn.com/content/v1/5469a994e4b0c0e088bf1895/ac30a0f0-b798-42f8-878d-c92fbc612166/Synchro+T2.jpg"
                                  data-image-dimensions="1920x1080" data-image-focal-point="0.5,0.5" alt=""
                                  data-load="false" data-image-id="61de7c921f103e537a408650" data-type="image"
                                  style="left: 0%; top: 0%; width: 100%; height: 100%; position: absolute;"
                                  data-image-resolution="1000w" src="{{asset('main/pics/Synchro+T2.jpg')}}">
                              </div>
                            </div>
                          </figure>
                        </div>
                      </div>
                    </div>
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                      id="block-yui_3_17_2_1_1641970685999_4970">
                      <div class="sqs-block-content">
        
                        <p >Our club offers programs to meet the needs of swimmers
                          with varied levels of ability and commitment. The values our swimmers develop include teamwork,
                          discipline, and respect. The club aims to foster a love of sport and develop invaluable
                          leadership skills.</p>
                        <p ><strong>LEARN TO SYNCHRO:</strong> <br>Learn To Synchro
                          program is ideal for girls 5-1oyrs old, interested in trying the sport of artistic swimming, and
                          learning specific skills in a fun way, as part of team environment.<br>The program is focusing
                          on learning basic skills and developing strength, flexibility and focus. Once these skills are
                          developed, they are put together in a routine which swimmers will practice and preform at the
                          yearly Gala organized by the club. <br><br><strong>DEVELOPMENT TEAMS:</strong><br>Synchro Squads
                          offers a Development Teams program to the swimmers aged 10+ that wish to experience some
                          competition and would like to commit.<br>This team focuses on perfecting basic skills and
                          introducing more complicated ones.&nbsp; <br>The program focuses on developing skills while
                          encouraging a positive attitude towards sport and engaging a love for an active lifestyle.</p>
                        <p ><strong>POTENTIAL SQUADS:<br></strong>Potential Squads
                          Program has a main focus on skill development and bringing your artistic swimming knowledge to
                          the next level This program is designed to introduce athletes into the provincial level of the
                          competitive stream and requires an increased level of dedication and skills. The athletes will
                          be introduced to an engaging training program developed by our coaches. <br>Athletes on this
                          team may be considered for extra routines.<br><br><strong>SQUADS:</strong><br>This program is
                          intended for competitive artistic swimmers who are interested in training and competing at the
                          National and International level. The routines become faster, more sophisticated, the training
                          hours are longer, there is a higher level of commitment to the more advanced skills of
                          synchronized swimming and fitness training<strong>. <br></strong></p>
                        <p >Contact Dragana to enquire about classes </p>
                        <p >Dragana Tanasijevic </p>
                        <p >synchro@speedoswimsquads.com</p>
                        <p >+974 58 535 9010</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
    @include('pages.layout.footer')

  </div>

  <script src="{{asset('main/javascript/static1.site-bundle.js')}}" type="text/javascript"></script>
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





</body>

</html>