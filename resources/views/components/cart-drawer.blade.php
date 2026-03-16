<div x-data="" 
     x-show="$store.cart.isOpen" 
     class="fixed inset-0 z-[100] overflow-hidden" 
     style="display: none;">
    
    <!-- Backdrop -->
    <div x-show="$store.cart.isOpen" 
         x-transition:enter="ease-in-out duration-500" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="ease-in-out duration-500" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0" 
         @click="$store.cart.toggle()"
         class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
        <div x-show="$store.cart.isOpen" 
             x-transition:enter="transform transition ease-in-out duration-500" 
             x-transition:enter-start="translate-x-full" 
             x-transition:enter-end="translate-x-0" 
             x-transition:leave="transform transition ease-in-out duration-500" 
             x-transition:leave-start="translate-x-0" 
             x-transition:leave-end="translate-x-full" 
             class="w-screen max-w-md">
            <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
                
                <!-- Header -->
                <div class="px-4 py-6 bg-white border-b border-gray-100 sm:px-6">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-[#1A1B4B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <h2 class="text-lg font-black text-[#1A1B4B]">Mon panier (<span x-text="$store.cart.count"></span> articles)</h2>
                        </div>
                        <div class="ml-3 h-7 flex items-center">
                            <button @click="$store.cart.toggle()" class="text-gray-400 hover:text-gray-500 transition-colors">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Items List -->
                <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                    <div class="flow-root">
                        <ul role="list" class="-my-6 divide-y divide-gray-100">
                            <template x-for="item in $store.cart.items" :key="item.id">
                                <li class="py-6 flex">
                                    <div class="flex-shrink-0 w-20 h-20 border border-gray-200 rounded-lg overflow-hidden bg-gray-50">
                                        <img :src="item.image" :alt="item.name" class="w-full h-full object-contain p-1">
                                    </div>

                                    <div class="ml-4 flex-1 flex flex-col">
                                        <div>
                                            <div class="flex justify-between text-sm font-black text-[#1A1B4B]">
                                                <h3 class="line-clamp-1" x-text="item.name"></h3>
                                                <p class="ml-4 whitespace-nowrap" x-text="(item.price * item.qty).toLocaleString() + ' FCFA'"></p>
                                            </div>
                                            <p class="mt-1 text-[11px] font-bold text-gray-400" x-text="item.price.toLocaleString() + ' FCFA'"></p>
                                        </div>
                                        <div class="flex-1 flex items-end justify-between text-sm">
                                            <!-- Quantity Controls -->
                                            <div class="flex items-center border border-gray-100 rounded-lg bg-gray-50 overflow-hidden h-8">
                                                <button @click="$store.cart.updateQty(item.id, -1)" class="w-8 h-full flex items-center justify-center hover:bg-gray-200 text-gray-500 font-bold">-</button>
                                                <span class="w-8 text-center font-black text-[#1A1B4B]" x-text="item.qty"></span>
                                                <button @click="$store.cart.updateQty(item.id, 1)" class="w-8 h-full flex items-center justify-center hover:bg-gray-200 text-gray-500 font-bold">+</button>
                                            </div>

                                            <button @click="$store.cart.removeItem(item.id)" class="text-gray-400 hover:text-red-500 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                    
                    <!-- Empty State -->
                    <div x-show="$store.cart.items.length === 0" class="py-20 text-center">
                        <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <p class="text-gray-400 font-bold uppercase text-[12px] tracking-widest">Votre panier est vide</p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="border-t border-gray-100 py-6 px-4 sm:px-6 bg-gray-50/50">
                    <div class="flex justify-between text-base font-black text-[#1A1B4B] mb-6">
                        <p>Total</p>
                        <p x-text="$store.cart.total.toLocaleString() + ' FCFA'"></p>
                    </div>
                    <div>
                        @php
                            $cleanWhatsapp = preg_replace('/\D/', '', $whatsappNumber);
                        @endphp
                        <button @click="window.location.href = 'https://wa.me/{{ $cleanWhatsapp }}?text=' + encodeURIComponent('Bonjour, je souhaite passer une commande :\n' + $store.cart.items.map(i => '- ' + i.name + ' (x' + i.qty + ') : ' + (i.price * i.qty).toLocaleString() + ' FCFA').join('\n') + '\n\nTotal : ' + $store.cart.total.toLocaleString() + ' FCFA')"
                                class="w-full flex items-center justify-center px-6 py-4 border border-transparent rounded-full shadow-sm text-sm font-black text-white bg-[#1A1B4B] hover:bg-[#25265e] transition-all uppercase tracking-wider gap-3">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"></path></svg>
                            Passer la commande
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
