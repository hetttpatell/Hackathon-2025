<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Contact Us - Tatva Tales' }}</title>
  <meta name="description" content="{{ $meta_description ?? 'Get in touch with us for any questions about our heritage products' }}">
  <meta name="keywords" content="{{ $meta_keywords ?? 'heritage, culture, traditional crafts, contact us, support' }}">
  <link rel="stylesheet" href="{{ asset('front/css/globals.css') }}">
  <link rel="stylesheet" href="{{ asset('front/css/Hero.css') }}">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
      tailwind.config = {
          theme: {
              extend: {
                  colors: {
                      'primary': '#5B4B4B', // Earthy brown
                      'secondary': '#A47D68', // Light terracotta
                      'tertiary': '#D4C4B5', // Dusty rose
                      'light-bg': '#F5F5E9', // Off-white
                      'dark-bg': '#312A2A', // Dark brown
                  },
                  fontFamily: {
                      sans: ['Inter', 'sans-serif'],
                      serif: ['Playfair Display', 'serif'],
                  },
                  animation: {
                      fadeIn: 'fadeIn 0.8s ease-out forwards',
                      spinner: 'spin 1s linear infinite',
                      slideInUp: 'slideInUp 0.6s ease-out',
                      slideInFromRight: 'slideInFromRight 0.6s ease-out',
                      slideOutToLeft: 'slideOutToLeft 0.6s ease-out',
                      slideInFromLeft: 'slideInFromLeft 0.6s ease-out',
                      slideOutToRight: 'slideOutToRight 0.6s ease-out',
                  },
                  keyframes: {
                      fadeIn: {
                          '0%': { opacity: '0', transform: 'translateY(20px)' },
                          '100%': { opacity: '1', transform: 'translateY(0)' },
                      },
                      spin: {
                          '0%': { transform: 'rotate(0deg)' },
                          '100%': { transform: 'rotate(360deg)' },
                      },
                      slideInUp: {
                          '0%': { transform: 'translateY(20px)', opacity: '0' },
                          '100%': { transform: 'translateY(0)', opacity: '1' },
                      },
                      slideInFromRight: {
                          '0%': { transform: 'translateX(100%)', opacity: '0' },
                          '100%': { transform: 'translateX(0)', opacity: '1' },
                      },
                      slideOutToLeft: {
                          '0%': { transform: 'translateX(0)', opacity: '1' },
                          '100%': { transform: 'translateX(-100%)', opacity: '0' },
                      },
                      slideInFromLeft: {
                          '0%': { transform: 'translateX(-100%)' },
                          '100%': { transform: 'translateX(0)' },
                      },
                      slideOutToRight: {
                          '0%': { transform: 'translateX(0)' },
                          '100%': { transform: 'translateX(100%)' },
                      }
                  }
              }
          }
      }
  </script>
  
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  /* Container */
.container {
  max-width: 1920px;
  margin: 0 auto;
  min-height: 100vh;
  background: linear-gradient(135deg, #f5f1eb 0%, #e8dcc6 100%);
}

/* Tribal Background Pattern */
body {
  margin: 0;
  font-family: Arial, sans-serif;
  position: relative;
  background: transparent; /* allow background to show */
  scroll-behavior: smooth;
}

body::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: 
    radial-gradient(circle at 25% 25%, #d4c4a8 2px, transparent 2px),
    radial-gradient(circle at 75% 75%, #c9b896 1px, transparent 1px),
    linear-gradient(45deg, transparent 40%, rgba(139, 115, 85, 0.1) 50%, transparent 60%),
    repeating-linear-gradient(90deg, transparent, transparent 20px, rgba(160, 134, 95, 0.05) 20px, rgba(160, 134, 95, 0.05) 40px);
  background-size: 50px 50px, 30px 30px, 100px 100px, 80px 80px;
  z-index: -1;
  opacity: 0.6;
}

/* Additional Tailwind CSS Header Styles */
.header.scrolled {
    background-color: rgba(245, 245, 233, 0.9); /* bg-light-bg/90 */
    backdrop-filter: blur(4px); /* backdrop-blur-sm */
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05); /* shadow-lg */
}
.overlay {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
}
.overlay.active {
    opacity: 1;
    visibility: visible;
}
#mobile-nav {
    transform: translateX(-100%);
    transition: transform 0.3s ease-in-out;
}
#mobile-nav.active {
    transform: translateX(0);
}
.mobile-nav-overlay {
    background-color: rgba(0, 0, 0, 0.5);
}

/* Header - Override with Tailwind-compatible styles */
.header {
  background: rgba(245, 245, 233, 0.95) !important;
  backdrop-filter: blur(10px) !important;
  box-shadow: 0 2px 20px rgba(139, 115, 85, 0.2) !important;
  border-bottom: 2px solid #d4c4a8 !important;
}

/* Ensure Tailwind classes work properly */
.header.fixed {
  position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  width: 100% !important;
  z-index: 50 !important;
}

