<section class="py-20 bg-gray-50/30" id="contact">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Centered Header Outside the Card -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Prêt à donner vie à votre prochain projet ?</h2>
            <div class="w-16 h-1 bg-orange-500 mx-auto rounded-full mb-6"></div>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Échangeons sur vos besoins pour construire ensemble une solution sur mesure qui fera grandir votre entreprise. Contactez-nous dès aujourd'hui.
            </p>
        </div>

        <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-xl shadow-gray-200/50 border border-gray-100 flex flex-col lg:flex-row">
            
            <!-- Image Side -->
            <div class="lg:w-1/2 relative min-h-[400px] lg:min-h-full">
                <img src="{{ asset('images/contact_technician.png') }}" alt="Contact TTS Groupe" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/40 to-transparent"></div>
            </div>

            <!-- Form Side -->
            <div class="lg:w-1/2 p-8 md:p-12 lg:p-16">
                <div class="mb-10">
                    <h3 class="text-2xl md:text-3xl font-bold text-blue-900 mb-2">Envoyez-nous un message</h3>
                    <p class="text-gray-600 font-medium">Complétez le formulaire ci-dessous et notre équipe vous recontactera rapidement.</p>
                </div>

                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-blue-900 mb-2">Nom complet</label>
                        <input type="text" id="name" name="name" class="w-full px-5 py-4 rounded-xl border border-gray-200 focus:border-blue-700 focus:ring-4 focus:ring-blue-700/10 outline-none transition-all placeholder:text-gray-400" placeholder="Votre nom complet">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-blue-900 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-5 py-4 rounded-xl border border-gray-200 focus:border-blue-700 focus:ring-4 focus:ring-blue-700/10 outline-none transition-all placeholder:text-gray-400" placeholder="votre@email.com">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-bold text-blue-900 mb-2">Objet</label>
                        <input type="text" id="subject" name="subject" class="w-full px-5 py-4 rounded-xl border border-gray-200 focus:border-blue-700 focus:ring-4 focus:ring-blue-700/10 outline-none transition-all placeholder:text-gray-400" placeholder="Objet de votre message">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-bold text-blue-900 mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-5 py-4 rounded-xl border border-gray-200 focus:border-blue-700 focus:ring-4 focus:ring-blue-700/10 outline-none transition-all resize-none placeholder:text-gray-400" placeholder="Décrivez votre projet en détail..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 bg-orange-600 hover:bg-orange-700 text-white font-bold rounded-xl transition-all duration-300 shadow-lg shadow-orange-600/25 flex items-center justify-center group transform hover:-translate-y-1">
                        Envoyer le message
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
