<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Tatva Tales - Heritage & Culture' }}</title>
  <meta name="description" content="{{ $meta_description ?? 'Discover authentic cultural heritage and traditional craftsmanship' }}">
  <meta name="keywords" content="{{ $meta_keywords ?? 'heritage, culture, traditional crafts, indigenous art' }}">
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

.header .flex {
  display: flex !important;
}

.header .items-center {
  align-items: center !important;
}

.header .justify-between {
  justify-content: space-between !important;
}

.header .gap-2 {
  gap: 0.5rem !important;
}

.header .gap-4 {
  gap: 1rem !important;
}

.header .gap-8 {
  gap: 2rem !important;
}

.header .text-3xl {
  font-size: 1.875rem !important;
  line-height: 2.25rem !important;
}

.header .text-2xl {
  font-size: 1.5rem !important;
  line-height: 2rem !important;
}

.header .font-bold {
  font-weight: 700 !important;
}

.header .font-serif {
  font-family: 'Playfair Display', serif !important;
}

.header .font-semibold {
  font-weight: 600 !important;
}

.header .text-primary {
  color: #5B4B4B !important;
}

.header .text-secondary {
  color: #A47D68 !important;
}

.header .text-gray-500 {
  color: #6b7280 !important;
}

.header .text-gray-800 {
  color: #1f2937 !important;
}

.header .hover\:text-secondary:hover {
  color: #A47D68 !important;
}

.header .hover\:text-gray-800:hover {
  color: #1f2937 !important;
}

.header .transition-colors {
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke !important;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;
  transition-duration: 150ms !important;
}

.header .py-4 {
  padding-top: 1rem !important;
  padding-bottom: 1rem !important;
}

.header .px-4 {
  padding-left: 1rem !important;
  padding-right: 1rem !important;
}

.header .md\:px-8 {
  padding-left: 2rem !important;
  padding-right: 2rem !important;
}

.header .lg\:px-16 {
  padding-left: 4rem !important;
  padding-right: 4rem !important;
}

.header .hidden {
  display: none !important;
}

.header .md\:flex {
  display: flex !important;
}

.header .md\:hidden {
  display: none !important;
}

.header .md\:inline-block {
  display: inline-block !important;
}

.header .relative {
  position: relative !important;
}

.header .absolute {
  position: absolute !important;
}

.header .top-0 {
  top: 0 !important;
}

.header .right-0 {
  right: 0 !important;
}

.header .-mt-1 {
  margin-top: -0.25rem !important;
}

.header .-mr-1 {
  margin-right: -0.25rem !important;
}

.header .bg-red-500 {
  background-color: #ef4444 !important;
}

.header .text-white {
  color: #ffffff !important;
}

.header .text-xs {
  font-size: 0.75rem !important;
  line-height: 1rem !important;
}

.header .rounded-full {
  border-radius: 9999px !important;
}

.header .h-4 {
  height: 1rem !important;
}

.header .w-4 {
  width: 1rem !important;
}

.header .h-6 {
  height: 1.5rem !important;
}

.header .w-6 {
  width: 1.5rem !important;
}

.header .h-8 {
  height: 2rem !important;
}

.header .w-8 {
  width: 2rem !important;
}

.header .flex {
  display: flex !important;
}

.header .items-center {
  align-items: center !important;
}

.header .justify-center {
  justify-content: center !important;
}

.header .mb-6 {
  margin-bottom: 1.5rem !important;
}

.header .text-lg {
  font-size: 1.125rem !important;
  line-height: 1.75rem !important;
}

.header .flex-col {
  flex-direction: column !important;
}

.header .gap-4 {
  gap: 1rem !important;
}

.header .fixed {
  position: fixed !important;
}

.header .inset-0 {
  top: 0 !important;
  right: 0 !important;
  bottom: 0 !important;
  left: 0 !important;
}

.header .z-40 {
  z-index: 40 !important;
}

.header .z-50 {
  z-index: 50 !important;
}

.header .h-full {
  height: 100% !important;
}

.header .w-64 {
  width: 16rem !important;
}

.header .bg-light-bg {
  background-color: #F5F5E9 !important;
}

.header .shadow-xl {
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
}

.header .p-6 {
  padding: 1.5rem !important;
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

/* Slideshow Section */
/* ===============================
   Slideshow Section (Full Image)
================================= */
.slideshow {
  position: relative;
  height: 600px;
  overflow: hidden;
}

.slideshow-container {
  position: relative;
  width: 100%;
  height: 100%;
}

.slide {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  transition: opacity 1s ease-in-out;
}

.slide.active {
  opacity: 1;
  z-index: 2;
}

/* Full Background Image */
.slide-image {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
.slide-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transform: scale(1.1);
  transition: transform 8s ease-in-out;
}
.slide.active .slide-image img {
  transform: scale(1);
}

/* Dark Overlay for Readability */
.slide-image::before {
  content: '';
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.35);
  z-index: 1;
}

/* Centered Content */
.slide-content {
  position: relative;
  z-index: 2;
  text-align: center;
  color: #fff;
  max-width: 800px;
  margin: 0 auto;
  top: 50%;
  transform: translateY(-50%);
  opacity: 0;
  transition: all 0.8s ease-in-out 0.3s;
}
.slide.active .slide-content {
  opacity: 1;
  transform: translateY(-50%) scale(1);
}

/* Titles */
.slide-title {
  font-size: 52px;
  font-weight: 800;
  margin-bottom: 20px;
  text-shadow: 2px 2px 6px rgba(0,0,0,0.4);
}
.slide-subtitle {
  font-size: 22px;
  font-weight: 500;
  margin-bottom: 35px;
  text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
}

/* ===============================
   Modern Button Placement & Style
================================= */
.slide-buttons {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-top: 20px;
}

.slide-buttons .btn {
  padding: 14px 32px;
  font-size: 16px;
  font-weight: 600;
  border-radius: 50px; /* pill shape */
  border: 2px solid transparent;
  cursor: pointer;
  transition: all 0.35s ease-in-out;
  transform: translateY(20px);
  opacity: 0;
}

/* Staggered animation */
.slide.active .slide-buttons .btn:nth-child(1) {
  transition-delay: 0.4s;
  transform: translateY(0);
  opacity: 1;
}
.slide.active .slide-buttons .btn:nth-child(2) {
  transition-delay: 0.6s;
  transform: translateY(0);
  opacity: 1;
}

/* Primary Button (solid) */
.btn-primary {
  background: #a0865f;
  color: #fff;
  border-color: #a0865f;
  box-shadow: 0 4px 12px rgba(160,134,95,0.3);
}
.btn-primary:hover {
  background: #8b7355;
  border-color: #8b7355;
  transform: translateY(-3px);
  box-shadow: 0 6px 16px rgba(139,115,85,0.4);
}