/* Mobile Navigation Styles */
#mobile-nav {
  transform: translateX(-100%) !important;
  transition: transform 0.3s ease-in-out !important;
}

#mobile-nav.active {
  transform: translateX(0) !important;
}

.overlay {
  opacity: 0 !important;
  visibility: hidden !important;
  transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out !important;
}

.overlay.active {
  opacity: 1 !important;
  visibility: visible !important;
}

/* Contact Page Styles */
.contact-hero {
  background: linear-gradient(135deg, rgba(245, 241, 235, 0.95) 0%, rgba(232, 220, 198, 0.95) 100%);
  padding: 120px 60px 80px;
  text-align: center;
  position: relative;
}

.contact-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: 
    radial-gradient(circle at 25% 15%, rgba(139, 115, 85, 0.05) 0%, transparent 50%),
    radial-gradient(circle at 75% 85%, rgba(160, 134, 95, 0.05) 0%, transparent 50%);
  z-index: 1;
}

.contact-content {
  position: relative;
  z-index: 2;
}

.contact-info {
  background: rgba(255, 255, 255, 0.9);
  border-radius: 20px;
  padding: 40px;
  margin: 40px 0;
  box-shadow: 0 10px 30px rgba(139, 115, 85, 0.1);
  backdrop-filter: blur(15px);
  border: 1px solid rgba(212, 196, 168, 0.3);
}

.contact-item {
  display: flex;
  align-items: center;
  gap: 20px;
  margin-bottom: 30px;
  padding: 20px;
  background: rgba(245, 241, 235, 0.5);
  border-radius: 15px;
  transition: all 0.3s ease;
}

.contact-item:hover {
  transform: translateX(10px);
  background: rgba(160, 134, 95, 0.1);
}

.contact-icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, #a0865f, #8b7355);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 24px;
  flex-shrink: 0;
}

.contact-details h3 {
  font-size: 20px;
  font-weight: 700;
  color: #6d5a42;
  margin-bottom: 8px;
}

.contact-details p {
  color: #8b7355;
  font-size: 16px;
  margin: 0;
}

.contact-details a {
  color: #a0865f;
  text-decoration: none;
  transition: color 0.3s ease;
}

.contact-details a:hover {
  color: #8b7355;
}

