<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Artribe - Handmade by Tribal Artisans' }}</title>
    <meta name="description" content="{{ $meta_description ?? 'Discover authentic tribal crafts directly from artisans. Support indigenous communities while buying beautiful handmade products at fair prices.' }}">
    <meta name="keywords" content="{{ $meta_keywords ?? 'tribal crafts, handmade, artisan, heritage' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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
        .header.scrolled {
            background-color: rgba(245, 245, 233, 0.9); /* bg-light-bg/90 */
            backdrop-filter: blur(4px); /* backdrop-blur-sm */
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05); /* shadow-lg */
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
        .filter-btn.active {
            background-color: #5B4B4B; /* bg-primary */
            color: #F5F5E9; /* text-light-bg */
        }
        .product-card-overlay {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .product-card:hover .product-card-overlay {
            opacity: 1;
        }
        .product-card-image-bg, #detail-product-image-container {
            transition: transform 0.3s ease-in-out;
            background-size: cover;
            background-position: center;
        }
        .product-card:hover .product-card-image-bg {
            transform: scale(1.05);
        }
        .loading-spinner {
            display: none;
        }
        .loading-spinner.active {
            display: block;
        }
        .page-section {
            display: none;
        }
        .page-section.active {
            display: block;
            animation: fadeIn 0.8s ease-out;
        }

        /* Off-canvas cart styles */
        #cart-sidebar {
            transform: translateX(100%);
            transition: transform 0.4s ease-in-out;
        }
        #cart-sidebar.open {
            transform: translateX(0);
        }
        .overlay {
            display: none;
            background: rgba(0, 0, 0, 0.5);
            transition: opacity 0.4s ease-in-out;
            opacity: 0;
        }
        .overlay.active {
            display: block;
            opacity: 1;
        }
        
        /* Mobile navigation styles */
        #mobile-nav {
            transform: translateX(-100%);
            transition: transform 0.4s ease-in-out;
        }
        #mobile-nav.active {
            transform: translateX(0);
        }

        /* Product-specific image classes */
        .jewelry-necklace { background-image: url('/Images/brassNecklace.jpg'); }
        .wood-figurine { background-image: url('/Images/OdishaBrassandBellMetalTribalJewellery.jpg'); }
        .hand-painted-bowl { background-image: url('/Images/MohanJoderoMetalHandicraftHandmadeTribalLadyWorker.jpg'); }
        .carved-mask { background-image: url('/Images/HandcraftedGondPaperPainting.jpg'); }
        .clay-pottery { background-image: url('/Images/DhokraArtIndianTribalWomen.jpg'); }
        .beaded-necklace { background-image: url('/Images/MulticolorBronzeIndianTribalHandicraft.jpg'); }
        .handwoven-rug { background-image: url('/Images/PureHandmadeDhokraTribalJewellery.jpg'); }
        .tribal-drum { background-image: url('/Images/TribalJewelryfromNagaland.jpg'); }

        /* Style for the confirmation message box */
        #message-box {
            position: fixed;
            bottom: 1rem;
            left: 50%;
            transform: translateX(-50%);
            background-color: #5B4B4B;
            color: #F5F5E9;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
            z-index: 50;
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            opacity: 0;
            pointer-events: none;
        }
        #message-box.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
        
        /* Product description text wrapping */
        .product-description {
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
            max-width: 100%;
        }
    </style>