/* Secondary Button (outlined) */
.btn-secondary {
  background: transparent;
  color: #fff;
  border: 2px solid rgba(255,255,255,0.8);
}
.btn-secondary:hover {
  background: rgba(255,255,255,0.1);
  border-color: #fff;
  transform: translateY(-3px);
  box-shadow: 0 6px 16px rgba(255,255,255,0.2);
}

/* Navigation Dots */
.slideshow-dots {
  position: absolute;
  bottom: 25px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 12px;
  z-index: 3;
}
.dot {
  width: 12px; height: 12px;
  border-radius: 50%;
  background: rgba(255,255,255,0.5);
  cursor: pointer;
  transition: 0.3s ease-in-out;
}
.dot.active, .dot:hover {
  background: #a0865f;
  transform: scale(1.2);
}

/* Arrows */
.slideshow-nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(160,134,95,0.9);
  color: white;
  border: none;
  width: 50px; height: 50px;
  font-size: 22px;
  cursor: pointer;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 3;
  transition: all 0.3s ease-in-out;
}
.slideshow-nav:hover {
  background: #8b7355;
  transform: translateY(-50%) scale(1.1);
}
.slideshow-nav.prev { left: 25px; }
.slideshow-nav.next { right: 25px; }

.featured-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

.featured-card {
  background: rgba(245, 241, 235, 0.9);
  border-radius: 20px;
  overflow: hidden;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  border: 1px solid rgba(212, 196, 168, 0.3);
  backdrop-filter: blur(15px);
  animation: fadeInUp 0.6s ease-out forwards;
  opacity: 0;
  transform: translateY(30px);
}

.featured-card:nth-child(1) { animation-delay: 0.1s; }
.featured-card:nth-child(2) { animation-delay: 0.2s; }
.featured-card:nth-child(3) { animation-delay: 0.3s; }

.featured-card.large {
  grid-row: span 2;
}

.featured-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 40px rgba(139, 115, 85, 0.2);
}

.featured-image {
  position: relative;
  height: 250px;
  overflow: hidden;
}

.featured-card.large .featured-image {
  height: 350px;
}

.featured-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.featured-card:hover .featured-image img {
  transform: scale(1.05);
}

.featured-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, rgba(160, 134, 95, 0.1) 0%, transparent 70%);
  display: flex;
  align-items: flex-start;
  justify-content: flex-end;
  padding: 20px;
}

.featured-badge {
  background: linear-gradient(135deg, #a0865f, #8b7355);
  color: white;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.featured-content {
  padding: 24px;
}

.featured-card.large .featured-content {
  padding: 32px;
}

.featured-title {
  font-size: 20px;
  font-weight: 700;
  color: #6d5a42;
  margin-bottom: 12px;
}

.featured-card.large .featured-title {
  font-size: 24px;
}

.featured-description {
  font-size: 14px;
  color: #8b7355;
  line-height: 1.6;
  margin-bottom: 16px;
}

.featured-card.large .featured-description {
  font-size: 16px;
  margin-bottom: 20px;
}

.featured-price {
  font-size: 18px;
  font-weight: 700;
  color: #a0865f;
  margin-bottom: 20px;
}

/* Bestsellers Section */
/* ===========================
   Bestsellers Section
=========================== */
.bestsellers {
  padding: 80px 60px;
  background: linear-gradient(135deg, rgba(232, 220, 198, 0.98) 0%, rgba(212, 196, 168, 0.98) 100%);
  position: relative;
  text-align: center;
}

.bestsellers::before {
  content: '';
  position: absolute;
  inset: 0;
  background: 
    radial-gradient(circle at 25% 15%, rgba(139, 115, 85, 0.05) 0%, transparent 50%),
    radial-gradient(circle at 75% 85%, rgba(160, 134, 95, 0.05) 0%, transparent 50%);
  z-index: 1;
}

/* Section header */
.section-header {
  position: relative;
  z-index: 2;
  margin-bottom: 50px;
}
.section-title {
  font-size: 48px;
  font-weight: 900;
  color: #5a4632; /* deep earthy brown */
  margin-bottom: 20px;
  position: relative;
  display: inline-block;
  letter-spacing: 1px;
  line-height: 1.2;
  text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
}

.section-subtitle {
  font-size: 16px;
  color: #8b7355;
}

/* Grid layout */
.bestsellers-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 30px;
  position: relative;
  z-index: 2;
}

/* Card styling */
.bestseller-card {
  background: rgba(255, 255, 255, 0.95);
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid rgba(212, 196, 168, 0.3);
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
}

.bestseller-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 30px rgba(139, 115, 85, 0.2);
}

/* Image */
.bestseller-image {
  position: relative;
  height: 220px;
  overflow: hidden;
}
.bestseller-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}
.bestseller-card:hover .bestseller-image img {
  transform: scale(1.08);
}

