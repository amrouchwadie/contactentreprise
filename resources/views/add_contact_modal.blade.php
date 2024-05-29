<!-- resources/views/modals/add_contact_modal.blade.php -->
<div id="addModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Ajouter un contact
                        </h3>
                        <div class="mt-2">
                            <form action="{{ route('contacts.store') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-12 gap-4">
                                    <div class="col-span-12">
                                        <label for="cle" class="block text-sm font-medium text-gray-700">Cle</label>
                                        <input type="number" name="cle" id="cle" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                                        <input type="text" name="nom" id="nom" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="prenom" class="block text-sm font-medium text-gray-700">Prenom</label>
                                        <input type="text" name="prenom" id="prenom" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="col-span-12">
                                        <label for="organisation_id" class="block text-sm font-medium text-gray-700">Organisation</label>
                                        <select name="organisation_id" id="organisation_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                                            <option value="null" selected>Organisation...</option>
                                            @foreach ($contacts as $contact)
                                                <option value="{{ $contact->organisation->id }}">{{ $contact->organisation->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="e_mail" class="block text-sm font-medium text-gray-700">E-mail</label>
                                        <input type="email" name="e_mail" id="e_mail" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="telephone_fixe" class="block text-sm font-medium text-gray-700">Telephone fixe</label>
                                        <input type="number" name="telephone_fixe" id="telephone_fixe" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="service" class="block text-sm font-medium text-gray-700">Service</label>
                                        <input type="text" name="service" id="service" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="fonction" class="block text-sm font-medium text-gray-700">Fonction</label>
                                        <input type="text" name="fonction" id="fonction" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                                    </div>
                                </div>
                                <!-- Add other input fields as needed -->
                                <div class="mt-4 flex justify-between">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                        Enregistrer
                                    </button>
                                    <button id="closeButton" type="button" class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50">
                                        Fermer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
