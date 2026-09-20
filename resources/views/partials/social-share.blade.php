@php
    $isEnglish = request()->segment(1) === 'en';

    $shareTitle = $shareTitle ?? (
        $isEnglish
            ? 'Albenaa Foundation for Sustainable Development'
            : 'مؤسسة البناء للتنمية المستدامة'
    );

    $shareDescription = $shareDescription ?? (
        $isEnglish
            ? 'A development foundation working in humanitarian, development, education and community empowerment.'
            : 'مؤسسة تنموية تعمل في المجالات الإنسانية والتنموية والتعليم وتمكين المجتمع.'
    );

    $shareImage = 'https://albenaa.org/assets/images/social-share.png?v=4';
    $shareUrl = url()->current();
@endphp

<meta property="og:site_name" content="{{ $shareTitle }}">
<meta property="og:title" content="{{ $shareTitle }}">
<meta property="og:description" content="{{ $shareDescription }}">
<meta property="og:url" content="{{ $shareUrl }}">
<meta property="og:type" content="website">

<meta property="og:image" content="{{ $shareImage }}">
<meta property="og:image:secure_url" content="{{ $shareImage }}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:alt" content="{{ $shareTitle }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $shareTitle }}">
<meta name="twitter:description" content="{{ $shareDescription }}">
<meta name="twitter:image" content="{{ $shareImage }}">