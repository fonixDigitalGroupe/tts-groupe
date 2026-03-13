<div x-data="{ show: false }" 
     @scroll.window="show = (window.pageYOffset > 200)"
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-10"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-10"
     class="fixed bottom-8 right-8 z-[60]"
     style="display: none;">
    <a href="https://wa.me/221774163535" target="_blank" rel="noopener noreferrer" 
       class="flex items-center justify-center w-16 h-16 bg-[#25D366] text-white rounded-full shadow-2xl relative group">
        <!-- Static WhatsApp Icon -->
        <svg class="w-9 h-9 relative z-10" fill="currentColor" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.29-4.143c1.589.943 3.111 1.462 4.795 1.463 5.4 0 9.791-4.39 9.793-9.791.001-2.618-1.02-5.08-2.876-6.937-1.856-1.856-4.318-2.877-6.937-2.877-5.402 0-9.792 4.39-9.795 9.791-.001 1.83.491 3.254 1.484 4.887l-.991 3.626 3.725-.972zm11.238-6.191c-.3-.15-1.774-.875-2.049-.976-.275-.1-.475-.15-.675.15s-.776.976-.951 1.176-.326.225-.626.075c-.3-.15-1.268-.467-2.414-1.49-.893-.796-1.493-1.78-1.668-2.079-.175-.3-.021-.462.129-.611.134-.134.3-.35.45-.525.15-.175.2-.3.3-.5s.05-.375-.025-.525-.675-1.625-.925-2.227c-.244-.583-.491-.504-.675-.514-.175-.01-.375-.01-.575-.01s-.525.075-.8.375c-.275.3-1.05 1.026-1.05 2.503s1.075 2.903 1.225 3.103c.15.2 2.115 3.227 5.125 4.525.715.309 1.275.494 1.708.632.715.228 1.366.196 1.881.119.574-.085 1.775-.726 2.025-1.426.25-.7.25-1.301.176-1.426-.076-.126-.276-.2-.576-.35z"/>
        </svg>

        <!-- Tooltip -->
        <span class="absolute right-full mr-4 bg-white text-blue-950 px-3 py-1.5 rounded-xl text-xs font-black shadow-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap border border-gray-100 pointer-events-none">
            Besoin d'aide ? Contactez-nous
        </span>
    </a>
</div>