</head>
<body class="bg-light-bg text-gray-800 font-sans antialiased">

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

    <main class="min-h-screen pt-24 px-4 md:px-8 lg:px-16">

        <section class="flex flex-col items-center justify-center text-center py-24 bg-tertiary rounded-xl shadow-lg">
            <h1 class="text-5xl md:text-6xl font-bold font-serif text-primary animate-fadeIn" style="animation-delay: 0.2s;">{{ $product->name }}</h1>
            <p class="mt-4 text-xl text-primary font-sans animate-fadeIn" style="animation-delay: 0.4s;">{{ $product->category_names ?? 'HANDMADE BY TRIBAL ARTISANS' }}</p>
        </section>

        <section id="products-list-page" class="py-16 page-section">
            <div class="container mx-auto">
                <div class="lg:grid lg:grid-cols-4 lg:gap-8">
                    <aside class="col-span-1 p-6 bg-tertiary rounded-xl shadow-lg mb-8 lg:mb-0 h-fit">
                        <h2 class="text-xl font-bold text-primary font-serif mb-4">Filters</h2>
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-primary mb-2">Category</h3>
                            <div class="space-y-2 text-primary">
                                @foreach($categories as $category)
                                <label class="flex items-center">
                                    <input type="checkbox" name="category" value="{{ $category->name }}" class="mr-2 rounded text-primary focus:ring-primary"> {{ $category->name }}
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-primary mb-2">Sort By</h3>
                            <select id="sort-by" class="w-full p-2 rounded-md bg-white border border-secondary text-primary focus:ring-primary focus:border-primary">
                                <option value="default">Default</option>
                                <option value="price-asc">Price: Low to High</option>
                                <option value="price-desc">Price: High to Low</option>
                                <option value="name-asc">Name: A-Z</option>
                                <option value="name-desc">Name: Z-A</option>
                            </select>
                        </div>
                    </aside>

                    <div class="col-span-3">
                        <div class="loading-spinner text-center">
                            <div class="inline-block h-8 w-8 animate-spinner rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite] text-primary" role="status">
                                <span class="!absolute !-m-px !h-px !-w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                            </div>
                        </div>
                        <div id="product-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="product-detail-page" class="py-16 page-section active">
            <div class="container mx-auto">
                <button id="back-to-products" class="flex items-center text-primary font-semibold mb-8 hover:text-secondary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Products
                </button>
                <div class="bg-white rounded-xl shadow-lg p-8 grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 max-w-full overflow-hidden">
                    <div class="w-full h-96 flex items-center justify-center rounded-lg overflow-hidden bg-gray-50">
                        <img src="{{ $product->image ? (str_starts_with($product->image, 'http') ? $product->image : url('public/images/product/' . $product->image)) : url('public/images/product/placeholder.jpg') }}" 
                             alt="{{ $product->name }}" 
                             class="max-w-full max-h-full object-contain" 
                             onerror="this.src='{{ url('public/images/product/placeholder.jpg') }}'">
                    </div>
                    <div class="flex flex-col justify-center min-w-0">
                        <h2 class="text-4xl md:text-5xl font-serif text-primary mb-2 animate-slideInFromRight">{{ $product->name }}</h2>
                        <p class="text-2xl font-bold text-secondary mb-4 animate-slideInFromRight" style="animation-delay: 0.1s;">
                            @if($product->price)
                                Rs {{ number_format($product->price, 2) }}
                            @else
                                {{ $product->category_names ?? 'Heritage Item' }}
                            @endif
                        </p>
                        <div class="text-gray-700 leading-relaxed mb-6 animate-slideInFromRight product-description" style="animation-delay: 0.2s;">
                            {!! $product->description !!}
                        </div>
                        <div class="mb-6 animate-slideInFromRight" style="animation-delay: 0.3s;">
                            <h3 class="text-lg font-semibold text-primary mb-2">Category</h3>
                            <p class="text-gray-700">{{ $product->category_names ?? 'Heritage Collection' }}</p>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button id="add-to-cart-btn" class="flex items-center justify-center bg-primary text-light-bg font-semibold py-3 px-6 rounded-full shadow-md hover:bg-secondary transition-colors duration-300 transform hover:scale-105 animate-slideInFromRight" style="animation-delay: 0.4s;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Add to Cart
                            </button>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    
    <div id="message-box" class="translate-y-10"></div>

    <footer class="bg-dark-bg text-gray-300 py-8 text-center mt-auto">
        <div class="container mx-auto px-4">
            <p>&copy; 2025 Artribe. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const productsListPage = document.getElementById('products-list-page');
            const productDetailPage = document.getElementById('product-detail-page');
            const productList = document.getElementById('product-list');
            const categoryCheckboxes = document.querySelectorAll('input[name="category"]');
            const sortBySelect = document.getElementById('sort-by');
            const loadingSpinner = document.querySelector('.loading-spinner');
            const backToProductsBtn = document.getElementById('back-to-products');

            // --- NAVIGATION ELEMENTS ---
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileNav = document.getElementById('mobile-nav');
            const closeMobileNavBtn = document.getElementById('close-mobile-nav-btn');
            const mobileNavOverlay = document.getElementById('mobile-nav-overlay');
            const cartCountSpan = document.getElementById('cart-count');
            const addToCartBtn = document.getElementById('add-to-cart-btn');

            let currentProduct = null;

            // --- PRODUCT DATA FROM DATABASE ---
            const products = @json($allProducts);

            function showMessage(text) {
                const messageBox = document.getElementById('message-box');
                messageBox.textContent = text;
                messageBox.classList.add('show');
                setTimeout(() => {
                    messageBox.classList.remove('show');
                }, 3000);
            }

            // --- SERVER-SIDE CART LOGIC ---
            function updateCartCount() {
                fetch('{{ route("cart.count") }}')
                    .then(response => response.json())
                    .then(data => {
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
            
            function addToCart(product) {
                fetch('{{ route("cart.add") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: product.id,
                        quantity: 1
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCartCount();
                        showMessage('Item added to cart!');
                    } else {
                        showMessage('Error adding item to cart: ' + data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showMessage('Error adding item to cart', 'error');
                });
            }
            
            function addToCartAndCheckout(product) {
                fetch('{{ route("cart.add") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: product.id,
                        quantity: 1
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCartCount();
                        // Redirect to checkout page
                        window.location.href = '{{ route("checkout") }}';
                    } else {
                        showMessage('Error adding item to cart: ' + data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showMessage('Error adding item to cart', 'error');
                });
            }
            
            // --- FUNCTION TO DISPLAY PRODUCTS ---
            function displayProducts(productArray) {
                try {
                    productList.innerHTML = '';
                    if (productArray.length === 0) {
                        productList.innerHTML = '<p class="text-center text-gray-500 col-span-full">No products found matching your criteria.</p>';
                        return;
                    }
                    productArray.forEach(product => {
                        const card = document.createElement('div');
                        card.className = 'product-card bg-white rounded-xl shadow-md cursor-pointer relative overflow-hidden';
                        
                        card.dataset.productId = product.id;

                        card.innerHTML = `
                            <div class="w-full h-64 overflow-hidden bg-gray-50 flex items-center justify-center">
                                <img src="${product.image}" alt="${product.name}" class="max-w-full max-h-full object-contain" onerror="this.src='{{ url('public/images/product/placeholder.jpg') }}'">
                            </div>
                            <div class="p-4 text-center">
                                <h3 class="text-lg font-semibold text-primary font-serif">${product.name}</h3>
                                <p class="text-md font-bold text-secondary mt-1">${product.price > 0 ? 'Rs ' + product.price.toFixed(2) : product.category}</p>
                            </div>
                            <div class="product-card-overlay absolute inset-0 flex items-center justify-center p-4">
                                <span class="quick-view-btn text-sm py-2 px-4 rounded-full font-semibold bg-white text-primary border border-primary transition-colors duration-300 hover:bg-primary hover:text-white">
                                    View Details
                                </span>
                            </div>
                        `;
                        card.addEventListener('click', (e) => {
                            e.stopPropagation();
                            showProductDetail(product);
                        });
                        productList.appendChild(card);
                    });
                } catch (error) {
                    console.error("Failed to display products:", error);
                }
            }

            // --- FUNCTION TO SHOW PRODUCT DETAIL PAGE ---
            function showProductDetail(product) {
                // Redirect to the product detail page
                window.location.href = `product/${product.slug}`;
            }

            // --- FUNCTION TO GO BACK TO PRODUCTS LIST ---
            backToProductsBtn.addEventListener('click', () => {
                window.location.href = '{{ route("products") }}';
            });


            // --- FILTERING AND SORTING LOGIC ---
            function applyFiltersAndSort() {
                loadingSpinner.classList.add('active');
                
                setTimeout(() => {
                    const selectedCategories = Array.from(categoryCheckboxes)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value);
                    const sortBy = sortBySelect.value;
                    
                    let filteredProducts = products;

                    if (selectedCategories.length > 0) {
                        filteredProducts = products.filter(product => selectedCategories.includes(product.category));
                    }
                    
                    if (sortBy !== 'default') {
                        filteredProducts.sort((a, b) => {
                            if (sortBy === 'price-asc') {
                                return a.price - b.price;
                            } else if (sortBy === 'price-desc') {
                                return b.price - a.price;
                            } else if (sortBy === 'name-asc') {
                                return a.name.localeCompare(b.name);
                            } else if (sortBy === 'name-desc') {
                                return b.name.localeCompare(a.name);
                            }
                        });
                    }

                    loadingSpinner.classList.remove('active');
                    displayProducts(filteredProducts);
                }, 500);
            }
            
            function openMobileNav() {
                mobileNav.classList.add('active');
                mobileNavOverlay.classList.add('active');
            }
            
            function closeMobileNav() {
                mobileNav.classList.remove('active');
                mobileNavOverlay.classList.remove('active');
            }
            
            // --- EVENT LISTENERS ---
            addToCartBtn.addEventListener('click', () => {
                const productData = {
                    id: {{ $product->id }},
                    name: {!! json_encode($product->name) !!},
                    price: {{ $product->price ?? 0 }},
                    image: {!! json_encode($product->image ? (str_starts_with($product->image, 'http') ? $product->image : url('public/images/product/' . $product->image)) : url('public/images/product/placeholder.jpg')) !!}
                };
                addToCart(productData);
            });
            buyNowBtn.addEventListener('click', () => {
                const productData = {
                    id: {{ $product->id }},
                    name: {!! json_encode($product->name) !!},
                    price: {{ $product->price ?? 0 }},
                    image: {!! json_encode($product->image ? (str_starts_with($product->image, 'http') ? $product->image : url('public/images/product/' . $product->image)) : url('public/images/product/placeholder.jpg')) !!}
                };
                // Add to cart first, then redirect to checkout
                addToCartAndCheckout(productData);
            });

            mobileMenuBtn.addEventListener('click', openMobileNav);
            closeMobileNavBtn.addEventListener('click', closeMobileNav);
            mobileNavOverlay.addEventListener('click', closeMobileNav);

            categoryCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', applyFiltersAndSort);
            });

            sortBySelect.addEventListener('change', applyFiltersAndSort);
            
            // Header scroll effect
            window.addEventListener('scroll', () => {
                const header = document.querySelector('.header');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Initial load
            updateCartCount();
        });
    </script>
</body>
</html>