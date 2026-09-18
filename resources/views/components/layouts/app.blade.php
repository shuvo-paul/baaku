<!DOCTYPE html>
<html lang="bn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="বাংলা ভাষা ও সাহিত্য ডিসিপ্লিনের প্রাক্তন ছাত্রদের একটি সংবদ্ধ নেটওয়ার্ক।">

        <title>{{ $title ?? 'বাংলা অ্যালামনাই অ্যাসোসিয়েশন' }}</title>

        <link rel="icon" href="/logo.png" type="image/png">
        <link rel="apple-touch-icon" href="/logo.png">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&family=Noto+Serif+Bengali:wght@400;500;600;700&display=swap" rel="stylesheet">

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-canvas-cream font-sans text-ink antialiased">
        {{ $slot }}
    </body>
</html>
