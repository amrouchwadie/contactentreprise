<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Entreprise</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        /* Include the Tailwind CSS from your original code here */
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">LIST DU CONTACT</h1>
        </div>
        <div class="mb-4 flex items-center">
            <form action="{{ route('contacts.search') }}" method="GET">
                <input type="text" name="query" class="border border-gray-300 rounded-md px-6 py-2 mr-2" placeholder="Rechercher...">
                <button type="submit">Recherche</button>
            </form>
            
            <button id="addButton" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded ml-auto">+ Ajouter</button>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'id']) }}">ID</a>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'nom']) }}">NOM DU CONTACT</a>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'organisation_id']) }}">SOCIETE</a>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'statut']) }}">STATUS</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($contacts as $contact)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $contact->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $contact->nom }} {{ $contact->prenom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $contact->organisation->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-block
                                    @if($contact->organisation->statut === 'LEAD') bg-blue-200
                                    @elseif($contact->organisation->statut === 'CLIENT') bg-green-200
                                    @elseif($contact->organisation->statut === 'PROSPECT') bg-red-100
                                    @endif
                                    rounded-full py-1 px-3">
                                    {{ $contact->organisation->statut }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <table >
                                    <tbody>
                                    <tr>
                                    <td> <button type="button"  onclick="loadContactInfo({{ $contact->id }})">
                                        👁️
                                    </button>
     <td>
                                    <td >    <button 
                                        class="editButton "
                                        data-id="{{ $contact->id }}"
                                        data-cle="{{ $contact->cle }}"
                                        data-nom="{{ $contact->nom }}"
                                        data-prenom="{{ $contact->prenom }}"
                                        data-organisation-id="{{ $contact->organisation->id }}"
                                        data-e-mail="{{ $contact->e_mail }}"
                                        data-telephone-fixe="{{ $contact->telephone_fixe }}"
                                        data-service="{{ $contact->service }}"
                                        data-fonction="{{ $contact->fonction }}"
                                        >
                                        🖊️
                                        </button>
                                    </td>
                                    <td >
                                        
                                        <form id="deleteContactForm_{{ $contact->id }}" action="{{ route('contact.destroy', $contact->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="button" onclick="deleteContact({{ $contact->id }});">🗑️</button>
                                        </form>
                                    </td>
                                    </tr>
                                    </tbody>
                                    </table>
                               
                            

                                <!-- Modal -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden" id="contactModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- Modal content -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Détail du contact
                        </h3>
                        <div class="mt-2" id="contactInfo">
                            <!-- Contact information will be inserted here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal()">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
                                
                   
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-4">
            <nav class="block">
                <ul class="flex pl-0 rounded list-none flex-wrap">
                    {{-- Previous Page Link --}}
                    @if ($contacts->onFirstPage())
                        <li class="block hover:text-white hover:bg-blue-600 text-blue-600 py-2 px-4 mx-1 rounded disabled">&lsaquo;</li>
                    @else
                        <li class="block hover:text-white hover:bg-blue-600 text-blue-600 py-2 px-4 mx-1 rounded">
                            <a href="{{ $contacts->appends(request()->query())->previousPageUrl() }}">&lsaquo;</a>
                        </li>
                    @endif
                    
                    {{-- Pagination Elements --}}
                    @for ($i = 1; $i <= $contacts->lastPage(); $i++)
                        <li class="block hover:text-white hover:bg-blue-600 text-blue-600 py-2 px-4 mx-1 rounded {{ ($contacts->currentPage() == $i) ? 'bg-blue-600 text-white' : '' }}">
                            <a href="{{ $contacts->appends(request()->query())->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
            
                    {{-- Next Page Link --}}
                    @if ($contacts->hasMorePages())
                        <li class="block hover:text-white hover:bg-blue-600 text-blue-600 py-2 px-4 mx-1 rounded">
                            <a href="{{ $contacts->appends(request()->query())->nextPageUrl() }}">&rsaquo;</a>
                        </li>
                    @else
                        <li class="block hover:text-white hover:bg-blue-600 text-blue-600 py-2 px-4 mx-1 rounded disabled">&rsaquo;</li>
                    @endif
                </ul>
            </nav>
            
        </div>
    </div>
    @include('add_contact_modal') <!-- Include the modal here -->
    @include('edit_contact_modal')
    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteContact(contactId) {
        Swal.fire({
            title: 'Etes-vous sûr de la suppression?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui',
            cancelButtonText: 'Non',
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form associated with the contact ID
                document.getElementById('deleteContactForm_' + contactId).submit();
            }
        });
    }