/* Badge */
.bestseller-badge {
  position: absolute;
  top: 12px;
  left: 12px;
  background: linear-gradient(135deg, #a0865f, #8b7355);
  color: #fff;
  padding: 6px 12px;
  font-size: 12px;
  font-weight: 600;
  border-radius: 20px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

/* Content */
.bestseller-content {
  padding: 20px;
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  text-align: left;
}
.bestseller-title {
  font-size: 18px;
  font-weight: 700;
  color: #6d5a42;
  margin-bottom: 10px;
}

/* Ratings */
.bestseller-rating {
  font-size: 14px;
  color: #8b7355;
  margin-bottom: 12px;
}
.stars {
  color: #f4c542; /* gold stars */
  margin-right: 5px;
}

/* Price */
.bestseller-price {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-top: auto;
}
.current-price {
  font-size: 18px;
  font-weight: 700;
  color: #a0865f;
}
.original-price {
  font-size: 14px;
  color: #999;
  text-decoration: line-through;
}


/* Buttons */
.btn {
  padding: 18px 36px;
  border: none;
  border-radius: 12px;
  font-size: 16px;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
  display: inline-block;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: left 0.5s ease;
}

.btn:hover::before {
  left: 100%;
}

.btn-primary {
  background: linear-gradient(135deg, #a0865f, #8b7355);
  color: white;
  box-shadow: 0 4px 15px rgba(160, 134, 95, 0.3);
}

.btn-primary:hover {
  background: linear-gradient(135deg, #8b7355, #6d5a42);
  transform: translateY(-3px);
  box-shadow: 0 8px 25px rgba(160, 134, 95, 0.4);
}

/* Secondary Button (light beige) */
.btn-secondary {
  background: rgba(245, 235, 220, 0.9); /* light beige */
  color: #333;
  border: 2px solid #f5ebdc;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.btn-secondary:hover {
  background: #f5ebdc; /* solid beige on hover */
  border-color: #f5ebdc;
  color: #222;
  transform: translateY(-3px);
  box-shadow: 0 6px 16px rgba(0,0,0,0.25);
}


.btn-large {
  padding: 20px 40px;
  font-size: 18px;
}

/* Categories Section */
.categories {
  padding: 80px 60px;
  background: 
    linear-gradient(135deg, rgba(245, 241, 235, 0.98) 0%, rgba(232, 220, 198, 0.98) 100%);
  position: relative;
  overflow: hidden;
}

.categories::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: 
    radial-gradient(circle at 15% 25%, rgba(160, 134, 95, 0.05) 0%, transparent 50%),
    radial-gradient(circle at 85% 75%, rgba(212, 196, 168, 0.05) 0%, transparent 50%);
  z-index: 1;
  animation: float 20s ease-in-out infinite;
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
}

.categories-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

/* Base Card */
.category-card {
  display: flex;
  flex-direction: column;
  background: rgba(255, 255, 255, 0.95);
  border-radius: 20px;
  overflow: hidden;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  border: 1px solid rgba(212, 196, 168, 0.3);
  backdrop-filter: blur(15px);
  position: relative;
  min-height: 280px;
  animation: slideInUp 0.6s ease-out forwards;
  opacity: 0;
  transform: translateY(30px);
  box-shadow: 0 4px 12px rgba(139, 115, 85, 0.1);
  text-align: center;
  padding: 0;
}

.category-card:nth-child(1) { animation-delay: 0.1s; }
.category-card:nth-child(2) { animation-delay: 0.2s; }
.category-card:nth-child(3) { animation-delay: 0.3s; }
.category-card:nth-child(4) { animation-delay: 0.4s; }

@keyframes slideInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Modern Hover Overlay */
.category-card::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(160, 134, 95, 0.05));
  opacity: 0;
  transition: opacity 0.4s ease;
  z-index: 2;
  pointer-events: none;
}

.category-card:hover::before {
  opacity: 1;
}

/* Subtle Lift + Shadow */
.category-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 30px rgba(139, 115, 85, 0.2);
  border-color: #A47D68;
}

/* Shine Sweep Animation */
.category-card::after {
  content: '';
  position: absolute;
  top: 0;
  left: -75%;
  width: 50%;
  height: 100%;
  background: linear-gradient(
    120deg,
    transparent,
    rgba(255, 255, 255, 0.4),
    transparent
  );
  transform: skewX(-20deg);
  z-index: 3;
  opacity: 0;
}

.category-card:hover::after {
  animation: shine 1s forwards;
  opacity: 1;
}

@keyframes shine {
  0% { left: -75%; }
  100% { left: 125%; }
}

/* Category Icon */
.category-icon {
  margin-bottom: 20px;
  display: flex;
  justify-content: center;
}

.category-icon .icon-placeholder {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, #A47D68, #8B7355);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  box-shadow: 0 8px 20px rgba(160, 134, 95, 0.3);
  transition: all 0.3s ease;
}

.category-card:hover .category-icon .icon-placeholder {
  transform: scale(1.1);
  box-shadow: 0 12px 25px rgba(160, 134, 95, 0.4);
}

.category-content {
  padding: 32px 24px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: #5B4B4B; /* dark brown for readability */
  position: relative;
  z-index: 4; /* above overlays */
  flex: 1;
  text-align: center;
}

.category-card:hover .category-content {
  color: white;
}

.category-title {
  font-size: 24px;
  font-weight: 700;
  color: #5B4B4B; /* dark brown */
  margin-bottom: 12px;
  transition: all 0.3s ease;
  line-height: 1.2;
}

.category-card:hover .category-title {
  color: #5B4B4B;
  transform: translateY(-2px);
}

.category-description {
  font-size: 15px;
  line-height: 1.6;
  color: #8B7355; /* muted brown */
  margin-bottom: 16px;
  transition: color 0.3s ease;
  flex: 1;
  max-width: 280px;
}   

.category-card:hover .category-description {
  color: #8B7355;
}

.category-count {
  font-size: 14px;
  color: #5B4B4B;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 20px;
  transition: all 0.4s ease;
}

.category-card:hover .category-count {
  color: #5B4B4B;
  transform: translateY(-2px);
}

/* Explore Category Button */
.explore-category-btn {
  display: inline-block;
  padding: 12px 24px;
  background: #F5F5E9; /* light beige background */
  color: #5B4B4B; /* dark brown text */
  text-decoration: none;
  border-radius: 25px;
  font-weight: 600;
  font-size: 14px;
  text-align: center;
  transition: all 0.3s ease;
  border: 2px solid #F5F5E9;
  box-shadow: 0 2px 8px rgba(91, 75, 75, 0.1);
  align-self: center;
  margin-top: auto;
}

.explore-category-btn:hover {
  background: #E8DCC6; /* slightly darker beige on hover */
  color: #5B4B4B;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(91, 75, 75, 0.2);
  text-decoration: none;
}
/* Artists Section */
.artists {
  padding: 80px 60px;
  background: 
    linear-gradient(135deg, rgba(232, 220, 198, 0.98) 0%, rgba(212, 196, 168, 0.98) 100%);
  position: relative;
  overflow: hidden;
}

.artists::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: 
    radial-gradient(circle at 25% 15%, rgba(139, 115, 85, 0.05) 0%, transparent 50%),
    radial-gradient(circle at 75% 85%, rgba(160, 134, 95, 0.05) 0%, transparent 50%);
  z-index: 1;
  animation: pulse 15s ease-in-out infinite;
}

@keyframes pulse {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.8; }
}

.artists-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
  gap: 32px;
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

.artist-card {
  background: rgba(245, 241, 235, 0.95);
  border-radius: 24px;
  padding: 32px;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  border: 1px solid rgba(212, 196, 168, 0.4);
  backdrop-filter: blur(20px);
  position: relative;
  overflow: hidden;
  animation: fadeInScale 0.6s ease-out forwards;
  opacity: 0;
  transform: scale(0.9);
}

.artist-card:nth-child(1) { animation-delay: 0.1s; }
.artist-card:nth-child(2) { animation-delay: 0.2s; }
.artist-card:nth-child(3) { animation-delay: 0.3s; }

@keyframes fadeInScale {
  to {
    opacity: 1;
    transform: scale(1);
  }
}

.artist-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(160, 134, 95, 0.1), rgba(139, 115, 85, 0.1));
  opacity: 0;
  transition: opacity 0.4s ease;
  border-radius: 24px;
}

.artist-card:hover::before {
  opacity: 1;
}

