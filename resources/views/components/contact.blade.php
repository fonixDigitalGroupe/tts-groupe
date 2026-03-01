<section class="py-20 bg-gray-50/30" id="contact">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-xl shadow-gray-200/50 border border-gray-100 flex flex-col lg:flex-row">
            
            <!-- Image Side -->
            <div class="lg:w-1/2 relative min-h-[400px] lg:min-h-full">
                <img src="{{ asset('images/contact_technician.png') }}" alt="Contact TTS Groupe" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent"></div>
            </div>

            <!-- Form Side -->
            <div class="lg:w-1/2 p-8 md:p-12 lg:p-16">
                <div class="mb-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Envoyez-nous un message</h2>
                    <p class="text-gray-600">Proposez-nous votre projet ou posez vos questions, notre équipe vous répondra avec plaisir.</p>
                </div>

                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-900 mb-2">Nom complet</label>
                        <input type="text" id="name" name="name" class="w-full px-5 py-4 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all placeholder:text-gray-400" placeholder="Votre nom complet">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-900 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-5 py-4 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all placeholder:text-gray-400" placeholder="votre@email.com">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-bold text-gray-900 mb-2">Objet</label>
                        <input type="text" id="subject" name="subject" class="w-full px-5 py-4 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all placeholder:text-gray-400" placeholder="Objet de votre message">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-bold text-gray-900 mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-5 py-4 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all resize-none placeholder:text-gray-400" placeholder="Décrivez votre projet en détail..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition-all duration-300 shadow-lg shadow-blue-600/25 flex items-center justify-center group">
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
