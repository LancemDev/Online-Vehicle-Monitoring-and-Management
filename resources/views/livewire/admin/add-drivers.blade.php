<div>
    <x-main full-width>
            {{-- SIDEBAR --}}
            <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
     
     
                {{-- MENU --}}
                <x-menu activate-by-route>
 
                    {{-- User --}}
                    @if($user = auth()->user())
                        <x-menu-separator />
     
                        <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                            
                        </x-list-item>
     
                        <x-menu-separator />
                    @endif
     
                    <x-menu-item title="Admin Dashboard" icon="o-home" link="/admin/home" />
                    <x-menu-item title="View Passengers" icon="o-eye" link="/admin/view-users" />
                    <x-menu-item title="View Saccos" icon="o-user-group" link="/admin/view-saccos" />
                    <x-menu-item title="Add Sacco" icon="o-plus" link="/admin/add-sacco" />
                    <x-menu-item title="View Drivers" icon="o-eye" link="/admin/view-drivers" />
                    <x-menu-item title="Add Driver" icon="o-user-plus" link="/admin/add-driver" />
                    <x-menu-item title="View Vehicles" icon="o-truck" link="/admin/view-vehicles" />
                    <x-menu-item title="Add Vehicle" icon="o-plus" link="/admin/add-vehicle" />
                    <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                        <x-menu-item title="Log out" icon="o-power" link="/logout" />
                        <x-menu-item title="Change Theme" icon="o-moon">
                            <x-theme-toggle darkTheme="coffee" lightTheme="bumblebee" />
                        </x-menu-item>
                    </x-menu-sub>
                </x-menu>
            </x-slot:sidebar>
     
            {{-- The `$slot` goes here --}}
            <x-slot:content>
            <x-form wire:submit.prevent="save">
                <x-header title="Add Driver" with-anchor separator />
                <x-input label="Name" placeholder="Enter name" wire:model="name" />
                <x-input label="Email" placeholder="Enter email" wire:model="email" />
                <x-input label="Phone" placeholder="Enter phone" wire:model="phone" />
                <x-input label="Password" placeholder="Enter password" wire:model="password" type="password" />
                <x-input label="Confirm Password" type="password" placeholder="Confirm password" wire:model="password_confirmation" />
                
                <x-slot:actions>
                    <x-button type="submit" label="Save" spinner save class="btn-primary" />
                </x-slot:actions>
            </x-form>
            </x-slot:content>
        </x-main>
    </div>
    