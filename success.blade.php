<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success - Tatva Tales</title>
    <meta name="description" content="Your action was successful">
    
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
                        bounce: 'bounce 1s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        bounce: {
                            '0%, 20%, 53%, 80%, 100%': { transform: 'translate3d(0,0,0)' },
                            '40%, 43%': { transform: 'translate3d(0, -30px, 0)' },
                            '70%': { transform: 'translate3d(0, -15px, 0)' },
                            '90%': { transform: 'translate3d(0, -4px, 0)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light-bg text-dark-bg font-sans antialiased">

    <!-- 🔥 Navbar -->
    <header class="bg-dark-bg text-light-bg py-4 shadow-lg sticky top-0 z-50">
        <nav class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('index') }}" class="text-2xl font-serif font-bold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                        clip-rule="evenodd" />
                </svg>
                Tatva Tales
            </a>

            <div class="flex items-center space-x-4">
                <ul class="hidden md:flex space-x-6">
                    <li><a href="{{ route('index') }}" class="hover:text-tertiary transition-colors">Home</a></li>
                    <li><a href="{{ route('index') }}#products" class="hover:text-tertiary transition-colors">Products</a></li>
                    <li><a href="{{ route('about-us') }}" class="hover:text-tertiary transition-colors">About</a></li>
                    <li><a href="{{ route('contact-us') }}" class="hover:text-tertiary transition-colors">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="min-h-screen flex items-center justify-center">
        <section class="py-16 animate-fadeIn">
            <div class="container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center">
                    
                    <!-- Success Icon -->
                    <div class="mb-8">
                        <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-r from-green-400 to-green-600 rounded-full mb-6 animate-bounce shadow-2xl">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Success Message -->
                    <div class="text-center mb-12">
                        <h1 class="text-5xl md:text-6xl font-serif font-bold text-primary mb-6">
                            🎉 Success! 🎉
                        </h1>
                        <p class="text-2xl text-secondary mb-4">
                            Your action was completed successfully!
                        </p>
                        <p class="text-lg text-tertiary">
                            Thank you for using Tatva Tales.
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('index') }}" class="bg-primary text-light-bg px-8 py-3 rounded-full font-semibold hover:bg-dark-bg transition-colors">
                            <i class="fas fa-home mr-2"></i>
                            Go Home
                        </a>
                        <a href="{{ route('index') }}#products" class="bg-secondary text-light-bg px-8 py-3 rounded-full font-semibold hover:bg-primary transition-colors">
                            <i class="fas fa-shopping-bag mr-2"></i>
                            Continue Shopping
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="bg-dark-bg text-light-bg py-8 text-center">
        <p>&copy; 2025 Tatva Tales. All rights reserved.</p>
    </footer>

    <script>
        // Confetti animation
        function createConfetti() {
            const confettiCount = 50;
            const confettiContainer = document.createElement('div');
            confettiContainer.style.position = 'fixed';
            confettiContainer.style.top = '0';
            confettiContainer.style.left = '0';
            confettiContainer.style.width = '100%';
            confettiContainer.style.height = '100%';
            confettiContainer.style.pointerEvents = 'none';
            confettiContainer.style.zIndex = '9999';
            document.body.appendChild(confettiContainer);

            for (let i = 0; i < confettiCount; i++) {
                const confetti = document.createElement('div');
                confetti.style.position = 'absolute';
                confetti.style.width = Math.random() * 10 + 5 + 'px';
                confetti.style.height = confetti.style.width;
                confetti.style.backgroundColor = ['#5B4B4B', '#A47D68', '#D4C4B5', '#F5F5E9', '#312A2A'][Math.floor(Math.random() * 5)];
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.top = '-10px';
                confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                confetti.style.animation = `confettiFall ${Math.random() * 3 + 2}s linear forwards`;
                confettiContainer.appendChild(confetti);
            }

            setTimeout(() => {
                document.body.removeChild(confettiContainer);
            }, 5000);
        }

        // Add confetti animation CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes confettiFall {
                to {
                    transform: translateY(100vh) rotate(720deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Trigger confetti on page load
        window.addEventListener('load', function() {
            setTimeout(createConfetti, 500);
        });
    </script>
</body>
</html>
