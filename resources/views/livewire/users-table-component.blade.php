<div class="antialiased sans-serif bg-white w-full rounded-xl" x-data="{ showUsers: true, addUser: false, editUser: false, deleteUser: false, editUsers: false }">
	
	<style>

		[type="checkbox"] {
			box-sizing: border-box;
			padding: 0;
		}

		.form-checkbox, .form-radio {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			-webkit-print-color-adjust: exact;
			color-adjust: exact;
			display: inline-block;
			vertical-align: middle;
			background-origin: border-box;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			flex-shrink: 0;
			color: currentColor;
			background-color: #fff;
			border-color: #e2e8f0;
			border-width: 1px;
			border-radius: 0.25rem;
			height: 1.2em;
    		width: 1.2em;
		}

		.form-checkbox:checked {
			background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
			border-color: transparent;
			background-color: currentColor;
			background-size: 100% 100%;
			background-position: center;
			background-repeat: no-repeat;
		}

        /* .toggle-checkbox:checked {
            @apply: right-0 border-green-400;
            right: 0;
            border-color: #68D391;
        }

        .toggle-checkbox:checked + .toggle-label {
            @apply: bg-blue-400;
            background-color: #68D391;
        } */

	</style>

    {{-- USERS.SHOW --}}
    <div x-show="showUsers" x-cloak>
        <div class="container mx-auto py-6 px-4" x-data="datatables, rowDetail = @entangle('selectedRowsLenght')">
            <h1 class="text-3xl py-4 border-b mb-10">Users</h1>

            @if($selectedRowsLenght > 0)
            <div class="bg-green-200 fixed top-0 left-0 right-0 z-40 w-full shadow">
                <div class="container mx-auto px-4 py-4 flex justify-between">
                    <div class="flex md:items-center">
                        <div class="mr-4 flex-shrink-0">
                            <svg class="h-8 w-8 text-green-600"  viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                        </div>
                        <div class="text-green-800 text-lg">{{$selectedRowsLenght}} rows are selected</div>
                    </div>
                    <div class="flex">
                        <button class="flex items-center justify-center hover:bg-green-300 w-10 h-10 p-1 rounded-full" @click="editUsers = true">
                            <i class="fas fa-user-edit text-green-600 text-lg"></i>
                        </button>
                        <button class="flex items-center justify-center hover:bg-green-300 w-10 h-10 p-1 rounded-full" @click="deleteUser = true">
                            <i class="fas fa-trash text-green-600 text-lg"></i>
                        </button>
                        <button class="flex items-center justify-center hover:bg-green-300 w-10 h-10 p-1 rounded-full" wire:click="restore" @click="selectAllCheckbox($event)">
                            <i class="fas fa-trash-restore text-green-600 text-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endif

            <div class="mb-4 flex justify-between items-center">
                <div class="flex-1 pr-4">
                    <div class="relative md:w-1/2 flex">

                        <input type="search"
                        class="w-2/3 pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium mr-3"
                        placeholder="Search..."
                        wire:model="search">

                        <div class="absolute top-0 left-0 inline-flex items-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <circle cx="10" cy="10" r="7" />
                                <line x1="21" y1="21" x2="15" y2="15" />
                            </svg>
                        </div>

                        {{-- <div class="shadow rounded-lg flex">
                            <button @click.prevent="openCriteria = !openCriteria"
                                class="rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:hidden" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <path
                                        d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5" />
                                </svg>
                                <span class="hidden md:block whitespace-nowrap">{{$searchCriterium}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </button>

                            <div x-show="openCriteria" @click.outside="openCriteria = false"
                                class="z-40 absolute top-0 right-0 w-40 bg-white rounded-lg shadow-lg mt-12 -mr-1 block py-1 overflow-hidden">
                                
                                @foreach ($searchCriteria as $key => $value)
                                <label
                                    class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                                    <div class="text-green-600 mr-3">
                                        <input
                                        type="radio"
                                        name="searchCriteria"
                                        value="{{$value}}"
                                        class="form-radio rounded-full focus:outline-none focus:shadow-outline"
                                        @if($loop->index == 0) checked @endif
                                        wire:model="searchCriterium">
                                    </div>
                                    <div class="select-none text-gray-700">{{$value}}</div>
                                </label>
                                @endforeach

                            </div>
                        </div> --}}

                    </div>
                </div>
                <div class="flex space-x-3">
                    <button class="px-4 py-2 text-white tracking-wider bg-green-500 hover:bg-green-700 rounded" @click="addUser = true">Add User</button>
                    {{-- <div class="shadow rounded-lg flex">
                        <div class="relative">
                            <button @click.prevent="open = !open"
                                class="rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:hidden" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <path
                                        d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5" />
                                </svg>
                                <span class="hidden md:block">Display</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </button>

                            <div x-show="open" @click.outside="open = false"
                                class="z-40 absolute top-0 right-0 w-40 bg-white rounded-lg shadow-lg mt-12 -mr-1 block py-1 overflow-hidden">
                                
                                @foreach ($headings as $key => $value)
                                <label
                                    class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                                    <div class="text-green-600 mr-3">
                                        <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline" checked @click="toggleColumn( '{{ $key }}' )">
                                    </div>
                                    <div class="select-none text-gray-700">{{$value}}</div>
                                </label>
                                @endforeach
                                
                                <!-- <template x-for="heading in headings">
                                    <label
                                        class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                                        <div class="text-green-600 mr-3">
                                            <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline" checked @click="toggleColumn(heading.key)">
                                        </div>
                                        <div class="select-none text-gray-700" x-text="heading.value"></div>
                                    </label>
                                </template> -->
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-none relative"
                style="height: 405px;">
                <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                    <thead>
                        <tr class="text-left">
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                <label
                                    class="text-green-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                    <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline" @click="selectAllCheckbox($event)">
                                </label>
                            </th>

                            @foreach ($headings as $key => $value)
                            <th class="cursor-pointer bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs"
                            :x-ref="{{"'".$key."'"}}"
                            :class="{ {{$key}}: true }"
                            wire:click="order('{{$value}}')">
                                {{$value}}
                            </th>

                            @endforeach
                            {{-- <template x-for="heading in headings">
                                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs"
                                    x-text="heading.value" :x-ref="heading.key" :class="{ [heading.key]: true }"></th>
                            </template> --}}
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="@if($user->status != 1) text-gray-400 @else text-gray-700 @endif">
                            <td class="border-dashed border-t border-gray-200 px-3">
                                <label
                                    class="text-green-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                    <input
                                    type="checkbox"
                                    class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline"
                                    name="{{$user->id}}" 
                                    @click="getRowDetail($event, {{$user->id}})">
                                </label>
                            </td>
                            <td class="border-dashed border-t border-gray-200 userUsername">
                                <a href="{{route('profile.show', $user->id)}}" class="px-6 py-3 flex items-center hover:underline hover:text-blue-500">{{$user->username}}</a>
                            </td>
                            <td class="border-dashed border-t border-gray-200 userFirstName">
                                <span class="px-6 py-3 flex items-center">{{$user->first_name}}</span>
                            </td>
                            <td class="border-dashed border-t border-gray-200 userLastName">
                                <span class="px-6 py-3 flex items-center">{{$user->last_name}}</span>
                            </td>
                            <td class="border-dashed border-t border-gray-200 userEmail">
                                <span class="px-6 py-3 flex items-center">{{$user->email}}</span>
                            </td>
                            <td class="border-dashed border-t border-gray-200 userStatus">
                                <span class="@if($user->status == 1) text-green-600 @else text-red-600 @endif font-bold px-6 py-3 flex items-center">@if($user->status == 1) Active @else Inactive @endif</span>
                            </td>
                            <td class="border-dashed border-t border-gray-200">
                                <button class="px-6 py-2 flex items-center" @click="editUser = true" wire:click="edit({{$user->id}})">
                                    <i class="fas fa-user-edit"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        {{-- <template x-for="user in users" :key="user.userId">
                            <tr>
                                <td class="border-dashed border-t border-gray-200 px-3">
                                    <label
                                        class="text-green-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                        <input type="checkbox" class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline" :name="user.userId"
                                                @click="getRowDetail($event, user.userId)">
                                    </label>
                                </td>
                                <td class="border-dashed border-t border-gray-200 userId">
                                    <span class="text-gray-700 px-6 py-3 flex items-center" x-text="user.userId"></span>
                                </td>
                                <td class="border-dashed border-t border-gray-200 firstName">
                                    <span class="text-gray-700 px-6 py-3 flex items-center" x-text="user.firstName"></span>
                                </td>
                                <td class="border-dashed border-t border-gray-200 lastName">
                                    <span class="text-gray-700 px-6 py-3 flex items-center" x-text="user.lastName"></span>
                                </td>
                                <td class="border-dashed border-t border-gray-200 emailAddress">
                                    <span class="text-gray-700 px-6 py-3 flex items-center"
                                        x-text="user.emailAddress"></span>
                                </td>
                                <td class="border-dashed border-t border-gray-200 gender">
                                    <span class="text-gray-700 px-6 py-3 flex items-center"
                                        x-text="user.gender"></span>
                                </td>
                                <td class="border-dashed border-t border-gray-200 phoneNumber">
                                    <span class="text-gray-700 px-6 py-3 flex items-center"
                                        x-text="user.phoneNumber"></span>
                                </td>
                            </tr>
                        </template> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- USERS.ADD --}}
    <div class="bg-black bg-opacity-50 z-10 fixed top-0 left-0 w-full h-full flex items-center justify-center" x-show="addUser" x-transition x-cloak>
        {{-- <div class="container mx-auto py-6 px-4"> --}}
            <div class="leading-loose">
                <div class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1" @click.outside="addUser = false">
                    <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                        <h1 class="">Create User</h1>
                        <i class="fas fa-times cursor-pointer text-xl" @click="addUser = false"></i>
                    </div>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_username" type="text" required placeholder="Username" aria-label="Username" wire:model="username">
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_password" type="password" required placeholder="Password" aria-label="Password" wire:model="password">
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_password_confirm" type="password" required placeholder="Password Confirmation" aria-label="Password" wire:model="password_confirm">
                    <div class="flex mt-2 w-full space-x-1">
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_name" type="text" required placeholder="Name" aria-label="Name" wire:model="first_name">
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_lastname" type="text" required placeholder="Last Name" aria-label="Lastname" wire:model="last_name">
                    </div>
                    <input class="w-full px-2  py-2 text-gray-700 bg-gray-200 rounded" name="user_email" type="email" required placeholder="Email" aria-label="Email" wire:model="email">
                    <div class="flex pt-4 justify-end">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" @click="addUser = false" wire:click="create">Create</button>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>

    {{-- USERS.EDIT --}}
    <div class="bg-black bg-opacity-50 z-10 fixed top-0 left-0 w-full h-full flex items-center justify-center" x-show="editUser" x-transition x-cloak>
        <div class="leading-loose">
            <div class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1" @click.outside="editUser = false">
                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                    <h1 class="">Edit User</h1>
                    <i class="fas fa-times cursor-pointer text-xl" @click="editUser = false"></i>
                </div>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_username" type="text" required placeholder="Username" aria-label="Username" wire:model="username">
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_password" type="password" required placeholder="Password" aria-label="Password" wire:model="password">
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_password_confirm" type="password" required placeholder="Password Confirmation" aria-label="Password" wire:model="password_confirm">
                <div class="flex mt-2 w-full space-x-1">
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_name" type="text" required placeholder="Name" aria-label="Name" wire:model="first_name">
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_lastname" type="text" required placeholder="Last Name" aria-label="Lastname" wire:model="last_name">
                </div>
                <input class="w-full px-2  py-2 text-gray-700 bg-gray-200 rounded" name="user_email" type="email" required placeholder="Email" aria-label="Email" wire:model="email">
                <input class="w-full px-2  py-2 text-gray-700 bg-gray-200 rounded" name="user_role" type="number" required placeholder="Role" min="1" max="4" step="1" aria-label="Role" wire:model="role">
                {{-- <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" checked/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div> --}}
                <div class="flex pt-4 justify-end">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" @click="editUser = false" wire:click="update">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{-- USERS.DELETE --}}
    <div class="bg-black bg-opacity-50 z-10 fixed top-0 left-0 w-full h-full flex items-center justify-center" x-show="deleteUser" x-transition x-cloak>
        <div class="leading-loose">
            <div class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1" @click.outside="deleteUser = false">
                <div class="flex justify-between border-b mb-2 py-4 text-3xl">
                    <h1 class="">Delete User(s)</h1>
                    <i class="fas fa-times cursor-pointer text-xl" @click="deleteUser = false"></i>
                </div>
                <div class="flex mb-8 py-4 w-full border-b text-lg">
                    <p>Are you sure you want to delete @if($selectedRowsLenght == 1) this user? @endif @if($selectedRowsLenght > 1) these {{$selectedRowsLenght}} users? @endif</p>
                </div>
                <div class="flex pt-4 justify-end space-x-2">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-400 rounded" @click="deleteUser = false">Cancel</button>
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-red-600 rounded" @click="deleteUser = false" wire:click="delete" @click="selectAllCheckbox($event)">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    {{-- USERS.BULK.EDIT --}}
    <div class="bg-black bg-opacity-50 z-10 fixed top-0 left-0 w-full h-full flex items-center justify-center" x-show="editUsers" x-transition x-cloak>
        <div class="leading-loose">
            <div class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1" @click.outside="editUsers = false">
                <div class="flex justify-between border-b mb-2 py-4 text-3xl">
                    <h1 class="">Edit User(s)</h1>
                    <i class="fas fa-times cursor-pointer text-xl" @click="editUsers = false"></i>
                </div>
                <div class="flex mb-8 py-4 w-full border-b text-lg">
                    <input class="w-full px-2  py-2 text-gray-700 bg-gray-200 rounded" name="user_role" type="number" required placeholder="Role" min="1" max="4" step="1" aria-label="Role" wire:model="role">
                </div>
                <div class="flex pt-4 justify-end space-x-2">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" @click="editUsers = false" wire:click="bulkEdit" @click="selectAllCheckbox($event)">Save</button>
                </div>
            </div>
        </div>
    </div>

	<script>
		document.addEventListener('alpine:init', () => {
            Alpine.data('datatables', () => ({
				// headings: [
				// 	{
				// 		'key': 'userId',
				// 		'value': 'User ID'
				// 	},
				// 	{
				// 		'key': 'firstName',
				// 		'value': 'Firstname'
				// 	},
				// 	{
				// 		'key': 'lastName',
				// 		'value': 'Lastname'
				// 	},
				// 	{
				// 		'key': 'emailAddress',
				// 		'value': 'Email'
				// 	},
				// 	{
				// 		'key': 'gender',
				// 		'value': 'Gender'
				// 	},
				// 	{
				// 		'key': 'phoneNumber',
				// 		'value': 'Phone'
				// 	}
				// ],
				// users: [{
				// 	"userId": 1,
				// 	"firstName": "Cort",
				// 	"lastName": "Tosh",
				// 	"emailAddress": "ctosh0@github.com",
				// 	"gender": "Male",
				// 	"phoneNumber": "327-626-5542"
				// }, {
				// 	"userId": 2,
				// 	"firstName": "Brianne",
				// 	"lastName": "Dzeniskevich",
				// 	"emailAddress": "bdzeniskevich1@hostgator.com",
				// 	"gender": "Female",
				// 	"phoneNumber": "144-190-8956"
				// }, {
				// 	"userId": 3,
				// 	"firstName": "Isadore",
				// 	"lastName": "Botler",
				// 	"emailAddress": "ibotler2@gmpg.org",
				// 	"gender": "Male",
				// 	"phoneNumber": "350-937-0792"
				// }, {
				// 	"userId": 4,
				// 	"firstName": "Janaya",
				// 	"lastName": "Klosges",
				// 	"emailAddress": "jklosges3@amazon.de",
				// 	"gender": "Female",
				// 	"phoneNumber": "502-438-7799"
				// }, {
				// 	"userId": 5,
				// 	"firstName": "Freddi",
				// 	"lastName": "Di Claudio",
				// 	"emailAddress": "fdiclaudio4@phoca.cz",
				// 	"gender": "Female",
				// 	"phoneNumber": "265-448-9627"
				// }, {
				// 	"userId": 6,
				// 	"firstName": "Oliy",
				// 	"lastName": "Mairs",
				// 	"emailAddress": "omairs5@fda.gov",
				// 	"gender": "Female",
				// 	"phoneNumber": "221-516-2295"
				// }, {
				// 	"userId": 7,
				// 	"firstName": "Tabb",
				// 	"lastName": "Wiseman",
				// 	"emailAddress": "twiseman6@friendfeed.com",
				// 	"gender": "Male",
				// 	"phoneNumber": "171-817-5020"
				// }, {
				// 	"userId": 8,
				// 	"firstName": "Joela",
				// 	"lastName": "Betteriss",
				// 	"emailAddress": "jbetteriss7@msu.edu",
				// 	"gender": "Female",
				// 	"phoneNumber": "481-100-9345"
				// }, {
				// 	"userId": 9,
				// 	"firstName": "Alistair",
				// 	"lastName": "Vasyagin",
				// 	"emailAddress": "avasyagin8@gnu.org",
				// 	"gender": "Male",
				// 	"phoneNumber": "520-669-8364"
				// }, {
				// 	"userId": 10,
				// 	"firstName": "Nealon",
				// 	"lastName": "Ratray",
				// 	"emailAddress": "nratray9@typepad.com",
				// 	"gender": "Male",
				// 	"phoneNumber": "993-654-9793"
				// }, {
				// 	"userId": 11,
				// 	"firstName": "Annissa",
				// 	"lastName": "Kissick",
				// 	"emailAddress": "akissicka@deliciousdays.com",
				// 	"gender": "Female",
				// 	"phoneNumber": "283-425-2705"
				// }, {
				// 	"userId": 12,
				// 	"firstName": "Nissie",
				// 	"lastName": "Sidnell",
				// 	"emailAddress": "nsidnellb@freewebs.com",
				// 	"gender": "Female",
				// 	"phoneNumber": "754-391-3116"
				// }, {
				// 	"userId": 13,
				// 	"firstName": "Madalena",
				// 	"lastName": "Fouch",
				// 	"emailAddress": "mfouchc@mozilla.org",
				// 	"gender": "Female",
				// 	"phoneNumber": "584-300-9004"
				// }, {
				// 	"userId": 14,
				// 	"firstName": "Rozina",
				// 	"lastName": "Atkins",
				// 	"emailAddress": "ratkinsd@japanpost.jp",
				// 	"gender": "Female",
				// 	"phoneNumber": "792-856-0845"
				// }, {
				// 	"userId": 15,
				// 	"firstName": "Lorelle",
				// 	"lastName": "Sandcroft",
				// 	"emailAddress": "lsandcrofte@google.nl",
				// 	"gender": "Female",
				// 	"phoneNumber": "882-911-7241"
				// }],
				selectedRows: [],

				open: false,
                openCriteria: false,
				
				toggleColumn(key) {
					// Note: All td must have the same class name as the headings key! 
					let columns = document.querySelectorAll('.' + key);

					// if (this.$refs[key].classList.contains('hidden') && this.$refs[key].classList.contains(key)) {
						columns.forEach(column => {
							if(column.classList.contains('hidden')){
                                column.classList.remove('hidden');
                            }else{
                                column.classList.add('hidden');
                            }
						});
					// } else {
						// columns.forEach(column => {
							// column.classList.add('hidden');
						// });
					// }
				},

				getRowDetail($event, id) {
					let rows = this.selectedRows;

					if (rows.includes(id)) {
						let index = rows.indexOf(id);
						rows.splice(index, 1);
					} else {
						rows.push(id);
					}

                    Livewire.emit('selectRows',rows);
				},

				selectAllCheckbox($event) {
					let columns = document.querySelectorAll('.rowCheckbox');

					this.selectedRows = [];

					if ($event.target.checked == true) {
						columns.forEach(column => {
							column.checked = true
							this.selectedRows.push(parseInt(column.name))
						});
					} else {
						columns.forEach(column => {
							column.checked = false
						});
						this.selectedRows = [];
					}
                    Livewire.emit('selectRows',this.selectedRows);
				}
			}))
		})
	</script>
</div>