.artist-card:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: 0 20px 40px rgba(139, 115, 85, 0.2);
  border-color: #a0865f;
}

.artist-header {
  display: flex;
  align-items: center;
  gap: 24px;
  margin-bottom: 24px;
  position: relative;
  z-index: 2;
}

.artist-image {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  overflow: hidden;
  flex-shrink: 0;
  border: 3px solid #d4c4a8;
  transition: all 0.4s ease;
  position: relative;
}

.artist-image::before {
  content: '';
  position: absolute;
  top: -3px;
  left: -3px;
  right: -3px;
  bottom: -3px;
  border-radius: 50%;
  background: linear-gradient(135deg, #a0865f, #8b7355);
  opacity: 0;
  transition: opacity 0.4s ease;
  z-index: -1;
}

.artist-card:hover .artist-image::before {
  opacity: 1;
}

.artist-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.artist-card:hover .artist-image img {
  transform: scale(1.1);
}

.artist-basic-info {
  flex: 1;
}

.artist-name {
  font-size: 24px;
  font-weight: 700;
  color: #6d5a42;
  margin-bottom: 6px;
  transition: color 0.4s ease;
}

.artist-card:hover .artist-name {
  color: #5a4a35;
}

.artist-specialty {
  font-size: 14px;
  color: #a0865f;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1px;
  background: rgba(160, 134, 95, 0.1);
  padding: 4px 12px;
  border-radius: 20px;
  display: inline-block;
  transition: all 0.4s ease;
}

.artist-card:hover .artist-specialty {
  background: rgba(160, 134, 95, 0.2);
  transform: translateX(4px);
}

.artist-description {
  font-size: 16px;
  color: #8b7355;
  line-height: 1.6;
  margin-bottom: 20px;
  position: relative;
  z-index: 2;
  transition: color 0.4s ease;
}

.artist-card:hover .artist-description {
  color: #6d5a42;
}

.artist-stats {
  display: flex;
  gap: 12px;
  position: relative;
  z-index: 2;
}

.artist-stats .stat {
  font-size: 13px;
  color: #6d5a42;
  font-weight: 600;
  background: rgba(212, 196, 168, 0.4);
  padding: 8px 16px;
  border-radius: 20px;
  transition: all 0.4s ease;
  border: 1px solid rgba(160, 134, 95, 0.2);
}

.artist-card:hover .artist-stats .stat {
  background: rgba(160, 134, 95, 0.3);
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(139, 115, 85, 0.1);
}

/* About Section */
.about {
  padding: 100px 60px;
  background: 
    linear-gradient(135deg, rgba(169, 152, 123, 0.98) 0%, rgba(201, 184, 150, 0.98) 100%);
  position: relative;
  overflow: hidden;
}

.about::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: 
    radial-gradient(circle at 35% 25%, rgba(109, 90, 66, 0.05) 0%, transparent 50%),
    radial-gradient(circle at 65% 75%, rgba(139, 115, 85, 0.05) 0%, transparent 50%);
  z-index: 1;
  animation: breathe 12s ease-in-out infinite;
}

@keyframes breathe {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.02); }
}

.about-container {
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

.about-content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 80px;
  align-items: center;
}

.about-text {
  animation: slideInLeft 0.8s ease-out forwards;
  opacity: 0;
  transform: translateX(-30px);
}

@keyframes slideInLeft {
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.about-description {
  font-size: 18px;
  color: #6d5a42;
  line-height: 1.8;
  margin-bottom: 28px;
  font-weight: 400;
  letter-spacing: 0.3px;
}

.about-values {
  display: grid;
  gap: 24px;
  margin-top: 40px;
}

.value-item {
  padding: 28px;
  background: rgba(245, 241, 235, 0.8);
  border-radius: 16px;
  border: 1px solid rgba(212, 196, 168, 0.4);
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  backdrop-filter: blur(15px);
  position: relative;
  overflow: hidden;
}

.value-item::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(160, 134, 95, 0.1), transparent);
  transition: left 0.6s ease;
}

.value-item:hover::before {
  left: 100%;
}

.value-item:hover {
  transform: translateX(8px);
  box-shadow: 0 12px 24px rgba(139, 115, 85, 0.15);
  border-color: #a0865f;
}

.value-title {
  font-size: 20px;
  font-weight: 700;
  color: #6d5a42;
  margin-bottom: 12px;
  position: relative;
  z-index: 2;
}

