<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("meta_title", "TTS GROUPE - Expertise Télécom & Fibre Optique")</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'TTS GROUPE est expert en ingénierie, déploiement et maintenance d’infrastructures télécom et fibre optique en Afrique et en Europe.')">
    <meta name="keywords" content="@yield('meta_keywords', 'ttsgroupe, telecom senegal, fibre optique, telecommunication, internet, ingénierie télécom, maintenance réseau')">
    <meta name="author" content="TTS GROUPE">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('meta_title', 'TTS GROUPE - Expertise Télécom & Fibre Optique')">
    <meta property="og:description" content="@yield('meta_description', 'Expertise en ingénierie et déploiement d’infrastructures télécom.')">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('meta_title', 'TTS GROUPE - Expertise Télécom & Fibre Optique')">
    <meta property="twitter:description" content="@yield('meta_description', 'Expertise en ingénierie et déploiement d’infrastructures télécom.')">
    <meta property="twitter:image" content="{{ asset('images/logo.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "TTS GROUPE",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/logo.png') }}",
      "contactPoint": {
        "@@type": "ContactPoint",
        "telephone": "+33 6 59 24 44 03",
        "contactType": "customer service",
        "email": "contact@tts-groupe.com"
      },
      "sameAs": [
        "https://www.facebook.com/ttsgroupe"
      ]
    }
    </script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('cart', {
                items: JSON.parse(localStorage.getItem('tts_cart') || '[]'),
                isOpen: false,

                toggle() { this.isOpen = !this.isOpen },
                
                addItem(id, name, price, image, qty = 1) {
                    let item = this.items.find(i => i.id === id);
                    if (item) {
                        item.qty += qty;
                    } else {
                        this.items.push({ id, name, price, image, qty });
                    }
                    this.save();
                    this.isOpen = true;
                },

                updateQty(id, delta) {
                    let item = this.items.find(i => i.id === id);
                    if (item) {
                        item.qty += delta;
                        if (item.qty < 1) this.removeItem(id);
                        else this.save();
                    }
                },

                removeItem(id) {
                    this.items = this.items.filter(i => i.id !== id);
                    this.save();
                },

                get total() {
                    return this.items.reduce((sum, i) => sum + (i.price * i.qty), 0);
                },

                get count() {
                    return this.items.reduce((sum, i) => sum + i.qty, 0);
                },

                save() {
                    localStorage.setItem('tts_cart', JSON.stringify(this.items));
                }
            })
        })
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Preloader Styles */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }
        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(0, 163, 162, 0.1);
            border-left-color: #00A3A2;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @@keyframes spin {
            to { transform: rotate(360deg); }
        }
        .preloader-hidden {
            opacity: 0;
            pointer-events: none;
        }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-900 flex flex-col min-h-screen">
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    
    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                const preloader = document.getElementById('preloader');
                preloader.classList.add('preloader-hidden');
                setTimeout(() => preloader.style.display = 'none', 500);
            }, 1000); // 1 second delay
        });
    </script>
    <x-header />

    <main class="flex-grow">
        @yield('content')
    </main>

    @php
        $whatsappNumber = \App\Models\Setting::get('whatsapp_number', '221770000000');
    @endphp
    <x-footer />
    <x-cart-drawer :whatsapp-number="$whatsappNumber" />
</body>
</html>
