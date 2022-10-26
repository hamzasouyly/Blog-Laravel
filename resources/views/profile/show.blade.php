<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <h1 class="text-center my-5">PRODUCT</h1>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                    Product Image
                </th>
                <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                    Product name
                </th>
                <th scope="col" class="py-3 px-6">
                    Product Discription
                </th>
                <th scope="col" class="py-3 px-6">
                    
                </th>
            </tr>
        </thead>
        <tbody>
           @foreach (auth()->user()->posts()->withTrashed()->get() as $post)
           <tr class="border-b border-gray-200 dark:border-gray-700">
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                <img src="{{ asset('./uploads/'.$post->image) }}" width="50px" alt="">
            </th>
            <td class="py-4 px-6">
                {{ $post->title }}
            </td>
            <td class="py-4 px-6 bg-gray-50 dark:bg-gray-800">
                {{ $post->body }}
            </td>
            <td class="py-4 px-6">
                <a href="{{ route('post.edit',$post->slug) }}" class="btn btn-info btn-block" type="submit">Edit</a>
                @if ($post->trashed())

                <a href="{{ route('post.restore',$post->slug) }}" class="btn btn-info btn-block" type="submit">restore</a>

                <form id="{{ $post->id }}" action="{{ route('post.Forcedelete',$post->slug) }}" method="post">
                    @csrf
                    @method('delete')
                    
                  </form>
                    @else
                    <form id="{{ $post->id }}" action="{{ route('post.delete',$post->slug) }}" method="post">
                        @csrf
                        @method('delete')
                        
                      </form>
                @endif
                
                <button onclick="event.preventDefault(); 
                if(confirm('are you sure'))
                document.getElementById({{ $post->id }}).submit();" class="btn btn-danger btn-block" type="submit">
                
                @if ($post->trashed())
                    Forcedelete
                @else
                    delete
                @endif

                </button>   
            </td>
        </tr>
           @endforeach
        </tbody>
    </table>
</div>

{{-- categories --}}




            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