/* Footer */
.footer {
  background: 
    linear-gradient(135deg, #5a4a35 0%, #4a3d2a 100%),
    repeating-linear-gradient(90deg, transparent, transparent 20px, rgba(160, 134, 95, 0.1) 20px, rgba(160, 134, 95, 0.1) 40px);
  color: #d4c4a8;
  padding: 60px 60px 30px;
}

.footer-content {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 40px;
  max-width: 1200px;
  margin: 0 auto;
  margin-bottom: 40px;
}

.footer-title {
  font-size: 18px;
  font-weight: 700;
  color: #f5f1eb;
  margin-bottom: 20px;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 12px;
}

.footer-links a {
  color: #d4c4a8;
  text-decoration: none;
  transition: color 0.3s ease;
}

.footer-links a:hover {
  color: #f5f1eb;
}

.footer-bottom {
  text-align: center;
  padding-top: 30px;
  border-top: 1px solid #6d5a42;
  color: #a0865f;
}
</style>
</head>

<body>
  <div class="container">
    <!-- Header Section -->
    <header class="header fixed top-0 left-0 w-full z-50 py-4 px-4 md:px-8 lg:px-16 transition-all duration-300">
        <nav class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <a href="{{ route('home') }}" class="text-3xl font-bold text-primary font-serif">Artribe</a>
            </div>
            
            <ul class="hidden md:flex items-center gap-8 text-primary font-semibold">
                <li><a href="{{ route('home') }}" class="hover:text-secondary transition-colors">Home</a></li>
                <li><a href="{{ route('products') }}" class="hover:text-secondary transition-colors">Products</a></li>
                <li><a href="{{ route('about-us') }}" class="hover:text-secondary transition-colors">About Us</a></li>
                <li><a href="{{ route('contact-us') }}" class="hover:text-secondary transition-colors">Contact</a></li>
            </ul>

            <div class="flex items-center gap-4">
                <button id="mobile-menu-btn" class="md:hidden text-primary hover:text-secondary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <a href="{{ route('cart') }}" class="hidden md:inline-block text-primary hover:text-secondary transition-colors font-semibold">
                    <button id="cart-button" class="relative text-primary hover:text-secondary transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                        <span id="cart-count" class="absolute top-0 right-0 -mt-1 -mr-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center hidden">0</span>
                    </button>
                </a>
            </div>
        </nav>
    </header>

    <div id="mobile-nav-overlay" class="overlay fixed inset-0 z-40 md:hidden"></div>
    <div id="mobile-nav" class="fixed top-0 left-0 h-full w-64 bg-light-bg shadow-xl z-50 p-6 md:hidden flex flex-col">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-primary font-serif">Artribe</a>
            <button id="close-mobile-nav-btn" class="text-gray-500 hover:text-gray-800 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <ul class="flex flex-col gap-4 text-primary font-semibold text-lg">
            <li><a href="{{ route('home') }}" class="hover:text-secondary transition-colors">Home</a></li>
            <li><a href="#products" class="hover:text-secondary transition-colors">Products</a></li>
            <li><a href="{{ route('about-us') }}" class="hover:text-secondary transition-colors">About Us</a></li>
            <li><a href="{{ route('contact-us') }}" class="hover:text-secondary transition-colors">Contact</a></li>
        </ul>
    </div>

    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="contact-content">
            <h1 class="text-4xl md:text-6xl font-extrabold text-primary leading-tight mb-4">Contact Us</h1>
            <p class="text-lg md:text-xl text-secondary max-w-3xl mx-auto">
                Get in touch with us for any questions about our heritage products, custom orders, or to learn more about our mission.
            </p>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="container mx-auto px-4 md:px-8 lg:px-16 pb-16">
        <div class="contact-info">
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="bx bx-phone"></i>
                </div>
                <div class="contact-details">
                    <h3>Phone</h3>
                    <p><a href="tel:{{ isset($settings) ? $settings->phone : '' }}">{{ isset($settings) ? $settings->phone : '+1 (234) 567-890' }}</a></p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="contact-details">
                    <h3>Email</h3>
                    <p><a href="mailto:{{ isset($settings) ? $settings->email : '' }}">{{ isset($settings) ? $settings->email : 'info@Artribe.com' }}</a></p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="bx bx-map"></i>
                </div>
                <div class="contact-details">
                    <h3>Address</h3>
                    <p>
                        @if(isset($settings) && $settings->map_url)
                            <a href="{{ $settings->map_url }}" target="_blank">{{ $settings->address ?? 'Visit our location' }}</a>
                        @else
                            {{ isset($settings) ? $settings->address : '123 Heritage Street, Cultural District, City, State 12345' }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-content">
        <div class="footer-section">
          <h4 class="footer-title">Heritage</h4>
          <ul class="footer-links">
            <li><a href="{{ route('about-us') }}">Our Story</a></li>
            <li><a href="#artists">Featured Artists</a></li>
            <li><a href="#categories">Categories</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4 class="footer-title">Traditions</h4>
          <ul class="footer-links">
            @if(isset($categories))
              @foreach($categories as $category)
              <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
              @endforeach
            @else
              <li><a href="#">Traditional Crafts</a></li>
              <li><a href="#">Cultural Art</a></li>
              <li><a href="#">Heritage Items</a></li>
            @endif
          </ul>
        </div>
        <div class="footer-section">
          <h4 class="footer-title">Community</h4>
          <ul class="footer-links">
            <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
            <li><a href="#featured">Featured Items</a></li>
            <li><a href="#bestsellers">Bestsellers</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4 class="footer-title">Connect</h4>
          <ul class="footer-links">
            @if(isset($settings))
              @if($settings->email)
                <li><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></li>
              @endif
              @if($settings->phone)
                <li><a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a></li>
              @endif
              @if($settings->address)
                <li>{{ $settings->address }}</li>
              @endif
            @else
              <li><a href="mailto:info@Artribe.com">info@Artribe.com</a></li>
              <li><a href="tel:+1234567890">+1 (234) 567-890</a></li>
            @endif
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} {{ isset($settings) ? $settings->site_name : 'Tatva Tales' }}. Honoring traditions with respect and reverence.</p>
      </div>
    </footer>
  </div>

  <script>
    // Mobile Navigation
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileNav = document.getElementById('mobile-nav');
    const closeMobileNavBtn = document.getElementById('close-mobile-nav-btn');
    const mobileNavOverlay = document.getElementById('mobile-nav-overlay');

    function openMobileNav() {
        mobileNav.classList.add('active');
        mobileNavOverlay.classList.add('active');
    }

    function closeMobileNav() {
        mobileNav.classList.remove('active');
        mobileNavOverlay.classList.remove('active');
    }

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', openMobileNav);
    }
    if (closeMobileNavBtn) {
        closeMobileNavBtn.addEventListener('click', closeMobileNav);
    }
    if (mobileNavOverlay) {
        mobileNavOverlay.addEventListener('click', closeMobileNav);
    }

    // Cart count functionality
    function updateCartCount() {
        fetch('{{ route("cart.count") }}')
            .then(response => response.json())
            .then(data => {
                const cartCountSpan = document.getElementById('cart-count');
                if (data.count > 0) {
                    cartCountSpan.textContent = data.count;
                    cartCountSpan.classList.remove('hidden');
                } else {
                    cartCountSpan.classList.add('hidden');
                }
            })
            .catch(error => {
                console.error('Error updating cart count:', error);
            });
    }

    // Update cart count on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateCartCount();
    });
  </script>
</body>
</html>