</script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.editButton');
        const editModal = document.getElementById('editModal');
        const editCloseButton = document.getElementById('editCloseButton');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const cle = this.dataset.cle;
                const nom = this.dataset.nom;
                const prenom = this.dataset.prenom;
                const organisationId = this.dataset.organisationId;
                const email = this.dataset.eMail;
                const telephoneFixe = this.dataset.telephoneFixe;
                const service = this.dataset.service;
                const fonction = this.dataset.fonction;

                const editForm = document.getElementById('editContactForm');
                editForm.action = `/contacts/${id}`;
                document.getElementById('edit_cle').value = cle;
                document.getElementById('edit_nom').value = nom;
                document.getElementById('edit_prenom').value = prenom;
                document.getElementById('edit_organisation_id').value = organisationId;
                document.getElementById('edit_e_mail').value = email;
                document.getElementById('edit_telephone_fixe').value = telephoneFixe;
                document.getElementById('edit_service').value = service;
                document.getElementById('edit_fonction').value = fonction;

                editModal.classList.remove('hidden');
            });
        });

        editCloseButton.addEventListener('click', function () {
            editModal.classList.add('hidden');
        });
    });
    </script>
    
<script>
document.getElementById('addButton').addEventListener('click', function() {
    document.getElementById('addModal').classList.remove('hidden');
});

document.getElementById('closeButton').addEventListener('click', function() {
    document.getElementById('addModal').classList.add('hidden');
});
</script>

    <script>
    function loadContactInfo(id) {
        fetch("/contact-info/" + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Contact not found");
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('contactInfo').innerHTML = `
                        <div class="space-y-14">
                            <!-- Profile Section -->
                            <div class="border-b border-gray-900/10 pb-12">
                                 <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <!-- Nom -->
                                <div class="sm:col-span-6">
                                <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                                <div class="mt-2">
                                    <input type="text" id="nom" name="nom" value="${data.nom}" readonly class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                </div>
                           
                                <!-- Prénom -->
                            <div class="sm:col-span-6">
                            <label for="prenom" class="block text-sm font-medium leading-6 text-gray-900">Prénom</label>
                            <div class="mt-2">
                                <input type="text" id="prenom" name="prenom" value="${data.prenom}" readonly class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            </div>
                            <div class="sm:col-span-12">
                            <label for="prenom" class="block text-sm font-medium leading-6 text-gray-900">E-mail</label>
                            <div class="mt-2">
                                <input type="text" id="prenom" name="prenom" value="${data.e_mail}" readonly class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            </div>
                              <div class="sm:col-span-12">
                            <label for="prenom" class="block text-sm font-medium leading-6 text-gray-900">Entreprise</label>
                            <div class="mt-2">
                                <input type="text" id="prenom" name="prenom" value="${data.organisation.nom}" readonly class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            </div>
                        

                            <div class="sm:col-span-12">
          <label for="adresse" class="block text-sm font-medium leading-6 text-gray-900">Adresse</label>
          <div class="mt-2">
            <textarea id="adresse" name="adresse" readonly rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">${data.organisation.adresse}</textarea>
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="postal" class="block text-sm font-medium leading-6 text-gray-900">Code Postal</label>
          <div class="mt-2">
            <input type="text" id="postal" name="postal" value="${data.organisation.code_postal}" readonly class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>


        <div class="sm:col-span-8">
          <label for="ville" class="block text-sm font-medium leading-6 text-gray-900">Ville</label>
          <div class="mt-2">
            <input type="text" id="ville" name="ville" value="${data.organisation.ville}" readonly class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

                     
        <div class="sm:col-span-8">
          <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Statut</label>
          <div class="mt-2">
            <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option>${data.organisation.statut}</option>
        
            </select>
          </div>
        </div>

                 
                    </div>
                `;
                openModal();
            })
            .catch(error => {
                console.error('Error fetching contact info:', error);
            });
    }

    function openModal() {
        document.getElementById('contactModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('contactModal').classList.add('hidden');
    }
</script>
</body>
</html>