.value-title::before {
  content: '';
  position: absolute;
  left: -16px;
  top: 50%;
  transform: translateY(-50%);
  width: 4px;
  height: 20px;
  background: linear-gradient(135deg, #a0865f, #8b7355);
  border-radius: 2px;
  transition: height 0.4s ease;
}

.value-item:hover .value-title::before {
  height: 100%;
}

.value-text {
  font-size: 16px;
  color: #8b7355;
  line-height: 1.6;
  position: relative;
  z-index: 2;
}

.about-image {
  position: relative;
  animation: slideInRight 0.8s ease-out 0.2s forwards;
  opacity: 0;
  transform: translateX(30px);
}

@keyframes slideInRight {
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.about-image::before {
  content: '';
  position: absolute;
  top: -20px;
  left: -20px;
  right: 20px;
  bottom: 20px;
  background: linear-gradient(135deg, rgba(160, 134, 95, 0.2), rgba(139, 115, 85, 0.2));
  border-radius: 24px;
  z-index: -1;
  transition: all 0.4s ease;
}

.about-image:hover::before {
  top: -24px;
  left: -24px;
  right: 24px;
  bottom: 24px;
}

.about-image img {
  width: 100%;
  height: 450px;
  object-fit: cover;
  border-radius: 20px;
  box-shadow: 0 25px 50px rgba(139, 115, 85, 0.25);
  transition: transform 0.4s ease;
}

.about-image:hover img {
  transform: scale(1.02);
}

/* .about-stats {
  display: flex;
  justify-content: space-around;
  margin-top: 32px;
  padding: 28px;
  background: rgba(245, 241, 235, 0.95);
  border-radius: 16px;
  backdrop-filter: blur(15px);
  border: 1px solid rgba(212, 196, 168, 0.3);
  transition: all 0.4s ease;
} */

.about-stats {
  display: flex;
  gap: 20px;
  margin-top: 20px;
}

.about-stat {
  background: linear-gradient(135deg, #f5f1eb, #e4d8c0);
  padding: 20px 25px;
  border-radius: 15px;
  text-align: center;
  flex: 1;
  box-shadow: 0 10px 25px rgba(139, 115, 85, 0.15);
  transition: all 0.3s ease;
  transform: translateY(0);
}

.about-stat:hover {
  transform: translateY(-5px) scale(1.03);
  box-shadow: 0 15px 30px rgba(139, 115, 85, 0.25);
}

.about-stat-number {
  font-size: 28px;
  font-weight: 800;
  color: #5a4632;
}

.about-stat-label {
  display: block;
  margin-top: 6px;
  font-size: 14px;
  color: #8b7355;
}

/* Features Section */
.features {
  padding: 80px 60px;
  background: 
    linear-gradient(135deg, rgba(245, 241, 235, 0.98) 0%, rgba(232, 220, 198, 0.98) 100%);
  position: relative;
}

.features::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: 
    radial-gradient(circle at 20% 30%, rgba(160, 134, 95, 0.05) 0%, transparent 50%),
    radial-gradient(circle at 80% 70%, rgba(212, 196, 168, 0.05) 0%, transparent 50%);
  z-index: 1;
}

.section-header {
  text-align: center;
  margin-bottom: 80px;
  animation: fadeInUp 0.8s ease-out forwards;
  opacity: 0;
  transform: translateY(20px);
}

@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.section-title {
  font-size: 42px;
  font-weight: 800;
  color: #6d5a42;
  margin-bottom: 16px;
  text-shadow: 1px 1px 2px rgba(139, 115, 85, 0.1);
  position: relative;
  display: inline-block;
}

.section-title:hover {
  color: #a0865f; /* gold accent on hover */
  text-shadow: 0 4px 12px rgba(160, 134, 95, 0.4);
}

.section-title::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 0;
  height: 4px;
  background: linear-gradient(90deg, #94764a, #d4b97d);
  border-radius: 2px;
  transition: width 0.6s ease;
}

.section-title:hover::after {
  width: 70px; /* expands on hover */
}
@keyframes expandWidth {
  to {
    width: 60px;
  }
}

.section-subtitle {
  font-size: 18px;
  color: #8b7355;
  font-weight: 500;
  margin-top: 24px;
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

.feature-card {
  text-align: center;
  padding: 32px 24px;
  border-radius: 16px;
  background: rgba(245, 241, 235, 0.9);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(212, 196, 168, 0.3);
  transition: all 0.3s ease;
}

.feature-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 40px rgba(139, 115, 85, 0.15);
}

.feature-icon {
  margin-bottom: 24px;
}

.icon-placeholder {
  width: 64px;
  height: 64px;
  background: linear-gradient(135deg, #a0865f, #8b7355);
  border-radius: 50%;
  margin: 0 auto;
  box-shadow: 0 8px 20px rgba(160, 134, 95, 0.3);
}

.feature-title {
  font-size: 24px;
  font-weight: 700;
  color: #6d5a42;
  margin-bottom: 16px;
}

.feature-description {
  font-size: 16px;
  color: #8b7355;
  line-height: 1.6;
}

/* Stats Section */
.stats {
  padding: 80px 60px;
  background: 
    linear-gradient(135deg, #6d5a42 0%, #5a4a35 100%),
    repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(160, 134, 95, 0.1) 10px, rgba(160, 134, 95, 0.1) 20px);
}

.stats-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 40px;
  max-width: 1000px;
  margin: 0 auto;
}

.stat-item {
  text-align: center;
}

.stat-number {
  font-size: 48px;
  font-weight: 800;
  color: #d4c4a8;
  margin-bottom: 8px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.stat-label {
  font-size: 16px;
  color: #f5f1eb;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 600;
}

/* CTA Section */
.cta {
  padding: 120px 60px;
  background: 
    linear-gradient(135deg, #a0865f 0%, #8b7355 100%),
    repeating-linear-gradient(45deg, transparent, transparent 15px, rgba(245, 241, 235, 0.1) 15px, rgba(245, 241, 235, 0.1) 30px);
  text-align: center;
  position: relative;
}

.cta::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: 
    radial-gradient(circle at 20% 20%, rgba(245, 241, 235, 0.1) 2px, transparent 2px),
    radial-gradient(circle at 80% 80%, rgba(212, 196, 168, 0.1) 1px, transparent 1px);
  background-size: 40px 40px, 60px 60px;
}

.cta-content {
  max-width: 600px;
  margin: 0 auto;
}

.cta-title {
  font-size: 42px;
  font-weight: 700;
  color: white;
  margin-bottom: 16px;
}

.cta-subtitle {
  font-size: 18px;
  color: rgba(255, 255, 255, 0.9);
  margin-bottom: 40px;
}

.cta .btn-primary {
  background: linear-gradient(135deg, #f5f1eb, #e8dcc6);
  color: #6d5a42;
  position: relative;
  z-index: 2;
}

.cta .btn-primary:hover {
  background: linear-gradient(135deg, #e8dcc6, #d4c4a8);
  transform: translateY(-3px);
  box-shadow: 0 10px 30px rgba(245, 241, 235, 0.4);
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

/* Products Sidebar Styles */
.products-sidebar .product-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 40px rgba(139, 115, 85, 0.2);
}

.products-sidebar .product-card:hover .product-image img {
  transform: scale(1.05);
}

.products-sidebar .btn:hover {
  background: linear-gradient(135deg, #8b7355, #6d5a42);
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(139, 115, 85, 0.4);
}

/* Responsive Design */
@media (max-width: 768px) {
  .slideshow {
    height: 600px;
  }
  
  .slide {
    flex-direction: column;
  }

  .slide-content {
    padding: 40px 30px;
    text-align: center;
  }

  .slide-title {
    font-size: 36px;
  }

  .slide-buttons {
    justify-content: center;
    flex-wrap: wrap;
  }

 .slideshow-nav {
    width: 50px;
    height: 50px;
    font-size: 20px;
  }
 /* ////////////////////////////////////////////////////////////////////////////////// */
  /* ===============================
   Featured Grid Section
================================= */
.featured-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

/* Featured Card */
.featured-card {
  background: rgba(245, 241, 235, 0.9);
  border-radius: 20px;
  border: 1px solid rgba(212, 196, 168, 0.3);
  backdrop-filter: blur(15px);
  overflow: hidden;
  opacity: 0;
  transform: translateY(30px);
  animation: fadeInUp 0.6s ease-out forwards;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.featured-card:nth-child(1) { animation-delay: 0.1s; }
.featured-card:nth-child(2) { animation-delay: 0.2s; }
.featured-card:nth-child(3) { animation-delay: 0.3s; }

.featured-card.large {
  grid-row: span 2;
}

.featured-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 40px rgba(139, 115, 85, 0.2);
}

/* Featured Image */
/* ===============================
   Featured Grid Section
================================= */
.featured-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

/* Featured Card */
.featured-card {
  background: rgba(245, 241, 235, 0.9);
  border-radius: 20px;
  border: 1px solid rgba(212, 196, 168, 0.3);
  backdrop-filter: blur(15px);
  overflow: hidden;
  opacity: 0;
  transform: translateY(30px);
  animation: fadeInUp 0.6s ease-out forwards;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.featured-card:nth-child(1) { animation-delay: 0.1s; }
.featured-card:nth-child(2) { animation-delay: 0.2s; }
.featured-card:nth-child(3) { animation-delay: 0.3s; }

.featured-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 40px rgba(139, 115, 85, 0.2);
}

/* Featured Image */
.featured-image {
  position: relative;
  height: 250px; /* fixed height for all images */
  overflow: hidden;
}

.featured-image img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* crops evenly */
}

.featured-card:hover .featured-image img {
  transform: scale(1.05);
}

/* Overlay Badge */
.featured-overlay {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: flex-start;
  justify-content: flex-end;
  padding: 20px;
  background: linear-gradient(45deg, rgba(160, 134, 95, 0.1) 0%, transparent 70%);
}

.featured-badge {
  background: linear-gradient(135deg, #a0865f, #8b7355);
  color: #fff;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

/* Card Content */
.featured-content {
  padding: 24px;
}

.featured-title {
  font-size: 20px;
  font-weight: 700;
  color: #6d5a42;
  margin-bottom: 12px;
}

.featured-description {
  font-size: 14px;
  color: #8b7355;
  line-height: 1.6;
  margin-bottom: 16px;
}

.featured-price {
  font-size: 18px;
  font-weight: 700;
  color: #a0865f;
  margin-bottom: 20px;
}

/* ===============================
   Bestsellers Section
================================= */
.bestsellers {
  padding: 80px 60px;
  background: linear-gradient(135deg, rgba(232, 220, 198, 0.98), rgba(212, 196, 168, 0.98));
  position: relative;
  overflow: hidden;
}

.bestsellers::before {
  content: '';
  position: absolute;
  inset: 0;
  background: 
    radial-gradient(circle at 25% 15%, rgba(139, 115, 85, 0.05) 0%, transparent 50%),
    radial-gradient(circle at 75% 85%, rgba(160, 134, 95, 0.05) 0%, transparent 50%);
  z-index: 1;
}

.bestsellers-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
  position: relative;
  z-index: 2;
}

  .categories-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }

  .category-card {
    height: auto;
    flex-direction: column;
    min-height: 280px;
  }

  .category-content {
    padding: 24px 20px;
  }

  .category-title {
    font-size: 22px;
  }

  .category-description {
    font-size: 14px;
    max-width: 100%;
  }

  .explore-category-btn {
    align-self: center;
    margin-top: 8px;
  }

  .features-grid {
    grid-template-columns: 1fr;
  }

  .artists-grid {
    grid-template-columns: 1fr;
  }

  .artist-header {
    flex-direction: column;
    text-align: center;
    gap: 16px;
  }

  .about-content {
    grid-template-columns: 1fr;
    gap: 40px;
  }

  .section-title {
    font-size: 32px;
  }

  .stats {
    padding: 60px 30px;
  }

  .stats-container {
    grid-template-columns: repeat(2, 1fr);
  }

  .cta {
    padding: 60px 30px;
  }

  .cta-title {
    font-size: 32px;
  }

  .footer {
    padding: 40px 30px 20px;
  }

  .footer-content {
    grid-template-columns: repeat(2, 1fr);
  }

  .products-sidebar {
    padding: 30px 20px !important;
  }

  .products-sidebar .products-grid {
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)) !important;
    gap: 16px !important;
  }
}

@media (max-width: 480px) {
  .slideshow {
    height: 500px;
  }
  
  .slide-title {
    font-size: 28px;
  }
  
  .slide-buttons {
    flex-direction: column;
    align-items: center;
  }
  
  .slideshow-nav {
    display: none;
  }

  .categories {
    padding: 60px 20px;
  }

  .category-card {
    min-height: 260px;
  }

  .category-content {
    padding: 20px 16px;
  }

  .category-icon .icon-placeholder {
    width: 50px;
    height: 50px;
  }

  .category-title {
    font-size: 20px;
  }

  .category-description {
    font-size: 13px;
    max-width: 100%;
  }

  .explore-category-btn {
    padding: 10px 20px;
    font-size: 13px;
  }
}
.logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--terracotta);
            position: relative;
            padding: 5px 10px;
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
            <li><a href="{{ route('products') }}" class="hover:text-secondary transition-colors">Products</a></li>
            <li><a href="{{ route('about-us') }}" class="hover:text-secondary transition-colors">About Us</a></li>
            <li><a href="{{ route('contact-us') }}" class="hover:text-secondary transition-colors">Contact</a></li>
        </ul>
    </div>

    <!-- Slideshow Section -->
    <section class="slideshow">
      <div class="slideshow-container">
        <div class="slide active">
          <div class="slide-image">
            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=1200&h=600&fit=crop&crop=center"
              alt="Ancient Wisdom">
          </div>
          <div class="slide-content">
            <h1 class="slide-title">Ancient Wisdom, Modern Solutions</h1>
            <p class="slide-subtitle">Connecting Traditions with Innovation</p>
           
          </div>
        </div>

        <div class="slide">
          <div class="slide-image">
            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=1200&h=600&fit=crop&crop=center"
              alt="Traditional Crafts">
          </div>
          <div class="slide-content">
            <h1 class="slide-title">Master Craftsmanship</h1>
            <p class="slide-subtitle">Handcrafted with Sacred Traditions</p>
            
          </div>
        </div>

        <div class="slide">
          <div class="slide-image">
            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1200&h=600&fit=crop&crop=center"
              alt="Cultural Heritage">
          </div>
          <div class="slide-content">
            <h1 class="slide-title">Cultural Heritage</h1>
            <p class="slide-subtitle">Preserving Stories for Future Generations</p>
            
          </div>
        </div>
      </div>

      <!-- Navigation Dots -->
      <div class="slideshow-dots">
        <span class="dot active" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
      </div>

      <!-- Navigation Arrows -->
      <button class="slideshow-nav prev" onclick="changeSlide(-1)">&#10094;</button>
      <button class="slideshow-nav next" onclick="changeSlide(1)">&#10095;</button>
    </section>

    <!-- Products Sidebar -->
    @if(count($products) > 6)
    <section id="products-sidebar" class="products-sidebar" style="background: linear-gradient(135deg, rgba(245, 241, 235, 0.98) 0%, rgba(232, 220, 198, 0.98) 100%); padding: 40px 60px; position: relative;">
      <div class="section-header" style="text-align: center; margin-bottom: 40px;">
        <h2 class="section-title" style="font-size: 36px; color: #6d5a42; margin-bottom: 16px;">All Products</h2>
        <p class="section-subtitle" style="color: #8b7355; font-size: 16px;">Browse our complete collection of {{ count($products) }} heritage items</p>
      </div>
      
      <div class="products-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; max-width: 1400px; margin: 0 auto;">
        @foreach($products as $product)
        <div class="product-card" style="background: rgba(255, 255, 255, 0.95); border-radius: 16px; overflow: hidden; border: 1px solid rgba(212, 196, 168, 0.3); transition: all 0.3s ease; display: flex; flex-direction: column;">
          <div class="product-image" style="position: relative; height: 200px; overflow: hidden;">
            <img src="{{ $product->image ? (str_starts_with($product->image, 'http') ? $product->image : asset('public/images/product/' . $product->image)) : asset('public/images/product/placeholder.jpg') }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;" onerror="this.src='{{ asset('public/images/product/placeholder.jpg') }}'">
            <div class="product-badge" style="position: absolute; top: 12px; left: 12px; background: linear-gradient(135deg, #a0865f, #8b7355); color: #fff; padding: 6px 12px; font-size: 12px; font-weight: 600; border-radius: 20px; text-transform: uppercase; letter-spacing: 0.5px;">
              {{ $product->category_names ?? 'Heritage' }}
            </div>
          </div>
          <div class="product-content" style="padding: 20px; flex: 1; display: flex; flex-direction: column;">
            <h3 class="product-title" style="font-size: 18px; font-weight: 700; color: #6d5a42; margin-bottom: 10px;">{{ $product->name }}</h3>
            <p class="product-description" style="font-size: 14px; color: #8b7355; line-height: 1.6; margin-bottom: 16px; flex: 1;">{{ Str::limit(strip_tags($product->description), 100) }}</p>
            <a href="{{ route('product', $product->product_slug) }}" class="btn btn-primary" style="margin-top: auto; text-align: center; display: inline-block; padding: 12px 24px; background: linear-gradient(135deg, #a0865f, #8b7355); color: white; text-decoration: none; border-radius: 25px; font-weight: 600; transition: all 0.3s ease;">View Details</a>
          </div>
        </div>
        @endforeach
      </div>
    </section>
    @endif

    <!-- Featured Section -->
   <section class="featured" id="featured">
  <div class="section-header" style="
    margin-top: 20px;
">
    <h2 class="section-title">Featured Collections</h2>
    <p class="section-subtitle">Curated pieces that tell extraordinary stories</p>
    @if(count($products) > 6)
    <div style="margin-top: 20px;">
      <a href="#products-sidebar" class="btn btn-secondary" style="display: inline-block; padding: 12px 24px; background: rgba(245, 235, 220, 0.9); color: #333; border: 2px solid #f5ebdc; text-decoration: none; border-radius: 25px; font-weight: 600; transition: all 0.3s ease;">View All {{ count($products) }} Products</a>
    </div>
    @endif
  </div>

  <div class="featured-grid">
    @forelse($featuredProducts as $index => $product)
    <div class="featured-card">
      <div class="featured-image">
        <img src="{{ $product->image ? (str_starts_with($product->image, 'http') ? $product->image : asset('public/images/product/' . $product->image)) : asset('public/images/product/placeholder.jpg') }}" alt="{{ $product->name }}" onerror="this.src='{{ asset('public/images/product/placeholder.jpg') }}'">
        <span class="featured-badge">Featured</span>
      </div>
      <div class="featured-content">
        <h3 class="featured-title">{{ $product->name }}</h3>
        <p class="featured-description">{{ Str::limit(strip_tags($product->description), 120) }}</p>
        <div class="featured-price">{{ $product->category_names ?? 'Heritage Collection' }}</div>
        <a href="{{ route('product', $product->product_slug) }}" class="btn btn-primary">Explore Collection</a>
      </div>
    </div>
    @empty
    <!-- Default featured cards if no products -->
    <div class="featured-card">
      <div class="featured-image">
        <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=600&h=400&fit=crop&crop=center" alt="Sacred Jewelry">
        <span class="featured-badge">Featured</span>
      </div>
      <div class="featured-content">
        <h3 class="featured-title">Sacred Jewelry</h3>
        <p class="featured-description">Handcrafted adornments that connect you to ancient energies and sacred traditions.</p>
        <div class="featured-price">From Rs 89</div>
        <button class="btn btn-primary">Explore Collection</button>
      </div>
    </div>
    @endforelse
  </div>
</section>


   

    <!-- Categories Section -->
    <section class="categories" id="categories">
      <div class="section-header">
        <h2 class="section-title">Explore Categories</h2>
        <p class="section-subtitle">Discover diverse cultural expressions and traditions</p>
      </div>
      <div class="categories-grid">
        @forelse($categoriesForHome as $index => $category)
        <div class="category-card">
          <div class="category-content">
            <div class="category-icon">
              <div class="icon-placeholder">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
              </div>
            </div>
            <h3 class="category-title">{{ $category->name }}</h3>
            <p class="category-description">{{ strip_tags($category->description ?? 'Explore our collection of authentic cultural items') }}</p>
            <span class="category-count">{{ rand(15, 50) }}+ UNIQUE PIECES</span>
            <a href="{{ route('category', $category->slug) }}" class="explore-category-btn">Explore Category</a>
          </div>
        </div>
        @empty
        <!-- Default category cards if no categories -->
        <div class="category-card">
          <div class="category-content">
            <div class="category-icon">
              <div class="icon-placeholder">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
              </div>
            </div>
            <h3 class="category-title">Traditional Pottery</h3>
            <p class="category-description">Handcrafted ceramics with ancient techniques passed down through generations</p>
            <span class="category-count">45+ UNIQUE PIECES</span>
            <a href="#" class="explore-category-btn">Explore Category</a>
          </div>
        </div>
        @endforelse
      </div>
    </section>

    <!-- Featured Artists Section -->
    <section class="artists" id="artists">
      <div class="section-header">
        <h2 class="section-title">Featured Artists</h2>
        <p class="section-subtitle">Master craftspeople preserving ancient traditions</p>
      </div>
      <div class="artists-grid">
        @php
          $artists = [
            [
              'name' => 'Maria Santos',
              'specialty' => 'Master Potter',
              'image' => 'https://images.unsplash.com/photo-1494790108755-2616c9c0e8e3?w=200&h=200&fit=crop&crop=face',
              'description' => 'Third-generation ceramic artist specializing in traditional Pueblo techniques. Her work bridges ancient wisdom with contemporary aesthetics, creating pieces that honor ancestral traditions while speaking to modern souls.',
              'stats' => ['15+ Awards', '200+ Pieces', '30+ Years']
            ],
            [
              'name' => 'James Crow Feather',
              'specialty' => 'Textile Weaver',
              'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200&h=200&fit=crop&crop=face',
              'description' => 'Renowned for his intricate dreamcatchers and traditional blankets that tell stories of his ancestors. Each piece carries the spiritual essence of his people, woven with prayers and ancient patterns.',
              'stats' => ['25+ Years', '150+ Pieces', 'Cultural Master']
            ],
            [
              'name' => 'Elena Moonhawk',
              'specialty' => 'Jewelry Artisan',
              'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=200&h=200&fit=crop&crop=face',
              'description' => 'Creates sacred jewelry using traditional silversmithing techniques passed down through five generations. Her pieces are not just adornments but spiritual tools that connect the wearer to ancient energies.',
              'stats' => ['10+ Awards', '300+ Pieces', '5th Generation']
            ]
          ];
        @endphp
        
        @foreach($artists as $artist)
        <div class="artist-card">
          <div class="artist-header">
            <div class="artist-image">
              <img src="{{ $artist['image'] }}" alt="{{ $artist['name'] }}">
            </div>
            <div class="artist-basic-info">
              <h3 class="artist-name">{{ $artist['name'] }}</h3>
              <p class="artist-specialty">{{ $artist['specialty'] }}</p>
            </div>
          </div>
          <p class="artist-description">{{ $artist['description'] }}</p>
          <div class="artist-stats">
            @foreach($artist['stats'] as $stat)
            <span class="stat">{{ $stat }}</span>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>
    </section>

    <!-- About Us Section -->
    <section class="about">
      <div class="about-container">
        <div class="about-content">
          <div class="about-text">
            <h2 class="section-title">Our Sacred Mission</h2>
            @if(isset($home) && $home->description)
              <div class="about-description">
                {!! $home->description !!}
              </div>
            @else
              <p class="about-description">
                For over two decades, we have been dedicated to preserving and celebrating indigenous cultures and
                traditional craftsmanship. Our platform serves as a bridge between ancient wisdom and modern appreciation,
                ensuring that these precious traditions continue to thrive for future generations.
              </p>
              <p class="about-description">
                We work directly with indigenous communities, master artisans, and cultural keepers to authentically
                represent their heritage while providing them with sustainable economic opportunities. Every piece in our
                collection tells a story, carries meaning, and honors the hands that created it.
              </p>
            @endif
            <div class="about-values">
              <div class="value-item">
                <h4 class="value-title">Authenticity</h4>
                <p class="value-text">Every piece is verified for cultural authenticity and traditional craftsmanship.
                </p>
              </div>
              <div class="value-item">
                <h4 class="value-title">Respect</h4>
                <p class="value-text">We honor the sacred nature of cultural expressions and traditional knowledge.</p>
              </div>
              <div class="value-item">
                <h4 class="value-title">Sustainability</h4>
                <p class="value-text">Supporting artisan communities through fair trade and ethical practices.</p>
              </div>
            </div>
          </div>
          <div class="about-image">
            @if(isset($home) && $home->image)
              <img src="{{ asset('storage/' . $home->image) }}" alt="Our Story">
            @else
              <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=600&h=500&fit=crop&crop=center"
                alt="Our Story">
            @endif
            <div class="about-stats">
              <div class="about-stat">
                <span class="about-stat-number">{{ count($products) }}+</span>
                <span class="about-stat-label">Heritage Items</span>
              </div>
              <div class="about-stat">
                <span class="about-stat-number">{{ count($categories) }}+</span>
                <span class="about-stat-label">Categories</span>
              </div>
              <div class="about-stat">
                <span class="about-stat-number">50+</span>
                <span class="about-stat-label">Communities</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="features">
      <div class="section-header">
        <h2 class="section-title">Why Choose Us</h2>
        <p class="section-subtitle">Connecting you with authentic cultural treasures</p>
      </div>
      <div class="features-grid">
        <div class="feature-card">
          <div class="feature-icon">
            <div class="icon-placeholder"></div>
          </div>
          <h3 class="feature-title">Authentic Heritage</h3>
          <p class="feature-description">Every piece comes with a certificate of authenticity and the story of its
            creation, ensuring genuine cultural heritage.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">
            <div class="icon-placeholder"></div>
          </div>
          <h3 class="feature-title">Direct from Artisans</h3>
          <p class="feature-description">We work directly with master craftspeople, ensuring fair compensation and
            authentic traditional techniques.</p>
        </div>
        <div class="feature-card">
          <div feature-icon">
            <div class="icon-placeholder"></div>
          </div>
          <h3 class="feature-title">Cultural Education</h3>
          <p class="feature-description">Learn about the history, significance, and traditional methods behind each
            piece through our educational resources.</p>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
      <div class="stats-container">
        <div class="stat-item">
          <div class="stat-number">{{ count($products) }}+</div>
          <div class="stat-label">Heritage Items</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">{{ count($categories) }}+</div>
          <div class="stat-label">Categories</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">5000+</div>
          <div class="stat-label">Years Heritage</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">100+</div>
          <div class="stat-label">Elder Keepers</div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
      <div class="cta-content">
        <h2 class="cta-title">Begin Your Journey</h2>
        <p class="cta-subtitle">Connect with ancestral wisdom and join our growing community of {{ count($products) }}+ heritage items</p>
        <a href="{{ route('products') }}" class="btn btn-primary btn-large">Start Your Heritage Journey</a>
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
            @foreach($categories as $category)
            <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
            @endforeach
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
            @if($settings)
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
        <p>&copy; {{ date('Y') }} {{ $settings->site_name ?? 'Tatva Tales' }}. Honoring traditions with respect and reverence.</p>
      </div>
    </footer>
  </div>
  <script>
    let currentSlideIndex = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const slideshow = document.querySelector('.slideshow');
let slideInterval;

function showSlide(index) {
  slides.forEach(slide => slide.classList.remove('active'));
  dots.forEach(dot => dot.classList.remove('active'));

  slides[index].classList.add('active');
  dots[index].classList.add('active');
}

function changeSlide(direction) {
  currentSlideIndex = (currentSlideIndex + direction + slides.length) % slides.length;
  showSlide(currentSlideIndex);
}

function currentSlide(index) {
  currentSlideIndex = index - 1;
  showSlide(currentSlideIndex);
}

function startAutoSlide() {
  slideInterval = setInterval(() => changeSlide(1), 5000);
}

function stopAutoSlide() {
  clearInterval(slideInterval);
}

// Pause on hover
slideshow.addEventListener('mouseenter', stopAutoSlide);
slideshow.addEventListener('mouseleave', startAutoSlide);

// Initialize
showSlide(0);
startAutoSlide();

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
                cartCountSpan.textContent = '';
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