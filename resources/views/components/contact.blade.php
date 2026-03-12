<section class="py-24 bg-gray-50/10" id="contact">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Standardized Header -->
        <div class="text-center mb-20">
            <h2 class="text-2xl md:text-4xl font-semibold text-blue-950 mb-4 tracking-tight">Prêt à donner vie à votre prochain projet ?</h2>
            <div class="w-20 h-1.5 bg-orange-500 mx-auto rounded-full mb-8"></div>
            <p class="text-gray-500 max-w-3xl mx-auto text-lg leading-relaxed font-medium">
                Échangeons sur vos besoins pour construire ensemble une solution sur mesure qui fera grandir votre entreprise. Contactez-nous dès aujourd'hui.
            </p>
        </div>

        <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100 flex flex-col lg:flex-row">
            
            <!-- Image Side -->
            <div class="lg:w-1/2 relative min-h-[400px] lg:min-h-full">
                <img src="{{ asset('images/contact_technician.png') }}" alt="Contact TTS Groupe" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/40 to-transparent"></div>
            </div>

            <!-- Form Side -->
            <div class="lg:w-1/2 p-8 md:p-12 lg:p-16">
                <div class="mb-10">
                    <h3 class="text-2xl md:text-3xl font-bold text-blue-950 mb-2">Envoyez-nous un message</h3>
                    <div class="w-12 h-1 bg-orange-500 rounded-full"></div>
                </div>

                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-blue-950 mb-2">Nom complet</label>
                        <input type="text" id="name" name="name" class="w-full px-5 py-4 rounded-2xl border border-gray-100 bg-gray-50/50 focus:border-orange-500 focus:bg-white focus:ring-0 outline-none transition-all placeholder:text-gray-400 font-medium" placeholder="Votre nom complet">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-blue-950 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-5 py-4 rounded-2xl border border-gray-100 bg-gray-50/50 focus:border-orange-500 focus:bg-white focus:ring-0 outline-none transition-all placeholder:text-gray-400 font-medium" placeholder="votre@email.com">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-bold text-blue-950 mb-2">Objet</label>
                        <input type="text" id="subject" name="subject" class="w-full px-5 py-4 rounded-2xl border border-gray-100 bg-gray-50/50 focus:border-orange-500 focus:bg-white focus:ring-0 outline-none transition-all placeholder:text-gray-400 font-medium" placeholder="Objet de votre message">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-bold text-blue-950 mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-5 py-4 rounded-2xl border border-gray-100 bg-gray-50/50 focus:border-orange-500 focus:bg-white focus:ring-0 outline-none transition-all resize-none placeholder:text-gray-400 font-medium" placeholder="Décrivez votre projet en détail..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-5 bg-blue-950 hover:bg-blue-900 text-white font-black rounded-full transition-all shadow-lg shadow-blue-950/25 flex items-center justify-center group">
                        Envoyer le message
                        <svg class="w-6 h-6 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
