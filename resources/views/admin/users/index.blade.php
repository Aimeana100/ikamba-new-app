<x-app-layout>
    @section('USER_SELECTED', 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700')
    @section('USER_SELECTED_ICON', 'bg-gradient-to-tl from-purple-700 to-pink-500')

    <div class="w-full px-6 py-6 mx-auto">
        <!-- content -->

        <div class="flex flex-wrap -mx-3">
            <div class="max-w-full px-3 lg:flex-none">
                <div class="flex flex-wrap -mx-3">
                    <div class="max-w-full px-3 mb-4 lg:mb-0 lg:w-full lg:flex-none">
                        <div
                            class="relative  mt-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div class="flex flex-wrap -mx-3">
                                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                        <form id="filterUserStatus" class="w-full" action="{{route('admin.users')}}"
                                              method="get">
                                            <select type="text"
                                                    name="status"
                                                    required
                                                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                    aria-label="status"
                                                    aria-describedby="status-addon">
                                                <option> -- select --</option>
                                                <option {{$userStatus == 'active' ? 'selected' : ''}} value="active">
                                                    Active
                                                </option>
                                                <option
                                                    {{$userStatus == 'inactive' ? 'selected' : ''}} value="inactive">
                                                    Inactive
                                                </option>

                                            </select>
                                        </form>

                                    </div>
                                    <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                        <a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25"
                                           href="{{route('admin.users.create')}}"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add
                                            New user</a>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-auto p-4">
                                <div class="flex-auto px-0 pb-2">

                                    <x-success-message-display :successSession="session('success')"/>

                                    <div class="overflow-x-auto ">
                                        <table
                                            class="items-center w-full mb-0 align-top border-gray-200 text-slate-500 max-w-full ">
                                            <thead class="align-bottom">
                                            <tr>
                                                <th class="px-4 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                                    #
                                                </th>
                                                <th class="px-4 py-3 pl-2 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                                    Name
                                                </th>
                                                <th class="px-4 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                                    Email
                                                </th>
                                                <th class="px-4 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                                    Phone
                                                </th>
                                                <th class="px-4 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                                    Role
                                                </th>
                                                <th class="px-4 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                                    Options
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                        <div class="flex px-2 py-1">
                                                            {{ $user->id }}
                                                        </div>
                                                    </td>
                                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                        <div class="mt-2 avatar-group">
                                                            {{ $user->name }}
                                                        </div>
                                                    </td>
                                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap">
                                                        <span
                                                            class="text-xs font-semibold leading-tight"> {{$user->email }}</span>
                                                    </td>

                                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap">
                                                        {{$user->phone ?? '-' }}
                                                    </td>

                                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap">
                                                        <span
                                                            class="text-xs font-semibold leading-tight"> {{$user->role }}</span>
                                                    </td>
                                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                        <div class="w-3/4 mx-auto">
                                                            <div class="ml-auto text-right">
                                                                <!-- Delete button that triggers the modal -->
                                                                @if( $userStatus == 'active')
                                                                    @if($user->id != auth()->user()->id)
                                                                        <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text"
                                                                           href="javascript:void(0)"
                                                                           onclick="confirmDelete('{{ route('admin.users.delete', ['id'=> $user->id]) }}')">
                                                                            <i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>
                                                                            Delete
                                                                        </a>
                                                                    @endif

                                                                    <!-- Edit button -->
                                                                    <a class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700"
                                                                       href="{{ route('admin.users.edit', ['id'=> $user->id]) }}">
                                                                        <i class="mr-2 fas fa-pencil-alt text-slate-700"
                                                                           aria-hidden="true"></i>
                                                                        Edit
                                                                    </a>
                                                                @endif
                                                                @if($userStatus == 'inactive')
                                                                    <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-green-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text"
                                                                       href="{{ route('admin.users.activate', ['id'=> $user->id]) }}">
                                                                        <i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-green-600 to-rose-400 bg-x-25 bg-clip-text"></i>
                                                                        Re-activate
                                                                    </a>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Structure -->
        <div id="deleteConfirmationModal" style="z-index: 99999"
             class="fixed inset-0 hidden overflow-y-auto bg-black bg-opacity-50">
            <div class="flex items-center justify-center min-h-screen">
                <div class="w-full max-w-lg p-4 bg-white rounded-lg shadow-lg">
                    <h2 class="mb-4 text-lg font-semibold text-gray-800">Confirm Deletion</h2>
                    <p>Are you sure you want to delete this item?</p>
                    <div class="flex justify-end mt-6">
                        <button onclick="closeModal()"
                                class="px-4 py-2 mr-2 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">Cancel
                        </button>
                        <form id="deleteForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        // JavaScript to open the modal and set the form action
        function confirmDelete(url) {
            document.getElementById('deleteForm').action = url;
            document.getElementById('deleteConfirmationModal').classList.remove('hidden');
        }

        // JavaScript to close the modal
        function closeModal() {
            document.getElementById('deleteConfirmationModal').classList.add('hidden');
        }


        //     javascript to filter user status
        document.getElementById('filterUserStatus').addEventListener('change', function () {
            this.submit();
        });


    </script>
</x-app-layout>
